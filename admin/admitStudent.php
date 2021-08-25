<?php
session_start()
?>
<?php
	if(!isset($_SESSION['admin_success'])){
		header('location:../index.php');
	}
?>
<?php include "../config/db.php";?><!--Database Connection-->
<?php include "inc/header.php";?><!--Call header Section from inc root folder-->
<?php include "inc/sidebar.php";?><!--Call Sidebar Section from inc root folder-->
	<div class="row">
		<div class="col-md-12">
			<hr>
				<h3>Student Registration</h3>
			<hr>
		</div>
		<?php include "lib/studentAdmitHandler.php";?><!--Call Student Admission Functionalities from library root Folder-->
	</div>
		<?php
			if(isset($_SESSION['blank_msg'])){
				echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Please fill Out the All Mendatory field"."</div>";
			}//Student registration Error Message
			if(isset($_SESSION['ssuccess'])){
				echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."Student Registration Successfull"."</div>";
			}//Student registration Success message
		?>
	<div class="row" style="opacity:0.8;">
		<div class="col-md-1"></div>
		<div class="col-md-10 form-bg">
			<form  action="" method="POST" enctype="multipart/form-data">
				<h3 style="background:#294970;color:white;padding-top:2px;padding-bottom:2px">Student Information</h3>
				<div class="row">
				<div class="col-md-6">
					 <div class="form-group">
						<label for="formGroupExampleInput">Full Name <font color="red">*</font></label>
						<input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Enter Full Name Here">
					 </div>
				  </div>
				  <?php
					$std_query="select * from student order by id desc";
					$std_result=$connect->query($std_query)->fetch_assoc();
					$select_id=$std_result['student_id']+1;
				  ?>
				  <div class="col-md-6">
					  <div class="form-group">
						<label for="formGroupExampleInput">Student Id <font color="red">*</font></label>
						<input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $select_id; ?>" name="student_id" placeholder="Enter Full Name Here">
					  </div> 
				  </div> 
			  </div>
			  
			  <div class="row">
					<div class="col-md-4">
					  <div class="form-group">
						<label for="formGroupExampleInput">Gender <font color="red">*</font></label>
						<select class="form-control" id="formGroupExampleInput" name="gender">
							<option>Select Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
						</select>
					  </div>
				   </div>
				   <div class="col-md-4">
					  <div class="form-group">
						<label for="formGroupExampleInput">Date of Birth <font color="red">*</font></label>
						<input type="date" class="form-control" id="formGroupExampleInput" name="dob">
					  </div> 
				  </div> 
				  <div class="col-md-4">
					  <div class="form-group">
						<label for="formGroupExampleInput">Religion <font color="red">*</font></label>
						<input type="text" class="form-control" id="formGroupExampleInput" name="religion" placeholder="Enter Religion Here">
					  </div>
				  </div>
			  </div>
			  <div class="row">
				<div class="col-md-4">
				  <div class="form-group">
					<label for="formGroupExampleInput">Nationality <font color="red">*</font></label>
					<input type="text" class="form-control" id="formGroupExampleInput" name="nationality" placeholder="Enter Nationality Here">
				  </div>  
				 </div>  
				 <div class="col-md-8"> 
				  <div class="form-group">
					<label for="formGroupExampleInput">Phone <font color="red"></font></label>
					<input type="text" value="+880" maxlength="14" minlength="14" class="form-control" id="formGroupExampleInput" name="phone" placeholder="Enter Phone Number Here">
				  </div>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label for="formGroupExampleInput">Student Address <font color="red">*</font></label>
					<input type="text" class="form-control" id="formGroupExampleInput" name="std_address" placeholder="Enter Nationality Here">
				  </div> 
				 </div> 
				
				<div class="col-md-6">
				  <div class="form-group">
					<label for="formGroupExampleInput">Blood Group <font color="red"></font></label>
					
					<select name="blood" class="form-control">
						<option>Select a Blood Group</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
					</select>
					
					
				  </div> 
				 </div> 
				
			  </div>
			  
			  
			 <div class="row"> 
			  <div class="col-md-4">
				  <div class="form-group">
					<label for="formGroupExampleInput2">Class <font color="red">*</font></label>
					<select class="form-control" id="formGroupExampleInput" name="class" >
						<option>Select A Class</option>
						<?php
							$class_query="select * from class";
							$class_result=$connect->query($class_query);
						?>
						<?php if($class_result){?>
						<?php while($class_row=$class_result->fetch_assoc()){?>
						<option value="<?php echo $class_row['name'];?>"><?php echo $class_row['name'];?></option>
						<?php }} ?>
					</select>
				  </div>
			  </div>
			  <div class="col-md-4">
				  <div class="form-group">
					<label for="formGroupExampleInput2">Section <font color="red">*</font></label>
					<select class="form-control" id="formGroupExampleInput" name="section" >
						<?php
							$section_query="select * from section";
							$section_result=$connect->query($section_query);
						?>
						
						<option>Select A Section</option>
						<?php if($section_result){?>
						<?php while($section_row=$section_result->fetch_assoc()){?>
						<option value="<?php echo $section_row['name'];?>"><?php echo $section_row['name'];?></option>
						<?php }} ?>
					</select>
				  </div> 
			  </div> 
			  <div class="col-md-4">
				  <div class="form-group">
					<label for="formGroupExampleInput2">Shift <font color="red">*</font></label>
					<select class="form-control" id="formGroupExampleInput" name="shift" >
					<?php
							$shift_query="select * from shift";
							$shift_result=$connect->query($shift_query);
					?>
						<option>Select Shift</option>
						<?php if($shift_result){?>
						<?php while($shift_row=$shift_result->fetch_assoc()){?>
						<option value="<?php echo $shift_row['name'];?>"><?php echo $shift_row['name'];?></option>
						<?php }} ?>
					</select>
				  </div>
			  </div>
		 </div>
			  
			  
			  <!--
			  
			  <div class="form-group">
				<label for="formGroupExampleInput">Admission Roll <font color="red">*</font></label>
				<input type="text" class="form-control" id="formGroupExampleInput" name="roll" placeholder="Enter Roll Number Here">
			  </div>
			  -->
			  
			  <div class="row">
			  <div class="col-md-6">
				  <div class="form-group">
					<label for="formGroupExampleInput">Admission date <font color="red">*</font></label>
					<input type="text" readonly class="form-control" value="<?php $t=time(); echo(date("d-m-Y",$t));?>" id="formGroupExampleInput" name="admission_date" placeholder="Enter Roll Number Here">
				  </div>  
			   </div>  
			   <div class="col-md-6">
				  <div class="form-group">
					<label for="formGroupExampleInput">Student Photo <font color="red">*</font></label>
					<input type="file" class="form-control" id="formGroupExampleInput" name="studentPhoto">
				  </div> 
				</div> 
			  </div> 
			  
			  
			  
			  
				<h3 style="background:#294970;color:white;padding-top:2px;padding-bottom:2px">Parents Information</h3>	
			<div class="row">  
				<div class="col-md-4">
				  <div class="form-group">
					<label for="formGroupExampleInput">Father Name <font color="red">*</font></label>
					<input type="text" class="form-control" id="formGroupExampleInput" name="father_name" placeholder="Enter Father Name Here">
				  </div>  
				 </div>
				<div class="col-md-4"> 
				   <div class="form-group">
					<label for="formGroupExampleInput">Father Phone <font color="red">*</font></label>
					<input type="text" value="+880" maxlength="14" minlength="14" class="form-control" id="formGroupExampleInput" name="father_phone" placeholder="Enter Father Name Here">
				  </div> 
				</div> 
				<div class="col-md-4">
				   <div class="form-group">
					<label for="formGroupExampleInput">Father Photo <font color="red">*</font></label>
					<input type="file" class="form-control" id="formGroupExampleInput" name="father_photo">
				  </div> 
				</div> 
			</div> 
			
			 <div class="form-group">
				<label for="formGroupExampleInput">Father Occupution <font color="red">*</font></label>
				<input type="text" class="form-control" id="formGroupExampleInput" name="father_job" placeholder="Enter Father Name Here">
			  </div>
			  <div class="row">
				<div class="col-md-3">
					 <div class="form-group">
						<label for="formGroupExampleInput">Mother Name <font color="red">*</font></label>
						<input type="text" class="form-control" id="formGroupExampleInput" name="mother_name" placeholder="Enter Mother Name Here">
					  </div> 
				</div>
				<div class="col-md-3">
					  <div class="form-group">
						<label for="formGroupExampleInput">Mother Occupution <font color="red">*</font></label>
						<input type="text" class="form-control" id="formGroupExampleInput" name="mother_job" placeholder="Enter Mother Name Here">
					  </div> 
				</div>
				<div class="col-md-3">
					  <div class="form-group">
						<label for="formGroupExampleInput">Mother Phone <font color="red">*</font></label>
						<input type="text" value="+880" maxlength="14" minlength="14" class="form-control" id="formGroupExampleInput" name="mother_phone" placeholder="Enter Mother Name Here">
					  </div> 
				</div>
				<div class="col-md-3">
					  <div class="form-group">
						<label for="formGroupExampleInput">Mother Photo <font color="red">*</font></label>
						<input type="file"  class="form-control" id="formGroupExampleInput" name="mother_photo">
					  </div> 
				</div>
			  </div>
			 
			  <div class="form-group">
				<input type="submit" class="form-control" id="formGroupExampleInput" name="submit" value="submit">
			  </div> 
			
			<button class="btn btn-primary" type="reset">Reset</button>
			</form>
		</div>
		<div class="col-md-1"></div>
	</div>
	
	<?php unset($_SESSION['blank_msg']);?><!--Unset Session -->
	<?php unset($_SESSION['ssuccess']);?><!--Unset Session -->
	
<?php include "inc/footer.php";?><!--Call Sidebar Section from inc root folder-->