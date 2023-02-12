<?php
include "config.php";
	
if (isset ($_POST["id"]))
{
	$query = "select * from tbl_sub_category where id=".$_POST["id"];
			 $result= $conn->query($query);
			 if($result->num_rows!=0)
			 {
			$row =$result->fetch_assoc();
				$_SESSION ["category_edit id"]=$_POST["id"];
	?>
	<script>
	jQuery(document).ready(function(){
		jQuery("#editcategory").submit(function(event){
			event.preventDefault;
			jQuery.post("edit_subcategory.php",jQuery(this).serialize(),function(data,status){
	
				if(data.trim()=="success")
				{
					window.location.href="subcategory.php?msg=Category Updated Successfully";
				}
				else
				{
					window.location.href="subcategory.php?msg= Category Failed to Updated ";
				
				}
						
			
			});
	});
});

	</script>
	<form id="editcategory" method="POST">
	<table>
<tr>
<td>Name</td>
<td><input value="<?=$row["sub_name"]?>" class="form-control" type= "text" name ="name" placeholder="Category Name"></td>
</tr>
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

<tr>
<td>Status</td>
<td>   
		<select  name="status" class="form-control" id="Status" placeholder="status">
		<option value ="">--- Select Status ---</option>
		<option value ="0" <?php if($row["status"]==0){echo "selected";}?>>Enabled</option>
		<option value ="1"<?php if($row["status"]==1){echo "selected";}?>>Disabled</option>
		</select>
        
</td>
<tr>
<td></td>
<td> <button type="submit" class="btn btn-primary">Update</button>
	  <button type="button" class="btn btn-default" >Cancel</button>

</td>

</tr>
</table>
</form>	
	<?php
			}
}
else if (isset ($_POST["name"]))
{
	$query = "update  tbl_category set `name`='".$_POST["name"]."' , `category_id`=".$_POST["status"].",`status`=".$_POST["status"]." where id=".$_SESSION["category_edit id"];
			 $result= $conn->query($query);
			if(!$result)
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
	 Header("Location:subcategory.php");
 }
 ?>

 