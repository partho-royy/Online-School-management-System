<?php session_start();?>
<?php
	if(!isset($_SESSION['success'])){
		header('location:../index.php');
	}
	$class=$_SESSION['class'];
	$section=$_SESSION['section'];
	$shift=$_SESSION['shift'];
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
	<div class="row">
		<div class="col-md-12">
			<hr>
				<h3>Exam Routine</h3>
			<hr>
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
						<?php
							$examName_query="select * from exam where class='$class' and section='$section' and shift='$shift'";
							$examName_query_result=$connect->query($examName_query);
						?>
						<?php if($examName_query_result){?>
						<?php while($examName_row=$examName_query_result->fetch_assoc()){?>
						<option value="<?php echo $examName_row['examName'];?>"><?php echo $examName_row['examName'];?></option>
						<?php }} ?>
					</select>
				  </div>
				  <div class="form-group">
					<input type="submit" name="submit" class="form-control" value="View Routine"/>
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
			<th>Duration</th>
			<th>Date</th>
			<th>Time</th>
		  </tr>
		  <?php
			if(isset($_POST['submit'])){
				$examName=$_POST['examName'];
			
		  ?>
		  <?php
			$allexamQuery="select * from exam where class='$class' and section='$section' and shift='$shift' and examName='$examName'";
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
			<td><?php echo $allexam_row['duration'];?></td>
			<td><?php echo $allexam_row['date'];?></td>
			<td><?php echo $allexam_row['time'];?></td>
		  </tr>
		  
			<?php } ?>
			<?php } ?>
			<?php } ?>
			
		</table>
		<button onclick="printDiv('routine_print')">Print Routine</button>
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
<?php include "inc/footer.php";?>
					