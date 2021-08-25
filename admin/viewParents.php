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
	$get_id=$_GET['id'];
	$get_parents=$_GET['parents'];
	
	$query="select * from `".$get_parents."` where id='$get_id'";
	$result=$connect->query($query)->fetch_assoc();
	$parents_id=$result['parents_id'];
?>
<?php
	if($get_parents == "father"){
		$pid='father_id';
	}
	else{
		$pid='mother_id';
	}
?>
<?php
	/*Parents Account Creation*/
	if(isset($_POST['submit'])){
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$cpass=$_POST['cpass'];
		$haspass=md5($cpass);
		$doublehas=md5($email.$haspass);
		
		if($pass==$cpass){
			$pemail_query="select * from `".$get_parents."` where email='$email'";
			$pemail_query_result=$connect->query($pemail_query);
			$pemail_count=mysqli_num_rows($pemail_query_result);
			if($pemail_count==1){
				echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Email Already Exists!"."</div>";
			}
			else{
				$update_query="update `".$get_parents."` set email='$email',password='$doublehas' where parents_id='$parents_id'";
				$update_query_result=$connect->query($update_query);
				echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."Account create Successfully!"."</div>";
			}
		}
		else{
			echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Password Is not Matched!"."</div>";
		}
	}
	/*Parents Account Creation*/
?>
<?php
	if(isset($_POST['link_submit'])){
		$std_id=$_POST['std_id'];
		$link_query="insert into realtions (student_id,parents_id) values('$std_id','$parents_id')";
		$link_query_result=$connect->query($link_query);
		if($link_query_result){
			echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."Linked Successfull!"."</div>";
		}
	}
?>
<hr>
<div class="row">
	<div class="col-md-8">
			<h2>View Parents Details</h2>
	</div>
	<div class="col-md-2">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="glyphicon glyphicon-floppy-open"></span> Crteate Account </button>
			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">

					
					<form action="" method="post" style="margin-top:30px;margin-bottom:30px;">
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										 <div class="form-group">
											<label for="formGroupExampleInput">Enter Email Address <font color="red">*</font></label>
											<input type="email" class="form-control" id="formGroupExampleInput" name="email" placeholder="Enter Email Address Here" required >
										 </div> 
										 <div class="form-group">
											<label for="formGroupExampleInput">Enter Password Here<font color="red">*</font></label>
											<input type="password" class="form-control" id="formGroupExampleInput" name="pass" placeholder="Enter Password Here" required >
										 </div>
										 <div class="form-group">
											<label for="formGroupExampleInput">Enter Password Again Here<font color="red">*</font></label>
											<input type="password" class="form-control" id="formGroupExampleInput" name="cpass" placeholder="Enter Password Again Here" required >
										 </div>
									</div>
								</div>
								
								<div class="row">
									
									<div class="col-md-12">
											<input type="submit" class="form-control" id="formGroupExampleInput" name="submit" value="Create Account">
									</div>
									
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
	<div class="col-md-1">
	</div>
	
	<div class="col-md-10" >
		<div class="row">
				<div class="col-md-3">
					<img src="<?php echo $result['photo'];?>"  title="Mother Photo" height="165" width="200">
					
				</div>
				<div class="col-md-4">
					<ul class="list-group">
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						<b>Parents Details</b>
						
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Name
						<span class="badge badge-primary badge-pill"><?php echo $result['name'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Email
						<span class="badge badge-primary badge-pill"><?php echo $result['email'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Occupation
						<span class="badge badge-primary badge-pill"><?php echo $result['occupation'];?></span>
					  </li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul class="list-group">
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						<b>Parents Details</b>
						
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Phone
						<span class="badge badge-primary badge-pill"><?php echo $result['phone'];?></span>
					  </li>
						
					 
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Gender
						<span class="badge badge-primary badge-pill"><?php echo 'female'?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Parents Id
						<span class="badge badge-primary badge-pill"><?php echo $result['parents_id']?></span>
					  </li>
					</ul>
				</div>
				
				
		</div>
	</div>
	
	<div class="col-md-1">
	</div>
</div>
<hr>
	<h3>All Childrean</h3>
<hr>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
	<?php
		$parents_id=$result['parents_id'];
		$childrean_query="select * from student where $pid='$parents_id'";
		$childrean_result=$connect->query($childrean_query);
	?>
		<?php if($childrean_result){?>
		<?php $i=1;?>
		<?php while($childrean_row=$childrean_result->fetch_assoc()){?>
		<div class="row">
				<div class="col-md-4">
					<ul class="list-group">
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						<b>Childrean Details (<?php echo $i;?>)</b>
						
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Name
						<span class="badge badge-primary badge-pill"><?php echo $childrean_row['name'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Student ID
						<span class="badge badge-primary badge-pill"><?php echo $childrean_row['student_id'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Email
						<span class="badge badge-primary badge-pill"><?php echo $childrean_row['email'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Class / Section
						<span class="badge badge-primary badge-pill"><?php echo $childrean_row['class'];?> / <?php echo $childrean_row['section'];?></span>
					  </li> 
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Religion
						<span class="badge badge-primary badge-pill"><?php echo $childrean_row['religion'];?> </span>
					  </li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul class="list-group">
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						<b>Childrean Details (<?php echo $i;?>)</b>
						
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Shift
						<span class="badge badge-primary badge-pill"><?php echo $childrean_row['shift'];?></span>
					  </li>
						
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Phone
						<span class="badge badge-primary badge-pill"><?php echo $childrean_row['phone'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Address
						<span class="badge badge-primary badge-pill"><?php echo $childrean_row['address'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Nationality
						<span class="badge badge-primary badge-pill"><?php echo $childrean_row['nationality'];?></span>
					  </li>
					  <li class="list-group-item d-flex justify-content-between align-items-center">
						Gender
						<span class="badge badge-primary badge-pill"><?php echo $childrean_row['gender'];?></span>
					  </li>
					</ul>
				</div>
				<div class="col-md-3">
					<img src="<?php echo $childrean_row['student_photo'];?>"  title="Childrean Photo (<?php echo $i;?>)" width="200" height="240">
					
				</div>
				<div class="col-md-1">
					<a href="viewStudent.php?id=<?php echo $childrean_row['id'];?>"><span class="glyphicon glyphicon-new-window" style="font-size:30px;color:red" title="Click For View Profile (<?php echo $i;?>)"></span></a>
				</div>
		</div>
		<?php $i++;?>
		<?php }} ?>
	</div>
	<div class="col-md-1"></div>
</div>
<?php include "inc/footer.php";?>