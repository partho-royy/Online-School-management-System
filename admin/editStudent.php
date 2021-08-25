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

<?php
		$getid=$_GET['id'];
		$query="select * from student where id='$getid'";
		$result=$connect->query($query)->fetch_assoc();
?>
	<div class="row">
		<div class="col-md-10">
			<hr>
				<h3>Edit Information</h3>
			<hr>
		</div>
		<div class="col-md-2">
			<hr>
				<h3><button value="Refresh Page" onClick="window.location.reload()">Refresh</button></h3>
			<hr>
		</div>
	</div>
	<?php include "lib/studentEdithandler.php";?>
	<div class="row">
		<div class="col-md-12">
		 <div class="row">
		 <div class="modal-body" id="div3">
		 <form action="" enctype="multipart/form-data" method="POST">
							<div class="row">
								<div class="col-md-4">
									  <img src="<?php echo $result['student_photo'];?>" alt="Card image cap" height="200" width="150">
								</div>
								<div class="col-md-8">
									
									<table class="table table-dark">
									  <thead>
										<tr>
										  <th scope="col">Name</th>
										  <th scope="col"><input type="text" value="<?php echo $result['name'];?>" name="name"></th>
										</tr>
									  </thead>
									  <thead>
										<tr>
										  <th scope="col">Gender</th>
										  <th scope="col"><input type="text" value="<?php echo $result['gender'];?>" name="gender"></th>
										</tr>
									  </thead> 
									  <thead>
										<tr>
										  <th scope="col">Date of birth</th>
										  <th scope="col"><input type="text" value="<?php echo $result['dob'];?>" name="dob"></th>
										</tr>
									  </thead>  
									  <thead>
										<tr>
										  <th scope="col">Religion</th>
										  <th scope="col"><input type="text" value="<?php echo $result['religion'];?>" name="religion"></th>
										</tr>
									  </thead>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-dark">
										<tr>
											<th scope="col">Email</th>
											<th scope="col"><input type="text" value="<?php echo $result['email'];?>" name="email"></th>
										</tr>
										<tr>
											<th scope="col">Phone</th>
											<th scope="col"><input type="text" value="<?php echo $result['phone'];?>" name="phone"></th>
										</tr>
										<tr>
											<th scope="col">Nationality</th>
											<th scope="col"><input type="text" value="<?php echo $result['nationality'];?>" name="nationality"></th>
										</tr>
										<tr>
											<th scope="col">Class</th>
											<th scope="col"><input type="text" value="<?php echo $result['class'];?>" name="class"></th>
										</tr>
										<tr>
											<th scope="col">Section</th>
											<th scope="col"><input type="text" value="<?php echo $result['section'];?>" name="section"></th>
										</tr>
										<tr>
											<th scope="col">Shift</th>
											<th scope="col"><input type="text" value="<?php echo $result['shift'];?>" name="shift"></th>
										</tr>
										<tr>
											<th scope="col">Father Name</th>
											<th scope="col"><input type="text" value="<?php echo $result['father_name'];?>" name="father_name"></th>
										</tr>
										<tr>
											<th scope="col">Mother Name</th>
											<th scope="col"><input type="text" value="<?php echo $result['mother_name'];?>" name="mother_name"></th>
										</tr>
										<tr>
											<th scope="col">Father Job</th>
											<th scope="col"><input type="text" value="<?php echo $result['father_job'];?>" name="father_job"> </th>
										</tr>
										<tr>
											<th scope="col">Father Phone</th>
											<th scope="col"><input type="text" value="<?php echo $result['father_phone'];?>"  name="father_phone"></th>
										</tr>
									</table>
								</div>
							</div>
					  </div>
					  	
	</div>
	</div>
					  <div class="modal-footer">
						<button type="submit" class="btn btn-primary" name="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Save Changes</button>
					  </div>
					  </form>
	</div>

<?php include "inc/footer.php";?>