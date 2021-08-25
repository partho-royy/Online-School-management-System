<?php include "../config/db.php";?>
<?php
		$getid=$_GET['id'];
		$query="delete from student where id='$getid'";
		$result=$connect->query($query);
		
		
		if($result){
			session_start();
			$_SESSION['delete_success']=true;
			header('location:allStudent.php');
		}
?>