<?php
	session_start();
?>
<?php
	if(!isset($_SESSION['admin_success'])){
		header('location:../index.php');
	}
?>
<?php include "../config/db.php";?><!--Database Connection-->
<?php
	session_start();

	$gid=$_GET['id'];//Super global variable get..for catch student Id
	$query="select * from student where id='$gid'";/*Student query from student table base on id*/
	$result=$connect->query($query)->fetch_assoc();
?>

<?php include "inc/header.php";?><!--Call header Section from inc root folder-->
<?php include "inc/sidebar.php";?><!--Call Sidebar Section from inc root folder-->
<div class="row">
			<div class="col-md-12">
			<hr>
				<h2>Promote Student</h2><hr>
			</div>
		</div>
<!--Student Table Update Query-->
			  	<?php
			  			if(isset($_POST['submit'])){

			  				$class=$_POST['class'];
			  				$section=$_POST['section'];
			  				$shift=$_POST['shift'];
			  				$roll=$_POST['roll'];
			  				$session=$_POST['csession'];

			  			$supdate="update student set
			  			 class='$class',
			  			 section='$section',
			  			 shift='$shift',
			  			 roll='$roll',
			  			 current_year='$session'
			  			 where  id='$gid'";
			  			 $sresult=$connect->query($supdate);

			  			 if($sresult){
			  			 	echo "<div class='alert alert-success'>"."<strong>Success!</strong> Student Migrate Successfull"."</div>";
			  			 }
			  			 else{
			  			 	echo "Some thing Going to Wrong";
			  			 }

			  			}
			  	?>
			  	

			  <!--Student Table Update Query-->
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4" style="border-left:1px solid black;border-right:1px solid black;">
			<div  align="center"> <img style="border:5px solid red;border-radius:50%;"src="<?php echo $result['student_photo'];?>" height="150" width="150"></div>
			<hr>
			<table class="table table-dark">
			  <thead >
			    <tr><th scope="col" style="text-align:center"><a href="viewStudent.php?id=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></th></tr>
			  </thead>
			</table>
			<form method="POST">
			    <div class="form-group">
			      <select class="form-control" id="sel1" name="class">
			        <option hidden>select Class</option>
			        <?php
			        	$class="select * from class";
			        	$cquery=$connect->query($class);
			        ?>
			        <?php if($cquery){?>
			        <?php while($crow=$cquery->fetch_assoc()){?>
			        <option value="<?php echo $crow['name'];?>"><?php echo $crow['name'];?></option>
			    	<?php } ?>
			    	<?php } ?>
			      </select>
			    </div>
			    <div class="form-group">
			      <select class="form-control" id="sel1" name="section">
			        <option>Select Section</option>
			        <?php
			        	$sequery="select * from section";//Query For All Section
			        	$seresult=$connect->query($sequery);
			        ?>
			        <?php if($seresult){?>
			        <?php while($serow=$seresult->fetch_assoc()){?>
			        <option value="<?php echo $serow['name'];?>"><?php echo $serow['name'];?></option>
			        <?php } ?><!--End while Loop-->
			        <?php } ?><!--Wnd if-->
			      </select>
			    </div>
			    <div class="form-group">
			      <select class="form-control" id="sel1" name="shift">
			        <option>Select Shift</option>
			        <?php
			       		 $shquery="select * from shift";//Queryy for all Shift
			       		 $shresult=$connect->query($shquery);
			        ?>
			        <?php if($shresult){?>
			        <?php while($shrow=$shresult->fetch_assoc()){?>
			        <option value="<?php echo $shrow['name'];?>"><?php echo $shrow['name'];?></option>
			        <?php } ?><!--End while Loop-->
			        <?php } ?><!--Wnd if-->
			      </select>
			    </div>
			    <div class="form-group">
			      <input type="text" class="form-control" id="sel1" name="roll" placeholder="Enter Roll Number Here">
			    </div>
			    <div class="form-group">
			      <select class="form-control" id="sel1" name="csession">
			      	<option>Current Session</option>
			      	<option value="<?php echo(date('Y')-1)?>">Current Session <?php echo(date("Y")-1)?></option>
			      	<option value="<?php echo(date('Y'))?>">Current Session <?php echo(date("Y"))?></option>
			        <option value="<?php echo(date('Y')+1)?>">Current Session <?php echo(date("Y")+1)?></option>
			      </select>
			    </div>
			    <input type="submit" name="submit" value="Update">
			  </form>

			  
	</div>
	<div class="col-md-4"></div>
</div>

<?php include "inc/footer.php";?><!--Call Sidebar Section from inc root folder-->