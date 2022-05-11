<? $page_name = 'Reset Password';
include  ("vendors/header.php"); 
?>
<body <? echo $theme_name == "b-style"?"class='boxed-layout'":"class='layouter'"; ?><? echo $theme_name == "b-dark"?"class='boxed-layout'":""; ?>>
	<? include  ("vendors/nav.php"); ?>

	<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
     					<li><a href="home">Home</a></li>
     					<li>Forget password</li>
     				</ol>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->
		
	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
				
					
					 <?
						if(isset($_POST['reset'])) {
							$password = trim($_POST['password']);
							$confirm_password = trim($_POST['confirm-password']);
							$user_id = $_POST['id'];
							$show = "new password";
							if($password == $confirm_password) {
								$hash_password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>10]);
								$sql = "UPDATE users SET user_password = :password WHERE user_id = :id";
								$stmt = $pdo->prepare($sql);
								$stmt->execute([
									':password' => $hash_password,
									':id' => $user_id
								]);
								echo "<p class='alert alert-success'>Password updated! <br>You will be redirect Login now in 3 seconds</p>";
								header("Refresh:3;url=login");
							} else {
								echo "<p class='alert alert-danger'>Password doesn't match!</p>";
							}
						}
					?>
				<?php
				if(isset($_POST['submit'])) {
					$username = trim($_POST['username']);
					$email = trim($_POST['email']);
					$phone = trim($_POST['phone']);

					$sql = "SELECT * FROM users WHERE user_name = :username AND user_email = :email AND user_phone = :phone";
					$stmt = $pdo->prepare($sql);
					$stmt->execute([
						':username' => $username,
						':email' => $email,
						':phone' => $phone
					]);
					$count = $stmt->rowCount();
					if($count == 1) {
						$user = $stmt->fetch(PDO::FETCH_ASSOC);
						$user_id = $user['user_id'];
						$show = "new password";
					} else {
						echo "<p class='alert alert-danger'>Wrong credentials!</p>";
					}
				}
				?>
				<?php 
					if(!isset($show)) { ?>
				<h3>Forget Password</h3>
	    			<form action="reset-password" method="POST" role="form">
	    				<div class="error-container"></div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Username</label>
								<input class="form-control form-control-name" name="username" placeholder="Username" type="text" required>
								</div>
							</div>
							</div>	
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Email</label>
									<input class="form-control form-control-email" name="email" placeholder="Email" type="email" required>
								</div>
							</div>
							</div>	
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Phone number</label>
									<input class="form-control form-control-email" name="phone" placeholder="Phone number" type="number" required>
								</div>
							</div>
							</div>
							<a href="login" class="text-center"><u>Back to Login</u></a>
						<div class="text-center">
							<button class="btn btn-primary solid blank" name="submit" type="submit">Submit</button> 
						</div>
					</form>
					<? }else{ ?>
				<h3>Reset Password</h3>
	    			<form action="reset-password" method="POST" role="form">
	    				<div class="error-container"></div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Password</label>
								<input class="form-control form-control-name" value="<? echo $user_id; ?>" name="id" type="hidden">
								<input class="form-control form-control-name" name="password" placeholder="Password" type="password" required>
								</div>
							</div>
							</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Confirm password</label>
									<input class="form-control form-control-email" name="confirm-password" placeholder="Confirm password" type="password" required>
								</div>
							</div>
							</div>
							<a href="login" class="text-center"><u>Back to Login</u></a>							
						<div class="text-center">
							<button class="btn btn-primary solid blank" name="reset" type="submit">Reset Password</button> 
						</div>
					</form>

					<? } ?>
				</div><!-- Content Col end -->

				<? include  ("vendors/sidebar.php"); ?>
				<script type="text/javascript"> 
							function preventBack() { 
								window.history.forward();  
							} 
							  
							setTimeout("preventBack()", 0); 
							  
							window.onunload = function () { null }; 
						</script> 
				<? include  ("vendors/footer.php"); ?>
