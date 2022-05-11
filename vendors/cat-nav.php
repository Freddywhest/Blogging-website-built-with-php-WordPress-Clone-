<div class="body-inner">
<div class="trending-bar d-md-block d-lg-block d-none">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="trending-title">Latest News</h3>
					<div id="trending-slide" class="owl-carousel owl-theme trending-slide">
					<? 
						$status = 'Published';
						$sql = "SELECT * FROM posts WHERE post_status = :status ORDER BY post_id DESC";
						$stmt = $pdo->prepare($sql);
						$stmt->execute([
						':status' => $status
						]);
						while($post = $stmt->fetch(PDO::FETCH_ASSOC)){
							$post_id = $post['post_id'];
							$post_title = $post['post_title'];
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
							$post_status = $post['post_status'];?>
						<div class="item">
						   <div class="post-content">
						      <h2 class="post-title title-small">
						         <a href="../../p-detail/<? echo $post_id; ?>/<? echo $post_url; ?>"><? echo $post_title; ?></a>
						      </h2>
						   </div><!-- Post content end -->
						</div><!-- Item 1 end -->
						<? } ?>
					</div><!-- Carousel end -->
				</div><!-- Col end -->
			</div><!--/ Row end -->
		</div><!--/ Container end -->
	</div><!--/ Trending end -->

	<div id="top-bar" class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="ts-date">
						<i class="fa fa-calendar-check-o"></i><? echo  date("F j, Y, g:i a"); ?>
					</div>
					<ul class="unstyled top-nav">
						<li><a href="../../about">About</a></li>
						<li><a href="../../contact">Write a problem</a></li>
						<li><a href="../../advert">Advertise with us</a></li>
						<li><a href="../../contact">Contact</a></li>
						<li><a href="../../login">Login</a></li>
					</ul>
				</div><!--/ Top bar left end -->

				<div class="col-md-4 top-social text-lg-right text-md-center">
					<ul class="unstyled">
						<li>
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
					</ul><!-- Ul end -->
				</div><!--/ Top social col end -->
			</div><!--/ Content row end -->
		</div><!--/ Container end -->
	</div><!--/ Topbar end -->

	<!-- Header start -->
	<header id="header" class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-12">
					<?
					$sql = "SELECT * FROM site_detail ORDER BY site_id DESC LIMIT 0, 1";
					$stmt = $pdo->prepare($sql);
					$stmt->execute();
					$site = $stmt->fetch(PDO::FETCH_ASSOC);
					$s_name = $site['site_name'];
					$s_desc = $site['site_desc'];
					$s_image = $site['site_image'];
					?>
					<div class="logo">
						 <a href="../../home">
							<img src="../../uploads/<? echo $s_image; ?>" alt="<? echo $s_name; ?> ?>">
						 </a>
					</div>
				</div><!-- logo col end -->
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
					':id' => 1
					]);
					$ads = $stmt->fetch(PDO::FETCH_ASSOC);
					$ads_header = $ads['ads_detail'];
					?>
					<? if($ads_show == 'Yes'){ ?>
				<div class="col-md-9 col-sm-12 header-right">
					<div class="ad-banner float-right imgg">
						<? echo $ads_header; ?>
					</div>
				</div><!-- header right end -->
					<? }else{ ?>
					<? } ?>
			</div><!-- Row end -->
		</div><!-- Logo and banner area end -->
	</header><!--/ Header end -->

	<div class="main-nav clearfix">
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-expand-lg col">
					<div class="site-nav-inner float-left">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                  <i class="fa fa-bars" aria-hidden="true"></i>
               </button>
               <!-- End of Navbar toggler -->

						<div id="navbarSupportedContent" class="collapse navbar-collapse navbar-responsive-collapse">
							<ul class="nav navbar-nav">
								<li class="<? echo $active_home; ?>">
									<a href="../../home">home</a>
								</li>
								<li class="<? echo $active_latest; ?>">
									<a href="../../latest-uploads">latest <? echo $p_name != "Others"?"{$p_name}":"Posts"; ?></a>
								</li>
								<?
								$sql = "SELECT * FROM categories";
								$stmt = $pdo->prepare($sql);
								$stmt->execute();
								while($cat = $stmt->fetch(PDO::FETCH_ASSOC)){
									$cat_name = $cat['category_name'];
									$cat_url = $cat['category_url'];
									$cat_id = $cat['category_id'];?>
								<li class="">
									<a href="../../category/<? echo $cat_id; ?>/<? echo $cat_url ?>"><? echo $cat_name ?></a>
								</li>
								<? } ?>
							</ul><!--/ Nav ul end -->
						</div><!--/ Collapse end -->

					</div><!-- Site Navbar inner end -->
				</nav><!--/ Navigation end -->

				<div class="nav-search">
					<span id="search"><i class="fa fa-search"></i></span>
				</div><!-- Search end -->
				
				<div class="search-block" style="display: none;">
					<form action="../../search" method="POST">
					<input name="search_name" type="text" class="form-control" placeholder="Type what you want and enter">
					<p  align="right"><button name="search" type="submit" class="btn"><i class="fa fa-search"></i></button></p>
					</form>
					<span class="search-close">&times;</span>
				</div><!-- Site search end -->

			</div><!--/ Row end -->
		</div><!--/ Container end -->

	</div><!-- Menu wrapper end -->

	<div class="gap-40"></div>