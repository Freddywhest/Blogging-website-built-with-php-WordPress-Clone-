<? $page_name = 'Privacy policy'; ?>
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
     					<li>Policy</li>
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
					$sql = "SELECT * FROM policy";
					$stmt = $pdo->prepare($sql);
					$stmt->execute();
					$policy = $stmt->fetch(PDO::FETCH_ASSOC);
					$p_title = $policy['policy_title'];
					$p_detail = $policy['policy_detail'];
					?>
					<h3><? echo $p_title; ?></h3>

               <p><? echo $p_detail; ?></p>
				</div><!-- Col 1 end -->
			</div><!-- Row 1 end -->


		</div><!-- Container end -->
	</section><!-- First block end -->


<? include  ("vendors/footer.php"); ?>
</html>