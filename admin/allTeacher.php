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
			
				<h3>All Teacher</h3>
			
		</div>
		<div class="col-md-6">
			
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Teacher</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

			
			<form action="" method="post" style="margin-top:30px;margin-bottom:30px;" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-6">
								 <div class="form-group">
									<label for="formGroupExampleInput">Full Name <font color="red">*</font></label>
									<input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Enter Full Name Here" required >
								 </div>
							</div>
							<div class="col-md-6">
								 <div class="form-group">
									<label for="formGroupExampleInput">Address <font color="red">*</font></label>
									<input type="text" class="form-control" id="formGroupExampleInput" name="address" placeholder="Enter Full Address Here" required>
								 </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								 <div class="form-group">
									<label for="formGroupExampleInput">Qualification <font color="red">*</font></label>
									<input type="text" class="form-control" id="formGroupExampleInput" name="qualification" placeholder="Enter Qualification Here" required>
								 </div>
							</div>
							<div class="col-md-6">
								 <div class="form-group">
									<label for="formGroupExampleInput">Email <font color="red">*</font></label>
									<input type="email" class="form-control" id="formGroupExampleInput" name="email" placeholder="Enter Email Address Here" required>
								 </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								 <div class="form-group">
									<label for="formGroupExampleInput">Gender <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="gender" required>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
									</select>
								 </div>
							</div>
							<div class="col-md-4">
								 <div class="form-group">
									<label for="formGroupExampleInput">Upload Photo <font color="red">*</font></label>
									<input type="file" class="form-control" id="formGroupExampleInput" name="image"  required>
								 </div>
							</div>
							<div class="col-md-4">
								 <div class="form-group">
									<label for="formGroupExampleInput">Password <font color="red">*</font></label>
									<input type="text" class="form-control" id="formGroupExampleInput" name="password" placeholder="Enter Password Here" required>
								 </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
									<input type="submit" class="form-control" id="formGroupExampleInput" name="submit" value="Add Teacher">
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
					$address=$_POST['address'];
					$qualification=$_POST['qualification'];
					$email=$_POST['email'];
					$gender=$_POST['gender'];
					$password=md5($_POST['password']);
					$has_pass=md5($email.$password);
					
					
						$image_name=$_FILES['image']['name'];//get image name only
						$image_tmp=$_FILES['image']['tmp_name'];//get image temp name obly
						
						$div=explode('.',$image_name);//get image extention after the . Symbol
						$file_ext=strtolower(end($div));//Covert symbol to lower case
						$unique_name=substr(md5(time()),0,10).'.'.$file_ext;//For image unique name using here time function
						$destination="uploads/".$unique_name;//Unique name with extension 
						move_uploaded_file($image_tmp,$destination);//Move image file project folder
					
					
					$select_query="select * from teacher where email='$email'";
					$select_result=$connect->query($select_query);
					$count=mysqli_num_rows($select_result);
					if($count==1){
						echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Email Already Exists"."</div>";
					}
					else{
						$insert_query="insert into teacher (name,address,qualification,email,password,gender,image) values('$name','$address','$qualification','$email','$has_pass','$gender','$destination')";
						$insert_result=$connect->query($insert_query);
						if($insert_query){
							echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."Teacher Added Successfully"."</div>";
						}
						else{
							echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."There Is Some Problem"."</div>";
						}
					}
					
				}
			?>
			<?php
			
					if(isset($_SESSION['delete_success'])){
					echo "<div class='alert alert-danger' role='alert'>"."Teacher Delete Successfully"."</div>";
				}
			?>
			
		</div>
	</div>
	<?php
		if(isset($_SESSION['teacherEditSuccess'])){
			echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."Teacher Edited Successfully"."</div>";
		}
	?>
	<div class="row">
		<div class="col-md-12">
		<input type="text" id="myInput" class="myInput" onkeyup="myFunction()" placeholder="Search for Teachers names.." title="Type in a name">

		<table id="myTable">
		  <tr class="header">
			<th>Photo</th>
			<th>Name</th>
			<th>Gender</th>
            <th>Qualification</th>
			<th>Email</th>
			<th>Address</th>
			<th>Action</th>
		  </tr>
		  <?php //All techer Fetchees from database
			$select_teacher="select * from teacher";
			$select_teacher_result=$connect->query($select_teacher);
		  ?>
		  <?php if($select_teacher_result){ ?>
		  <?php while($trow=$select_teacher_result->fetch_assoc()){?>
		  <tr>
			<td><img src="<?php echo $trow['image'];?>" height="45" width="45" style="border-radius:50%;"/></td>
			<td><?php echo $trow['name'];?></td>
			<td><?php echo $trow['gender'];?></td>
			<td><?php echo $trow['qualification'];?></td>
			<td><?php echo $trow['email'];?></td>
			<td><?php echo $trow['address'];?></td>
			
			<td><a href="viewTeacher.php?id=<?php echo $trow['id'];?>" title="view teacher details"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="editTeacher.php?id=<?php echo $trow['id'];?>" title="edit teacher"><span class="glyphicon glyphicon-edit"></span></a> <a onclick="return confirm('Are You sure want to Delete?');" href="deleteTeacher.php?id=<?php echo $trow['id'];?>" title="delete teacher"><span class="glyphicon glyphicon-trash"></span></a></td>
		  </tr>
		  <?php } ?>
		  <?php } ?>
		</table>
	</div>
</div>
		
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
<?php unset($_SESSION['teacherEditSuccess']);?>


<?php include "inc/footer.php";?>