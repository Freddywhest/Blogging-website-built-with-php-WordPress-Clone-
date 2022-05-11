

	<section class="ad-content-area text-center">
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
	</section><!-- Ad content two end -->

	<footer id="footer" class="footer">
		<div class="footer-main">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-sm-12 footer-widget">
						<h3 class="widget-title">New <? echo $p_name != "Others"?"{$p_name}":"Posts"; ?></h3>
						<div class="list-post-block">
							<ul class="list-post">
							<?
							$status = 'Published';
							$sql = "SELECT * FROM posts WHERE post_status = :status ORDER BY post_id DESC LIMIT 0,2 ";
							$stmt = $pdo->prepare($sql);
							$stmt->execute([
							':status' => $status
							]);
							while($post = $stmt->fetch(PDO::FETCH_ASSOC)){
								$post_id = $post['post_id'];
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
							 			</div><!-- Post content end -->
									</div><!-- Post block style end -->
								</li><!-- Li 1 end -->
							<? } ?>
							</ul><!-- List post end -->
						</div><!-- List post block end -->
						
					</div><!-- Col end -->

					<div class="col-lg-3 col-sm-12 footer-widget widget-categories">
						<h3 class="widget-title">Categories</h3>
						<ul>
						<? 
						$sql = "SELECT * FROM categories";
						$stmt = $pdo->prepare($sql);
						$stmt->execute();
						while($cat = $stmt->fetch(PDO::FETCH_ASSOC)){
							$cat_name = $cat['category_name'];
							$cat_id = $cat['category_id'];
							$total_posts = $cat['category_total_posts'];?>
							<li>
								<a href="category/<? echo $cat_id; ?>/<? echo $cat_url ?>"><span class="catTitle"><? echo $cat_name; ?></span><span class="catCounter"> (<? echo $total_posts; ?>)</span></a>
							</li>
						<? } ?>
						</ul>
						
					</div><!-- Col end -->

					<div class="col-lg-3 col-sm-12 footer-widget">
						<h3 class="widget-title">Other links</h3>
						<ul>
							<li>
								<a href="about" >About us</a>
							<li>
								<a href="contact" >Contact us</a>
							</li>
							<li>
								<a href="terms" >Terms and Conditions</a>
							</li>
							<li>
								<a href="policy" >Privacy Policy</a>
							</li>
							<li>
								<a href="advert" >Advertisement</a>
							</li>
						</ul>
					</div><!-- Col end -->
					
					<div class="col-lg-3 col-sm-12 footer-widget">
						<h3 class="widget-title">Links</h3>
						<ul>
							<li>
								<a href="latest-uploads" >Latest Updates</a>
							<li>
								<a href="categories" >Categories</a>
							</li>
							<li>
								<a href="home" >Home</a>
							</li>
						</ul>
					</div><!-- Col end -->
				</div><!-- Row end -->
			</div><!-- Container end -->
		</div><!-- Footer main end -->

		<div class="footer-info text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="footer-info-content">
							<div class="logo">
								<img class="img-fluid"  src="uploads/<? echo $s_image; ?>" alt="<? echo $s_name; ?>"/>
							</div>
							<?
								$sql = "SELECT * FROM contact";
								$stmt = $pdo->prepare($sql);
								$stmt->execute();
								$con = $stmt->fetch(PDO::FETCH_ASSOC);
								$con_email = $con['contact_email'];
								$con_phone = $con['contact_phone'];
								?>
							<p><? echo $s_desc; ?>.</p>
							<p class="footer-info-phone"><i class="fa fa-phone"></i> <a  href="tel:<? echo $con_phone; ?>" style="color:blue"><u><? echo $con_phone; ?></u></a></p>
							<p class="footer-info-email"><i class="fa fa-envelope-o"></i> <a  href="tel:<? echo $con_email ?>" style="color:blue"><u><? echo $con_email; ?></u></a></p>
							<?
							$sql = "SELECT * FROM social_media";
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
							$social = $stmt->fetch(PDO::FETCH_ASSOC);
							$facebook = $social['facebook'];
							$fb_url = $social['facebook_url'];
							$twitter = $social['twitter'];
							$tw_url = $social['twitter_url'];
							$instagram = $social['instagram'];
							$ig_url = $social['instagram_url'];
							$youtube = $social['youtube'];
							$yt_url = $social['youtube_url'];
							?>
							<ul class="unstyled footer-social">
								<li>
									<a title="Facebook" href="<? echo $fb_url; ?><? echo $facebook; ?>">
										<span class="social-icon"><i class="fa fa-facebook"></i></span>
									</a>
									<a title="Twitter" href="<? echo $tw_url; ?><? echo $twitter; ?>">
										<span class="social-icon"><i class="fa fa-twitter"></i></span>
									</a>
									<a title="YouTube" href="<? echo $yt_url; ?><? echo $youtube; ?>">
										<span class="social-icon"><i class="fa fa-youtube"></i></span>
									</a>
									<a title="Instagram" href="<? echo $ig_url; ?><? echo $instagram; ?>">
										<span class="social-icon"><i class="fa fa-instagram"></i></span>
									</a>
								</li>
							</ul>
						</div><!-- Footer info content end -->
					</div><!-- Col end -->
				</div><!-- Row end -->
			</div><!-- Container end -->
		</div><!-- Footer info end -->

	</footer><!-- Footer end -->

	<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<div class="copyright-info">
							<span>Copyright © <?php echo date("Y");?> <? echo $s_name; ?> All Rights Reserved. Designed By <a style="color:orange" href="https://alfrednti.com"><b>Alfred 😘</b></a></span>
						</div>
					</div>

					<div class="col-sm-12 col-md-6">
						<div class="footer-menu">
							<ul class="nav unstyled">
								<li><a href="terms">Site Terms</a></li>
								<li><a href="privacy">Privacy</a></li>
								<li><a href="advert">Advertisement</a></li>
								<li><a href="contact">Contact Us</a></li>
							</ul>
						</div>
					</div>
				</div><!-- Row end -->

				<div id="back-to-top" class="back-to-top">
					<button class="btn btn-primary" title="Back to Top">
						<i class="fa fa-angle-up"></i>
					</button>
				</div>

			</div><!-- Container end -->
   </div><!-- Copyright end -->


	<!-- Javascript Files
	================================================== -->
        <?php
	$sql = "SELECT * FROM script_code WHERE code_id =:id";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
	':id' => 2
	]);
	$codem = $stmt->fetch(PDO::FETCH_ASSOC);
	$code_f = $codem['s_code'];
	 echo $code_f; 
	 ?>

	<!-- initialize jQuery Library -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<!-- Popper Jquery -->
	<script type="text/javascript" src="js/popper.min.js"></script>
	<!-- Bootstrap jQuery -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Owl Carousel -->
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<!-- Color box -->
	<script type="text/javascript" src="js/jquery.colorbox.js"></script>
	<!-- Smoothscroll -->
	<script type="text/javascript" src="js/smoothscroll.js"></script>


	<!-- Template custom -->
	<script type="text/javascript" src="js/custom.js"></script>
	
	</div><!-- Body inner end -->
</body>
</html>
</html>
</html>