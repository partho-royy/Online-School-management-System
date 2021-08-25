<?php
	$host="localhost";
	$user="root";
	$pass="";
	$dbName="sm";
	
	$connect=new mysqli($host,$user,$pass,$dbName);
	
	if(!$connect){
		echo "There is a problem in database Connection";
	}
?>