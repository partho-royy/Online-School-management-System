<?php session_start();?>
<?php
	if(!isset($_SESSION['admin_success'])){
		header('location:../index.php');
	}
?>
<?php include "../config/db.php";?>
<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
	<hr>
	<div class="row">
		<div class="col-md-6">
				<h3>All Parents</h3>
		</div>
		<form action="" method="post">
		<div class="col-md-4">
				<div class="form-group">
						<label for="formGroupExampleInput">Select Father/Mother <font color="red">*</font></label>
						<select class="form-control" id="formGroupExampleInput" name="parents">
							<option>Select</option>
							<option value="father">Father</option>
							<option value="mother">Mother</option>
						</select>
				</div>	
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<input type="submit" style="margin-top:25px;" class="form-control" id="formGroupExampleInput" name="submit" value="submit">
			  </div> 
		</div>
		</form>
	</div>
	<hr>
	
	<div class="row">
		<div class="col-md-12">
		<input type="text" id="myInput" class="myInput" onkeyup="myFunction()" placeholder="Search for Parents names.." title="Type in a name">

		<table id="myTable">
		  <tr class="header">
			<th>SL</th>
			<th>Name</th>
			<th>Phone</th>
			<th>Occupation</th>
			<th>Email</th>
			<th>Action</th>
		  </tr>
		  <?php
			if(isset($_POST['submit'])){
			$parents=$_POST['parents'];
			
			$select="select * from `".$parents."`";
			$result=$connect->query($select);
		
	?>
		  <?php if($result){?>
		   <?php $i=1;?>
		  <?php while($row=$result->fetch_assoc()){?>
		 
		  <tr>
			<td><?php echo $i;?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['phone'];?></td>
			<td><?php echo $row['occupation'];?></td>
			<td><?php echo $row['email'];?></td>
			<td><a href="viewParents.php?id=<?php echo $row['id'];?> && parents=<?php echo $parents;?>" target="_blank"><span class="glyphicon glyphicon-eye-open"></span></a> <span class="glyphicon glyphicon-trash"></span></td>
		
		  <?php $i++; ?>
		  <?php } ?>
		  <?php } ?>
				
		  <?php } ?>
		</table>
	</div>
</div>

<!--Modals-->
<!-- Large modal -->


<div class="modal fade docs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <?php
	$modal="select * from parents whrere id='data-id'";
  ?>
    <div class="modal-content">
     <p>MY name IS Partho</p>
     <p>MY name IS Partho</p>
     <p>MY name IS Partho</p>
     <p>MY name IS Partho</p>
     <p>MY name IS Partho</p>
     <p>MY name IS Partho</p>
     <p>MY name IS Partho</p>
     <p>MY name IS Partho</p>
     <p>MY name IS Partho</p>
     <p>MY name IS Partho</p>
     <p>MY name IS Partho</p>
    </div>
  </div>
</div>


<!--Modals-->
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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











<?php include "inc/footer.php";?>