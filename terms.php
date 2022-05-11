<? $page_name = 'Terms and Conditions'; ?>
<? include  ("vendors/header.php"); ?>
<body <? echo $theme_name == "b-style"?"class='boxed-layout'":"class='layouter'"; ?><? echo $theme_name == "b-dark"?"class='boxed-layout'":""; ?>>

	<div class="body-inner">

<? include  ("vendors/nav.php"); ?>

	<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<ol class="breadcrumb">
     					<li><a href="home">Home</a></li>
     					<li>Site terms</li>
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
					$sql = "SELECT * FROM terms";
					$stmt = $pdo->prepare($sql);
					$stmt->execute();
					$terms = $stmt->fetch(PDO::FETCH_ASSOC);
					$t_title = $terms['terms_title'];
					$t_detail = $terms['terms_detail'];
					?>
					<h3><? echo $t_title; ?></h3>

               <p><? echo $t_detail; ?></p>
				</div><!-- Col 1 end -->
			</div><!-- Row 1 end -->


		</div><!-- Container end -->
	</section><!-- First block end -->


<? include  ("vendors/footer.php"); ?>
</html>