<?php
include "config.php";
if(isset($_POST["productId"]))
{
	$productId = $_POST["productId"];
	$ipAddress = $_SERVER["REMOTE_ADDR"];

	$query = "select COUNT(*) as total from tbl_poll where `product_id`= ".$productId."  AND `ip_address`= '".$ipAddress."'";
	$result1 = $conn->query($query);
	if($result1->fetch_assoc()["total"] == 0)
	{
		for($i = 0; $i < count($_POST["polId"]); $i++)
		{
			$polValue = $_POST["star".$i];
			$polId = $_POST["polId"][$i];
			$query = "insert into tbl_poll(`product_id`,`poll_id`,`poll_value`,`ip_address`) values(".$productId." , ".$polId.",".$polValue.",'".$ipAddress."')";
			$result=$conn->query($query);
			Header("Location:index.php");
		}
	}
	else
	{
		echo "Thank you for your interest, It seems you Already Rated this product";
	}
}

?>