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
			
				<h3>All Subject</h3>
			
		</div>
		<div class="col-md-6">
			
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="glyphicon glyphicon-plus"></span> Add Subject</button>
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
									<input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Enter Full Subject  Name Here" required >
								 </div>
							</div>
							<div class="col-md-6">
								 <div class="form-group">
									<label for="formGroupExampleInput">Subject ID <font color="red">*</font></label>
									<input type="text" class="form-control" id="formGroupExampleInput" name="subject_id" placeholder="Enter Subject Id Here" required>
								 </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								 <div class="form-group">
									<label for="formGroupExampleInput">Year <font color="red">*</font></label>
									<input type="text" value="<?php $t=time(); echo(date("Y",$t));?>" class="form-control" id="formGroupExampleInput" name="year" required>
								 </div>
							</div>
							<div class="col-md-6">
								 <div class="form-group">
									<label for="formGroupExampleInput">Teacher <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="teacher" required>
										<?php
											$t_query="select * from teacher";
											$t_result=$connect->query($t_query)
										?>
										<option class="disabled">Select a Teacher</option>
										<?php if($t_result){?>
										<?php while($t_row=$t_result->fetch_assoc()){?>
											<option value="<?php echo $t_row['id'];?>"><?php echo $t_row['name'];?> (<?php echo $t_row['qualification'];?>)</option>
										<?php } ?>
										<?php } ?>
									</select>
								 </div>
							</div>
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
	
			<?php //New Teacher  Add
				if(isset($_POST['submit'])){
					$name=$_POST['name'];
					$subject_id=$_POST['subject_id'];
					$year=$_POST['year'];
					$teacher=$_POST['teacher'];
					
					$select_query="select * from subject where subject_id='$subject_id'";
					$select_result=$connect->query($select_query);
					$count=mysqli_num_rows($select_result);
					if($count==1){
						echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Subject ID Already Exists"."</div>";
					}
					else{
						$insert_query="insert into subject (subject_id,subject_name,teacher_id,year) values('$subject_id','$name','$teacher','$year')";
						$insert_result=$connect->query($insert_query);
						if($insert_query){
							echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."Subject Added Successfully"."</div>";
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
					echo "<div class='alert alert-danger' role='alert'>"."Subject Delete Successfully"."</div>";
				}
			?>
		<input type="text" id="myInput" class="myInput" onkeyup="myFunction()" placeholder="Search for Subject names.." title="Type in a name">

		<table id="myTable">
		  <tr class="header">
			<th> Subject Name</th>
			<th>Suject Id</th>
            <th>Teacher Name</th>
			<th>Year</th>
			<th>Action</th>
		  </tr>
		  <?php //All techer Fetchees from database
			$select_subject="select * from subject";
			$select_subject_result=$connect->query($select_subject);
		  ?>
		  <?php if($select_subject_result){ ?>
		  <?php while($trow=$select_subject_result->fetch_assoc()){?>
		  <tr>
			<td><?php echo $trow['subject_name'];?></td>
			<td><?php echo $trow['subject_id'];?></td>
			<td>
			
				<?php
				$tid=$trow['teacher_id'];
				$tquery="select * from teacher where id='$tid'";
				$tresult=$connect->query($tquery)->fetch_assoc();
				echo $tresult['name'];
				?>
			
			
			</td>
			<td><?php echo $trow['year'];?></td>
			
			<td><a href="editSubject.php?id=<?php echo $trow['subject_id'];?>" title="Edit Subject"> <span class="glyphicon glyphicon-edit"></span></a> <a onclick="return confirm('Are You sure want to Delete?');" href="deleteSubject.php?id=<?php echo $trow['subject_id'];?>" title="Delete Subject"><span class="glyphicon glyphicon-trash"></span></a></td>
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








<?php unset($_SESSION['delete_success']);?>


<?php include "inc/footer.php";?>