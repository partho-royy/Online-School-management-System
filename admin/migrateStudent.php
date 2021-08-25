<?php
	session_start();
?>
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
				<h2>Migrate Student</h2><hr>
			</div>
		</div>


		<div class="row">
			<div class="col-md-12">
				<form method="GET" action="migrate.php">
				  <div class="form-row">
					<div class="form-group col-md-6">
						<?php
							$year="select * from year";
							$year_result=$connect->query($year);
						?>
					  <label for="inputEmail4">Year</label>
					  <select id="inputState" class="form-control" name="year">
						<option selected>Choose...</option>
						<?php if($year_result){?>
						<?php while($year_show=$year_result->fetch_assoc()){?>
							<option value="<?php echo $year_show['name'];?>"><?php echo $year_show['name'];?></option>
						<?php } ?>
						<?php } ?>
					  </select>
					</div>
					<div class="form-group col-md-6">
						<?php
							$class="select * from class";
							$class_result=$connect->query($class);
						?>
					  <label for="inputPassword4">Class</label>
					  <select id="inputState" class="form-control" name="class">
						<option selected>Choose...</option>
					  <?php if($class_result){?>
					  <?php while($class_show=$class_result->fetch_assoc()){?>
						<option value="<?php echo $class_show['name'];?>"><?php echo $class_show['name'];?></option>
					  <?php } ?>
					  <?php } ?>
					  </select>
					</div>
				  </div>
				  
				 
				  <div class="form-row">
					<div class="form-group col-md-6">
					  <label for="inputCity">Section</label>
					  <select id="inputState" class="form-control" name="section">
						<option selected>Choose...</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
					  </select>
					</div>
					<div class="form-group col-md-6">
					  <label for="inputState">Shift</label>
					  <select id="inputState" class="form-control" name="shift">
						<option selected>Choose...</option>
						<option value="Morning">Morning</option>
						<option value="Day">Day</option>
						<option value="Evening">Evening</option>
					  </select>
					</div>
					
				  </div>

				  <button type="submit" class="btn btn-primary">Search</button>
				</form>
			</div>
		</div>

<?php include "inc/footer.php";?><!--Call Sidebar Section from inc root folder-->