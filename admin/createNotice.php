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
				<h3>Create Notice</h3>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" style="background:#E5E5E5;">
			<?php
				if(isset($_POST['submit'])){
					$date=$_POST['date'];
					$audience=$_POST['audience'];
					$heading=$_POST['heading'];
					$notice=$_POST['notice'];
					$submitted_by=$_POST['submitted_by'];
					
					$notice_query="insert into notice(date,heading,notice,audience,submitted_by) values('$date','$heading','$notice','$audience','$submitted_by')";
					$notice_result=$connect->query($notice_query);
					
					if($notice_result){
						echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Notice Create Successfully"."</div>";
					}
				}
			
				
			?>
			<form action="" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
				<label for="exampleFormControlInput1">Date & Time</label>
				<input type="text" name="date" readonly class="form-control" id="exampleFormControlInput1" value="<?php $dt = new DateTime('now', new DateTimezone('Asia/Dhaka')); echo $dt->format('F j, Y, g:i a');?>">
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlSelect1">Select Audience</label>
				<select class="form-control" name="audience" id="exampleFormControlSelect1">
				  <option value="student">Student</option>
				  <option value="teacher">Teacher</option>
				  <option value="parents">Parents</option>
				  <option value="teacher&parents">Teacher and Parents</option>
				  <option value="all">All</option>
				</select>
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlTextarea1">Notice Head Line</label>
				<input type="text" class="form-control" name="heading">
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlTextarea1">Create Notice</label>
				<textarea class="form-control" id="editor" name="notice" style="min-height:500px">
					
				</textarea>
			  </div>
			   <div class="form-group">
				<label for="exampleFormControlInput1">Submitted By</label>
				<input type="text" name="submitted_by" readonly class="form-control" id="exampleFormControlInput1" value="Admin">
			  </div>
			   <div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary btn-lg">Create Notice</button>
			  </div>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
<script type="text/javascript">
	 ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
</script>
<?php include "inc/footer.php";?>