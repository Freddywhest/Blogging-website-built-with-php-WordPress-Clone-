<? $page_name = 'Home'; ?>
<? $active_home = 'active'; ?>
<? include  ("vendors/header.php"); ?>
<body <? echo $theme_name == "b-style"?"class='boxed-layout'":"class='layouter'"; ?><? echo $theme_name == "b-dark"?"class='boxed-layout'":""; ?>>
	<? include  ("vendors/nav.php"); ?>
	<section class="featured-post-area no-padding">
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
			$status = 'Published';
				$sql = "SELECT * FROM hot_news WHERE hot_post_status = :status ORDER BY hot_post_id DESC LIMIT 0,2 ";
				$stmt = $pdo->prepare($sql);
				$stmt->execute([
				':status' => $status
				]);
				while($hot_post = $stmt->fetch(PDO::FETCH_ASSOC)){
					$hot_post_id = $hot_post['hot_post_id'];
					$hot_post_title = $hot_post['hot_post_title'];
					$post_detail = substr($hot_post['hot_post_detail'], 0, 150);
					$hot_post_url = $hot_post['hot_post_url'];
					$hot_post_category_id = $hot_post['hot_post_category_id'];
					// getting category name
					$sql1 = "SELECT * FROM categories WHERE category_id = :id";
					$stmt1 = $pdo->prepare($sql1);
					$stmt1->execute([
					':id' => $post_category_id
					]);
					$cat = $stmt1->fetch(PDO::FETCH_ASSOC);
					$category_name = $cat['category_name'];
					//end of getting category
					$hot_post_date = $hot_post['hot_post_date'];
					$hot_post_status = $hot_post['hot_post_status'];
					$hot_post_author = $hot_post['hot_post_author'];
					$hot_post_comment_count = $hot_post['hot_post_comment_count'];
					$hot_post_tags = $hot_post['hot_post_tags'];
					$hot_post_image = $hot_post['hot_post_image'];
					$hot_post_views = $hot_post['hot_post_views'];?>
				<div class="col-lg-6 col-md-6 col-sm-12 pad-r">
					<div id="featured-slider" class="owl-carousel owl-theme featured-slider">
						<div class="item" style="background-image:url(./uploads/<? echo $hot_post_image; ?>)"><hr>
							<div class="featured-post">
						 		<div class="post-content">
						 			<a class="post-cat" href="h-detail/<? echo $hot_post_id; ?>/&&url=<? echo $hot_post_url; ?>"><? echo $category_name; ?></a>
						 			<h2 class="post-title title-extra-large">
						 				<a href="h-detail/<? echo $hot_post_id; ?>/<? echo $hot_post_url; ?>"><? echo $hot_post_title; ?></a>
						 			</h2>
									<? if($u_reg == 'Yes'){ ?>
						 			<span class="post-date"><? echo $hot_post_date; ?></span>
									<? }else{ ?>
									<? } ?>
						 		</div>
						 	</div><!--/ Featured post end -->
						</div><!-- Item 2 end -->

					</div><!-- Row end -->
				</div>
			<? } ?>
	</section><!-- Trending post end -->

	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
				<div class="more-news block color-default">
						<h3 class="block-title"><span>Latest <? echo $p_name != "Others"?"{$p_name}":"Posts"; ?></span></h3>

						<div id="more-news-slide" class="owl-carousel owl-theme more-news-slide">
							<div class="item">
							<?
							$status = 'Published';
							$sql = "SELECT * FROM posts WHERE post_status = :status ORDER BY post_id DESC LIMIT 0,4 ";
							$stmt = $pdo->prepare($sql);
							$stmt->execute([
							':status' => $status
							]);
							while($post = $stmt->fetch(PDO::FETCH_ASSOC)){
								$post_id = $post['post_id'];
							$post_user_id = $post['post_user_id'];
								$post_title = $post['post_title'];
								$post_detail = substr($post['post_detail'], 0, 150);
								$post_url = $post['post_url'];
								$post_category_id = $post['post_category_id'];
								// getting category name
								$sql1 = "SELECT * FROM categories WHERE category_id = :id";
								$stmt1 = $pdo->prepare($sql1);
								$stmt1->execute([
								':id' => $post_category_id
								]);
								$cat = $stmt1->fetch(PDO::FETCH_ASSOC);
								$category_name = $cat['category_name'];
								//end of getting category
								$post_date = $post['post_date'];
								$post_status = $post['post_status'];
								$post_author = $post['post_author'];
								$post_comment_count = $post['post_comment_count'];
								$post_tags = $post['post_tags'];
								$post_image = $post['post_image'];
								$post_views = $post['post_views'];
								
								?>
								<div class="post-block-style post-float-half clearfix">
									<div class="post-thumb">
										<a href="p-detail/<? echo $post_id; ?>/<? echo $post_url; ?>">
											<img class="img-fluid" src="./uploads/<? echo $post_image; ?>" alt="" />
										</a>
									</div>
									<a class="post-cat" href="p-details.php?post_id=<? echo $post_id; ?>&&url=<? echo $post_url; ?>"><? echo $category_name; ?></a>
									<div class="post-content">
							 			<h2 class="post-title">
							 				<a href="p-detail/<? echo $post_id; ?>/<? echo $post_url; ?>"><? echo $post_title; ?></a>
							 			</h2>
							 			<div class="post-meta">
							 				<span class="post-author"><a href="author/<? echo $post_user_id; ?>/<? echo $post_author; ?>"><? echo $post_author; ?></a></span>
											<? if($u_reg == 'Yes'){ ?>
							 				<span class="post-date"><? echo $post_date; ?></span>
											<? }else{ ?>
											<? } ?>
							 			</div>
							 			<p><? echo $post_detail; ?> ...</p>
						 			</div><!-- Post content end -->
								</div><!-- Post Block style 1 end -->
								<div class="gap-30"></div>
								<? } ?>
								<center><a href="latest.php"><u><h4 style="color:blue">View all</h4></u></a></center>
							</div><!-- Item 1 end -->
						</div><!-- More carousel end -->
					</div>

					<div class="gap-50"></div>
					<div class="featured-tab color-orange">
						<h3 class="block-title"><span>Most viewed <? echo $p_name != "Others"?"{$p_name}":"Posts"; ?></span></h3>
						<div class="tab-content">
					      <div class="tab-pane active animated fadeInRight" id="tab_a">
					      	<div class="row">
							<?
							$status = 'Published';
							$sql = "SELECT * FROM posts WHERE post_status = :status ORDER BY  post_views DESC LIMIT 0,4 ";
							$stmt = $pdo->prepare($sql);
							$stmt->execute([
							':status' => $status
							]);
							while($post = $stmt->fetch(PDO::FETCH_ASSOC)){
								$post_id = $post['post_id'];
							$post_user_id = $post['post_user_id'];
								$post_title = $post['post_title'];
								$post_detail = substr($post['post_detail'], 0, 150);
								$post_url = $post['post_url'];
								$post_category_id = $post['post_category_id'];
								// getting category name
								$sql1 = "SELECT * FROM categories WHERE category_id = :id";
								$stmt1 = $pdo->prepare($sql1);
								$stmt1->execute([
								':id' => $post_category_id
								]);
								$cat = $stmt1->fetch(PDO::FETCH_ASSOC);
								$category_name = $cat['category_name'];
								//end of getting category
								$post_date = $post['post_date'];
								$post_status = $post['post_status'];
								$post_author = $post['post_author'];
								$post_comment_count = $post['post_comment_count'];
								$post_tags = $post['post_tags'];
								$post_image = $post['post_image'];
								$post_views = $post['post_views'];
								
								?>
						      	<div class="col-lg-6 col-md-6">
						      		<div class="post-block-style clearfix">
											<div class="post-thumb">
												<a href="p-detail/<? echo $post_id; ?>/<? echo $post_url; ?>">
													<img class="img-fluid" src="./uploads/<? echo $post_image; ?>" alt="" />
												</a>
											</div>
											<a class="post-cat" href="p-detail/<? echo $post_id; ?>/<? echo $post_url; ?>"><? echo $category_name; ?></a>
											<div class="post-content">
									 			<h2 class="post-title">
									 				<a href="p-detail/<? echo $post_id; ?>/<? echo $post_url; ?>"><? echo $post_title; ?></a>
									 			</h2>
									 			<div class="post-meta">
									 				<span class="post-author"><a href="author/<? echo $post_user_id; ?>/<? echo $post_author; ?>"><? echo $post_author; ?></a></span>
													<? if($u_reg == 'Yes'){ ?>
									 				<span class="post-date"><? echo $post_date; ?></span>
													<? }else{ ?>
													<? } ?>
									 			</div>
									 			<p><? echo $post_detail; ?></p>
								 			</div><!-- Post content end -->
									</div><!-- Post Block style end -->
						      	</div><!-- Col end -->
								<? } ?>
					      	</div><!-- Tab pane Row 1 end -->
					      </div><!-- Tab pane 1 end -->
						</div><!-- tab content -->
					</div><!-- Technology Tab end -->

					<div class="gap-40"></div>
				</div><!-- Content Col end -->

	<? include("vendors/sidebar.php"); ?>
<? include ("vendors/footer.php"); ?>