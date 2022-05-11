<? include  ("vendors/p-header.php"); ?>
<body <? echo $theme_name == "b-style"?"class='boxed-layout'":"class='layouter'"; ?><? echo $theme_name == "b-dark"?"class='boxed-layout'":""; ?>>

	<? include  ("vendors/cat-nav.php"); ?>
	<?
	if(isset($_GET['post_id'])){
		$sql = "UPDATE posts SET post_views = post_views +1 WHERE post_id =:id";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([
		':id' => $_GET['post_id']
		]);
	}
	?>
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
			$sql = "SELECT * FROM posts WHERE post_id =:id";
			$stmt = $pdo->prepare($sql);
			$stmt->execute([
			':id' => $_GET['post_id']
			]);
			$post = $stmt->fetch(PDO::FETCH_ASSOC);
			$post_title = $post['post_title'];
			$post_user_id = $post['post_user_id'];
			$post_user_id = $post['post_user_id'];
			$post_detail = $post['post_detail'];
			$post_image = $post['post_image'];
			$post_date = $post['post_date'];
			$post_status = $post['post_status'];
			$post_author = $post['post_author'];
			$post_views = $post['post_views'];
			$post_tags = $post['post_tags'];
			$post_comment_count = $post['post_comment_count'];
			$post_category_id = $post['post_category_id'];
			//Getting category name
			$sql2 = "SELECT * FROM categories WHERE category_id =:id";
			$stmt2 = $pdo->prepare($sql2);
			$stmt2->execute([
			':id' => $post_category_id
			]);
			$cat = $stmt2->fetch(PDO::FETCH_ASSOC);
			$cat_name = $cat['category_name'];
			$cat_url = $cat['category_url'];
			?>
				<div class="col-md-12">
					<ol class="breadcrumb">
     					<li><a href="../../home">Home</a></li>
     					<li><? echo $post_title; ?></a></li>
     				</ol>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->

	<section class="block-wrapper no-sidebar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<div class="single-post">
						
						<div class="post-title-area">
							<a class="post-cat" href="../../category/<? echo $post_category_id; ?><? echo $cat_url; ?>"><? echo $cat_name; ?></a>
							<h2 class="post-title">
				 				<? echo $post_title; ?>
				 			</h2>
				 			<div class="post-meta">
								<span class="post-author">
									By <a href="../../author/<? echo $post_user_id; ?>/<? echo $post_author; ?>"><? echo $post_author; ?></a>
								</span>
								<? if($u_reg == 'Yes'){ ?>
								<span class="post-date"><i class="fa fa-clock-o"></i> <? echo $post_date; ?></span>
								<? }else{ ?>
								<? } ?>
								<span class="post-hits"><i class="fa fa-eye"></i> <? echo $post_views; ?></span>
								<span class="post-comment"><i class="fa fa-comments-o"></i>
								<a href="#comments" class="comments-link"><span><? echo $post_comment_count; ?></span></a></span>
							</div>
						</div><!-- Post title end -->

						<div class="post-content-area">
							<div class="post-media post-featured-image">
								<img src="../../uploads/<? echo $post_image; ?>" class="img-fluid" alt="<? echo $post_title; ?>">
							</div>
							<div class="entry-content">
								<p><? echo $post_detail; ?></p>

							</div><!-- Entery content end -->

							<div class="tags-area clearfix">
								<div class="post-tags">
									<span>Tags:</span>
		   						<a href="#!"># <? echo $post_tags; ?></a>
	   						</div>
							</div><!-- Tags end -->

							<div class="share-items clearfix">
   							<ul class="post-social-icons unstyled">
   								<li class="facebook form-group">
									<a href="<? echo $url; ?>" 
									  onclick="
										window.open(
										  'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
										  'facebook-share-dialog', 
										  'width=626,height=436'); 
										return false;">
   									<i class="fa fa-facebook"></i> <span class="ts-social-title"> Share on Facebook</span>
									 
									</a>
   								</li>
   								<li class="twitter form-group">
   									<a href="https://twitter.com/intent/tweet?text=<? echo $url; ?>">
   									<i class="fa fa-twitter"></i> <span class="ts-social-title">Share on Twitter</span></a>
   								</li>
   								<li class="gplus form-group">
   									<a href="http://plus.google.com/share?url=<? echo $url; ?>">
   									<i class="fa fa-google-plus"></i> <span class="ts-social-title">Share on Google +</span></a>
   								</li>
   								<li>
   									<a href="whatsapp://send?text=<? echo $url; ?>" data-action="share/whatsapp/share">
   									<i class="fa fa-whatsapp"></i> <span class="ts-social-title">Share on WhatsApp</span></a>
   								</li>&nbsp;
   							</ul>
   						</div><!-- Share items end -->

						</div><!-- post-content end -->
					</div><!-- Single post end -->
					

					<!-- Post comment start -->
					<div id="comments" class="comments-area block">
						<h3 class="block-title"><span><? echo $post_comment_count; ?> Comment(s)</span></h3>

						<ul class="comments-list">
							<li>
							<?
							$sql = "SELECT * FROM users WHERE user_id =:id";
							$stmt = $pdo->prepare($sql);
							$stmt->execute([
							':id' => $post_user_id
							]);
							$user = $stmt->fetch(PDO::FETCH_ASSOC);
							$full_name = $user['full_name'];
							$user_email = $user['user_email'];
							$user_photo = $user['user_photo'];
							?>
							<?
							$sql = "SELECT * FROM comments WHERE com_status =:status AND com_post_id =:id";
							$stmt = $pdo->prepare($sql);
							$stmt->execute([
							':status' => 'approved',
							':id' => $_GET['post_id']
							]);
							while($com = $stmt->fetch(PDO::FETCH_ASSOC)){
								$com_name = $com['com_user_name'];
								$com_detail = $com['com_detail'];
								$com_date = $com['com_date'];
								$reply = $com['reply'];
								$reply_date = $com['reply_date'];
							?>
								<div class="comment">
									<img class="comment-avatar pull-left" alt="" src="../../images/avatar-1.png">
									<div class="comment-body">
										<div class="meta-data">
											<span class="comment-author"><? echo $com_name; ?></span>
											<span class="comment-date pull-right"><? echo $com_date; ?></span>
										</div>
										<div class="comment-content">
											<p><? echo $com_detail; ?></p>
										</div>	
									</div>
								</div><!-- Comments end -->
								<? if($reply != 'Not yet replied'){ ?>
								<ul class="comments-reply">
									<li>
										<div class="comment">
											<img class="comment-avatar pull-left" alt="<? echo $full_name; ?>" src="../../uploads/<? echo $user_photo; ?>">
											<div class="comment-body">
												<div class="meta-data">
													<span class="comment-author">Reply from admin</span>
													<span class="comment-date pull-right"><? echo $reply_date; ?></span>
												</div>
												<div class="comment-content">
												<p><? echo $reply; ?></p></div>
												<div class="text-left">
												</div>	
											</div>
										</div><!-- Comments end -->
									</li>
								</ul><!-- comments-reply end -->
								<? }else{ ?>
								<? } ?>
								<? } ?>
								
							</li><!-- Comments-list li end -->
						</ul><!-- Comments-list ul end -->
					</div><!-- Post comment end -->
					<?
					$sql = "SELECT * FROM user_permissions";
					$stmt = $pdo->prepare($sql);
					$stmt->execute();
					$perm = $stmt->fetch(PDO::FETCH_ASSOC);
					$user_com = $perm['user_comment'];
					?>
					<? if($user_com == 'Yes'){ ?>
					<div class="comments-form">
						<h3 class="title-normal">Leave a comment</h3>
						<?
						if(isset($_POST['comment'])){
							$com_d = $_POST['detail'];
							$com_n = $_POST['name'];
							$com_e = $_POST['email'];
							
							$sql = "INSERT INTO comments(com_user_name,	com_user_id, com_post_id, com_user_email, com_detail, com_date, com_status) VALUES (:name, :pid, :id, :email, :detail, :date, :status)";
							$stmt = $pdo->prepare($sql);
							$stmt->execute([
							':name' => $com_n,
							':pid' => $post_user_id,
							':id' => $_GET['post_id'],
							':email' => $com_e,
							':detail' => $com_d,
							':date' => date("F j, Y,") . ' at ' . date("g:i a"),
							':status' => 'unapproved'
							]);
							$success = true;
						}
						?>
						<form action="p-detail" method="POST" role="form">
						<?
						if(isset($success)){
							echo'<div class="alert alert-warning fade show">
									<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
									<span class="icon"><i class="fa fa-check"></i></span><strong>Success! </strong>Your comment is waiting for approval
								</div>';
						}
						?>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" name="name" id="name" placeholder="Your Name" type="text" required>
									</div>
								</div><!-- Col end -->

								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" name="email" id="email" placeholder="Your Email" type="email" required>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" name="detail" placeholder="Your Comment" type="text" required></textarea>
									</div>
								</div>
							</div><!-- Form row end -->
							<div class="clearfix">
								<button class="comments-btn btn btn-primary" name="comment" type="submit">Post Comment</button> 
							</div>
						</form><!-- Form end -->
					</div><!-- Comments form end -->
					<? }else{ ?>
					<h4>Comment not allowed</h4>
					<? } ?>
				</div><!-- Content Col end -->

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->

<? include ("vendors/cat-footer.php"); ?>