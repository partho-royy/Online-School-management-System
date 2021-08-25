<?php session_start();?>
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
			
				<h3>All Class</h3>
			
		</div>
		<div class="col-md-6">
			
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="glyphicon glyphicon-plus"></span> Add Class</button>
			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

			
			<form action="" method="post" style="margin-top:30px;margin-bottom:30px;">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-6">
								 <div class="form-group">
									<label for="formGroupExampleInput">Subject Name <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="subject" required>
										<?php
											$s_query="select * from subject";
											$s_result=$connect->query($s_query)
										?>
										<option class="disabled">Select a Subject</option>
										<?php if($s_result){?>
										<?php while($s_row=$s_result->fetch_assoc()){?>
											<option value="<?php echo $s_row['subject_id'];?>"><?php echo $s_row['subject_name'];?> (<?php echo $s_row['subject_id'];?>)</option>
										<?php } ?>
										<?php } ?>
									</select>
								 </div>
							</div>
							<div class="col-md-6">
								 <div class="form-group">
									<label for="formGroupExampleInput">Class Name <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="class" required>
										<?php
											$c_query="select * from class";
											$c_result=$connect->query($c_query)
										?>
										<option class="disabled">Select a Class</option>
										<?php if($c_result){?>
										<?php while($c_row=$c_result->fetch_assoc()){?>
											<option value="<?php echo $c_row['name'];?>"><?php echo $c_row['name'];?></option>
										<?php } ?>
										<?php } ?>
									</select>
								 </div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								 <div class="form-group">
									<label for="formGroupExampleInput">Section Name <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="section" required>
										<?php
											$se_query="select * from section";
											$se_result=$connect->query($se_query)
										?>
										<option class="disabled">Select Section</option>
										<?php if($se_result){?>
										<?php while($se_row=$se_result->fetch_assoc()){?>
											<option value="<?php echo $se_row['name'];?>"><?php echo $se_row['name'];?></option>
										<?php } ?>
										<?php } ?>
									</select>
								 </div>
							</div>
							<div class="col-md-6">
								 <div class="form-group">
									<label for="formGroupExampleInput">Shift Name <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="shift" required>
										<?php
											$sh_query="select * from shift";
											$sh_result=$connect->query($sh_query)
										?>
										<option class="disabled">Select a Shift</option>
										<?php if($sh_result){?>
										<?php while($sh_row=$sh_result->fetch_assoc()){?>
											<option value="<?php echo $sh_row['name'];?>"><?php echo $sh_row['name'];?></option>
										<?php } ?>
										<?php } ?>
									</select>
								 </div>
							</div>
						</div>
						
						
						
						
						
						
						<div class="row">
							<div class="col-md-3">
								 <div class="form-group">
									<label for="formGroupExampleInput">Hour <font color="red">*</font></label>
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
							<div class="col-md-3">
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
							<div class="col-md-3">
								 <div class="form-group">
									<label for="formGroupExampleInput">Select Meridiem <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="meridiem" required>
										<option class="disabled">Select Meridiem</option>
											<option value="AM">AM</option>
											<option value="PM">PM</option>

									</select>
								 </div>
							</div>
							<div class="col-md-3">
								 <div class="form-group">
									<label for="formGroupExampleInput">Select Day <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="day" required>
										<option class="disabled">Select day</option>
											<option value="Sat">Sat</option>
											<option value="Sun">Sun</option>
											<option value="Mon">Mon</option>
											<option value="Tue">Tue</option>
											<option value="Wed">Wed</option>
											<option value="Thu">Thu</option>
											<option value="Fri">Fri</option>

									</select>
								 </div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="form-group">
									<select class="form-control" id="formGroupExampleInput" name="teacher">
										<option>Select Teacher</option>
										<?php
											$teacher_query="select * from teacher";
											$teacher_result=$connect->query($teacher_query);
										?>
										<?php if($teacher_result){?>
										<?php while($teacher_row=$teacher_result->fetch_assoc()){?>
										<option value="<?php echo $teacher_row['id'];?>"><?php echo $teacher_row['name'];?></option>
										<?php }} ?>
									</select>
								</div>
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
									<input type="submit" class="form-control" id="formGroupExampleInput" name="submit" value="Add Subject">
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
	
			<?php //New Routine  Add
				if(isset($_POST['submit'])){
					$subject=$_POST['subject'];
					$class=$_POST['class'];
					$shift=$_POST['shift'];
					$section=$_POST['section'];
					$hour=$_POST['hour'];
					$minute=$_POST['minute'];
					$meridiem =$_POST['meridiem'];
					$time=$hour.':'.$minute.':'.$meridiem;
					$day =$_POST['day'];
					$teacher =$_POST['teacher'];
					
					$select_query="select * from routine where subject_id='$subject' and class_id='$class' and time='$time' and day='$day'";
					$select_result=$connect->query($select_query);
					$count=mysqli_num_rows($select_result);
					if($count==1){
						echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Already Exists"."</div>";
					}
					else{
						$insert_query="insert into routine (subject_id,class_id,time,day,shift,section,teacher_id) values('$subject','$class','$time','$day','$shift','$section','$teacher')";
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
			
					if(isset($_SESSION['delete_success'])){
					echo "<div class='alert alert-danger' role='alert'>"."Delete Successfully"."</div>";
				}
			?>
			<div class="row">
				<div class="col-md-3">
					<input type="text" id="myInput" class="myInput" onkeyup="myFunction()" placeholder="Search for Subject names.." title="Type in a name">
				</div>
				<div class="col-md-3">
					<input type="text" id="myInput1" class="myInput" onkeyup="myFunction1()" placeholder="Search for Class names.." title="Type in a name">
				</div>
				<div class="col-md-3">
					<input type="text" id="myInput2" class="myInput" onkeyup="myFunction2()" placeholder="Search for Day.." title="Type in a name">
				</div>
				<div class="col-md-3">
					<input type="text" id="myInput3" class="myInput" onkeyup="myFunction3()" placeholder="Search for Teachers names.." title="Type in a name">
				</div>
				
				
			</div>
		<table id="myTable">
		  <tr class="header">
			
			<th>SL</th>
			<th> Subject Name</th>
			<th>Class Name</th>
			<th>Shift Name</th>
			<th>Section Name</th>
            <th>Time</th>
			<th>Day</th>
			<th>Teacher</th>
			<th>Action</th>
		  </tr>
		  <?php //All Routine Fetchees from database
			$select_routine="select * from routine";
			$select_routine_result=$connect->query($select_routine);
		  ?>
		  <?php if($select_routine_result){ ?>
		  <?php $i=1;?>
		  <?php while($trow=$select_routine_result->fetch_assoc()){?>
		  <tr>
			<td><?php echo $i;?></td>
			<td>
				<?php
				$subject_name=$trow['subject_id'];
				$subject_query="select * from subject where subject_id='$subject_name'";
				$subject_query_result=$connect->query($subject_query)->fetch_assoc();
				echo $subject_query_result['subject_name']." (".$subject_name.")";
				?>
			</td>
			<td>
				<?php
				
					
					echo $trow['class_id'];
				?>
				
			
			</td>
			<td><?php echo $trow['shift'];?></td>
			<td><?php echo $trow['section'];?></td>
			<td><?php echo $trow['time'];?></td>
			<td><?php echo $trow['day'];?></td>
			<td>
			<?php 
				$tid=$trow['teacher_id'];
				$tquery="select * from teacher where id='$tid'";
				$tresult=$connect->query($tquery)->fetch_assoc();
				echo $tresult['name'];
			?></td>
			
			<td><a onclick="return confirm('Are You sure want to Delete?');" href="deleteRoutine.php?id=<?php echo $trow['id'];?>" title="Delete Class"><span class="glyphicon glyphicon-trash"></span></a></td>
		  </tr>
		  <?php $i++; ?>
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
    td = tr[i].getElementsByTagName("td")[1];
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
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
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
function myFunction3() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[7];
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








<?php unset($_SESSION['delete_success']);?>


<?php include "inc/footer.php";?>