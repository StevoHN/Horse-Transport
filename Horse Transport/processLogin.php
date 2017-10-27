<?php
session_start();


$email = $_POST['loginEmail'];
$password = $_POST['loginPassword'];

include "include/openConn.php";

try
{
	$query = "SELECT customerId, firstName, lastName, address, password, rankId FROM customers WHERE email = '$email'";
	
	$runQ = $conn->prepare($query);
	$runQ->execute();
	
	$r = $runQ->fetchAll();
	if($password == $r[0][4])
	{
		//echo "password match";
		$_SESSION['userLoggedIn'] = true;
		$_SESSION['userId'] = $r[0][0];
		$_SESSION['user'] = $r[0][1];
		$_SESSION['userLastName'] = $r[0][2];
		$_SESSION['userRank'] = $r[0][5];
		$_SESSION['userAddress'] = $r[0][3];
		
		header("location:profile.php");
	}
	else
	{
		//echo "password don't match";
		
		header("location:login.php?WrongPassword");
	}
	
}
catch(PDOException $err)
{
	echo $err;
}

?>
<!DOCTYPE html>
<html>

	<head>
		<?php include "include/head.php" ?>
	</head>
	
	<body>
		<?php include "include/navbar.php" ?>
	
		
		
		<?php include "include/jsFiles.php" ?>
	</body>
	
</html>