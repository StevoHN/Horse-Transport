<?php
session_start();
$_SESSION['userLoggedIn'] = false;
$_SESSION['userId'] = NULL;
$_SESSION['user'] = NULL;
$_SESSION['userLastName'] = NULL;
$_SESSION['userRank'] = NULL;
$_SESSION['userAddress'] = NULL;



header('location:index.php');
exit;
?>