<?php
include "config.php";
$status=false;
$msg="";
if (isset($_POST["username"]))
{
$query = "insert into tbl_user(`username`,`password`) values('".$_POST["username"]."' , '".$_POST["password"]."')";
if($result=$conn->query($query))
{
$insertId=$conn->insert_id;

$query = "insert into tbl_user_details(`user_id`,`first_name`,`last_name`,`email`,`mobile`) values(".$insertId." , '".$_POST["name"]."', '".$_POST["lastName"]."', '".$_POST["email"]."', '".$_POST["mobile"]."')";
if($result=$conn->query($query))
{
	$status=true;
	
	 $_SESSION["id"] =$insertId;
	 $_SESSION["first_name"]=$_POST["firstname"];
	  $_SESSION["last_name"]=$_POST["lastname"];
	    Header("Location:indexs.php");
	
	
	
}
else 
{
	$status=false;
	
	$msg ="Failed";
	
}
}
else 
{
	$status=false;
	
	$msg ="Failed";
	
}
	
}


?>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css"> 
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/bootstrap.min.js"> </script>
<title>USER REGISTRATION</title>
</head>
<body>
<div class="container">
<?php include "includes/header.php";
?>
			<section class="row content">




<h3><?=$msg?> </h3>
<div class="border_gray grid_content content_grid">
    <h4 class="column-title in_center"><i class="fa fa-pencil blue"> </i> <span class="blue">Registration</span></h4>                 
	<form method="POST">
			<div class="row" style="margin-top:0;padding-top:0;">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-sm-offset-3"><b class="blue">Name *</b> </div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-3 col-md-offset-3">
					<div class="form-group">
						<input type="text" value="" name="name" id="name" class="form-control input-lg" placeholder="First Name *">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="form-group">
						<input type="text" value="" name="lastName" id="lastName" class="form-control input-lg" placeholder="Last Name *">
					</div>
				</div>
			</div>
			
			<div class="row" style="margin-top:0;padding-top:0;">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-sm-offset-3"><b class="blue">Mobile No. *</b> </div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-sm-offset-3">
					<div class="form-group">
						<input type="text" value="" name="mobile" id="mobile" class="form-control input-lg" placeholder="Mobile No. - With Country Code *">
					</div>
				</div>
			</div>
			<div class="row" style="margin-top:0;padding-top:0;">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-sm-offset-3"><b class="blue">Email</b> </div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-sm-offset-3">
					<div class="form-group">
						<input type="email" value="" name="email" id="email" class="form-control input-lg" placeholder="Email *">
					</div>
				</div>
			</div>
			</div>
			<div class="row" style="margin-top:0;padding-top:0;">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-sm-offset-3"><b class="blue">Username</b> </div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-sm-offset-3">
					<div class="form-group">
						<input type="username" value="" name="username" id="username" class="form-control input-lg" placeholder="username *">
					</div>
				</div>
			</div>
			<div class="row" style="margin-top:0;padding-top:0;">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-sm-offset-3"><b class="blue">Password *</b> </div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-3 col-md-offset-3">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password *">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="form-group">
						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password *" tabindex="6">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3  col-md-6 col-md-offset-3">
					<button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="7">Register</button></div>
				</div>
			</form>
		</div>
</section>
<?php include "includes/footer1.php"
?>		
</div>
</body>
<html>