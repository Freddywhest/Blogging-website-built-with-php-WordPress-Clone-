
				<div class="col-lg-4 col-md-12">
					<div class="sidebar sidebar-right">
					<? include "vendors/social.php"; ?>
						<div class="widget color-default">
							<h3 class="block-title"><span>Popular News</span></h3>

							<div class="list-post-block">
								<ul class="list-post">
								<?
								$sql = "SELECT * FROM user_permissions";
								$stmt = $pdo->prepare($sql);
								$stmt->execute();
								$perm = $stmt->fetch(PDO::FETCH_ASSOC);
								$u_reg = $perm['user_register'];
								?>
								<?
									$status = 'Published';
									$sql = "SELECT * FROM posts WHERE post_status = :status ORDER BY post_date DESC, post_views DESC LIMIT 0,4 ";
									$stmt = $pdo->prepare($sql);
									$stmt->execute([
									':status' => $status
									]);
									while($post = $stmt->fetch(PDO::FETCH_ASSOC)){
										$post_id = $post['post_id'];
										$post_title = $post['post_title'];
										$post_detail = substr($post['post_detail'], 0, 30);
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
										$post_views = $post['post_views'];?>
									<li class="clearfix">
										<div class="post-block-style post-float clearfix">
											<div class="post-thumb">
												<a href="p-detail/<? echo $post_id; ?>/<? echo $post_url; ?>">
													<img class="img-fluid" src="uploads/<? echo $post_image; ?>" alt="" />
												</a>
												<a class="post-cat" href="p-detail/<? echo $post_id; ?>/<? echo $post_url; ?>"><? echo $category_name; ?></a>
											</div><!-- Post thumb end -->

											<div class="post-content">
									 			<h2 class="post-title title-small">
									 				<a href="p-detail/<? echo $post_id; ?>/<? echo $post_url; ?>"><? echo $post_title; ?></a>
									 			</h2>
												<? if($u_reg == 'Yes'){ ?>
									 			<div class="post-meta">
									 				<span class="post-date"><? echo $post_date; ?></span>
									 			</div>
												<? }else{ ?>
												<div class="post-meta">
									 				<span class="post-date"><? echo $post_detail; ?></span>
									 			</div>
												<? } ?>
								 			</div><!-- Post content end -->
										</div><!-- Post block style end -->
									</li><!-- Li 1 end -->
									<? } ?>
								</ul><!-- List post end -->
							</div><!-- List post block end -->

						</div><!-- Popular news widget end -->
							<?
								$sql = "SELECT * FROM user_permissions";
								$stmt = $pdo->prepare($sql);
								$stmt->execute();
								$perm = $stmt->fetch(PDO::FETCH_ASSOC);
								$ads_show = $perm['ads_show'];
								?>
							<?
								$sql = "SELECT * FROM ads WHERE ads_id =:id";
								$stmt = $pdo->prepare($sql);
								$stmt->execute([
								':id' => 2
								]);
								$ads = $stmt->fetch(PDO::FETCH_ASSOC);
								$ads_sidebar = $ads['ads_detail'];
							?>
							<?if($ads_show == 'Yes'){?>
						<div class="widget text-center imgg">
							<? echo $ads_sidebar; ?>
						</div><!-- Sidebar Ad end -->
							<? }else{ ?>
							<? } ?>
						<div class="widget color-default m-bottom-0">
							<h3 class="block-title"><span>Popular hot <? echo $p_name != "Others"?"{$p_name}":"Posts"; ?></span></h3>

							<div id="post-slide" class="owl-carousel owl-theme post-slide">
								<div class="item">
								<?
									$status = 'Published';
									$sql = "SELECT * FROM hot_news WHERE hot_post_status = :status ORDER BY hot_post_views DESC LIMIT 0,2 ";
									$stmt = $pdo->prepare($sql);
									$stmt->execute([
									':status' => $status
									]);
									while($hot_post = $stmt->fetch(PDO::FETCH_ASSOC)){
										$hot_post_id = $hot_post['hot_post_id'];
										$hot_post_title = $hot_post['hot_post_title'];
										$post_detail = substr($hot_post['hot_post_detail'], 0, 30);
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
									<div class="post-overaly-style text-center clearfix">
									   <div class="post-thumb">
									      <a href="h-detail/<? echo $hot_post_id; ?>/<? echo $hot_post_url; ?>">
									         <img class="img-fluid" src="./uploads/<? echo $hot_post_image; ?>" alt="<? echo $hot_post_title; ?>" />
									      </a>
									   </div><!-- Post thumb end -->

									   <div class="post-content">
									      <a class="post-cat" href="h-detail/<? echo $hot_post_id; ?>/<? echo $hot_post_url; ?>"><? echo $category_name; ?></a>
									      <h2 class="post-title">
									         <a href="h-detail/<? echo $hot_post_id; ?>/<? echo $hot_post_url; ?>"><? echo $post_title; ?></a>
									      </h2>
										  <? if($u_reg == 'Yes'){ ?>
									      <div class="post-meta">
									         <span class="post-date"><? echo $post_date; ?></span>
									      </div>
										  <? }else{ ?>
										  <div class="post-meta">
									 				<span class="post-date"><? echo $post_detail; ?></span>
									 			</div>
										  <? } ?>
									   </div><!-- Post content end -->
									</div><!-- Post Overaly Article 1 end -->
									<? } ?>
								</div><!-- Item 2 end -->

							</div><!-- Post slide carousel end -->

						</div><!-- Trending news end -->

					</div><!-- Sidebar right end -->
				</div><!-- Sidebar Col end -->

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->

	<section class="ad-content-area text-center no-padding">
		<div class="container">
			<div class="row">
			<?
					$sql = "SELECT * FROM user_permissions";
					$stmt = $pdo->prepare($sql);
					$stmt->execute();
					$perm = $stmt->fetch(PDO::FETCH_ASSOC);
					$ads_show = $perm['ads_show'];
					?>
				<?
					$sql = "SELECT * FROM ads WHERE ads_id =:id";
					$stmt = $pdo->prepare($sql);
					$stmt->execute([
					':id' => 4
					]);
					$ads = $stmt->fetch(PDO::FETCH_ASSOC);
					$ads_footer = $ads['ads_detail'];
				?>
				<?if($ads_show == 'Yes'){?>
				
				<div class="col-md-9 col-sm-12">
					<div class="ad-banner float-right imgg">
					<? echo $ads_footer; ?>
				</div>
				</div>
				<? }else{ ?><!-- Col end -->
				<? } ?>
			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- Ad content top end -->

	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<? 
				$status = 'Published';
				$sql = "SELECT * FROM posts WHERE post_status = :status ORDER BY post_id DESC LIMIT 0,3";
				$stmt = $pdo->prepare($sql);
				$stmt->execute([
				':status' => $status
				]);
				while($post = $stmt->fetch(PDO::FETCH_ASSOC)){
					$post_id = $post['post_id'];
					$post_title = $post['post_title'];
					$post_detail = substr($post['post_detail'], 0, 30);
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
					$post_views = $post['post_views'];?>
				<div class="col-lg-4">
					<div class="block color-dark-blue">
						<div class="gap-50"></div>
						<h3 class="block-title"><span><? echo $category_name; ?></span></h3>
						<div class="list-post-block">
							<ul class="list-post">
							<li class="clearfix">
									<div class="post-block-style post-float clearfix">
										<div class="post-thumb">
											<a href="p-detail/<? echo $post_id; ?>/<? echo $post_url; ?>">
												<img class="img-fluid" src="./uploads/<? echo $post_image; ?>" alt="" />
											</a>
										</div><!-- Post thumb end -->

										<div class="post-content">
								 			<h2 class="post-title title-small">
								 				<a href="p-detail/<? echo $post_id; ?>/<? echo $post_url; ?>"><? echo $post_title; ?></a>
								 			</h2>
											<? if($u_reg == 'Yes'){ ?>
								 			<div class="post-meta">
								 				<span class="post-date"><? echo $post_date; ?></span>
								 			</div>
											<? }else{ ?>
											<div class="post-meta">
									 				<span class="post-date"><? echo $post_detail; ?></span>
									 			</div>
											<? } ?> 
							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 1 end -->
							</ul><!-- List post end -->
						</div><!-- List post block end -->
					</div><!-- Block end -->
				</div>
				<? } ?>
				
				<!-- Travel Col end -->
				
			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- 2nd block end -->