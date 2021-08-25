<?php session_start();?>
<?php
	if(!isset($_SESSION['teacher_success'])){
		header('location:../index.php');
	}
?>
<?php
				$id=$_SESSION['teacher_id'];
				$name=$_SESSION['teacher_name'];
				$address=$_SESSION['teacher_address'];
				$qualification=$_SESSION['teacher_qualification'];
				$email=$_SESSION['teacher_email'];
				$gender=$_SESSION['teacher_gender'];
				$image=$_SESSION['teacher_image'];
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>	
				<div class="row">
					<div class="col-md-12">
						<h2>Dashboard</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 ibox">
						<a href="routine.php" class="thumbnail d-thumbnail">
							<h4>.</h4>
							<h3 align="right"><span class="glyphicon glyphicon-calendar"></span> Class Routine</h3>
						</a>
					</div>
					<div class="col-md-3 ibox">
						<a href="grade.php" class="thumbnail d-thumbnail">
							<h4>.</h4>
							<h3 align="right"><span class=""></span> Submit Grade</h3>
						</a>
					</div>
					<div class="col-md-3 ibox">
						<a href="allTeacher.php" class="thumbnail d-thumbnail">
							<h4>10</h4>
							<h3 align="right"><span class="glyphicon glyphicon-gift"></span> Event</h3>
						</a>
					</div>
					<div class="col-md-3 ibox">
						<a href="#" class="thumbnail d-thumbnail">
							<h4>15</h4>
							<h3 align="right"><span class=" glyphicon glyphicon-folder-open"></span>  Document</h3>
						</a>
					</div>
				</div>
				
				<hr><hr>
				<div class="row">
					<div class="col-md-6">
						<h3>My details</h3>
						<hr>
						<div class="row">
							<div class="col-md-6">
								<img src="../admin/<?php echo $image;?>" height="230" width="250">
							</div>
							<div class="col-md-6">
								<ul class="list-group">
								  <li class="list-group-item d-flex justify-content-between align-items-center">
									Name
									<span class="badge badge-primary badge-pill"><?php echo $name;?></span>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
									Email
									<span class="badge badge-primary badge-pill"><?php echo $email;?></span>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
									Address
									<span class="badge badge-primary badge-pill"><?php echo $address;?></span>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
									Qualification
									<span class="badge badge-primary badge-pill"><?php echo $qualification;?></span>
								  </li>
								  <li class="list-group-item d-flex justify-content-between align-items-center">
									Gender
									<span class="badge badge-primary badge-pill"><?php echo $gender;?></span>
								  </li>
								</ul>
							</div>
						</div>
						
					</div>
					<div class="col-md-6">
						<h3>Notice Board</h3>
						<hr>
						<div class="student-notice-box" style="background-color:#F6F6F6;overflow:hidden;padding:5px;">
						<?php 
							$select_notice="select * from notice where audience='teacher' or audience='all' order by id desc limit 4";
							$notice_result=$connect->query($select_notice);
						?>
						<?php if($notice_result){?>
						<?php while($notice_row=$notice_result->fetch_assoc()){?>
							<div class="student-notice-row">
								<span><b><?php echo $notice_row['date'];?></span>
								<p>Published By<strong><font color="red"> <?php echo $notice_row['submitted_by'];?></font></b></p>
								<h5 style="text-align:justify;"><?php echo substr($notice_row['heading'],0,100);?> <a href="viewNotice.php?id=<?php echo $notice_row['id'];?>">[more..]</a></h5>
							</div>
							<div class="nb" style="border-bottom:1px solid black;"></div>
						<?php } ?>
						<?php } ?>
							
						</div>
						<p><a href="allNotice.php">See all Notice</a></p>
					
					</div>
				</div>
	<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

			
<?php include "inc/footer.php";?>
					
				