
						<div class="widget">
							<h3 class="block-title"><span>Follow Us</span></h3>
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
							<ul class="social-icon">
								<li><a href="<? echo $ig_url; ?><? echo $instagram; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="<? echo $fb_url; ?><? echo $facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<? echo $tw_url; ?><? echo $twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<? echo $yt_url; ?><? echo $youtube; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div><!-- Widget Social end -->