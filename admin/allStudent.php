<?php session_start();?>
<?php
	if(!isset($_SESSION['admin_success'])){
		header('location:../index.php');
	}
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
	<div class="row">
		<div class="col-md-12">
			<hr>
				<h3>All Student</h3>
			<hr>
		</div>
	</div>
		
			<?php
				if(isset($_SESSION['delete_success'])){
					echo "<div class='alert alert-danger' role='alert'>"."Student Delete Successfully"."</div>";
				}
			?>
			<?php
				if(isset($_SESSION['success_edit'])){
					echo "<div class='alert alert-info' role='alert'>"."Student Edit Successfully"."</div>";
				}
			?>
		
	<div class="row">
		<div class="col-md-3"><input type="text" id="myInput" class="myInput" onkeyup="nameFunction()" placeholder="Search by Name.." title="Type in a name"></div>
		<div class="col-md-3"><input type="text" id="cinput" class="myInput" onkeyup="classFunction()" placeholder="Search by Class.." title="Type in a name"></div>
		<div class="col-md-3"><input type="text" id="sinput" class="myInput" onkeyup="sectionFunction()" placeholder="Search by Section.." title="Type in a name"></div>
		<div class="col-md-3"><input type="text" id="pinput" class="myInput" onkeyup="phoneFunction()" placeholder="Search by Phone.." title="Type in a name"></div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<table id="myTable">
		  <tr class="header">
			<th>SL</th>
			<th>Photo</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Father</th>
			<th>Class</th>
			<th>Section</th>
			<th>Address</th>
			<th>DOB</th>
			<th>Mobile No</th>
			<th>Action</th>
		  </tr>
		  <?php
			$query="select * from student";
			$result=$connect->query($query);
		  ?>
		  <?php if($result){?>
		  <?php $i=1;?>
		  <?php while($row=$result->fetch_assoc()){?>
		  <tr>
			<td><?php echo $i;?></td>
			<td><img src="<?php echo $row['student_photo'];?>" class="user-logo" height="50" width="2"/></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['gender'];?></td>
			<td><?php echo $row['father_name'];?></td>
			<td><?php echo $row['class'];?></td>
			<td><?php echo $row['section'];?></td>
			<td>Thakurgaon</td>
			<td><?php echo $row['dob'];?></td>
			<td><?php echo $row['phone'];?></td>
			<td><a href="viewStudent.php?id=<?php echo $row['id'];?>" target="_blank" title="View"> <span class="glyphicon glyphicon-eye-open"></a> <a href="editStudent.php?id=<?php echo $row['id'];?>" title="Edit" target="_blank"><span class="glyphicon glyphicon-edit"></span></a> <a href="deleteStudent.php?id=<?php echo $row['id'];?>" title="Delete" onClick="return confirm('Are You Sure Want to Delete?');"/><span class="glyphicon glyphicon-trash"></span></a></td>
		  </tr>
		  <?php $i++; ?>
		  <?php } ?>
		  <?php } ?>
		</table>
	</div>
</div>
		
		<!--Edit student Modal-->
			<div class="row">
			<div class="col-md-12">
				<div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Edit Student Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					 
					  </form>
					</div>
				  </div>
				</div>
			</div>
		</div>
		<!--Edit student Modal-->
		
<script>
//search by student name
function nameFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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
//search by student name

//search by class
	function classFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("cinput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
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
//search by class

//search by section
	function sectionFunction(){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("sinput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
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
//search by section

//search by phone
	function phoneFunction(){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("pinput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[9];
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
	
//search by phone


function printFunction() {
  $("#div3").addClass("printable");
    window.print();
}
</script>
	</div>









<?php unset($_SESSION['delete_success']);?>
	<?php unset($_SESSION['success_edit']);?>

<?php include "inc/footer.php";?>