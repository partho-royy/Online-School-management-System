<?php session_start();?>
<?php
	if(!isset($_SESSION['teacher_success'])){
		header('location:../index.php');
	}
?>
<?php
	$tid=$_SESSION['teacher_id'];
	$name=$_SESSION['teacher_name'];
?>
<?php
	$class=$_GET['class'];
	$section=$_GET['section'];
	$shift=$_GET['shift'];
	$examName=$_GET['examName'];
	$subject=$_GET['subject'];
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
	<div class="row">
		<div class="col-md-12">
			<hr>
				<h3>All Student From Class <font color="red"><?php echo $class;?></font>, Section <font color="red"><?php echo $section;?></font>, Shift <font color="red"><?php echo $shift;?></font>, Subject ID <font color="red"><?php echo $subject;?></font></h3>
			<hr>
		</div>
	</div>
	<div class="row">
			<div class="col-md-12">
				<table id="myTable">
		  <tr class="header">
			<th>SL</th>
			<th>Student Name</th>
			<th>Student Id</th>
			<th>Action</th>
		  </tr>
		  <?php
			$student_query="select * from student where class='$class' and section='$section' and shift='$shift'";
			$student_result=$connect->query($student_query);
		 ?>
		 <?php if($student_result){?>
		 <?php $i=1;?>
		 <?php while($student_row=$student_result->fetch_assoc()){?>
		  <tr class="abc<?php echo $student_row['student_id'];?>">
			<td><?php echo $i;?></td>
			<td><?php echo $student_row['name'];?></td>
			<td><?php echo $student_row['student_id'];?></td>
			<td><a target="_blank" class="btn btn-primary" href="submitGrade.php?id=<?php echo $student_row['student_id'];?>&& subject_id=<?php echo $subject;?> && examName=<?php echo $examName;?>" role="button">Submit grade</a></td>
		  </tr>
		  <?php $i++;?>
		 <?php }} ?>
		</table>
			</div>
		</div>

<?php include "inc/footer.php";?>