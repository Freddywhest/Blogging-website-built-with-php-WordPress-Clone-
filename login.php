<?php session_start(); 
 $page_name = "Login"; 

 	include  ("vendors/header.php"); 
	$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : ((isset($_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
	//$ip='207.228.238.7';
	//echo $ip;

	function get_browser_name($user_agent)
	{
		if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
		elseif (strpos($user_agent, 'Edge')) return 'Edge';
		elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
		elseif (strpos($user_agent, 'Safari')) return 'Safari';
		elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
		elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
	
		return 'Unknown';
	}

// Usage:

	$browser_name = get_browser_name($_SERVER['HTTP_USER_AGENT']);
	$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
	$country_name = $query['country'];
	$city_name = $query['city'];
	$region_name = $query['regionName'];
	$network_type = $query['isp'];
	$ip_address = $query['query'];
	?>
	<?php
	if(isset($_POST['login'])){
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		
		$sql= "SELECT * FROM users WHERE user_email = :email";
		$stmt= $pdo->prepare($sql);
		$stmt->execute([
			':email' => $email
		]);
		$count = $stmt->rowCount();
		if($count == 0){
			$error = "Wrong credentials!"; 
		}else if($count >1){
			$error = "Wrong credentials!";
		}else if($count == 1){
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
			$user_password_hash = $user['user_password'];
			$full_name = $user['full_name'];
			$user_id = $user['user_id'];
			$user_role = $user['user_role'];
			$user_allow = $user['user_allow'];
			if(password_verify($password, $user_password_hash)){
				$success = "Sign in successfull";
				if(!empty($_POST['check'])){
					$user_id = $user['user_id'];
					$user_name = $user['user_name'];
					$d_user_id = base64_encode($user_id);
					$d_user_name = base64_encode($user_name);
					//user id
					setcookie('_uid_', $d_user_id, time()+ 60 * 60 * 24, '/', '', '', true);
					//username
					setcookie('_uiid_', $d_user_name, time()+ 60 * 60 * 24, '/', '', '', true);
				}
				$_SESSION['full_name'] = $full_name;
				$_SESSION['user_id']  = $user['user_id'];
				$_SESSION['user_name'] = $user['user_name'];
				$_SESSION['user_role'] = $user['user_role'];
				$_SESSION['user_allow'] = $user['user_allow'];
				$_SESSION['last_login_timestamp'] = time();
				$_SESSION['login'] = 'success';
				$sql7 = "INSERT INTO login_activity(login_ip_address, login_date, login_country, login_user, login_city, login_region, login_browser) VALUES (:ip, :date, :country, :user, :city, :region, :browser)";
					$stmt7 = $pdo->prepare($sql7);
					$stmt7->execute([
					':ip' => $ip_address,
					':date' => date("F j, Y,") . ' at ' . date("g:i a"),
					':country' => $country_name,
					':user' => $user_id,
					':city' => $city_name,
					':region' => $region_name,
					':browser' => $browser_name
					]);
				header("Refresh:2;url=./admin-area/home.php");
			}else{
				$error_password = "Wrong password!";
			}
		}
	}


		if(isset($_SESSION['login']) || isset($_COOKIE['_uid_']) || isset($_COOKIE['_uiid_'])){
			header("Location: admin-area/home.php");
		}
?>
<body <? echo $theme_name == "b-style"?"class='boxed-layout'":"class='layouter'"; ?><? echo $theme_name == "b-dark"?"class='boxed-layout'":""; ?>>
	<? include  ("vendors/nav.php"); ?>

	<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
     					<li><a href="home">Home</a></li>
     					<li>Login</li>
     				</ol>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->
	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">

				<h3>Login</h3>
	    			<form action="login.php" method="POST" role="form">
					<div class="col-md-8">
	    				<div class="error-container">
						<?php
						if(isset($success)){
							echo "<p class='alert alert-success'>{$success}</p>";
						}
						if(isset($error)){
							echo "<p class='alert alert-danger'>{$error}</p>";
						}else if(isset($error_password)){
							echo "<p class='alert alert-danger'>{$error_password}</p>";
						}
						?>
						</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Email</label>
								<input class="form-control form-control-name" name="email" placeholder="Email" type="email" required>
								</div>
							</div>
							</div>
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control form-control-email" name="password" placeholder="Password" required>
								</div>
							</div>
							</div>
							<div class="row">
							<div class="col-md-4">
								<div class="form-group">
								<label>Remember me</label>
									<input name="check" type="checkbox">
								</div>
								</div>
							<div class="col-md-4">
								<div class="form-group">
								Forget <a href="reset-password"><u>password</u></label>
								</div>
								</div>
							</div>
						<div class="text-center">
							<button class="btn btn-primary solid blank" type="submit" name="login">Login</button> 
						</div>
					</form>



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
