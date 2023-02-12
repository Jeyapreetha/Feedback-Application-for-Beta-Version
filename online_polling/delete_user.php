<?php
include "config.php";
	
if (isset($_POST["id"]))
{
	$query = "delete  from tbl_user_details where user_id=".$_POST["id"] ."; delete from tbl_user where id=".$_POST["id"]." ;";
			 $result= $conn->multi_query($query);
			 if($result)
			 {
				 echo "success";
			 }
			 else{
				 echo "failed";
				 
			 }
			
			
		}
 ?>

 