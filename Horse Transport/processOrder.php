<?php
session_start();

if(!($_SERVER['REQUEST_METHOD'] == "POST"))
{
	//header('location:order.php');
	echo "Not Post";
}
else
{		
	//Concatenate addresses (Pickup)
	$fromStreet = $_POST['fromStreet'];
	$fromCity = $_POST['fromCity'];
	$fromZipCode = $_POST['fromZipCode'];
	$fromCountry = $_POST['fromCountry'];

	$locationFrom = "$fromStreet, $fromZipCode $fromCity, $fromCountry";

	//Concatenate addresses (Destination)
	$toStreet = $_POST['toStreet'];
	$toCity = $_POST['toCity'];
	$toZipCode = $_POST['toZipCode'];
	$toCountry = $_POST['toCountry'];

	$locationTo = "$toStreet, $toZipCode $toCity, $toCountry";

	$customerId = $_SESSION['userId'];
	$horseCount = $_POST['horseCount'];
	$date = $_POST['orderDate'];
	$comment = $_POST['orderComments'];

	include "include/openConn.php";

	try
	{
		$query = "INSERT INTO `orders` (`customerId`, `horseCount`, `locationFrom`, `locationTo`, `date`, `comment`, `horseA`, `horseB`, `horseC`) VALUES ('$customerId', '$horseCount', '$locationFrom', '$locationTo', '$date', '$comment', NULL, NULL, NULL)";

		$runQ = $conn->prepare($query);
		$runQ->execute();

	}
	catch(PDOException $err)
	{
		echo $err;
	}
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include "include/head.php"; ?>
	</head>

	<body>
		<?php include "include/navbar.php"; ?>
		
		<div class="container">
			<div class="col-xs-12">
				<h1 class="text-center">Your order has been submitted!</h1>
			</div>
		</div>
		
		<?php include "include/jsFiles.php"; ?>
	</body>
	
</html>