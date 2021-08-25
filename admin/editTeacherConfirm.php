<?php include "../config/db.php";?>
<?php 
session_start();
$getid=$_SESSION['editteacherId'];
?>
<?php
				
					$name=$_POST['name'];
					$address=$_POST['address'];
					$qualification=$_POST['qualification'];
					$email=$_POST['email'];
					$gender=$_POST['gender'];
					
					$update="update teacher set name='$name',address='$address',qualification='$qualification',email='$email',gender='$gender' where id='$getid'";
					$uresult=$connect->query($update);
					if($uresult){
						session_start();
						$_SESSION['teacherEditSuccess']=true;
						header('location:allTeacher.php');
						
					}
			
?>