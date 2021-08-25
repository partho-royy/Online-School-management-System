<?php
	session_start();
?>
<?php
	if(!isset($_SESSION['admin_success'])){
		header('location:../index.php');
	}
?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
	<div class="row">
		<div class="col-md-12">
			<hr>
				<h3>Send Bulk SMS</h3>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" style="background:#E5E5E5;">
			<form>
			  <div class="form-group">
				<label for="exampleFormControlInput1">Date & Time</label>
				<input type="text" readonly class="form-control" id="exampleFormControlInput1" value="<?php $dt = new DateTime('now', new DateTimezone('Asia/Dhaka')); echo $dt->format('F j, Y, g:i a');?>">
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlSelect1">Select Audience</label>
				<select class="form-control" id="exampleFormControlSelect1">
				  <option>Student</option>
				  <option>Teacher</option>
				  <option>Parents</option>
				  <option>All</option>
				</select>
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlTextarea1">Type Message</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
			  </div>
			   <div class="form-group">
				<label for="exampleFormControlInput1">Sent By</label>
				<input type="text" readonly class="form-control" id="exampleFormControlInput1" value="Admin">
			  </div>
			   <div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary btn-lg">Sent Message</button>
			  </div>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
<?php include "inc/footer.php";?>