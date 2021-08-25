<?php
	session_start();
?>
<?php
	if(!isset($_SESSION['admin_success'])){
		header('location:../index.php');
	}
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
	<?php
		$getid=$_GET['id'];
		$query="select * from student where id='$getid'";
		$result=$connect->query($query)->fetch_assoc();
	?>
<?php
	/*Parents Account Creation*/
	if(isset($_POST['submit'])){
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$cpass=$_POST['cpass'];
		$haspass=md5($cpass);
		$doublehas=md5($email.$haspass);
		
		if($pass==$cpass){
			$semail_query="select * from student where email='$email'";
			$semail_query_result=$connect->query($semail_query);
			$semail_count=mysqli_num_rows($semail_query_result);
			if($semail_count==1){
				echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Email Already Exists!"."</div>";
			}
			else{
				$update_query="update student set email='$email',password='$doublehas' where id='$getid'";
				$update_query_result=$connect->query($update_query);
				echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."Account create Successfully!"."</div>";
			}
		}
		else{
			echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Password Is not Matched!"."</div>";
		}
	}
	/*Parents Account Creation*/
?>
<?php
	if(isset($_POST['idsubmit'])){
		$fid=$_POST['fid'];
		$mid=$_POST['mid'];
		
		$idquery="update student set father_id='$fid',mother_id='$mid' where id='$getid'";
		$idqueryresult=$connect->query($idquery);
		echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."Account Linked Successfully!"."</div>";
	}
