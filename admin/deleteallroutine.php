<?php include "../config/db.php";?><!--Database Connection-->
<?php
					$delete_query="delete from exam";
					$delete_result=$connect->query($delete_query);
					if($delete_result){
						session_start();
						$_SESSION['deleteall']=true;
						header('location:exam.php');
					}
?>