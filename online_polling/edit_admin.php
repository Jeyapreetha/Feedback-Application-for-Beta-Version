<?php
include "config.php";
	
if (isset ($_POST["id"]))
{
	$query = "select * from tbl_admin_details where admin_id=".$_POST["id"];
			 $result= $conn->query($query);
			 if($result->num_rows!=0)
			 {
			$row =$result->fetch_assoc();
				$_SESSION ["admin_edit_id"]=$_POST["id"];
	?>
	<script>
	jQuery(document).ready(function(){
		jQuery("#editcategory").submit(function(event){
			event.preventDefault;
			jQuery.post("edit_admin.php",jQuery(this).serialize(),function(data,status){
				
				if(data.trim()=="success")
				{
					window.location.href="admin_listing.php?msg=Admin Updated Successfully";
				}
				else
				{
					window.location.href="admin_listing.php?msg= Failed to Update Admin ";
				
				}
						
			
			});
	});
});

	</script>
	<h1>EDIT ADMIN</h1>
	<form id="editcategory" method="POST">
	<table>
<tr>
<td>First Name</td>
<td><input value="<?=$row["first_name"]?>" class="form-control" type= "text" name ="name" placeholder="First Name"></td>

</tr>
<tr>
<td>Last Name</td>
<td><input value="<?=$row["last_name"]?>" class="form-control" type= "text" name ="lastName" placeholder="Last Name"></td>

</tr>
<tr>
<td>Email</td>
<td><input value="<?=$row["email"]?>" class="form-control" type= "text" name ="email" placeholder="Email"></td>

</tr>
<tr>
<td>Mobile</td>
<td><input value="<?=$row["mobile"]?>" class="form-control" type= "text" name ="mobile" placeholder="Mobile"></td>
</tr>
<tr>
<td>Password</td>
<td><input  class="form-control" type= "text" name ="password" placeholder="Password"></td>

</tr>
<tr>
<td>Retype password</td>
<td><input  class="form-control" type= "text" name ="retypePassword" placeholder="Retype Password"></td>

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
	 $query = "update  tbl_user_details set `first_name`='".$_POST["name"]."' , `last_name`='".$_POST["lastName"]."' ,`email`='".$_POST["email"]."' ,`mobile`='".$_POST["mobile"]."' ,`status`=".$_POST["status"]." where user_id=".$_SESSION["user_edit_id"];
	 
			 $result= $conn->query($query);
			 if($_POST["password"]!="")
			 {
			$query = "update  tbl_user set `password`='".$_POST["password"]."'  where id=".$_SESSION["admin_edit_id"];
	 
			 $result= $conn->query($query);
			 }
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
	 Header("Location:admin_listing.php");
 }
 ?>

 