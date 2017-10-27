<?php

include "../dbCred.php";

try
{
	$conn = new PDO("mysql:host=$dbCred[host];dbname=$dbCred[database]",$dbCred[username],$dbCred[password],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(PDOException $err)	
{
	//echo $err;
}

//$connStatus = $conn->getAttribute(PDO::ATTR_CONNECTION_STATUS);
//$connInfo = $conn->getAttribute(PDO::ATTR_SERVER_INFO);

?>