<? $page_name = 'Category'; ?>
<? include  ("vendors/cat-header.php"); ?>
<body <? echo $theme_name == "b-style"?"class='boxed-layout'":"class='layouter'"; ?><? echo $theme_name == "b-dark"?"class='boxed-layout'":""; ?>>
	<? include  ("vendors/cat-nav.php"); ?>

	<div class="page-title">
		<div class="container">
			<div class="row">
			<?
			$sql = "SELECT * FROM user_permissions";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$perm = $stmt->fetch(PDO::FETCH_ASSOC);
			$u_reg = $perm['user_register'];
			?>
			<?
			$sql1 = "SELECT * FROM categories WHERE category_id =:id";
				$stmt1 = $pdo->prepare($sql1);
				$stmt1->execute([
				':id' => $_GET['cat_id']
				]);
				$cat = $stmt1->fetch(PDO::FETCH_ASSOC);
				$category_name = $cat['category_name'];
			?>
				<div class="col-md-12">
					<ol class="breadcrumb">
     					<li><a href="#">Home</a></li>
     					<li><? echo $category_name; ?></li>
     				</ol>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->

	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">

					<div class="block category-listing category-style2">
						<h3 class="block-title"><span><? echo $category_name; ?></span></h3>
						<?
						$sql = "SELECT * FROM posts WHERE post_status ='Published' AND post_category_id =:id";
						$stmt = $pdo->prepare($sql);
						$stmt->execute([
						':id' => $_GET['cat_id']
						]);
						 $post_count = $stmt->rowCount();
							$post_per_page = 7;
							if (isset($_GET['page'])) {
								$page = $_GET['page'];
								if($page == 1) {
									$page_id = 0;
								} else {
									$page_id = ($page * $post_per_page) - $post_per_page;
								}
							} else {
								$page = 1;
								$page_id = 0;
							}
							$total_pager = ceil($post_count / $post_per_page);
						$status_p = 'Published';
						$sql = "SELECT * FROM posts WHERE post_status =:status AND post_category_id =:id ORDER BY post_id DESC LIMIT $page_id, $post_per_page";
						$stmt = $pdo->prepare($sql);
						$stmt->execute([
						':status' => $status_p,
						':id' => $_GET['cat_id']
						]);
						while($post = $stmt->fetch(PDO::FETCH_ASSOC)){
							$post_id = $post['post_id'];
							$post_user_id = $post['post_user_id'];
							$post_category_id = $post['post_category_id'];
							$post_title = $post['post_title'];
							$post_detail = substr($post['post_detail'], 0, 150);
							$post_author = $post['post_author'];
							$post_image = $post['post_image'];
							$post_comment = $post['post_comment_count'];
							$post_date = $post['post_date'];
							//getting category name
							$sql1 = "SELECT * FROM categories WHERE category_id =:id";
							$stmt1 = $pdo->prepare($sql1);
							$stmt1->execute([
							':id' => $post_category_id
							]);
							$cat = $stmt1->fetch(PDO::FETCH_ASSOC);
							$category_name = $cat['category_name'];?>
						<div class="post-block-style post-list clearfix">
							<div class="row">
								<div class="col-lg-5 col-md-6">
									<div class="post-thumb thumb-float-style">
										<a href="../../p-detail/<? echo $post_id; ?>/<? echo $post_url ?>">
											<img class="img-fluid" src="../.././uploads/<? echo $post_image; ?>" alt="" />
										</a>
										<a class="post-cat" href="../../p-detail/<? echo $post_id; ?>/<? echo $post_url ?>"><? echo $category_name; ?></a>
									</div>
								</div><!-- Img thumb col end -->

								<div class="col-lg-7 col-md-6">
									<div class="post-content">
							 			<h2 class="post-title title-large">
							 				<a href="../../p-detail/<? echo $post_id; ?>/<? echo $post_url ?>"><? echo $post_title; ?></a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="../../author/<? echo $post_user_id; ?>/<? echo $post_author; ?>"><? echo $post_author; ?></a></span>
											<? if($u_reg == 'Yes'){ ?>
							 				<span class="post-date"><? echo $post_date; ?></span>
											<? }else{ ?>
											<? } ?>
							 				<span class="post-comment pull-right"><i class="fa fa-comments-o"></i>
											<a href="../../p-detail/<? echo $post_id; ?>/<? echo $post_url ?>" class="comments-link"><span><? echo $post_comment; ?></span></a></span>
							 			</div>
							 			<p><? echo $post_detail; ?> ...</p>
						 			</div><!-- Post content end -->
								</div><!-- Post col end -->
							</div><!-- 1st row end -->
						</div><!-- 1st Post list end -->
						<? } ?>
					</div><!-- Block Technology end -->
					<?php
						if ($post_count > $post_per_page) { ?>
							<div class="paging">
								<ul class="pagination">
									<?php 
										if(isset($_GET['page'])) {
											$prev = $_GET['page'] - 1;
										} else {
											$prev = 0;
										}

										if($prev+1 <= 1) {
											echo '<li class="page-item disabled"><a class="page-link" href="#!" aria-label="Previous"><span aria-hidden="true">&#xAB;</span></a></li>';
										} else {
											echo '<li class="page-item"><a class="page-link" href="latest.php?page='. $prev .'" aria-label="Previous"><span aria-hidden="true">&#xAB;</span></a></li>';
										}
									?>

									<?php 
										if (isset($_GET['page'])) {
											$active = $_GET['page'];
										} else {
											$active = 1;
										}
										for ($i = 1; $i <= $total_pager; $i++) {
											if ($i == $active) {
												echo '<li class="page-item active"><a class="page-link" href="latest.php?page='. $i .'">' . $i . '</a></li>';
											} else {
												echo '<li class="page-item"><a class="page-link" href="latest.php?page='. $i .'">' . $i . '</a></li>';
											}
											
										}
									?>

									<?php 
										if(isset($_GET['page'])) {
											$next = $_GET['page'] + 1;
										} else {
											$next = 2;
										}

										if($next - 1 >= $total_pager) {
											echo '<li class="page-item disabled"><a class="page-link" href="#!" aria-label="Next"><span aria-hidden="true">&#xBB;</span></a></li>';
										} else {
											echo '<li class="page-item"><a class="page-link" href="latest.php?&page=' . $next . '" aria-label="Next"><span aria-hidden="true">&#xBB;</span></a></li>';
										}
									?>
									
								</ul>
							</nav>
							<span class="page-numbers">Page <?php echo $page; ?> of <? echo $total_pager; ?></span>
						</div>
						<?php }
					?>

				</div><!-- Content Col end -->

				<? include ('vendors/cat-sidebar.php'); ?>
<? include ("vendors/cat-footer.php"); ?>