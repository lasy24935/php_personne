<?php

$databaseHost = 'localhost';
$databaseName = 'personne';
$databaseUsername = 'root';
$databasePassword = '';

try {
	$connect = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword);
	
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

} catch(PDOException $e) {
	echo $e->getMessage();
}
 
?>
