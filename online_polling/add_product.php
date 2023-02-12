<?php
include "config.php";
if (isset($_POST["name"]))
{
	$fileName=$_FILES["productImage"]["name"];
	$productTempImage=$_FILES["productImage"]["tmp_name"];
	$productImageSize=$_FILES["productImage"]["size"];
	if($productImageSize>0)
	{
		$ext=pathinfo($fileName,PATHINFO_EXTENSION);
		if($ext=="jpg" || $ext=="png" || $ext=="bmp" || $ext=="gif" )
		{
				if(!file_exists($fileName))
				{
					move_uploaded_file($productTempImage,"products/".$fileName);
				}
		}
	}
	$query = "insert into tbl_products(`name`, `status`, `sub_category_id`,`description` ,`image_path`) values('".$_POST["name"]."' , ".$_POST["status"]." , ".$_POST["subcategoryId"].",'".$_POST["description"]."' ,'".$fileName."')";
	$result= $conn->query($query);
	
	$insertId=$conn->insert_id;
	foreach($_POST["pollContent"] as $poll):
		$query = "insert into tbl_poll_description(`product_id`,`poll_content`) values(".$insertId." , '".$poll."')";
		$result=$conn->query($query);
	endforeach;

			 
			 if (!$result)
			 {
				
				 echo "failed";

			 }
			 else
			 {
				  echo "success";
			 }
}
else

	{	
	?>
<script>
jQuery(document).ready(function(){
	jQuery("#categoryId").change(function(event){
		jQuery.post("subcategory.php", {cat_id:jQuery(this).val()}, function(data, success){
			jQuery("#subcategoryId").html(data);
		});
	});
	var element = null;
	jQuery("#add").click(function(event){
		event.preventDefault();
		
		if(element == null)
		{
			element = jQuery(".pollContent");
		}
		element.clone().appendTo(".poll");
	});
		jQuery("#addProduct").submit(function(event){
			event.preventDefault();
			var frm=new FormData(document.getElementById("addProduct"));
			jQuery.ajax({
				url:"add_product.php",
				type:"POST",
				data:frm,
				enctype:"multipart/form-data",
				processData:false,
				contentType:false
				
			}).done(function(data){
        if(data.trim()=="success")
		{
			window.location.href="products.php?msg=products added Successfully";
		}
		else
		{
						window.location.href="products.php?msg=Failed to add product";
			
		}
		
		})
	});

});
</script>
	<form id="addProduct" enctype="multipart/form-data" method="POST">
	<div class="col-sm-8 form" >

<section class="row forms">
		<div class="form-group">
			<label for="username">Product Name</label><span></span>
			<input  type="text" name="name" class="form-control" id="name" placeholder="Product Name">
		</div>
		<div class="form-group">
			<label for="password">Category</label><span></span>
			<select  name="categoryId" class="form-control" id="categoryId" placeholder="CategoryId">
		<option value ="0">--- Select Category---</option>
		<?php
		 $catId=$row["category_id"]; 
			 $query = "select * from tbl_category";
			 $result1= $conn->query($query);
			 if($result1->num_rows!=0)
			 {
				while($row1 = $result1->fetch_assoc())
				 {
					$isselected="";
					if($row1["id"]==$catId) {$isselected="selected";}
					 echo "<option value = '". $row1["id"]."' ".$isselected ." >".$row1["name"]."</option>";
				 }
			 }
		?>
	</select>
	</div>
		<div class="form-group">
			<label for="password">SubCategory</label><span></span>
			<select  name="subcategoryId" class="form-control" id="subcategoryId" placeholder="Category Id">
			</select>
		</div>
		<div class="form-group">
			<label for="name">Description</label><span></span>
			<textarea class="form-control" type="text" name="description" placeholder="Description"></textarea>
		</div>
		<div class="form-group poll">
			<label for="pollcontent">Poll Content</label><span></span>
			<button id="add" type="submit" class="btn btn-info add">Add</button>
			<input type="text" name="pollContent[]" class="form-control pollContent" placeholder="Poll Content">
			
		</div>
		<div class="form-group">
			<label for="status">Status</label><span></span>
			<select  name="status" class="form-control" id="status" placeholder="status">
			<option value ="">--- Select Status ---</option>
			<option value ="0">Enabled</option>
			<option value ="1">Disabled</option>
			</select>
			
		</div>
		<div class="form-group">
			<label for="emailId">Product Image</label><span></span>
			<input type="file" name="productImage" >
		</div>
	<center>	<button type="submit" class="btn btn-primary">Save</button>
		<button type="submit" class="btn btn-default">Cancel</button> 
</center>

	</div>
</section>
</form>
<?php

}


?>


	
	



