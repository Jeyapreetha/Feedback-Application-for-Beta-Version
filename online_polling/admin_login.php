<?php
include "config.php";
 $query = "select b.first_name ,b.last_name from tbl_admin a left join tbl_admin_details b on a.id=b.admin_id where a.`username` = '".$_POST["username"]."' and a.`password` = '".$_POST["password"]."'";
 $result= $conn->query($query);
 if($result->num_rows!=0)
 {
while($row = $result->fetch_assoc())
 {
	 $_SESSION["first_name"]=$row["first_name"];
	  $_SESSION["last_name"]=$row["last_name"];
	    Header("Location:admin_listing.php");
 
	   
 }
	
 }
 else 
 {
	 Header("Location:user_login.php?msg=Invalid Credentials");
 }
 
 ?>
 <html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<script src="js/jquery-3.0.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
	</head>
	<body>
	
		<div class="container">
		
		<header class="row pageheader">
			<ul class="customerDetails">
				<li>First Name:  
				
			<?php 
				echo $_SESSION["first_name"];
			
			?>
				</li>
				<li>Last Name:  
				
			<?php 
				echo $_SESSION["last_name"];
			
			?>
				</li>
				<li>Role:  
				
			<?php 
				echo $_SESSION["role"];
			
			?>
				</li>
			</ul>
			<?php include "includes/header.php";
?>

							</header>	
			<section class="row content">
			</section>
			<?php include "includes/footer.php"
?>		
		</div>
	</body>
</html>
