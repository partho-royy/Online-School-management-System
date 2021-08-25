<?php session_start();?>

<?php
	if(!isset($_SESSION['admin_success'])){
		header('location:../index.php');
	}
?>
<?php include "../config/db.php";?><!--Database Connection-->
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php
	$role=$_SESSION['role'];
?>
	<div class="row">
	<hr>
		<div class="col-md-4">
			
				<h3>All Admin</h3>
			
		</div>
		<div class="col-md-6">
			
		</div>
		<div class="col-md-2">
			<?php if($role == 'SuperAdmin'){?>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add User</button>
			<?php } ?>
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
									<label for="formGroupExampleInput">Email <font color="red">*</font></label>
									<input type="email" class="form-control" id="formGroupExampleInput" name="email" placeholder="Enter Full Email Here" required>
								 </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								 <div class="form-group">
									<label for="formGroupExampleInput">Password <font color="red">*</font></label>
									<input type="password" class="form-control" id="formGroupExampleInput" name="password" placeholder="Enter Password Here" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
								 </div>
							</div>
							<div class="col-md-6">
								  <div class="form-group">
									<label for="formGroupExampleInput">Contact No <font color="red">*</font></label>
									<input type="text" class="form-control" id="formGroupExampleInput" name="phone" placeholder="Enter Phone Number Here" required>
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
									<label for="formGroupExampleInput">Role <font color="red">*</font></label>
									<select class="form-control" id="formGroupExampleInput" name="role" required>
										<option value="Admin">Admin</option>
										<option value="SuperAdmin">Super Admin</option>
									</select>
								 </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
									<input type="submit" class="form-control" id="formGroupExampleInput" name="submit" value="Add User">
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
					$email=$_POST['email'];
					$password=md5($_POST['password']);
					$has_pass=md5($email.$password);
					
					$phone=$_POST['phone'];
					$gender=$_POST['gender'];
					
					
					
					
						$image_name=$_FILES['image']['name'];//get image name only
						$image_tmp=$_FILES['image']['tmp_name'];//get image temp name obly
						
						$div=explode('.',$image_name);//get image extention after the . Symbol
						$file_ext=strtolower(end($div));//Covert symbol to lower case
						$unique_name=substr(md5(time()),0,10).'.'.$file_ext;//For image unique name using here time function
						$destination="uploads/".$unique_name;//Unique name with extension 
						move_uploaded_file($image_tmp,$destination);//Move image file project folder
					
					$role=$_POST['role'];
					
					$select_query="select * from admin where email='$email'";
					$select_result=$connect->query($select_query);
					$count=mysqli_num_rows($select_result);
					if($count==1){
						echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Email Already Exists"."</div>";
					}
					else{
						$insert_query="insert into admin (name,email,photo,gender,password,role) values('$name','$email','$destination','$gender','$has_pass','$role')";
						$insert_result=$connect->query($insert_query);
						if($insert_query){
							echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."User Added Successfully"."</div>";
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
		<input type="text" id="myInput" class="myInput" onkeyup="myFunction()" placeholder="Search for Admin names.." title="Type in a name">

		<table id="myTable">
		  <tr class="header">
			<th>Photo</th>
			<th>Name</th>
			<th>Gender</th>
            <th>Phone</th>
			<th>Email</th>
			<th>Role</th>
			<th>Action</th>
		  </tr>
		  <?php //All techer Fetchees from database
			$select_admin="select * from admin";
			$select_admin_result=$connect->query($select_admin);
		  ?>
		  <?php if($select_admin_result){ ?>
		  <?php while($trow=$select_admin_result->fetch_assoc()){?>
		  <tr>
			<td><img src="<?php echo $trow['photo'];?>" height="45" width="45" style="border-radius:50%;"/></td>
			<td><?php echo $trow['name'];?></td>
			<td><?php echo $trow['gender'];?></td>
			<td><?php echo $trow['phone'];?></td>
			<td><?php echo $trow['email'];?></td>
			<td><?php echo $trow['role'];?></td>
			<?php if($role == 'SuperAdmin'){?>
			<td><a onclick="return confirm('Are You sure want to Delete?');" title="Delete" href="deleteAdmin.php?id=<?php echo $trow['id'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
			<?php } ?>
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

function printFunction() {
  $("#div3").addClass("printable");
    window.print();
}
</script>
	</div>








<?php unset($_SESSION['delete_success']);?>
<?php unset($_SESSION['teacherEditSuccess']);?>


<?php include "inc/footer.php";?>