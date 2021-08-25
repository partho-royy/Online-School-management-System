<?php include "../config/db.php";?><!--Database Connection-->
<?php
	$gid=$_GET['id'];
	
	$query="delete from admin where id='$gid'";
	$result=$connect->query($query);
	if($result){
		session_start();
		header('location:adduser.php');
	}
	
?>