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
		$query="select * from subject where subject_id='$getid'";
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
				<?php
				if(isset($_POST['submit'])){
					$name=$_POST['subject_name'];
					$subject_id=$_POST['subject_id'];
					$teacher=$_POST['teacher'];
					$year=$_POST['year'];
					
					$update="update subject set subject_name='$name',subject_id='$subject_id',teacher_id='$teacher',year='$year' where subject_id='$getid'";
					$uresult=$connect->query($update);
					if($uresult){
						echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."Subject Updated Successfully.Go to"."<a href='subject.php'>"."Subject List"."</a>"."</div>";
						
					}
				}
			?>
					<table class="table">  
					<form action="" method="post">
            <thead class="thead-light">  
                <tr>  
                    <th>Subject ID</th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th style="color:black;"><input type="text" name="subject_id" value="<?php echo $result['subject_id'];?>" required/></th>  
                </tr>  
            </thead>  
            <tbody>  
                <tr>  
                    <th>Subject Name</th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                      <th style="color:black;"><input type="text" name="subject_name" value="<?php echo $result['subject_name'];?>" required/></th>   
                </tr>  
                <tr>  
                     <th>Teacher</th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                      <th style="color:black;">
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
					  
					  </th>   
                </tr>  
                <tr>  
                    <th>Year</th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                    <th></th>  
                      <th style="color:black;"><input type="text" name="year" value="<?php $t=time(); echo(date("Y",$t));?>" required/></th>  
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