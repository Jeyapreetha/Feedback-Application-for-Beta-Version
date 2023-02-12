<?php
include "config.php";
	if(isset($_POST["name"]))

	{		
	echo  $query = "insert into tbl_sub_category (`category_id`,`sub_name`,`status`) values (".$_POST["categoryId"].",'".$_POST["name"]."' , ".$_POST["status"].")";
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
			jQuery.post("add_subcategory.php",jQuery(this).serialize(),function(data,status){
	
				if(data.trim()=="success")
				{
					window.location.href="subcategory.php?msg=Category Added Successfully";
				}
				else
				{
					window.location.href="subcategory.php?msg= Failed to Add Category  ";
				
				}
						
			});
			
			
	});
});

	</script>
	<form id="addcategory" method="POST">
	<table>
<tr>
<td>Name</td>
<td><input  class="form-control" type= "text" name ="name" placeholder="Sub-Category Name"></td>
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