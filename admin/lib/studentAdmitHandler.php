<?php
	
	if(isset($_POST['submit'])){//Get All value from Student registraion From 
		
		$name=$_POST['name'];
		$student_id=$_POST['student_id'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$religion=$_POST['religion'];
		$nationality=$_POST['nationality'];
		
		$address=$_POST['std_address'];
		$blood=$_POST['blood'];
		
		//$email=	$_POST['email'];
		$phone=	$_POST['phone'];
		$class=	$_POST['class'];
		$section=$_POST['section'];
		$shift=	$_POST['shift'];
		//$roll=	$_POST['roll'];
		$admission_date=$_POST['admission_date'];
		
		//student photo
						$image_name=$_FILES['studentPhoto']['name'];//get image name only
						$image_tmp=$_FILES['studentPhoto']['tmp_name'];//get image temp name obly
						
						$div=explode('.',$image_name);//get image extention after the . Symbol
						$file_ext=strtolower(end($div));//Covert symbol to lower case
						$unique_name=substr(md5(time()),0,10).'.'.$file_ext;//For image unique name using here time function
						$destination="uploads/".$unique_name;//Unique name with extension 
						move_uploaded_file($image_tmp,$destination);//Move image file project folder
		
		/*student photo end*/
		
		
		$father_name=$_POST['father_name'];
		$father_job=$_POST['father_job'];
		$father_phone=$_POST['father_phone'];
		$mother_name=$_POST['mother_name'];
		$mother_job=$_POST['mother_job'];
		$mother_phone=$_POST['mother_phone'];
		
		$father_id=substr(md5(time()),0,6);
		$mother_id=substr(md5(time()),0,5);
		
		/*Father Photo*/
						$father_image_name=$_FILES['father_photo']['name'];
						$father_image_tmp=$_FILES['father_photo']['tmp_name'];
						
						$division=explode('.',$father_image_name);
						$file_extension=strtolower(end($division));
						$father_unique_name=substr(md5(time()),0,11).'.'.$file_extension;
						$father_destination="uploads/".$father_unique_name;
						move_uploaded_file($father_image_tmp,$father_destination);
						
		/*Father Photo*/
		
		/*Mother Photo*/
						$mother_image_name=$_FILES['mother_photo']['name'];
						$mother_image_tmp=$_FILES['mother_photo']['tmp_name'];
						
						$mdivision=explode('.',$mother_image_name);
						$mfile_extension=strtolower(end($mdivision));
						$mother_unique_name=substr(md5(time()),0,12).'.'.$mfile_extension;
						$mother_destination="uploads/".$mother_unique_name;
						move_uploaded_file($mother_image_tmp,$mother_destination);
		/*Mother Photo*/
		if(empty($name)||empty($student_id)||empty($gender)||empty($dob)||empty($religion)||empty($father_name)||empty($mother_name)||empty($father_job)||empty($father_phone)){
			
			
			$_SESSION['blank_msg']=true;
			
		}
		else{
			
			
			
			$query="insert into student (name,student_id,gender,dob,religion,nationality,address,blood,phone,class,section,shift,admission_date,student_photo,father_name,mother_name,father_job,father_phone,father_photo,mother_job,mother_phone,mother_photo,password,alumni,status,father_id,mother_id)
			values('$name','$student_id','$gender','$dob','$religion','$nationality','$address','$blood','$phone','$class','$section','$shift','$admission_date','$destination','$father_name','$mother_name','$father_job','$father_phone','$father_destination','$mother_job','$mother_phone','$mother_destination','','0','0','$father_id','$mother_id')";
			$result=$connect->query($query);
				
			
		
				$father_query="insert into father(name,phone,occupation,childrean,status,photo,parents_id) values('$father_name','$father_phone','$father_job','$student_id','0','$father_destination','$father_id')";
				$father_result=$connect->query($father_query);
				
			
				$mother_query="insert into mother(name,phone,occupation,childrean,photo,status,parents_id) values('$mother_name','$mother_phone','$mother_job','$student_id','$mother_destination','0','$mother_id')";
				$mother_result=$connect->query($mother_query);
				
				
				//student insert for currest education year
				/*
				$selet_year="select * from year order by id desc";
				$year_result=$connect->query($selet_year)->fetch_assoc();
				$year_name=$year_result['name'];
				
				$student_insert="insert into `".$year_name."` (name,student_id,class,section,shift,roll) values('$name','$student_id','$class','$section','$shift','$roll')";
				$student_result=$connect->query($student_insert);
				*/
					if($result){
				
					$_SESSION['ssuccess']=true;
				
				}
			
			}
	}
?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	