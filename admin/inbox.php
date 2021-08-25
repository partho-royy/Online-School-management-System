<?php
	session_start();
?>
<?php
	if(!isset($_SESSION['admin_success'])){
		header('location:../index.php');
	}
?>
<?php include "db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>	
	<div class="row">
					<div class="col-md-12">
					<hr>
						<h2>Messages</h2>
						<hr>
					</div>
				</div>
	<div class="row">
		<div class="col-md-12" style="overflow-x:auto;">
			<table class="table table-condensed">
				<thead>
				  <tr>
					<th>Sender Name</th>
					<th>Message</th>
					<th>Time</th>
					<th>Remark</th>
					<th>Action</th>
				  </tr>
				</thead>
					<?php
						$inbox_query="select * from message where reciever_id='$id' and reciever_name='$name'";
						$inbox_result=$connect->query($inbox_query);
					?>
				<tbody>
				<?php if($inbox_result){?>
				<?php while($row=$inbox_result->fetch_assoc()){?>
				  <tr>
					<td><?php echo $row['sender_name'];?></td>
					<td><?php echo $row['message'];?></td>
					<td><?php echo $row['time'];?></td>
					<td>UnSeen</td>
					<td>Mark as Seen</td>
				  </tr>
				<?php } ?>
				<?php } ?>
				</tbody>
			 </table>
		</div>
	</div>










<?php include "inc/footer.php";?>