<? 
$page_name = "Advertise with us";
include  ("vendors/header.php"); ?>
<body <? echo $theme_name == "b-style"?"class='boxed-layout'":"class='layouter'"; ?><? echo $theme_name == "b-dark"?"class='boxed-layout'":""; ?>>

	<div class="body-inner">

<? include  ("vendors/nav.php"); ?>

	<div class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
     					<li><a href="#">Home</a></li>
     					<li>Advertise</li>
     				</ol>
				</div><!-- Col end -->
			</div><!-- Row end -->
		</div><!-- Container end -->
	</div><!-- Page title end -->
	<?
	$sql = "SELECT * FROM contact";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$con = $stmt->fetch(PDO::FETCH_ASSOC);
	$con_title = $con['contact_title'];
	$con_email = $con['contact_email'];
	$con_phone = $con['contact_phone'];
	$con_country = $con['contact_country'];
	$con_city = $con['contact_city'];
	?>
	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12 col-sm-12">

				<h3>Advertise with us</h3>
				<p>We offer unique advertising opportunities, with millions of visitors each month and customized solutions to help you target the customers crucial to your company’s success.</p>
				<h3>Advertising options</h3>
				<ul>
					<li>Top bar(header)</li>
					<li>Sidebar</li>
					<li>Footer</li>
					<li>Body</li>
				</ul>
					<?
					if(isset($_POST['submit'])){
						$full_name = $_POST['name'];
						$phone = $_POST['phone'];
						$message = $_POST['message'];
						$email = $_POST['email'];
						
						$sql = "INSERT INTO messages(ms_name, ms_phone, ms_email, ms_date, ms_detail, ms_status, ms_ip) VALUES (:name, :phone, :email, :date, :detail, :status, :ip)";
						$stmt = $pdo->prepare($sql);
						$stmt->execute([
						':name' => $full_name,
						':phone' => $phone,
						':email' => $email,
						':date' => date("F j, Y,") . ' at ' . date("g:i a"),
						':detail' => $message,
						':status' => 'unread',
						':ip' => $ip
						]);
						$success = true;
					}
					?>
				<h3>Apply for advertisement</h3>
						<?
						if(isset($success)){
							echo '<div class="alert alert-success fade show">
									<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
									<span class="icon"><i class="fa fa-check"></i></span><strong>Success! </strong>Your application have successfully sent. We will reply you with 24 hours
								</div>';
						}
						?>
	    			<form action="contact" method="POST">
	    				<div class="error-container"></div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Full name</label>
								<input class="form-control form-control-name" name="name" placeholder="Full name" type="text" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Email</label>
									<input class="form-control form-control-email" name="email" 
									placeholder="Email" type="email" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Phone number</label>
									<input class="form-control form-control-subject" name="phone"  
									placeholder="Phone number" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Description (Advertising option include)</label>
							<textarea class="form-control form-control-message" name="message" placeholder="Enter your description here....." rows="1000" required></textarea>
						</div>
						<div class="text-right">
							<button class="btn btn-primary" name="submit" type="submit">Send application</button> 
						</div>
					</form>



				</div><!-- Content Col end -->
	<? include  ("vendors/sidebar.php"); ?>
<? include  ("vendors/footer.php"); ?>