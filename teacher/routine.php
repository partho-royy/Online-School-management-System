<?php session_start();?>
<?php
	if(!isset($_SESSION['teacher_success'])){
		header('location:../index.php');
	}
?>
<?php
	$id=$_SESSION['teacher_id'];
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
	<div class="row">
		<div class="col-md-12">
			<hr>
				<h3>Class Routine</h3>
			<hr>
		</div>
	</div>
	<div class="row" id="routine_print">
		<div class="col-md-12">
			<table border="1" width="100%" >
				<tr class="Sat">
					<th>Satur Day</th>
					<?php
						$sat_query="select * from routine where day='sat' and teacher_id='$id'";
						$sat_result=$connect->query($sat_query);
					?>
					<?php if($sat_result){?>
					<?php while($sat_row=$sat_result->fetch_assoc()){?>
					<th>
						<?php echo "Class :".$sat_row['class_id']."<br>"."Sec :".$sat_row['section']."<br>"."Shift :".$sat_row['shift']."<br>"."Time :".$sat_row['time']?>
					</th>
					<?php }} ?>
				</tr>
				
				<tr class="Sun">
					<th>Sun Day</th>
					<?php
						$sun_query="select * from routine where day='Sun' and teacher_id='$id'";
						$sun_result=$connect->query($sun_query);
					?>
					<?php if($sun_result){?>
					<?php while($sun_row=$sun_result->fetch_assoc()){?>
					<th>
						<?php echo "Class :".$sun_row['class_id']."<br>"."Sec :".$sun_row['section']."<br>"."Shift :".$sun_row['shift']."<br>"."Time :".$sun_row['time']?>
					</th>
					<?php }} ?>
				</tr>
				<tr class="Mon">
					<th>Mon Day</th>
					<?php
						$mon_query="select * from routine where day='Mon' and teacher_id='$id'";
						$mon_result=$connect->query($mon_query);
					?>
					<?php if($mon_result){?>
					<?php while($mon_row=$mon_result->fetch_assoc()){?>
					<th>
						<?php echo "Class :".$mon_row['class_id']."<br>"."Sec :".$mon_row['section']."<br>"."Shift :".$mon_row['shift']."<br>"."Time :".$mon_row['time']?>
					</th>
					<?php }} ?>
				</tr>
				<tr class="Tue">
					<th>Tues Day</th>
					<?php
						$tue_query="select * from routine where day='Tue' and teacher_id='$id'";
						$tue_result=$connect->query($tue_query);
					?>
					<?php if($tue_result){?>
					<?php while($tue_row=$tue_result->fetch_assoc()){?>
					<th>
						<?php echo "Class :".$tue_row['class_id']."<br>"."Sec :".$tue_row['section']."<br>"."Shift :".$tue_row['shift']."<br>"."Time :".$tue_row['time']?>
					</th>
					<?php }} ?>
				</tr>
				<tr class="Wed">
					<th>Wedness Day</th>
					<?php
						$wed_query="select * from routine where day='Wed' and teacher_id='$id'";
						$wed_result=$connect->query($wed_query);
					?>
					<?php if($wed_result){?>
					<?php while($wed_row=$wed_result->fetch_assoc()){?>
					<th>
						<?php echo "Class :".$wed_row['class_id']."<br>"."Sec :".$wed_row['section']."<br>"."Shift :".$wed_row['shift']."<br>"."Time :".$wed_row['time']?>
					</th>
					<?php }} ?>
				</tr>
				<tr class="Thu">
					<th>Thus Day</th>
					<?php
						$thu_query="select * from routine where day='Thu' and teacher_id='$id'";
						$thu_result=$connect->query($thu_query);
					?>
					<?php if($thu_result){?>
					<?php while($thu_row=$thu_result->fetch_assoc()){?>
					<th>
						<?php echo "Class :".$thu_row['class_id']."<br>"."Sec :".$thu_row['section']."<br>"."Shift :".$thu_row['shift']."<br>"."Time :".$thu_row['time']?>
					</th>
					<?php }} ?>
				</tr>
				<tr class="Fri">
					<th>Fri Day</th>
					
					
					<th colspan="3">
						No Class Today
					</th>
					
				</tr>
			</table>
		</div>
	</div>
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
<?php include "inc/footer.php";?>