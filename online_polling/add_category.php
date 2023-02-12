<?php
include "config.php";
	if(isset($_POST["name"]))

	{		
	 $query = "insert into tbl_category (`name`, `status`) values ('".$_POST["name"]."' , ".$_POST["status"].")";
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
else{	
	?>
	<script>
	jQuery(document).ready(function(){
		jQuery("#addcategory").submit(function(event){
			event.preventDefault();
			jQuery.post("add_category.php",jQuery(this).serialize(),function(data,status){
	
				if(data.trim()=="success")
				{
					window.location.href="category.php?msg=Category Added Successfully";
				}
				else
				{
					window.location.href="category.php?msg= Failed to Add Category  ";
				
				}
						
			});
			
			
	});
});

	</script>
	<form id="addcategory" method="POST">
	<table>
<tr>
<td>Name</td>
<td><input  class="form-control" type= "text" name ="name" placeholder="Category Name"></td>

</tr>
<tr>
<td>Status</td>
<td>   
		<select  name="status" class="form-control" id="Status" placeholder="status">
		<option value ="">--- Select Status ---</option>
		<option value ="0">Enabled</option>
		<option value ="1">Disabled</option>
		</select>
        
</td>
<tr>
<td></td>
<td> <button type="submit" class="btn btn-primary">Save</button>
	  <button type="button" class="btn btn-default" >Cancel</button>

</td>

</tr>
</table>
</form>	
<?php
	}
	?>