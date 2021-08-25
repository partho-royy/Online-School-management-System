<?php
	session_start();
?>
<?php
	if(!isset($_SESSION['admin_success'])){
		header('location:../index.php');
	}
?>

<?php include "../config/db.php";?><!--Database Connection-->
<?php include "inc/header.php";?><!--Call header Section from inc root folder-->
<?php include "inc/sidebar.php";?><!--Call Sidebar Section from inc root folder-->

	<?php
		$year=$_GET['year'];
		$class=$_GET['class'];
		$section=$_GET['section'];
		$shift=$_GET['shift'];
	?>
	<div class="row">
		<div class="col-md-12">
			<hr>
				<h3>All Student List of <font color="red"> <?php echo $year;?></font> From Class <font color="red"><?php echo $class;?> </font>of <font color="red"><?php echo $section;?> </font>Section of <font color="red"><?php echo $shift;?> </font>Shift </h3>
			<hr>
		</div>
		
	</div>
	
	<?php
		$query="select * from student where class='$class' and section='$section' and shift='$shift'";
		$result=$connect->query($query);
	?>
	<div class="row">
		<div class="col-md-12">
		<table id="myTable">
		  <tr class="header">
			<th>Name</th>
			<th>Student Id</th>
			<th>Class</th>
			<th>Section</th>
			<th>Shift</th>
			<th>Roll</th>
			<th>Action</th>
		  </tr>
		  <?php if($result){?>
		  <?php while($row=$result->fetch_assoc()){?>
		  <tr>
		  
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['student_id'];?></td>
			<td><?php echo $row['class'];?></td>
			<td><?php echo $row['section'];?></td>
			<td><?php echo $row['shift'];?></td>
			<td><?php echo $row['roll'];?></td>
			<td><a href="updateClass.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-success">Migrate</button><a></td></td>
	
		  </tr>
		 	  <?php } ?>
		  <?php } ?>
		</table>
	</div>
</div>

<?php include "inc/footer.php";?><!--Call Sidebar Section from inc root folder-->