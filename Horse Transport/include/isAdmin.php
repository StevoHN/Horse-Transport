<?php
if(!$_SESSION['userRank'] === 1)
{
	header("location:login.php");
}
?>