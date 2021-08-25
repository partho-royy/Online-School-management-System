<?php session_start();?>
<?php
	if(!isset($_SESSION['teacher_success'])){
		header('location:../index.php');
	}
?>
<?php
	$id=$_SESSION['teacher_id'];
	$email=$_SESSION['teacher_email'];
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
	<div class="row">
		<div class="col-md-12">
			<hr>
				<h3>Change Password</h3>
			<hr>
		</div>
	</div>
	<?php
		if(isset($_POST['submit'])){
			$oldpass=$_POST['oldpass'];
			$newpass=$_POST['newpass'];
			$confirmpass=$_POST['confirmpass'];
			
			$id=$_SESSION['teacher_id'];
			$email=$_SESSION['teacher_email'];
			
			$has=md5($oldpass);
			$doublehas=md5($email.$has);
			
			$passquery="select * from teacher where password='$doublehas' and id='$id'";
			$passresult=$connect->query($passquery);
			$count=mysqli_num_rows($passresult);
			
			if($count==1){
				if($newpass == $confirmpass){
					
					$newhas=md5($newpass);
					$newDoublehas=md5($email.$newhas);
					$updatequery="UPDATE teacher SET password='$newDoublehas' where id='$id'";
					$updateresult=$connect->query($updatequery);
					echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."Password Change Successfully"."</div>";
				}
				else{
					echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."New password & Confirm Password is not matched !"."</div>";
				}
			}
			else{
				echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Old Password is not matched!"."</div>";
			}
		}
	?>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<form action="" method="post">
				<div class="form-group">
					<label for="formGroupExampleInput">Enter Old Password <font color="red">*</font></label>
					<input type="password" class="form-control" id="formGroupExampleInput" name="oldpass" placeholder="Enter Your Old password Here!" required >
				</div>
				<div class="form-group">
					<label for="formGroupExampleInput">Enter New Password <font color="red">*</font></label>
					<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" id="formGroupExampleInput" name="newpass" placeholder="Enter Your New password Here!" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
				</div>
				<div class="form-group">
					<label for="formGroupExampleInput">Enter Confirm Password <font color="red">*</font></label>
					<input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" id="formGroupExampleInput" name="confirmpass" placeholder="Enter Your Confirm password Here!" required >
				</div>
				<div class="form-group">
					<input type="submit" class="form-control" id="formGroupExampleInput" name="submit" value="Change Password" required >
				</div>
			</form>
		</div>
		<div class="col-md-1"></div>
	</div>
	
<?php include "inc/footer.php";?>