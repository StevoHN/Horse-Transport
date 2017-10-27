<?php
session_start();

if($_SESSION['userLoggedIn'])
{
	header('location:profile.php');
	exit;
}
?>
<!DOCTYPE HTML>
<html>

	<head>
		<?php include "include/head.php" ?>
		
		<title>Horse Transport - Login</title>
	</head>

	<body>
		<?php include "include/navbar.php" ?>
		
		<div class="container">
		
			<!-- Form Start -->
			<div class="col-sm-8 col-sm-push-2 col-md-6 col-md-push-3">
				<form action="processLogin.php" method="post" class="form-horizontal">
				
					<!-- userLogin->Email -->
					<div class="form-group">
						<label for="loginEmail" class="col-xs-12">E-mail:</label>
						<div class="col-xs-12">
							<input type="email" id="loginEmail" name="loginEmail" class="form-control" placeholder="E-mail">
						</div>
					</div>
					
					<!-- userLogin->Password -->
					<div class="form-group">
						<label for="loginPassword" class="col-xs-12">Password:</label>
						<div class="col-xs-12">
							<input type="password" id="loginPassword" name="loginPassword" class="form-control" placeholder="Password">
						</div>
					</div>
				
					<!-- userLogin->Login -->
					<div class="form-group">
						<div class="col-xs-12">
							<button type="submit" class="form-control btn btn-success" value="Login">Login</button>
						</div>
					</div>
				</form>
			</div>
		
		</div>
		
		<?php include "include/jsFiles.php" ?>
	</body>
	
</html>