<?php session_start();?>
<?php
	if(!isset($_SESSION['teacher_success'])){
		header('location:../index.php');
	}
?>
<?php
	$id=$_SESSION['teacher_id'];
	$email=$_SESSION['teacher_email'];
	$notice_id=$_GET['id'];
	
	
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
	$query="select * from notice where id='$notice_id'";
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
			<span>at, <?php echo $result['date'];?></span><br><br>
			<p style="text-align: justify;"><?php echo $result['notice'];?></p>
		</div>
		<div class="col-md-1"></div>
	</div>
<?php include "inc/footer.php";?>