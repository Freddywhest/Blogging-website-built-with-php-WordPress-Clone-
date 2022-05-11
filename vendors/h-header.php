<?
ob_start(); 
require_once ("vendors/db.php"); 

$sql = "SELECT * FROM site_purpose";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$p_n = $stmt->fetch(PDO::FETCH_ASSOC);
$p_name = $p_n['p_name'];

$sql = "SELECT * FROM site_detail ORDER BY site_id DESC LIMIT 0, 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$site = $stmt->fetch(PDO::FETCH_ASSOC);
$s_name = $site['site_name'];
$s_desc = $site['site_desc'];
$s_image = $site['site_image'];

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$sql = "SELECT * FROM hot_news WHERE hot_post_id =:id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
':id' => $_GET['hot_post_id']
]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
$post_title = $post['hot_post_title'];
$post_url = $post['hot_post_url'];
$post_user_id = $post['hot_post_user_id'];
$post_detail = substr($post['hot_post_detail'], 0, 150);
$post_image = $post['hot_post_image'];
$post_date = $post['hot_post_date'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title><? echo $post_title; ?> || <? echo $s_name; ?></title>
	<meta property="og:url"           content="<? echo $url;?>" />
	<meta property="og:type"          content="article" />
	<meta property="og:title"         content="<? echo $post_title; ?>" />
	<meta property="og:description"   content="<? echo $post_detail; ?>" />
	<meta property="og:image"         content="<? echo  (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>/uploads/<? echo $post_image; ?>" />
	<!-- Twitter-->
	<meta name="twitter:title" content="<? echo $post_title; ?>">
	<meta name="twitter:description" content=" <? echo $post_detail; ?>">
	<meta name="twitter:image" content="<? echo  (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>/uploads/<? echo $post_image; ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" href="../../uploads/<? echo $s_image; ?>" type="image/x-icon">
	<link rel="icon" href="../../uploads/<? echo $s_image; ?>" type="image/x-icon">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<!-- Template styles-->
	<?
	$sql = " SELECT * FROM home_theme";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$theme = $stmt->fetch(PDO::FETCH_ASSOC);
	$theme_name = $theme['theme_name'];
	?>
	<link rel="stylesheet" href="../../css/<? echo $theme_name; ?>.css">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="../../css/responsive.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="../../css/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="../../css/animate.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="../../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../../css/owl.theme.default.min.css">
	<!-- Colorbox -->
	<link rel="stylesheet" href="../../css/colorbox.css">

</head>