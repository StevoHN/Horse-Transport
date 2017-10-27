<?php
session_start();

include "include/isUserLoggedIn.php";


?>
<!DOCTYPE html>
<html>

	<head>
		<?php include "include/head.php" ?>
	</head>
	
	<body>
		<?php include "include/navbar.php" ?>
		
		<div class="container">
			
			<h3 class="col-md-8 col-md-push-2">My profile</h3>
			<ul class="col-md-8 col-md-push-2">
				<a href="#"><li class="list-group-item">My Horses</li></a>
				<a href="myOrders.php"><li class="list-group-item">My Orders</li></a>
			</ul>
		
			<h3 class="col-md-8 col-md-push-2">Administrative</h3>
			<ul class="col-md-8 col-md-push-2">
				<a href="orders.php"><li class="list-group-item">Orders</li></a>
				<a href="customers.php"><li class="list-group-item">Customers</li></a>
			</ul>
		</div>
		<?php include "include/jsFiles.php" ?>
	</body>

</html>