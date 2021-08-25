<?php session_start();?>
<?php
	if(!isset($_SESSION['parent_success'])){
		header('location:../index.php');
	}
	
	$id=$_SESSION['id'];
	$name=$_SESSION['name'];
	$phone=$_SESSION['phone'];
	$childrean=$_SESSION['childrean'];
	$parents_id=$_SESSION['parents_id'];
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
							<?php
								$student_count="select * from student where alumni='0' and status='1'";
								$student_count_result=$connect->query($student_count);
								$student_count= mysqli_num_rows($student_count_result);
							?>
							<h4><?php echo $student_count;?></h4>
							<h3 align="right"><span class="glyphicon glyphicon-education"></span> Student</h3>
						</a>
					</div>
					<div class="col-md-3 ibox">
						<a href="#" class="thumbnail d-thumbnail">
							<h4>06</h4>
							<h3 align="right"><span class="glyphicon glyphicon-bookmark"></span> Parents</h3>
						</a>
					</div>
					<div class="col-md-3 ibox">
						<a href="allTeacher.php" class="thumbnail d-thumbnail">
							<h4>10</h4>
							<h3 align="right"><span class="glyphicon glyphicon-user"></span> Teachers</h3>
						</a>
					</div>
					<div class="col-md-3 ibox">
						<a href="#" class="thumbnail d-thumbnail">
							<h4>15</h4>
							<h3 align="right"><span class="glyphicon glyphicon-briefcase"></span> School Staffs</h3>
						</a>
					</div>
				</div>
				<hr><hr>
				
				<div class="row">
					<div class="col-md-6">
					<?php 
						$childrean="select * from student where father_id='$parents_id' or mother_id='$parents_id'";
						$childrean_result=$connect->query($childrean);
					?>
					<?php if($childrean_result){?>
					<?php $i=1;?>
					<?php while($crow=$childrean_result->fetch_assoc()){?>
					<a href="viewDetails.php?student_id=<?php echo $crow['student_id'];?> && class_id=<?php echo $crow['class'];?> && section=<?php echo $crow['section'];?> && shift=<?php echo $crow['shift'];?>" class="children-box-a" style="text-decoration:none;color:black;" title="Click For View Details">
						<div class="children-box" style="background:#E4E4E4;">
							<h3>My Children (<?php echo $i;?>)</h3
							<hr>
							<div class="row">
								<div class="col-md-4">
									<img src="../admin/<?php echo $crow['student_photo'];?>" height="170" width="150">
								</div>
								<div class="col-md-8">
									<table width="300" height="178">
										<tr>
											<th>Name :</th>
											<th><?php echo $crow['name'];?></th>
										<tr>
										<tr>
											<th>Gender :</th>
											<th><?php echo $crow['gender'];?></th>
										<tr>
										
										<tr>
											<th>Student Id :</th>
											<th><?php echo $crow['student_id'];?></th>
										<tr>
										<tr>
											<th>Admission Date :</th>
											<th><?php echo $crow['admission_date'];?></th>
										<tr><tr>
											<th>Class :</th>
											<th><?php echo $crow['class'];?></th>
										<tr><tr>
											<th>Section :</th>
											<th><?php echo $crow['section'];?></th>
										<tr><tr>
											<th>Shift :</th>
											<th><?php echo $crow['shift'];?></th>
										<tr>
									</table>
								</div>
							</div>
						</div>
						</a>
						<?php $i++;?>
					<?php }} ?>
					</div>
					<div class="col-md-6 ">
						<h3>Notice Board</h3>
						<hr>
						<div class="student-notice-box" style="background-color:#F6F6F6;overflow:hidden;">
							<?php
								$notice_query="select * from notice where audience='parents' or audience='all' limit 5";
								$notice_result=$connect->query($notice_query);
							?>
							<?php if($notice_result){?>
							<?php while($notice_row=$notice_result->fetch_assoc()){?>
							<div class="student-notice-row">
								<span><?php echo $notice_row['date'];?></span>
								<p><strong>Created By</strong> at<font color="red"> Admin</font></p>
								<h5 style="text-align:justify;"><?php echo $notice_row['heading'];?></h5>
							</div>
							<div class="nb"></div>
							<?php }}?>
						</div>
						<h3>All Expense</h3>
						<hr>
						<div class="student-result-box">
							<table class="table">
							  <thead>
								<tr>
								  <th scope="col">Exam Name</th>
								  <th scope="col">Subject</th>
								  <th scope="col">Grade</th>
								  <th scope="col">Number</th>
								  <th scope="col">Date</th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
								  <td>Mid Term</td>
								  <td>Bangla</td>
								  <td>A+</td>
								  <td>95</td>
								  <td>15/02/19</td>
								</tr><tr>
								  <td>Mid Term</td>
								  <td>Bangla</td>
								  <td>A+</td>
								  <td>95</td>
								  <td>15/02/19</td>
								</tr><tr>
								  <td>Mid Term</td>
								  <td>Bangla</td>
								  <td>A+</td>
								  <td>95</td>
								  <td>15/02/19</td>
								</tr><tr>
								  <td>Mid Term</td>
								  <td>Bangla</td>
								  <td>A+</td>
								  <td>95</td>
								  <td>15/02/19</td>
								</tr><tr>
								  <td>Mid Term</td>
								  <td>Bangla</td>
								  <td>A+</td>
								  <td>95</td>
								  <td>15/02/19</td>
								</tr><tr>
								  <td>Mid Term</td>
								  <td>Bangla</td>
								  <td>A+</td>
								  <td>95</td>
								  <td>15/02/19</td>
								</tr>
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

					
				