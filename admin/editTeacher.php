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
		$_SESSION['editteacherId']=$getid;
		$query="select * from teacher where id='$getid'";
		$result=$connect->query($query)->fetch_assoc();
	?>

	<div class="row">
		 <div class="col-md-12">
			<hr>
				<h3>View Teacher Details</h3>
			<hr>
		 </div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" style="background:#294970;color:white;">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					
				</div>
				<div class="col-md-4"></div>
			</div>
			<div class="row">
			
				<div class="col-md-12">
				
					<table class="table">  
					<form action="editTeacherConfirm.php" method="post">
            <thead class="thead-light">  
                <tr>  
                    <th>Name</th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th style="color:black;"><input type="text" name="name" value="<?php echo $result['name'];?>" required/></th>  
                </tr>  
            </thead>  
            <tbody>  
                <tr>  
                    <th>Address</th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                      <th style="color:black;"><input type="text" name="address" value="<?php echo $result['address'];?>" required/></th>   
                </tr>  
                <tr>  
                     <th>Qualification</th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                      <th style="color:black;"><input type="text" name="qualification" value="<?php echo $result['qualification'];?>" required/></th>   
                </tr>  
                <tr>  
                    <th>Email</th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                      <th style="color:black;"><input type="email" name="email" value="<?php echo $result['email'];?>" required/></th>  
                </tr>  
                <tr>  
                     <th>Gender</th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                      <th style="color:black;"><input type="text" name="gender" value="<?php echo $result['gender'];?>" required/></th>   
                </tr> 
				<tr>  
                     <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                      <th style="color:black;"><input type="submit" name="submit" value="Update"/></th>   
                </tr>  
				</form>
            </tbody>  
        </table>  
			
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
<?php include "inc/footer.php";?>