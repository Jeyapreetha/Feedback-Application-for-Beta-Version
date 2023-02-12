<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css"> 
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<script src="js/jquery-3.0.0.min.js" ></script>
<script src="js/bootstrap.min.js"> </script>

<script>
var id=0;
jQuery(document).ready(function(){
	jQuery(".content").css("background","");
	
	
jQuery(".edit").click(function(){
	jQuery.post("edit_product.php",{id:jQuery(this).attr("data-id")},function(data,status){
		jQuery(".content").html(data);
		
	});
	});
		
	jQuery("#btnAdd").click(function(){
	jQuery.post("add_product.php",{},function(data,status){
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
	delete_food();
	jQuery(".alertDiv").css("display","none");
	});
	
});

function delete_food(){
	jQuery.post("delete_product.php",{id:id},function(data,status){
	 if(data.trim()=="success")
		 
		{
			window.location.href="products.php?msg=Product Deleted Successfully";
		}
		else
		{
						window.location.href="products.php?msg=Failed to Delete Product";
			
		}	
	});	
}

</script>
<title>PRODUCTS</title>
</head>
<body>
<div class="alertDiv">
<div class="col-md-4 col-md-offset-4" >
  <button type="submit" class="btn btn-default cancel close">X</button>
<h1>Do You Want To Delete?</h1>
<h4>This Action Cannot Be Undone</h4>
<button type="submit" class="btn btn-success confirm">Confirm </button>
  <button type="submit" class="btn btn-Danger cancel">Cancel</button>
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
 <h1 class="pageHead">Product List
 <button id="btnAdd" type="button" class="btn btn-info">Add Product</button>
 </h1>

<table border=1 class="table table-hover">
<tr class="head">
					<th><label for="inputUser" class=" control-label">Image</label></th>
					<th><label for="inputUser" class=" control-label">Name</label></th>
					<th><label for="inputUser" class=" control-label">Category</label></th>
					<th><label for="inputUser" class=" control-label">Description</label></th>
					<th><label for="inputUser" class=" control-label">Action</label></th>
					</tr>
<?php
include "config.php";

			 $query = "select a.id,a.name,a.sub_category_id,a.image_path,a.description,b.sub_name
			 from tbl_products a LEFT JOIN tbl_sub_category b ON a.sub_category_id=b.id";
			 $result= $conn->query($query);
			 if($result->num_rows!=0)
			 {
				while($row = $result->fetch_assoc())
				 {
					 $statusName="";
					 
					?>
					 <tr>
					 <td>
					 <img class="smallthump" src ="products/<?=$row["image_path"]?>"/>
					 </td>
					 <td>
					 <?=$row["name"]?>
					 </td>
					 <td>
					 <?=$row["sub_name"]?>
					 </td>
					 <td>
					 <?=$row["description"]?>
					 </td>
					 <td>
						<button data-id="<?=$row["id"]?>" type="submit" class="btn btn-success edit">Edit</button>
						<button data-id="<?=$row["id"]?>" type="button" class="btn btn-danger delete">Delete</button>
					 </td>
					 
				</tr>
					 
					 <?php
				 }
			 }
		?>
</table>
</section>
<?php include "includes/footer1.php"
?>		
</div>
</body>
<html>




