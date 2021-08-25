<?php session_start();?>
<?php
	if(!isset($_SESSION['admin_success'])){
		header('location:../index.php');
	}
?>
<?php include "../config/db.php";?><!--Database Connection-->
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
	<div class="row">
	<hr>
		<div class="col-md-4">
			
				<h3>All Class</h3>
			
		</div>
		<div class="col-md-6">
			
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="glyphicon glyphicon-plus"></span> Add Class</button>
			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

			
			<form action="" method="post" style="margin-top:30px;margin-bottom:30px;">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-12">
								 <div class="form-group">
									<label for="formGroupExampleInput">Class Name <font color="red">*</font></label>
									<input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Enter Class Name Here" required >
								 </div>
							</div>
						</div>
						
						<div class="row">
							
							<div class="col-md-12">
									<input type="submit" class="form-control" id="formGroupExampleInput" name="submit" value="Add Class">
							</div>
							
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
			</form>
				

    </div>
  </div>
</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
	
			<?php //New Teacher  Add
				if(isset($_POST['submit'])){
					$name=$_POST['name'];
					
					$select_query="select * from class where name='$name'";
					$select_result=$connect->query($select_query);
					$count=mysqli_num_rows($select_result);
					if($count==1){
						echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."Class Already Exists"."</div>";
					}
					else{
						$insert_query="insert into class (name) values('$name')";
						$insert_result=$connect->query($insert_query);
						if($insert_query){
							echo "<div class='alert alert-info' role='alert' style='text-align:center;'>"."Class Added Successfully"."</div>";
						}
						else{
							echo "<div class='alert alert-danger' role='alert' style='text-align:center;'>"."There Is Some Problem"."</div>";
						}
					}
					
				}
			?>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
		<?php
			
					if(isset($_SESSION['delete_success'])){
					echo "<div class='alert alert-danger' role='alert'>"."Subject Delete Successfully"."</div>";
				}
			?>
		<input type="text" id="myInput" class="myInput" onkeyup="myFunction()" placeholder="Search for Class names.." title="Type in a name">

		<table id="myTable">
		  <tr class="header">
			<th> Class Name</th>
			<th>Action</th>
		  </tr>
		  <?php //All techer Fetchees from database
			$select_subject="select * from class";
			$select_subject_result=$connect->query($select_subject);
		  ?>
		  <?php if($select_subject_result){ ?>
		  <?php while($trow=$select_subject_result->fetch_assoc()){?>
		  <tr>
			<td><?php echo $trow['name'];?></td>
			<td> <a onclick="return confirm('Are You sure want to Delete?');" href="deleteClass.php?id=<?php echo $trow['id'];?>" title="Delete Class"><span class="glyphicon glyphicon-trash"></span></a></td>
		  </tr>
		  <?php } ?>
		  <?php } ?>
		</table>
	</div>
	<div class="col-md-3"></div>
</div>
		<!--View Student Modal-->

		<!--Edit student Modal-->
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function printFunction() {
  $("#div3").addClass("printable");
    window.print();
}
</script>
	</div>








<?php unset($_SESSION['delete_success']);?>


<?php include "inc/footer.php";?>