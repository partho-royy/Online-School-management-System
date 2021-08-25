<?php
			if(isset($_POST['submit'])){//Get All value from student edit form
				
				$name=$_POST['name'];
				$gender=$_POST['gender'];
				$dob=$_POST['dob'];
				$religion=$_POST['religion'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$nationality=$_POST['nationality'];
				$class=$_POST['class'];
				$section=$_POST['section'];
				$shift=$_POST['shift'];
				$father_name=$_POST['father_name'];
				$mother_name=$_POST['mother_name'];
				$father_phone=$_POST['father_phone'];
				$father_job=$_POST['father_job'];
				
				
				$query_edit="update student set name='$name',gender='$gender',dob='$dob',religion='$religion',email='$email',
				phone='$phone',nationality='$nationality',class='$class',section='$section',shift='$shift',father_name='$father_name',
				mother_name='$mother_name',father_phone='$father_phone',father_job='$father_job' where id='$getid'";//mysqli Query
				
				$query_result=$connect->query($query_edit);
				if($query_result){
					echo "<div class='alert alert-info' role='alert'>"."Student Edit Successfully"."</div>";
					
				}
			}
		?>