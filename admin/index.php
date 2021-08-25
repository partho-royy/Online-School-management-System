<?php
	session_start();
?>
<?php
	if(!isset($_SESSION['admin_success'])){
		header('location:../index.php');
	}
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
								$student_count="select * from student where alumni='0'";
								$student_count_result=$connect->query($student_count);
								$student_count= mysqli_num_rows($student_count_result);
							?>
							<h4><?php echo $student_count;?></h4>
							<h3 align="right"><span class="glyphicon glyphicon-education"></span> Student</h3>
						</a>
					</div>
					<div class="col-md-3 ibox">
						<a href="allParents.php" class="thumbnail d-thumbnail">
							<!--parent Number Count-->
								<?php
									$mother_query="select * from mother";
									$mother_result=$connect->query($mother_query);
									$mother_count=mysqli_num_rows($mother_result);
									
									$father_query="select * from father";
									$father_result=$connect->query($father_query);
									$father_count=mysqli_num_rows($father_result);
									$total=$mother_count + $father_count;
								?>
							<!--parent Number Count-->
							<h4><?php echo $total;?></h4>
							<h3 align="right"><span class="glyphicon glyphicon-bookmark"></span> Parents</h3>
						</a>
					</div>
					<div class="col-md-3 ibox">
						<a href="allTeacher.php" class="thumbnail d-thumbnail">
							<!--teacher count-->
								<?php
									$teacher_query="select * from teacher";
									$teacher_result=$connect->query($teacher_query);
									$teacher_count=mysqli_num_rows($teacher_result);
								?>
							<!--teacher count-->
							<h4><?php echo $teacher_count;?></h4>
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
				
				<div class="row">
					<div class="col-md-3 ibox">
						<a href="#" class="thumbnail d-thumbnail">
							<h4><span class="glyphicon glyphicon-wrench"></span></h4>
							<h3 align="right">Management Tools</h3>
						</a>
					</div>
					<div class="col-md-3 ibox">
						<a href="#" class="thumbnail d-thumbnail">
							<h4>06</h4>
							<h3 align="right"><span class="glyphicon glyphicon-bookmark"></span>Parents</h3>
						</a>
					</div>
					<div class="col-md-3 ibox">
						<a href="#" class="thumbnail d-thumbnail">
							<h4>10</h4>
							<h3 align="right"><span class="glyphicon glyphicon-user"></span>Teachers</h3>
						</a>
					</div>
					<div class="col-md-3 ibox">
						<a href="#" class="thumbnail d-thumbnail">
							<h4>15</h4>
							<h3 align="right"><span class="glyphicon glyphicon-briefcase"></span>School Staffs</h3>
						</a>
					</div>
				</div>
				<hr><hr>
				<div class="row">
					<div class="col-md-6">
						<div id="chartContainer" style="height: 300px; width: 100%;"></div>
					</div>
					
					<div class="col-md-6 " style="text-align:center;background:#F0F0F0;">
						<div class="col-md-6">
							<div class="card" style="width: 18rem;">
							  <div class="card-header">
								<h4>Notice</h4>
							  </div>
							  <ul class="list-group list-group-flush">
								<li class="list-group-item">Notice Will Be here</li>
								<li class="list-group-item">Notice Will Be here</li>
								<li class="list-group-item">Notice Will Be here</li>
								<li class="list-group-item">Notice Will Be here</li>
								<li class="list-group-item">Notice Will Be here</li>
		
							  </ul>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card" style="width: 18rem;">
							  <div class="card-header">
								<h4>Event</h4>
							  </div>
							  <ul class="list-group list-group-flush">
								<li class="list-group-item">Event Will Be here</li>
								<li class="list-group-item">Event Will Be here</li>
								<li class="list-group-item">Event Will Be here</li>
								<li class="list-group-item">Event Will Be here</li>
								<li class="list-group-item">Event Will Be here</li>
		
							  </ul>
							</div>
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

					
				