?>


	
	<div class="row">

		<div class="col-md-6">
		
				<h2>Student Details</h2>
		
		</div>
		<div class="col-md-6">
		
					  <div class="modal-footer">
						
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="glyphicon glyphicon-floppy-open"></span> Crteate Student Account </button>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lgg"><span class="glyphicon glyphicon-link"></span> Link With Parents </button>
					  </div>
					  
					  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">

					
					<form action="" method="post" style="margin-top:30px;margin-bottom:30px;">
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										 <div class="form-group">
											<label for="formGroupExampleInput">Enter Email Address <font color="red">*</font></label>
											<input type="email" class="form-control" id="formGroupExampleInput" name="email" placeholder="Enter Email Address Here" required >
										 </div> 
										 <div class="form-group">
											<label for="formGroupExampleInput">Enter Password Here<font color="red">*</font></label>
											<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" id="formGroupExampleInput" name="pass" placeholder="Enter Password Here" required >
										 </div>
										 <div class="form-group">
											<label for="formGroupExampleInput">Enter Password Again Here<font color="red">*</font></label>
											<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" id="formGroupExampleInput" name="cpass" placeholder="Enter Password Again Here" required >
										 </div>
									</div>
								</div>
								
								<div class="row">
									
									<div class="col-md-12">
											<input type="submit" class="form-control" id="formGroupExampleInput" name="submit" value="Create Account">
									</div>
									
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>
					</form>
						

			</div>
		  </div>
		</div>
		
					  <div class="modal fade bd-example-modal-lgg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">

					<!--Mother/father unique id query-->
						<?php
						
							$fmquery="select * from student where id='$getid'";
							$fmresult=$connect->query($fmquery)->fetch_assoc();
						?>
					
					<!--Mother/father unique id query-->
					
					<form action="" method="post" style="margin-top:30px;margin-bottom:30px;">
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										 <div class="form-group">
											<label for="formGroupExampleInput">Father ID<font color="red">*</font></label>
											<input type="text" value="<?php echo $fmresult['father_id'];?>" class="form-control" id="formGroupExampleInput" name="fid" placeholder="Enter Father ID Here" required >
										 </div>
										 <div class="form-group">
											<label for="formGroupExampleInput">Mother ID<font color="red">*</font></label>
											<input type="text"  value="<?php echo $fmresult['mother_id'];?>" class="form-control" id="formGroupExampleInput" name="mid" placeholder="Enter Mother ID Here" required >
										 </div>
									</div>
								</div>
								
								<div class="row">
									
									<div class="col-md-12">
											<input type="submit" class="form-control" id="formGroupExampleInput" name="idsubmit" value="Create Link">
									</div>
									
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>
					</form>
						

			</div>
		  </div>
		</div>
				  
		</div>
		
	</div>
	<hr>
	<div class="row">
	<div class="col-md-1">
	</div>
	
	<div class="col-md-10" >
			<div class="row">
				<div class="col-md-4">
					<img src="<?php echo $result['student_photo'];?>" height="288" title="Student Photo">
				</div>
				<div class="col-md-4">
					<ul class="list-group">
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						<b>Student Details</b>
						
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Name
						<span class="badge badge-primary badge-pill"><?php echo $result['name'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Email
						<span class="badge badge-primary badge-pill"><?php echo $result['email'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Student ID
						<span class="badge badge-primary badge-pill"><?php echo $result['student_id'];?></span>
					  </li><li class="list-group-item d-flex justify-content-between align-items-center">
						Gender
						<span class="badge badge-primary badge-pill"><?php echo $result['gender'];?></span>
					  </li><li class="list-group-item d-flex justify-content-between align-items-center">
						Religion
						<span class="badge badge-primary badge-pill"><?php echo $result['religion'];?></span>
					  </li><li class="list-group-item d-flex justify-content-between align-items-center">
						Address
						<span class="badge badge-primary badge-pill"><?php echo $result['address'];?></span>
					  </li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul class="list-group">
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						<b>Student Details</b>
						
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Phone
						<span class="badge badge-primary badge-pill"><?php echo $result['phone'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Class / Section
						<span class="badge badge-primary badge-pill"><?php echo $result['class'];?> / <?php echo $result['section'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Shift
						<span class="badge badge-primary badge-pill"><?php echo $result['shift'];?></span>
					  </li><li class="list-group-item d-flex justify-content-between align-items-center">
						Blood Group
						<span class="badge badge-primary badge-pill"><?php echo 'A+';?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Date of Birth
						<span class="badge badge-primary badge-pill"><?php echo $result['dob'];;?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Admission date
						<span class="badge badge-primary badge-pill"><?php echo $result['admission_date'];?></span>
					  </li>
					</ul>
				</div>
			</div>
	</div>
	
	<div class="col-md-1">
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="row">
					<?php
						$student_id=$result['student_id'];
						$father_query="select * from father where childrean='$student_id'";
						$father_result=$connect->query($father_query)->fetch_assoc();
					?>
				<div class="col-md-4">
					<ul class="list-group">
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						<b>Father Details</b>
						
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Name
						<span class="badge badge-primary badge-pill"><?php echo $father_result['name'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Email
						<span class="badge badge-primary badge-pill"><?php echo $father_result['email'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Occupation
						<span class="badge badge-primary badge-pill"><?php echo $father_result['occupation'];?></span>
					  </li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul class="list-group">
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						<b>Father Details</b>
						
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Phone
						<span class="badge badge-primary badge-pill"><?php echo $father_result['phone'];?></span>
					  </li>
						<?php
							$father_id=$father_result['parents_id'];
							$scquery="select * from student where father_id='$father_id'";
							$scresult=$connect->query($scquery);
							$sccount=mysqli_num_rows($scresult);
						?>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Total Childrean
						<span class="badge badge-primary badge-pill"><?php echo $sccount;?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Gender
						<span class="badge badge-primary badge-pill"><?php echo 'Male'?></span>
					  </li>
					</ul>
				</div>
				<div class="col-md-3">
					<img src="<?php echo $father_result['photo'];?>"  title="Father Photo" height="165">
					
				</div>
				<div class="col-md-1">
					<a href="viewParents.php?id=<?php echo $father_result['id'];?> && parents=father"><span class="glyphicon glyphicon-new-window" style="font-size:30px;color:red" title="Click For View Profile"></span></a>
				</div>
		</div>
	</div>

	<div class="col-md-1"></div>
</div>


<hr>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="row">
					<?php
						$student_id=$result['student_id'];
						$mother_query="select * from mother where childrean='$student_id'";
						$mother_result=$connect->query($mother_query)->fetch_assoc();
					?>
				<div class="col-md-4">
					<ul class="list-group">
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						<b>Mother Details</b>
						
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Name
						<span class="badge badge-primary badge-pill"><?php echo $mother_result['name'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Email
						<span class="badge badge-primary badge-pill"><?php echo $mother_result['email'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Occupation
						<span class="badge badge-primary badge-pill"><?php echo $mother_result['occupation'];?></span>
					  </li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul class="list-group">
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						<b>Mother Details</b>
						
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Phone
						<span class="badge badge-primary badge-pill"><?php echo $mother_result['phone'];?></span>
					  </li>
						<?php
							$mother_id=$mother_result['parents_id'];
							$mscquery="select * from student where mother_id='$mother_id'";
							$mscresult=$connect->query($mscquery);
							$msccount=mysqli_num_rows($mscresult);
						?>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Total Childrean
						<span class="badge badge-primary badge-pill"><?php echo $msccount;?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Gender
						<span class="badge badge-primary badge-pill"><?php echo 'female'?></span>
					  </li>
					</ul>
				</div>
				<div class="col-md-3">
					<img src="<?php echo $mother_result['photo'];?>"  title="Mother Photo" height="165">
					
				</div>
				<div class="col-md-1">
					<a href="viewParents.php?id=<?php echo $mother_result['id'];?> && parents=mother"><span class="glyphicon glyphicon-new-window" style="font-size:30px;color:red" title="Click For View Profile"></span></a>
				</div>
		</div>
	</div>

	<div class="col-md-1"></div>
</div>

<?php include "inc/footer.php";?>