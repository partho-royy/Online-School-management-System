<?php session_start();?>
<?php
	if(!isset($_SESSION['parent_success'])){
		header('location:../index.php');
	}
		$student_id=$_GET['student_id'];
		$class=$_GET['class_id'];
		$section=$_GET['section'];
		$shift=$_GET['shift'];
	
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>	
				<div class="row">
					<div class="col-md-12">
					<hr>
						<h2>Student Details</h2>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<nav class="navbar navbar-inverse">
						  <ul class="nav navbar-nav">
							<li><a href="#">Class Routine</a></li>
							<li><a href="viewResult.php?student_id=<?php echo $student_id;?> && class_id=<?php echo $class;?> && section=<?php echo $section?> && shift=<?php echo $shift;?>">Results</a></li>
						  </ul>
						</nav>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10" id="routine_print">
						<table border="1" width="100%" >
				<tr class="Sat">
					<th>Satur Day</th>
					<?php
						$sat_query="select * from routine where day='sat' and class_id='$class' and shift='$shift' and section='$section'";
						$sat_result=$connect->query($sat_query);
					?>
					<?php if($sat_result){?>
					<?php while($sat_row=$sat_result->fetch_assoc()){?>
					<th>
						<?php echo "Subject :".$sat_row['subject_id']."<br>"."Time :".$sat_row['time'];?>
					</th>
					<?php }} ?>
				</tr>
				
				<tr class="Sun">
					<th>Sun Day</th>
					<?php
						$sun_query="select * from routine where day='Sun' and class_id='$class' and shift='$shift' and section='$section'";
						$sun_result=$connect->query($sun_query);
					?>
					<?php if($sun_result){?>
					<?php while($sun_row=$sun_result->fetch_assoc()){?>
					<th>
						<?php echo "Subject :".$sun_row['subject_id']."<br>"."Time :".$sun_row['time'];?>
					</th>
					<?php }} ?>
				</tr>
				<tr class="Mon">
					<th>Mon Day</th>
					<?php
						$mon_query="select * from routine where day='Mon' and class_id='$class' and shift='$shift' and section='$section'";
						$mon_result=$connect->query($mon_query);
					?>
					<?php if($mon_result){?>
					<?php while($mon_row=$mon_result->fetch_assoc()){?>
					<th>
						<?php echo "Subject :".$mon_row['subject_id']."<br>"."Time :".$mon_row['time'];?>
					</th>
					<?php }} ?>
				</tr>
				<tr class="Tue">
					<th>Tues Day</th>
					<?php
						$tue_query="select * from routine where day='Tue' and class_id='$class' and shift='$shift' and section='$section'";
						$tue_result=$connect->query($tue_query);
					?>
					<?php if($tue_result){?>
					<?php while($tue_row=$tue_result->fetch_assoc()){?>
					<th>
						 <?php echo "Subject :".$tue_row['subject_id']."<br>"."Time :".$tue_row['time'];?>
					</th>
					<?php }} ?>
				</tr>
				<tr class="wed">
					<th>Wedness Day</th>
					<?php
						$wed_query="select * from routine where day='Wed' and class_id='$class' and shift='$shift' and section='$section'";
						$wed_result=$connect->query($wed_query);
					?>
					<?php if($wed_result){?>
					<?php while($wed_row=$wed_result->fetch_assoc()){?>
					<th>
						<?php echo "Subject :".$wed_row['subject_id']."<br>"."Time :".$wed_row['time'];?>
					</th>
					<?php }} ?>
				</tr>
				<tr class="Thu">
					<th>Thus Day</th>
					<?php
						$thu_query="select * from routine where day='Thu' and class_id='$class' and shift='$shift' and section='$section'";
						$thu_result=$connect->query($thu_query);
					?>
					<?php if($thu_result){?>
					<?php while($thu_row=$thu_result->fetch_assoc()){?>
					<th>
						<?php echo "Subject :".$thu_row['subject_id']."<br>"."Time :".$thu_row['time'];?>
					</th>
					<?php }} ?>
				</tr>
				<tr class="Fri">
					<th>Fri Day</th>
					
					
					<th colspan="3">
						No Class Today
					</th>
					
				</tr>
								<button onclick="printDiv('routine_print')">Print Routine</button>
	<script>
		function printDiv(routine_print){
			var printContents = document.getElementById(routine_print).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>
			</table>
					</div>
					
					<div class="col-md-1"></div>
	
				</div>
				
			
<?php include "inc/footer.php";?>

					
				