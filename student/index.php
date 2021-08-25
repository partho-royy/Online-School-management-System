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
				<div class="row">
					<div class="col-md-12">
						<h2>Dashboard</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 ibox">
						<a href="allStudent.php" class="thumbnail d-thumbnail">
							<h4>12</h4>
							<h3 align="right"><span class="glyphicon glyphicon-calendar"></span> Exam</h3>
						</a>
					</div>
					<div class="col-md-3 ibox">
						<a href="#" class="thumbnail d-thumbnail">
							<h4>৳ 05556</h4>
							<h3 align="right"><span class=""></span>৳  Due Fees</h3>
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
				<?php
				
					$info_query="select * from student where id='$id' and student_id='$student_id'";
					$info_result=$connect->query($info_query)->fetch_assoc();
				?>
				<hr><hr>
				<div class="row">
					<div class="col-md-6">
						<h3>My Information</h3>
						<hr/>
							<div class="row information" style="">
								<div class="col-md-4">
									<div class="imagesec">
										<img src="../admin/<?php echo $image;?>" height="100" width="120"/>
									</div>
								</div>
								<div class="col-md-8 detailssec">
									<table width="300px;" height="400px">
										<tr style="">
											<th>Name :</th>
											<th><?php echo $info_result['name'];?></th>
										</tr>
										<tr>
											<th>Gender :</th>
											<th><?php echo $info_result['gender'];?></th>
										</tr>
										<tr>
											<th>Father Name :</th>
											<th><?php echo $info_result['father_name'];?></th>
										</tr>
										<tr>
											<th>Mother  Name :</th>
											<th><?php echo $info_result['mother_name'];?></th>
										</tr>
										<tr>
											<th>Date of Birth :</th>
											<th><?php echo $info_result['dob'];?></th>
										</tr>
										<tr>
											<th>Father Occupation :</th>
											<th><?php echo $info_result['father_job'];?></th>
										</tr>
										<tr>
											<th>Religion :</th>
											<th><?php echo $info_result['religion'];?></th>
										</tr>
										<tr>
											<th>Email :</th>
											<th><?php echo $info_result['email'];?></th>
										</tr>
										<tr>
											<th>Admission Date :</th>
											<th><?php echo $info_result['admission_date'];?></th>
										</tr>
										<tr>
											<th>Class :</th>
											<th><?php echo $info_result['class'];?></th>
										</tr>
										<tr>
											<th>Section :</th>
											<th><?php echo $info_result['section'];?></th>
										</tr>
										<tr>
											<th>Shift :</th>
											<th><?php echo $info_result['shift'];?></th>
										</tr>
										
										<tr>
											<th>Phone :</th>
											<th><?php echo $info_result['phone'];?></th>
										</tr>
									</table>
								</div>
							</div>
					</div>
					
					<div class="col-md-6" >
						<h3>Notice Board</h3>
						<hr>
						<div class="student-notice-box" style="background-color:#F6F6F6;overflow:hidden;">
						<?php 
							$select_notice="select * from notice where audience='student' or audience='all' order by id desc limit 4";
							$notice_result=$connect->query($select_notice);
						?>
						<?php if($notice_result){?>
						<?php while($notice_row=$notice_result->fetch_assoc()){?>
							<div class="student-notice-row">
								<span><?php echo $notice_row['date'];?></span>
								<p>Published By<strong><font color="red"> <?php echo $notice_row['submitted_by'];?></font></p>
								<h5 style="text-align:justify;"><?php echo substr($notice_row['heading'],0,200);?> <a href="viewNotice.php?id=<?php echo $notice_row['id'];?>">[more..]</a></h5>
							</div>
							<div class="nb" style="border-bottom:1px solid black;"></div>
						<?php } ?>
						<?php } ?>
							<p><a href="allNotice.php">View All Notice</a></p>
						</div>
						<h3>Class Routine</h3>
						<hr>
						<div class="student-result-box">
							<table class="table">
							  <thead>
								<tr>
								  <th scope="col">SL</th>
								  <th scope="col">Subject</th>
								  <th scope="col">Day</th>
								  <th scope="col">Time</th>
								</tr>
							  </thead>
							  <tbody>
							  <?php
								$routine_query="select *from routine where class_id='$class' and shift='$shift' and section='$section'";
								$routine_result=$connect->query($routine_query);
							 ?>
							 <?php if($routine_result){?>
							 <?php $i=1;?>
							 <?php while($routine_row=$routine_result->fetch_assoc()){?>
								<tr>
								  <td><?php echo $i;?></td>
								  <td><?php echo $routine_row['subject_id'];?></td>
								  <td><?php echo $routine_row['day'];?></td>
								  <td><?php echo $routine_row['time'];?></td>
								  
								</tr>
								<?php $i++;?>
							 <?php }?>
							 <?php }?>
							  </tbody>
							</table>
						</div>
					</div>
				</div>
	<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
//income and expense ratio
window.onload = function () {

var options = {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Income & Expense Ratio in this Year"
	},
	subtitles: [{
		text: ""
	}],
	axisX: {
		title: "States"
	},
	axisY: {
		title: "Income in TK",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC",
		includeZero: false
	},
	axisY2: {
		title: "Expense In Tk",
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E",
		includeZero: false
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "spline",
		name: "Income",
		showInLegend: true,
		xValueFormatString: "MMM YYYY",
		yValueFormatString: "#,##0 Units",
		dataPoints: [
			{ x: new Date(2019, 0, 1),  y: 10220 },
			{ x: new Date(2019, 1, 1), y: 10235 },
			{ x: new Date(2019, 2, 1), y: 10244 },
			{ x: new Date(2019, 3, 1),  y: 10203 },
			{ x: new Date(2019, 4, 1),  y: 63093 },
			{ x: new Date(2019, 5, 1),  y: 14529 },
			{ x: new Date(2019, 6, 1), y: 14453 },
			{ x: new Date(2019, 7, 1), y: 15146 },
			{ x: new Date(2019, 8, 1),  y: 14522 },
			{ x: new Date(2019, 9, 1),  y: 12506 },
			{ x: new Date(2019, 10, 1),  y: 15837 },
			{ x: new Date(2019, 11, 1), y: 14252 }
		]
	},
	{
		type: "spline",
		name: "Expense",
		axisYType: "secondary",
		showInLegend: true,
		xValueFormatString: "MMM YYYY",
		yValueFormatString: "৳#,##0.#",
		dataPoints: [
			{ x: new Date(2019, 0, 1),  y: 19034.5 },
			{ x: new Date(2019, 1, 1), y: 20015 },
			{ x: new Date(2019, 2, 1), y: 27342 },
			{ x: new Date(2019, 3, 1),  y: 20088 },
			{ x: new Date(2019, 4, 1),  y: 20234 },
			{ x: new Date(2019, 5, 1),  y: 29034 },
			{ x: new Date(2019, 6, 1), y: 30487 },
			{ x: new Date(2019, 7, 1), y: 32523 },
			{ x: new Date(2019, 8, 1),  y: 20234 },
			{ x: new Date(2019, 9, 1),  y: 27234 },
			{ x: new Date(2019, 10, 1),  y: 33548 },
			{ x: new Date(2019, 11, 1), y: 32534 }
		]
	}]
};
$("#chartContainer").CanvasJSChart(options);

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}
//income and expense ratio
</script>
			
<?php include "inc/footer.php";?>
					
				