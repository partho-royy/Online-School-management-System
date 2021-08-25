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
            <thead class="thead-light">  
                <tr>  
                    <th>Name</th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th><?php echo $result['name'];?></th>  
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
                    <th><?php echo $result['address'];?></th>  
                </tr>  
                <tr>  
                     <th>Qualification</th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th><?php echo $result['qualification'];?></th>    
                </tr>  
                <tr>  
                    <th>Email</th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th><?php echo $result['email'];?></th>  
                </tr>  
                <tr>  
                     <th>Gender</th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th><?php echo $result['gender'];?></th>   
                </tr>  
            </tbody>  
        </table>  

				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
<?php include "inc/footer.php";?>