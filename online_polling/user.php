<html>
<head> 
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/bootstrap-theme.min.css">`
<link rel="stylesheet" href="css/font-awesome.min.css">

<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/bootstrap.min.js" ></script>
</head>
<title> Polling</title>
<body>
<div class="container">
<?php include "includes/header.php";
?>
			<section class="row content">
			<div class ="col-md-6 col-md-offset-3 loginForm">
			<h1> USER LOGIN</h1>	
<form class="form-horizontal" method="POST" action="user_login.php">
   
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name ="username" id="username" placeholder="username">
	  <span class="glyphicon glyphicon-user form-control-feedback"></span>
		<span style="color:red"></span>
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password"  name = "password" class="form-control" id="password" placeholder="password">
	  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	  <span style="color:red"></span>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
              </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	
	<h3><?php 
	if (isset($_GET["msg"]))
		echo $_GET["msg"];
?>
 </h3>
      <button type="submit" class="btn btn-primary">Sign in</button>
	  
	  <button type="button" class="btn btn-info" onClick= "window.location.href='register.php'">Register</button>
	   

    </div>
  </div>
</form>
</div>
			</section>
		<?php include "includes/footer.php"
?>	
</div>
			
</body>  

</html>