<?php session_start();?>
<?php
	if(!isset($_SESSION['teacher_success'])){
		header('location:../index.php');
	}
?>
<?php
	$id=$_SESSION['teacher_id'];
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
	<div class="row">
		<div class="col-md-12">
			<hr>
				<h3>Select Details</h3>
			<hr>
		</div>
	</div>
	<div class="row">
			<div class="col-md-12">
				<form method="GET" action="studentList.php">
				  <div class="form-row">
					<div class="form-group col-md-4">
						<?php
							$class="select * from class";
							$class_result=$connect->query($class);
						?>
					  <label for="inputEmail4">Class</label>
					  <select id="inputState" class="form-control" name="class">
						<option selected>Choose...</option>
						<?php if($class_result){?>
						<?php while($class_row=$class_result->fetch_assoc()){?>
							<option value="<?php echo $class_row['name'];?>"><?php echo $class_row['name'];?></option>
						<?php } ?>
						<?php } ?>
					  </select>
					</div>
					<div class="form-group col-md-4">
						<?php
							$section="select * from section";
							$section_result=$connect->query($section);
						?>
					  <label for="inputPassword4">Section</label>
					  <select id="inputState" class="form-control" name="section">
						<option selected>Choose...</option>
					  <?php if($section_result){?>
					  <?php while($section_row=$section_result->fetch_assoc()){?>
						<option value="<?php echo $section_row['name'];?>"><?php echo $section_row['name'];?></option>
					  <?php } ?>
					  <?php } ?>
					  </select>
					</div>
					<div class="form-group col-md-4">
					<?php
							$shift="select * from shift";
							$shift_result=$connect->query($shift);
						?>
					  <label for="inputCity">Shift</label>
					  <select id="inputState" class="form-control" name="shift">
						<option selected>Choose...</option>
						<?php if($shift_result){?>
					  <?php while($shift_row=$shift_result->fetch_assoc()){?>
						<option value="<?php echo $shift_row['name'];?>"><?php echo $shift_row['name'];?></option>
						<?php }} ?>
					  </select>
					</div>
				  </div>
				  
				 
				  <div class="form-row">
					<div class="form-group col-md-6">
					  <label for="inputCity">Exam Name</label>
					  <select id="inputState" class="form-control" name="examName" required>
							<option>Choose..</option>
							<option value="Class Test (1)">Class Test (1)</option>
							<option value="Class Test (2)">Class Test (2)</option>
							<option value="Class Test (3)">Class Test (3)</option>
							<option value="Mid Term (1)">Mid Term (1)</option>
							<option value="Mid Term (2)">Mid Term (2)</option>
							<option value="Final Exam">Final Exam</option>
					  </select>
					</div>
					<div class="form-group col-md-6">
					  <label for="inputState">Subject</label>
					  <select id="inputState" class="form-control" name="subject">
						<option selected>Choose...</option>
						<?php 
							$subject="select * from subject";
							$subject_result=$connect->query($subject);
						?>
						<?php if($subject_result){?>
						<?php while($subject_row=$subject_result->fetch_assoc()){?>
						<option value="<?php echo $subject_row['subject_id'];?>"><?php echo $subject_row['subject_name'];?> ( <?php echo $subject_row['subject_id'];?>)</option>
						<?php }} ?>
					  </select>
					</div>
					
				  </div>
					<div class="form-row">
						<div class="form-group  col-md-6">
						<button type="submit" class="btn btn-primary">Search</button>
					</div>
					</div>
				</form>
			</div>
		</div>
	
<?php include "inc/footer.php";?>