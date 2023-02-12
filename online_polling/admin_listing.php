<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-3.0.0.min.js" ></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
var id =0;

jQuery(document).ready(function(){
	jQuery(".content").css("background","");
	
	jQuery(".edit").click(function(){
	jQuery.post("edit_admin.php",{id:jQuery(this).attr("data-id")},function(data,status){
	
	jQuery(".content").html(data);
	
	
	
	});

});

	jQuery(".delete").click(function(){
		id=jQuery(this).attr("data-id");
		jQuery(".alertDiv").css("display","block");
	});
	jQuery(".cancel").click(function(){
		jQuery(".alertDiv").css("display","none");
	
	});
	jQuery(".confirm").click(function(){
		delete_category();
		jQuery(".alertDiv").css("display","none");
	
	});
});
function delete_category(){
	jQuery.post("delete_admin.php",{id:id},function(data,status){
		if(data.trim()=="success")
		{
			window.location.href="admin_listing.php?msg=user Deleted Successfully";
			
		}
		else{
			window.location.href="admin_listing.php?msg=Failed to  Delete user";
			
		}
	});
}
</script>
<title>ADMIN LISTS</title>
</head>
<body>
<div class="alertDiv">
<div class ="col-md-4 col-md-offset-4" >
<button data-id="<?=$row["id"]?>" type="button" class="btn btn-Danger cancel close" >X</button>
					
<h1>Do You want to delete?</h1>
<h4>This Action cannot be ndone</h4>

					<button data-id="<?=$row["id"]?>" type="submit" class="btn btn-success confirm">Confirm</button>
					<button data-id="<?=$row["id"]?>" type="button" class="btn btn-Danger cancel" >Cancel</button>
					
</div>
</div>
<div class="container">
<?php include "includes/admin_header.php";
?>
			<section class="row content">
			<h3><?php 
	if (isset($_GET["msg"]))
		echo $_GET["msg"];
?>
 </h3>
	  <h1 class="pagehead"> Admin List
</h1>
    
<table border=1 class="table table-striped">

<?php
include "config.php";

	

			 $query = "select * from tbl_admin_details where status=0";
			 $result= $conn->query($query);
			 if($result->num_rows!=0)
			 {
				 $statusName="";
				while($row = $result->fetch_assoc())
				 {
					 switch($row["status"])
					 {
						 case 0:
						 $statusName="Enable";
						 break;
						 
						 case 1:
						 $statusName="Disable";
						 break;
						 
						 Default:
						 $statusName="Unknown";
						 break;
						 
					 }
					 ?>
					 
					 <tr>
					 <td>
					 <?=$row["id"]?>
					 </td>
					 <td>
					 <?=$row["first_name"]?>
					 </td>
					  <td>
					 <?=$row["last_name"]?>
					 </td>
					  <td>
					 <?=$row["email"]?>
					 </td>
					  <td>
					 <?=$row["mobile"]?>
					 </td>
					 <td>
					 <?=$statusName?>
					 </td>
					 <td>
					 
    

					<button data-id="<?=$row["admin_id"]?>" type="submit" class="btn btn-success edit"><i class="fa fa-edit" aria-hidden="true">Edit</i></button>
					<button data-id="<?=$row["admin_id"]?>" type="button" class="btn btn-Danger delete" >Delete</button>
					</td>
					 
					 
				</tr>
					 
					 <?php
					 
					 
				 }
					
			 }
 

else
{
	header("Location:index.php");
}	
		?>
</table>
</section>
<?php include "includes/footer1.php"
?>		
</div>
</body>
<html>
