<?php
	
	if(isset($_POST['submit'])){//Get All value from Student registraion From 
		
		$name=$_POST['name'];
		$student_id=$_POST['student_id'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$religion=$_POST['religion'];
		$nationality=$_POST['nationality'];
		
		$address=$_POST['std_address'];
		
		$email=	$_POST['email'];
		$phone=	$_POST['phone'];
		$class=	$_POST['class'];
		$section=$_POST['section'];
		$shift=	$_POST['shift'];
		$roll=	$_POST['roll'];
		$admission_date=$_POST['admission_date'];
		
		//student photo
						$image_name=$_FILES['studentPhoto']['name'];//get image name only
						$image_tmp=$_FILES['studentPhoto']['tmp_name'];//get image temp name obly
						
						$div=explode('.',$image_name);//get image extention after the . Symbol
						$file_ext=strtolower(end($div));//Covert symbol to lower case
						$unique_name=substr(md5(time()),0,10).'.'.$file_ext;//For image unique name using here time function
						$destination="uploads/".$unique_name;//Unique name with extension 
						move_uploaded_file($image_tmp,$destination);//Move image file project folder
		
		//student photo end
		
		
		$father_name=$_POST['father_name'];
		$father_job=$_POST['father_job'];
		$father_phone=$_POST['father_phone'];
		$mother_name=$_POST['mother_name'];
		$mother_job=$_POST['mother_job'];
		$mother_phone=$_POST['mother_phone'];
		
		
		//Father Photo
						$father_image_name=$_FILES['father_photo']['name'];
						$father_image_tmp=$_FILES['father_photo']['tmp_name'];
						
						$division=explode('.',$father_image_name);
						$file_extension=strtolower(end($division));
						$father_unique_name=substr(md5(time()),0,11).'.'.$file_extension;
						$father_destination="uploads/".$father_unique_name;
						move_uploaded_file($father_image_tmp,$father_destination);
						
		//Father Photo
		if(empty($name)||empty($student_id)||empty($gender)||empty($dob)||empty($religion)||empty($email)||empty($roll)||empty($father_name)||empty($mother_name)||empty($father_job)||empty($father_phone)){
			
			
			$_SESSION['blank_msg']=true;
			
		}
		else{
			//main student insert query
			$query="insert into student (name,student_id,gender,dob,religion,nationality,address,email,phone,class,section,shift,roll,admission_date,student_photo,father_name,mother_name,father_job,father_phone,father_photo,mother_job,mother_phone,password,alumni,status)
			values('$name','$student_id','$gender','$dob','$religion','$nationality','$address','$email','$phone','$class','$section','$shift','$roll','$admission_date','$destination','$father_name','$mother_name','$father_job','$father_phone','$father_destination','$mother_job','$mother_phone','','0','0')";
			$result=$connect->query($query);
				
				if($result){
				
					$_SESSION['ssuccess']=true;
				
				}
				
				$father_query="insert into father(name,phone,occupation,childrean,status,photo) values('$father_name','$father_phone','$father_job','$student_id','0','$father_destination')";
				$father_result=$connect->query($father_query);//insert operation for father only
				
				$mother_query="insert into mother(name,phone,occupation,childrean,status) values('$mother_name','$mother_phone','$mother_job','$student_id','0')";
				$mother_result=$connect->query($mother_query);//insert operation for mother only
				
				
				//student insert for currest education year
				$selet_year="select * from year order by id desc";
				$year_result=$connect->query($selet_year)->fetch_assoc();
				$year_name=$year_result['name'];
				
				$student_insert="insert into `".$year_name."` (name,student_id,class,section,shift,roll) values('$name','$student_id','$class','$section','$shift','$roll')";
				$student_result=$connect->query($student_insert);
				
			
			}
	}
?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	