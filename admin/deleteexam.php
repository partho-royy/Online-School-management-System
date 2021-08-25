<?php include "../config/db.php";?><!--Database Connection-->
<?php
	$gid=$_GET['id'];
	$query="delete from exam where id='$gid'";
	$result=$connect->query($query);
	if($result){
		session_start();
		$_SESSION['delete_exam']=true;
		header('location:exam.php');
	}
?>