<?php
include "config.php";
	
if (isset ($_POST["id"]))
{
	$query = "select * from tbl_category where id=".$_POST["id"];
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
			jQuery.post("edit_category.php",jQuery(this).serialize(),function(data,status){
	
				if(data.trim()=="success")
				{
					window.location.href="category.php?msg=Category Updated Successfully";
				}
				else
				{
					window.location.href="category.php?msg= Category Failed to Updated ";
				
				}
						
			
			});
	});
});

	</script>
	<form id="editcategory" method="POST">
	<table>
<tr>
<td>Name</td>
<td><input value="<?=$row["name"]?>" class="form-control" type= "text" name ="name" placeholder="Category Name"></td>

</tr>
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
	$query = "update  tbl_category set `name`='".$_POST["name"]."' , `status`=".$_POST["status"]." where id=".$_SESSION["category_edit id"];
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
	 Header("Location:Category.php");
 }
 ?>

 