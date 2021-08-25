<?php session_start();?>
<?php
	if(!isset($_SESSION['teacher_success'])){
		header('location:../index.php');
	}
?>
<?php
	$id=$_SESSION['id'];
	$student_id=$_SESSION['student_id'];
	$class=$_SESSION['class'];
	$section=$_SESSION['section'];
	$shift=$_SESSION['shift'];
	$name=$_SESSION['name'];
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
	<div class="row">
		<div class="col-md-12">
			<hr>
				<h3>Send SMS</h3>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" style="background:#E5E5E5;">
			<?php
				if(isset($_POST['submit'])){
					$time=$_POST['time'];
					$sender_id=$id;
					$sender_name=$name;
					$reciever_id=$_POST['audience'];
					$reciever_name=$_POST['audience_name'];
					$messgae=$_POST['message'];
					
					$message_query="insert into message(message,sender_id,sender_name,reciever_id,reciever_name,status,time)
					values('$messgae','$sender_id','$sender_name','$reciever_id','$reciever_name','0','$time')";
					$messgae_result=$connect->query($message_query);
					
					if($messgae_result){
						echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Message Sent Successfully"."</div>";
					}
				}
			?>
			<form action="" method="POST">
			  <div class="form-group">
				<label for="exampleFormControlInput1">Date & Time</label>
				<input type="text" readonly class="form-control" name="time" id="exampleFormControlInput1" value="<?php $dt = new DateTime('now', new DateTimezone('Asia/Dhaka')); echo $dt->format('F j, Y, g:i a');?>">
			  </div>
			  <div class="form-group">
				<?php
					$audience_query="select * from student where class='$class' and section='$section' and shift='$shift'";
					$audience_result=$connect->query($audience_query);
				?>
				<label for="exampleFormControlSelect1">Select Audience for Id</label>
				<select class="form-control" id="exampleFormControlSelect1" name="audience">
				  <option>Select Audience</option>
				  <?php if($audience_result){?>
				  <?php while($audience=$audience_result->fetch_assoc()){?>
					<option value="<?php echo $audience['id'];?>"><?php echo $audience['name'];?></option>
				  <?php } ?>
				  <?php } ?>
				</select>
			  </div>
			  <div class="form-group">
				<?php
					$audience_query2="select * from student where class='$class' and section='$section' and shift='$shift'";
					$audience_result2=$connect->query($audience_query2);
				?>
				<label for="exampleFormControlSelect1">Select Audience for Name</label>
				<select class="form-control" id="exampleFormControlSelect1" name="audience_name">
				  <option>Select Audience</option>
				  <?php if($audience_result2){?>
				  <?php while($audience2=$audience_result2->fetch_assoc()){?>
					<option value="<?php echo $audience2['name'];?>"><?php echo $audience2['name'];?></option>
				  <?php } ?>
				  <?php } ?>
				</select>
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlTextarea1">Type Message</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
			  </div>
			   <div class="form-group">
				<label for="exampleFormControlInput1">Sent By</label>
				<input type="text" readonly class="form-control" id="exampleFormControlInput1" value="<?php echo $name;?>" name="sentby">
			  </div>
			   <div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary btn-lg">Sent Message</button>
			  </div>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
<?php include "inc/footer.php";?>