<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

	<head>
		<title>Horse Transport</title>

		<?php include "include/head.php" ?>
	</head>

	<body>
		<?php include "include/navbar.php"?>
		<div class="container">
			<?php //var_dump($_SESSION) ?>
			<?php //echo $_SERVER['SERVER_ADDR']; ?>
			<div class="text-center indexDiv">
				<h3 class="indexH3">Welcome to</h3>
				<h1 class="indexH1">Michael Hembo</h1>
				<h3 class="indexH3">Horse Transport</h3>
			</div>
		</div>
		<?php include "include/jsFiles.php" ?>
		
	</body>		
	
</html>