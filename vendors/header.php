<?
ob_start(); 
require_once ("vendors/db.php"); 

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : ((isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);

$sql = "SELECT * FROM site_purpose";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$p_n = $stmt->fetch(PDO::FETCH_ASSOC);
$p_name = $p_n['p_name'];

if(isset($_GET['post_id'])){
	$sql = "SELECT * FROM posts WHERE post_id =:id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
	':id' => $_GET['post_id']
	]);
	$post = $stmt->fetch(PDO::FETCH_ASSOC);
	$post_title = $post['post_title'];
	$post_url = $post['post_url'];
	$post_user_id = $post['post_user_id'];
	$post_detail = substr($post['post_detail'], 0, 150);
	$post_image = $post['post_image'];
	$post_date = $post['post_date'];
}

$sql = "SELECT * FROM site_detail ORDER BY site_id DESC LIMIT 0, 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$site = $stmt->fetch(PDO::FETCH_ASSOC);
$s_name = $site['site_name'];
$s_desc = $site['site_desc'];
$s_image = $site['site_image'];

$sql = "SELECT * FROM visitors_ip WHERE v_ip =:ip";
$stmt = $pdo->prepare($sql);
$stmt->execute([
':ip' => $ip
]);
$count_p = $stmt->rowCount();
if($count_p == 0){
        $sql2 = "INSERT INTO visitors_ip(v_ip) VALUES (:p)";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute([
        ':p' => $ip
        ]);
        
        $sql3 = "UPDATE visitors_count SET v_count = v_count +1 WHERE id =:id";
        $stmt3 = $pdo->prepare($sql3);
        $stmt3->execute([
        ':id' => 0
        ]);
}else{
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><? echo $page_name; ?> || <? echo $s_name; ?></title>
	<meta property="og:url"           content="<? echo $url; ?>" />
	<meta property="og:type"          content="article" />
	<meta property="og:title"         content="<? echo $page_name; ?>" />
	<meta property="og:description"   content="<? echo $s_desc; ?>" />
	<meta property="og:image"         content="<? echo  (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>/uploads/<? echo $s_image; ?>" />
	<!-- Twitter-->
	<meta name="twitter:title" content="<? echo $page_name; ?>">
	<meta name="twitter:description" content=" <? echo $s_desc; ?>">
	<meta name="twitter:image" content="<? echo  (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>/uploads/<? echo $s_image; ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" href="../../uploads/<? echo $s_image; ?>" type="image/x-icon">
	<link rel="icon" href="../../uploads/<? echo $s_image; ?>" type="image/x-icon">
	<!-- Basic Page Needs
	================================================== -->

	<!-- Mobile Specific Metas
	================================================== -->
        <?php
	$sql = "SELECT * FROM script_code WHERE code_id =:id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
	':id' => 1
	]);
	$codeh = $stmt->fetch(PDO::FETCH_ASSOC);
	$code_h = $codeh['s_code'];
	?>
	<? echo $code_h; ?>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!--Favicon-->
	<link rel="shortcut icon" href="uploads/<? echo $s_image; ?>" type="image/x-icon">
	<link rel="icon" href="uploads/<? echo $s_image; ?>" type="image/x-icon">
	
	<!-- CSS
	================================================== -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Template styles-->
	<?
	$sql = " SELECT * FROM home_theme";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$theme = $stmt->fetch(PDO::FETCH_ASSOC);
	$theme_name = $theme['theme_name'];
	?>
	<link rel="stylesheet" href="css/<? echo $theme_name; ?>.css">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Colorbox -->
	<link rel="stylesheet" href="css/colorbox.css">
</head>