<?
ob_start(); 
require_once ("vendors/db.php"); 
$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$sql = "SELECT * FROM site_purpose";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$p_n = $stmt->fetch(PDO::FETCH_ASSOC);
$p_name = $p_n['p_name'];

if(isset( $_GET['cat_id'])){
	$sql1 = "SELECT * FROM categories WHERE category_id =:id";
	$stmt1 = $pdo->prepare($sql1);
	$stmt1->execute([
	':id' => $_GET['cat_id']
	]);
	$cat = $stmt1->fetch(PDO::FETCH_ASSOC);
	$category_name = $cat['category_name'];
	$category_url = $cat['category_url'];

}
$sql = "SELECT * FROM site_detail ORDER BY site_id DESC LIMIT 0, 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$site = $stmt->fetch(PDO::FETCH_ASSOC);
$s_name = $site['site_name'];
$s_desc = $site['site_desc'];
$s_image = $site['site_image'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	
	<title><?php
	if(isset($_GET['cat_id'])){
		echo $category_name; 
	}else{
		echo $_GET['post_author']; 
	}?> || <? echo $s_name; ?></title>
	<meta property="og:url"           content="<? echo $url; ?>" />
	<meta property="og:type"          content="article" />
	<meta property="og:title"         content="<? 
												if(isset($_GET['cat_id'])){
													echo $category_name; 
												}else{
													echo $_GET['post_author']; 
												}?>" />
	<meta property="og:description"   content="<?
												if(isset($_GET['cat_id'])){ echo $category_name;} ?>" />
	<meta property="og:image"         content="<? echo  (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>/uploads/<? echo $s_image; ?>" />
	<!-- Twitter-->
	<meta name="twitter:title" content="<? 
										if(isset($_GET['cat_id'])){
											echo $category_name; 
										}else{
											echo $_GET['post_author']; 
										} ?>">
	<meta name="twitter:description" content=" <?  
												if(isset($_GET['cat_id'])){
													echo $category_name; 
												}else{
													echo $_GET['post_author']; 
												}; ?>">
	<meta name="twitter:image" content='<? echo  (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; ?>/uploads/<? echo $s_image; ?>'>
	<meta name="twitter:card" content="summary_large_image">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Specific Metas
	================================================== -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
	<!--Favicon-->
	<link rel="shortcut icon" href="../../uploads/<? echo $s_image; ?>" type="image/x-icon">
	<link rel="icon" href="../../uploads/<? echo $s_image; ?>" type="image/x-icon">
	
	<!-- CSS
	================================================== -->
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