<?php
if(!$_SESSION['userLoggedIn'])
{
	header("location:login.php");
}
?>