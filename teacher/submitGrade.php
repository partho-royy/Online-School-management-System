<?php session_start();?>
<?php
	if(!isset($_SESSION['teacher_success'])){
		header('location:../index.php');
	}
?>
<?php
	$tid=$_SESSION['teacher_id'];
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
	<div class="row">
		<div class="col-md-12">
		<?php
			$examName=$_GET['examName'];
		?>
			<hr>
				<h3>Submit Grade (<?php echo $examName;?>)</h3>
			<hr>
		</div>
	</div>
	<?php
		if(isset($_POST['submit'])){
			
			$student_id=$_POST['student_id'];
			$subject_id=$_POST['subject_id'];
			$total=$_POST['total'];
			$grade=$_POST['grade'];
			$year=date('Y');
			
			$count_query="select * from report where subject_id='$subject_id' and student_id='$student_id' and examName='$examName' and year='$year'";
			$count_result=$connect->query($count_query);
			$count_row=mysqli_num_rows($count_result);
			if($count_row ==1){
				echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Already Exists"."</div>";
			}else{
			$insert_grade="insert into report (subject_id,student_id,total,grade,examName,year) values('$subject_id','$student_id','$total','$grade','$examName','$year')";
			$insert_result=$connect->query($insert_grade);
			echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."Successfully Submitted!"."</div>";
		}
		}
	
	?>
	<?php
		$student_id=$_GET['id'];
		$subject_id=$_GET['subject_id'];
		
		$student_query="select * from student where student_id='$student_id'";
		$student_result=$connect->query($student_query)->fetch_assoc();
	?>
	<div class="row">
		<div class="col-md-4">
		   <div class="card" style="width:100%">
			<img class="card-img-top" src="../admin/<?php echo $student_result['student_photo'];?>" alt="Card image" style="width:100%" height="370px">
		   </div>
		</div>
		<div class="col-md-6">
		  <div class="card" style="width:100%">
			
			<div class="card-body">
			  <form action="" method="POST">
				<div class="form-group">
					<label for="formGroupExampleInput">Student Name <font color="red">*</font></label>
					<input type="text" class="form-control" id="formGroupExampleInput" name="name" value="<?php echo $student_result['name'];?>" readonly required >
				</div>
				<div class="form-group">
					<label for="formGroupExampleInput">Student Id <font color="red">*</font></label>
					<input type="text" class="form-control" id="formGroupExampleInput" name="student_id" value="<?php echo $student_result['student_id'];?>" readonly required >
				</div>
				<div class="form-group">
					<label for="formGroupExampleInput">SUbject ID <font color="red">*</font></label>
					<input type="text" class="form-control" id="formGroupExampleInput" name="subject_id" value="<?php echo $subject_id;?>" readonly required >
				</div>
				<div class="row">
					<div class="col-md-6">
					<div class="form-group">
						<label for="formGroupExampleInput">Total Number <font color="red">*</font></label>
						<input type="text" class="form-control" id="formGroupExampleInput" name="total" value="100" required >
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
						<label for="formGroupExampleInput">Grade/Number <font color="red">*</font></label>
						<input type="text" class="form-control" id="formGroupExampleInput" name="grade" placeholder="example 85,86,87,88 etc." required >
					</div>
					</div>
				</div>
				<div class="form-group">
					
					<input type="submit" class="form-control" id="formGroupExampleInput" name="submit" value="Submit Grade" required >
				</div>
			  </form>
			</div>
		   </div>
		</div>
	</div>
<?php include "inc/footer.php";?>