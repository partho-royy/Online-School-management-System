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
<?php
	$query="select * from notice where audience='teacher' or audience='all' order by id desc";
	$result=$connect->query($query);
?>
	<div class="row">
		<div class="col-md-12">
			<hr>
				<h3>ALL Notice</h3>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10" style="background:#F0F0F0;padding-top:15px;">
			<ul class="list-group">
				<?php if($result){?>
				<?php $i=1;?>
				<?php while($row=$result->fetch_assoc()){?>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
									<span><?php echo $i;?> ) <?php echo substr($row['heading'],0,80);?> [..] ,<font color="red">Posted at</font> <?php echo $row['date'];?> </span>
									<a href="viewNotice.php?id=<?php echo $row['id'];?>"><span class="badge badge-primary badge-pill"> <span class="glyphicon glyphicon-eye-open"></span> view</span></a>
								  </li>
								  <?php $i++;?>
				<?php }} ?>
			</ul>
		</div>
		<div class="col-md-1"></div>
	</div>
<?php include "inc/footer.php";?>