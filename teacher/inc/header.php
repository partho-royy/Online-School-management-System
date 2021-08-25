<?php

	$id=$_SESSION['teacher_id'];
	$teacher_name=$_SESSION['teacher_name'];
	$teacher_image=$_SESSION['teacher_image']

?>
<!Doctype html>
<html>
	<head>
		<title>Teacher Panel</title>
		<link rel="stylesheet" type="text/css"  href="css/style.css"/>
		<!--Bootstarp Style Js-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!---->
				<link rel="shortcut icon" href="favicon.ico">
	<!-- food icons -->
	<link rel="stylesheet" type="text/css" href="css/organicfoodicons.css" />
	<!-- demo styles -->
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<!-- menu styles -->
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<script src="js/modernizr-custom.js"></script>
			<!---->
			<!--Bootstarp Style js-->
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
			<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<style>
		.<?php echo $today = date("D");?>{
			background:green;
			color:white;
		}
		<?php
			$year=date("Y");
			$css_query="select * from report where subject_id='$subject' and year='$year' and examName='$examName'";
			$css_result=$connect->query($css_query);
		?>
		<?php if($css_result){?>
		<?php while($css_row=$css_result->fetch_assoc()){?>
		<?php echo " .abc".$css_row['student_id'];?>{
				pointer-events: none;
			  cursor: not-allowed;
			  opacity: 0.65;
			  filter: alpha(opacity=65);
			  -webkit-box-shadow: none;
			  box-shadow: none;
		}
		<?php }?>
		<?php }?>
	</style>
		
		<!--page loader-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<style>
		.no-js #loader { display: none;  }
		.js #loader { display: block; position: absolute; left: 100px; top: 0; }
		.se-pre-con {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url(../teacher/img/7gGg.gif) center no-repeat #fff;
		}
	</style>
		<script>
			$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
		</script>
	</head>
	<body>
		<div class="se-pre-con"></div>
		<div class="container-fluid">
			<div class="row header">
					<div class="col-md-3" align="center">
						<img src="images/logo.png" height="60px" width="200px"/>
					</div>
					<div class="col-md-3 heading" align="center">
						<p>Welcome To School Management System</p>
					</div>
					<div class="col-md-3 nav-icon" align="center">
						<a href="inbox.php"><button class="btn btn-primary nav-btn message-btn" type="button">
							
							<span class=" glyphicon glyphicon-envelope "></span> Messages <span class="badge">5</span>
						</button></a>
						<button class="btn btn-primary nav-btn" type="button">
							 <span class="glyphicon glyphicon-bell"></span> Notification <span class="badge">4</span>
						</button>
					</div>
					<div class="col-md-3 jk" align="center">
						<div class="col-md-3"></div>
						<div class="col-md-3 session-logo">
							<img src="../admin/<?php echo $teacher_image;?>" height="50" width="65" class="user-logo"/>
						</div>
						<div class="col-md-6 session-title">
							<p><?php echo $teacher_name;?></p>
							<span class="s-b">Teacher</span>
						</div>
					</div>
			</div>
		</div>
		<div class="container glyphicon-align-justify">
			<div class="row">
				<a class="hidee"><span class="glyphicon glyphicon-align-justify"></span></a>
			</div>
		</div>
	
		<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/custom.js"></script>
