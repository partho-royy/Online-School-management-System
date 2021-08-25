<?php include "config/db.php";?>

	<?php

	$email=$_POST['email'];
	$pass=$_POST['password'];
	$npass=md5($pass);
	$haspass=md5($email.$npass);
	
	if(empty($email)||empty($pass)){
		session_start();
		$_SESSION['empty_field']=true;
		header('location:index.php');
	}
	else{
		
		$admin_query="select * from admin where email='$email' and password='$haspass'";
		$admin_result=$connect->query($admin_query);
		$admin_row_count=mysqli_num_rows($admin_result);
		$admin_array=mysqli_fetch_array($admin_result);
		
		if($admin_row_count == 1){
			session_start();
			$_SESSION['admin_success']=true;
			$_SESSION['admin_id']=$admin_array['id'];
			$_SESSION['admin_name']=$admin_array['name'];
			$_SESSION['admin_email']=$admin_array['email'];
			$_SESSION['admin_photo']=$admin_array['photo'];
			$_SESSION['admin_gender']=$admin_array['gender'];
			$_SESSION['admin_phone']=$admin_array['phone'];
			$_SESSION['role']=$admin_array['role'];
			header('location:admin/index.php');
		}
		else{
			$teacher_query="select * from teacher where email='$email' and password='$haspass'";
			$teacher_result=$connect->query($teacher_query);
			$teacher_row_count=mysqli_num_rows($teacher_result);
			$teacher_array=mysqli_fetch_array($teacher_result);
			
			if($teacher_row_count==1){
				session_start();
				$_SESSION['teacher_success']=true;
				$_SESSION['teacher_id']=$teacher_array['id'];
				$_SESSION['teacher_name']=$teacher_array['name'];
				$_SESSION['teacher_address']=$teacher_array['address'];
				$_SESSION['teacher_qualification']=$teacher_array['qualification'];
				$_SESSION['teacher_email']=$teacher_array['email'];
				$_SESSION['teacher_gender']=$teacher_array['gender'];
				$_SESSION['teacher_image']=$teacher_array['image'];
				header('location:teacher/index.php');
			}
			else{
				$father_query="select * from father where email='$email' and password='$haspass'";
				$father_result=$connect->query($father_query);
				$father_row_count=mysqli_num_rows($father_result);
				$father_array=mysqli_fetch_array($father_result);
				
				if($father_row_count==1){
					session_start();
					$_SESSION['parent_success']=true;
					$_SESSION['id']=$father_array['id'];
					$_SESSION['name']=$father_array['name'];
					$_SESSION['phone']=$father_array['phone'];
					$_SESSION['childrean']=$father_array['childrean'];
					$_SESSION['parents_id']=$father_array['parents_id'];
					header ('location:parent/index.php');
				}
				else{
					$mother_query="select * from mother where email='$email' and password='$haspass'";
					$mother_result=$connect->query($mother_query);
					$mother_row_count=mysqli_num_rows($mother_result);
					$mother_array=mysqli_fetch_array($mother_result);
				
					if($mother_row_count==1){
						session_start();
						$_SESSION['parent_success']=true;
						$_SESSION['id']=$mother_array['id'];
						$_SESSION['name']=$mother_array['name'];
						$_SESSION['phone']=$mother_array['phone'];
						$_SESSION['childrean']=$mother_array['childrean'];
						$_SESSION['parents_id']=$mother_array['parents_id'];
						header ('location:parent/index.php');
					}
					else{
						$student_query="select * from student where email='$email' and password='$haspass' and alumni='0'";
						$student_result=$connect->query($student_query);
						$student_row_count=mysqli_num_rows($student_result);
						$student_array=mysqli_fetch_array($student_result);
						
						if($student_row_count==1){
								session_start();
								$_SESSION['success']=true;
								$_SESSION['name']=$student_array['name'];
								$_SESSION['image']=$student_array['student_photo'];
								$_SESSION['id']=$student_array['id'];
								$_SESSION['student_id']=$student_array['student_id'];
								$_SESSION['class']=$student_array['class'];
								$_SESSION['section']=$student_array['section'];
								$_SESSION['shift']=$student_array['shift'];
								header('location:student/index.php');
							}
							else{
								session_start();
								$_SESSION['login_error']=true;
								header('location:index.php');
					 }
				 }
			 }
		 }
	 }
   }

?>
	
