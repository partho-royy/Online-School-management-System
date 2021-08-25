<?php
	session_start();
?>
<?php
	if(!isset($_SESSION['admin_success'])){
		header('location:../index.php');
	}
?>
<?php include "../config/db.php";?><!--Database Connection-->
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
	<div class="row">
	<hr>
		<div class="col-md-4">
			
				<h3>All Exam List</h3>
			
		</div>
		<div class="col-md-6">
			
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="glyphicon glyphicon-plus"></span> Create Exam</button>
			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

			
			<form action="" method="post" style="margin-top:30px;margin-bottom:30px;">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-3">
								 <div class="form-group">
									<label for="formGroupExampleInput">Subject Name <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="subject">
										<option>Select Subject</option>
										<?php 
											$subject_query="select * from subject";
											$subject_result=$connect->query($subject_query);
										?>
										<?php if($subject_result){?>
										<?php while($subject_row=$subject_result->fetch_assoc()){?>
											<option value="<?php echo $subject_row['subject_id'];?>"><?php echo $subject_row['subject_name'];?> (<?php echo $subject_row['subject_id'];?>)</option>
										<?php }} ?>
									</select>
								 </div>
							</div>
							<div class="col-md-3">
								 <div class="form-group">
									<label for="formGroupExampleInput">Class <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="class">
										<option>Select Class</option>
										<?php 
											$class_query="select * from class";
											$class_result=$connect->query($class_query);
										?>
										<?php if($class_result){?>
										<?php while($class_row=$class_result->fetch_assoc()){?>
											<option value="<?php echo $class_row['name'];?>"><?php echo $class_row['name'];?></option>
										<?php }} ?>
									</select>
								 </div>
							</div>
							<div class="col-md-3">
								 <div class="form-group">
									<label for="formGroupExampleInput">Section <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="section">
										<option>Select Section</option>
										<?php 
											$section_query="select * from section";
											$section_result=$connect->query($section_query);
										?>
										<?php if($section_result){?>
										<?php while($section_row=$section_result->fetch_assoc()){?>
											<option value="<?php echo $section_row['name'];?>"><?php echo $section_row['name'];?></option>
										<?php }} ?>
									</select>
								 </div>
							</div>
							
							<div class="col-md-3">
								 <div class="form-group">
									<label for="formGroupExampleInput">Select Shift <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="shift" required>
										<?php
											$shift_query="select * from shift";
											$shift_result=$connect->query($shift_query)
										?>
										<option class="disabled">Select Shift</option>
										<?php if($shift_result){?>
										<?php while($shift_row=$shift_result->fetch_assoc()){?>
											<option value="<?php echo $shift_row['name'];?>"><?php echo $shift_row['name'];?></option>
										<?php } ?>
										<?php } ?>
									</select>
								 </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								 <div class="form-group">
									<label for="formGroupExampleInput">Start Time<font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="hour" required>
										<option class="disabled">Select Hour</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
									</select>
								 </div>
							</div>
							<div class="col-md-4">
								 <div class="form-group">
									<label for="formGroupExampleInput">Minute <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="minute" required>
										<option class="disabled">Select Minute</option>
											<option value="00">00</option>
											<option value="10">10</option>
											<option value="20">20</option>
											<option value="30">30</option>
											<option value="40">40</option>
											<option value="50">50</option>
									</select>
								 </div>
							</div>
							<div class="col-md-4">
								 <div class="form-group">
									<label for="formGroupExampleInput">Select Meridiem <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="meridiem" required>
										<option class="disabled">Select Meridiem</option>
											<option value="AM">AM</option>
											<option value="PM">PM</option>

									</select>
								 </div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-4">
								 <div class="form-group">
									<label for="formGroupExampleInput">Exam Duration <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="duration" required>
										<option class="disabled">Select Duration</option>
											<option value="1 Hour">1 Hour</option>
											<option value="1 Hour 30 Min">1 Hour 30 Min</option>
											<option value="2 Hour">2 Hour</option>
											<option value="2 Hour 30 Min">2 Hour 30 Min</option>
											<option value="3 Hour">3 Hour</option>
									</select>
								 </div>
							</div>
							<div class="col-md-4">
								 <div class="form-group">
									<label for="formGroupExampleInput">Exam Date <font color="red">*</font></label>
									<input type="date" class="form-control" id="formGroupExampleInput" name="date" required>
										
								 </div>
							</div>
							<div class="col-md-4">
								 <div class="form-group">
									<label for="formGroupExampleInput">Exam Name <font color="red">*</font></label>
									<input type="text" class="form-control" id="formGroupExampleInput" name="examName" required>
										
								 </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
									<input type="submit" class="form-control" id="formGroupExampleInput" name="submit" value="Create Exam">
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
			</form>
				

    </div>
  </div>
