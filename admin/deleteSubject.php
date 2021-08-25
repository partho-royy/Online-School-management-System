<?php include "../config/db.php";?>
<?php
		$getid=$_GET['id'];
		$query="delete from subject where subject_id='$getid'";
		$result=$connect->query($query);
		
		
		if($result){
			session_start();
			$_SESSION['delete_success']=true;
			header('location:subject.php');
		}
?>