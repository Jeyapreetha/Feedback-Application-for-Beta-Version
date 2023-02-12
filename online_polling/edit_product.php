<?php
include "config.php";
if (isset($_POST["id"]))
{
	 $query = "select * from tbl_products where id=".$_POST["id"];
			 $result= $conn->query($query);
			 if($result->num_rows!=0)
			 {
				$row = $result->fetch_assoc();
 $_SESSION["product_editid"]= $_POST["id"];
	?>
<script>
jQuery(document).ready(function(){
	jQuery("#categoryId").change(function(event){
		jQuery.post("subcategory.php", {cat_id:jQuery(this).val()}, function(data, success){
			jQuery("#subcategoryId").html(data);
		});
	});
		jQuery("#editProduct").submit(function(event){
			event.preventDefault();
			var frm=new FormData(document.getElementById("editProduct"));
			jQuery.ajax({
				url:"edit_product.php",
				type:"POST",
				data:frm,
				enctype:"multipart/form-data",
				processData:false,
				contentType:false
			}).done(function(data){
			
			
				if(data.trim()=="success")
	
		{
			window.location.href="products.php?msg=Product Updated Successfully";
		}
		else
		{
						window.location.href="products.php?msg=Failed to Update Product";
			
		}
		
		});
	});

});
</script>
	<form id="editProduct" enctype="multipart/form-data" method="POST">
	<div class="col-sm-8 form" >

	<div class="form-group">
			<label for="username">Product Name</label><span></span>
			<input value="<?=$row["name"]?>" class="form-control" type="text" name="name" placeholder="Product Name">
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
					 echo "<option value = '". $row1["id"]."' ".$isselected." >".$row1["name"]."</option>";
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
			<input class="form-control" value="<?=$row["description"]?>" type="text" name="description" placeholder="Description">
		</div>
	<div class="form-group">
	<label for="aliasname">Status</label><span></span>
	<select  name="status" class="form-control" id="status" placeholder="status">
	<option value ="">--- Select Status ---</option>
	<option value ="0" <?php if($row["status"]==0) {echo "selected";} ?> >Enabled</option>
	<option value ="1" <?php if($row["status"]==1) {echo "selected";} ?> >Disabled</option>
	</select>
	</div>
	<div class="form-group">
	<label for="emailId">Product Image</label><span></span>
	<input type="file" name="productImage" >
	<button type="submit" class="btn btn-primary">Update</button>
		<button type="submit" class="btn btn-default">Cancel</button>
</div>
		</section>

</form>

	
	<?php
			 }
}
else if (isset($_POST["name"]))
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
	
	$query = "update tbl_products set `name`='".$_POST["name"]."',`description`='".$_POST["description"]."',`sub_category_id`=".$_POST["subcategoryId"].", `status`=".$_POST["status"]." , `sub_category_id`='".$_POST["categoryId"]."' ,`image_path`='".$fileName."' where id=". $_SESSION["product_editid"];
			 $result= $conn->query($query);
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
	Header("Location:products.php");
}
?>





