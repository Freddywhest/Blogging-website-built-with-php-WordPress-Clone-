<? 
$page_name = "About";
include  ("vendors/header.php"); ?>
<body <? echo $theme_name == "b-style"?"class='boxed-layout'":"class='layouter'"; ?><? echo $theme_name == "b-dark"?"class='boxed-layout'":""; ?>>

	<div class="body-inner">

<? include  ("vendors/nav.php"); ?>

	<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<ol class="breadcrumb">
     					<li><a href="home">Home</a></li>
     					<li>About</li>
     				</ol>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->

	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<?
					$sql = "SELECT * FROM about";
					$stmt = $pdo->prepare($sql);
					$stmt->execute();
					$about = $stmt->fetch(PDO::FETCH_ASSOC);
					$a_title = $about['about_title'];
					$a_detail = $about['about_detail'];
					?>
					<h3><? echo $a_title; ?></h3>

               <p><? echo $a_detail; ?></p>
				</div><!-- Col 1 end -->
			</div><!-- Row 1 end -->


		</div><!-- Container end -->
	</section><!-- First block end -->


<? include  ("vendors/footer.php"); ?>
</html>