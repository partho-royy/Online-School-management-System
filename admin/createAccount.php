<?php session_start();?>
<?php
	if(!isset($_SESSION['admin_success'])){
		header('location:../index.php');
	}
?>
<?php include "../config/db.php";?><!--Database Connection-->
<?php include "inc/header.php";?><!--Call header Section from inc root folder-->
<?php include "inc/sidebar.php";?><!--Call Sidebar Section from inc root folder-->
	<div class="row">
		<div class="col-md-12">
			<hr>
				<h3>Student Account</h3>
			<hr>
		</div>
	</div>
	<?php
		
		
		if(isset($_POST['submit'])){
			$password=$_POST['password'];
			$getid=$_GET['id'];
			$query="update student set password='$password',status='1' where id='$getid'";
			$result=$connect->query($query);
			
			if($result){
				echo "<div class='alert alert-info' role='alert'>"."Student Account Create Successfully"."</div>";
			}
		}
	?>
	
	<div class="row" style="">
		<div class="col-md-6">
			<form method="post">
				  <div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password">
				  </div>
				 
				  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>
		</div>
	</div>

<?php include "inc/footer.php";?><!--Call Sidebar Section from inc root folder-->