<?php
include "config.php";
	
if (isset($_POST["id"]))
{
	$query = "delete  from tbl_admin_details where admin_id=".$_POST["id"] ."; delete from tbl_admin where id=".$_POST["id"]." ;";
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

 