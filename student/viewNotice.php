<?php session_start();?>
<?php
	if(!isset($_SESSION['success'])){
		header('location:../index.php');
	}
	$id=$_SESSION['id'];
	$student_id=$_SESSION['student_id'];
	$image=$_SESSION['image'];
	
	$class=$_SESSION['class'];
	$section=$_SESSION['section'];
	$shift=$_SESSION['shift'];
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
	$gid=$_GET['id'];
	$query="select * from notice where id='$gid'";
	$result=$connect->query($query)->fetch_assoc();
?>
	<div class="row">
		<div class="col-md-12">
			<hr>
				<h3>Notice</h3>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10" style="background:#F0F0F0;padding-top:15px;">
			<strong>Posted By <font color="red">Admin</font></strong><br>
			<span>at, <?php echo $result['date'];?></span><br>
			<h3 style="text-align: justify;"><?php echo $result['heading'];?></h3><br>
			<p style="text-align: justify;"><?php echo $result['notice'];?></p>
		</div>
		<div class="col-md-1"></div>
	</div>
<?php include "inc/footer.php";?>