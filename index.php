<?php
require 'authentication.php'; // admin authentication check 
	

// auth check
if (isset($_SESSION['admin_id'])) {
	$user_id = $_SESSION['admin_id'];
	$user_name = $_SESSION['admin_name'];
	$security_key = $_SESSION['security_key'];
	if ($user_id != NULL && $security_key != NULL) {
		header('Location: task-info.php');
	}
}

if (isset($_POST['login_btn'])) {
	$info = $obj_admin->admin_login_check($_POST);
}

$page_name = "Login";


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Sign Up| TEAM UP </title>
	
	
	<link rel="icon" href="resources/teamup.png">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
	
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="style.css">


	

</head>

<body style="background-color: #22C414;">

<?php

	

?>
<div class="col-12 p-5 main" style="margin-top: 125px;">
        <div class="row">

			<div class="col-6 d-lg-block background"></div>
			<div class="col-12 col-lg-6 d-block">
				<div class="row g-3">
					<div class="well" style="position:relative;top:5vh;">
						<center>
							<h2 style="margin-top:1px;color:white ">Team Up Task Management System</h2>
						</center>
						<form class="form-horizontal form-custom-login" action="" method="POST">
						<div class="form-heading mb-4">
							<h2 class="text-center" style="color:#22C414;">Login Panel</h2>
						</div >
						<?php if (isset($info)) { ?>
							<h5 class="alert alert-danger">
								<?php echo $info; ?>
							</h5>
						<?php } ?>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Username" name="username" required />
						</div>
						<div class="form-group"
							ng-class="{'has-error': loginForm.password.$invalid && loginForm.password.$dirty, 'has-success': loginForm.password.$valid}">
							<input type="password" class="form-control" placeholder="Password" name="admin_password"
								required />
						</div>
						<button type="submit" name="login_btn" class="btn btn-outline-success col-12   pull-right" style="color: white;">Login</button>
					</form>
					</div>

				</div>
			</div>

		</div>
	</div>
	<?php

include("include/footer.php");

?>
	<script src="script.js"></script>
	<script src="bootstrap.js"></script>
</body>


</html>