</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
	
			<?php //New exam  Add
				if(isset($_POST['submit'])){
					$subject=$_POST['subject'];
					$class=$_POST['class'];
					$section=$_POST['section'];
					$shift=$_POST['shift'];
					
					$hour=$_POST['hour'];
					$minute=$_POST['minute'];
					$meridiem=$_POST['meridiem'];
					
					$time=$hour.":".$minute.":".$meridiem;
					$duration=$_POST['duration'];
					$date=$_POST['date'];
					$examName=$_POST['examName'];
					
					$select_query="select * from exam where subject_id='$subject' and class='$class' and section='$section' and shift='$shift'";
					$select_result=$connect->query($select_query);
					$count=mysqli_num_rows($select_result);
					if($count==1){
						echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Already Exists"."</div>";
					}
					else{
						$insert_query="insert into exam (examName,subject_id,time,duration,date,class,section,shift) values('$examName','$subject','$time','$duration','$date','$class','$section','$shift')";
						$insert_result=$connect->query($insert_query);
						if($insert_query){
							echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."Routine Added Successfully"."</div>";
						}
						else{
							echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."There Is Some Problem"."</div>";
						}
					}
					
				}
			?>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php
				if(isset($_SESSION['delete_exam'])){
					echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Delete Successfull!"."</div>";
				}
			?>
			<?php
				if(isset($_SESSION['deleteall'])){
					echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Delete All Successfull!"."</div>";
				}
			?>
			
		<input type="text" id="myInput" class="myInput" onkeyup="myFunction()" placeholder="Search for Subject names.." title="Type in a name">
		<a href="deleteallroutine.php" onclick="return confirm('Are You Sure Want to Execute this Action?');"><button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-trash"></span> Delete All Routine</button></a>

		<table id="myTable">
		  <tr class="header">
			<th>Exam Name</th>
			<th> Subject ID</th>
			<th>Suject Name</th>
            <th>Date</th>
			<th>Duration</th>
			<th>Class</th>
			<th>Action</th>
		  </tr>
		  <?php //All subject Fetchees from database
			$select_subject="select * from exam";
			$select_subject_result=$connect->query($select_subject);
		  ?>
		  <?php if($select_subject_result){ ?>
		  <?php while($trow=$select_subject_result->fetch_assoc()){?>
		  <tr>
			<td><?php echo $trow['examName'];?></td>
			<td><?php echo $trow['subject_id'];?></td>
			<td>
			
				<?php
				$tid=$trow['subject_id'];
				$tquery="select * from subject where subject_id='$tid'";
				$tresult=$connect->query($tquery)->fetch_assoc();
				echo $tresult['subject_name'];
				?>
			
			
			</td>
			<td><?php echo $trow['date'];?> , <font color="red"><?php echo $trow['time'];?></font></td>
			<td><?php echo $trow['duration'];?></td>
			<td><?php echo $trow['class'];?> , <?php echo $trow['section'];?> , <?php echo $trow['shift'];?></td>
			
			
			<td><a onclick="return confirm('Are You sure want to Delete?');" href="deleteexam.php?id=<?php echo $trow['id'];?>" title="Delete Routine"><span class="glyphicon glyphicon-trash"></span></a></td>
		  </tr>
		  <?php } ?>
		  <?php } ?>
		</table>
	</div>
</div>
		<!--View Student Modal-->

		<!--Edit student Modal-->
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function printFunction() {
  $("#div3").addClass("printable");
    window.print();
}
</script>
	</div>








<?php unset($_SESSION['delete_exam']);?>
<?php unset($_SESSION['deleteall']);?>


<?php include "inc/footer.php";?>