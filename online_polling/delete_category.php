<?php
include "config.php";
	
if (isset($_POST["id"]))
{
	$query = "delete  from tbl_category where id=".$_POST["id"];
			 $result= $conn->query($query);
			 if($result)
			 {
				 echo "success";
			 }
			 else{
				 echo "failed";
				 
			 }
			
			
		}
 ?>

 