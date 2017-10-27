<?php

$email1 = $_POST['customerEmail'];
$email2 = $_POST['customerRetypeEmail'];
//Check if email matches in both fields
if($email1 != $email2)
{
	header('location:register.php?WrongEmails');
	exit;
}
//Check if email is empty //Could change this to verify email pattern
else if($email1 == "")
{
	header('location:register.php?WrongEmails');
	exit;
}
else
{
	$email = $email1;
}

$password1 = $_POST['customerPassword'];
$password2 = $_POST['customerRetypePassword'];
//Check if password matches in both fieds
if($password1 != $password2)
{
	header('location:register.php?WrongPasswords');
	exit;
}
//Check if password is empty //Could change this to verify password requirements
else if($password1 == "")
{
	header('location:register.php?WrongPasswords');
	exit;
}
else
{
	$password = $password1;
}

//Assign variables
$firstName = $_POST['customerFirstName'];
$lastName = $_POST['customerLastName'];
$phone = $_POST['customerPhone'];
$birthday = $_POST['customerBirthday'];
$address = $_POST['customerAddress'];

$customer;

$customer->firstName = $firstName;
$customer->lastName = $lastName;
$customer->email = $email;
$customer->phone = $phone;
$customer->password = $password;
$customer->birthday = $birthday;
$customer->address = $address;

foreach ($customer as $key => $value) {
   //echo $key . ": " . $value . "<br>";
}


//Establish Connection to the database
include "include/openConn.php";

//Check if email is already in the database
try
{
	$query = "SELECT * FROM customers WHERE email = '$customer->email'";
	//echo "<br>$query";
	
	$runQ = $conn->prepare($query);
	$runQ->execute();
	
	$rows = $runQ->rowCount();
	if($rows>0)
	{
		//Email Exists
		header('location:register.php?EmailExists');
		exit;
	}
}
catch(PDOException $err)
{
	echo $err;
}

//Create user
try
{
	$query = "INSERT INTO `customers` (`firstName`, `lastName`, `email`, `phone`, `address`, `birthday`) VALUES ('$customer->firstName', '$customer->lastName', '$customer->email', '$customer->phone', '$customer->address', '$customer->birthday')";
	//echo "<br>$query";	
	
	$runQ = $conn->prepare($query);
	$runQ->execute();
}
catch(PDOException $err)
{
	echo $err;
}

header("location:profile.php");
exit;
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include "include/head.php" ?>
	</head>
	
	<body>
		<?php include "include/navbar.php" ?>
	</body>
</html>




















