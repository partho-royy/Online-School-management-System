<?php session_start();?>
<?php
	if(!isset($_SESSION['parent_success'])){
		header('location:../index.php');
	}
		$student_id=$_GET['student_id'];
		$class=$_GET['class_id'];
		$section=$_GET['section'];
		$shift=$_GET['shift'];
		
		$year=date("Y");
		$pyear=$year-1;
		$nyear=$year+1;
	
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>	
				<div class="row">
					<div class="col-md-12">
					<hr>
						<h2>Student Details</h2>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<nav class="navbar navbar-inverse">
						  <ul class="nav navbar-nav">
							<li><a href="viewDetails.php?student_id=<?php echo $student_id;?> && class_id=<?php echo $class;?> && section=<?php echo $section?> && shift=<?php echo $shift;?>">Class Routine</a></li>
							<li><a href="#">Results</a></li>
						  </ul>
						</nav>
					</div>
				</div>
				<div class="row">
		<div class="col-md-4" style="border-right:1px solid black;">
			<div class="">
				<form action="" method="post">
				  <div class="form-group">
					<label for="exampleInputPassword1">Select Exam</label>
					<select class="form-control" id="exampleInputPassword1" name="examName">
						<option>Select a Exam Name</option>
							<option value="Class Test (1)">Class Test (1)</option>
							<option value="Class Test (2)">Class Test (2)</option>
							<option value="Class Test (3)">Class Test (3)</option>
							<option value="Mid Term (1)">Mid Term (1)</option>
							<option value="Mid Term (2)">Mid Term (2)</option>
							<option value="Final Exam">Final Exam</option>
					</select>
				  </div>
				   <div class="form-group">
					<label for="exampleInputPassword1">Select Year</label>
					<select class="form-control" id="exampleInputPassword1" name="year">
						<option>Select a Year</option>
							<?php $year=date("Y");?>
							<option value="<?php echo $year;?>"><?php echo $year;?></option>
							<option value="<?php echo $year-1;?>"><?php echo $year-1;?></option>
							<option value="<?php echo $year-2;?>"><?php echo $year-2;?></option>
							<option value="<?php echo $year-3;?>"><?php echo $year-3;?></option>
						
					</select>
				  </div>
				  <div class="form-group">
					<input type="submit" name="submit" class="form-control" value="View Result"/>
				  </div>
				</form>
			</div>
		</div>
		<div class="col-md-8" id="routine_print">
			<table id="myTable">
		  <tr class="header">
			<th>Exam Name</th>
			<th>Subject ID</th>
			<th>Subject Name</th>
			<th>Total Number</th>
			<th>Mark Obtained</th>
		  </tr>
		  <?php
			if(isset($_POST['submit'])){
				$examName=$_POST['examName'];
				$year=$_POST['year'];
			
		  ?>
		  <?php
			$allexamQuery="select * from report where student_id='$student_id' and examName='$examName' and year='$year'";
			$allexamQuery_result=$connect->query($allexamQuery);
		  ?>
		  <?php if($allexamQuery_result){?>
		  <?php while($allexam_row=$allexamQuery_result->fetch_assoc()){?>
		  <tr>
			<td><?php echo $examName;?></td>
			<td><?php echo $allexam_row['subject_id'];?></td>
			<td>
				<?php
					$subject_id=$allexam_row['subject_id'];
					$subject_name="select * from subject where subject_id='$subject_id'";
					$subject_result=$connect->query($subject_name)->fetch_assoc();
					echo $subject_result['subject_name'];
				?>
			
			</td>
			<td><?php echo $allexam_row['total'];?></td>
			<td><?php echo $allexam_row['grade'];?></td>
			
		  </tr>
		  
			<?php } ?>
			<?php } ?>
			<?php } ?>
			
		</table>
		<button onclick="printDiv('routine_print')">Print Result</button>
	<script>
		function printDiv(routine_print){
			var printContents = document.getElementById(routine_print).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>
		</div>
		
	</div>
				
	<script>
		function printDiv(routine_print){
			var printContents = document.getElementById(routine_print).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>
			
<?php include "inc/footer.php";?>

					
				