<header class="row pageheader">
<a class="ad_banner" href="index.php"></a>

<ul class="topmenu">
<?php 
if(isset($_SESSION["wallet"])){
	?>

	<li>Welcome  
				
			<?php 
				echo ucwords($_SESSION["first_name"]." ".$_SESSION["last_name"]);
			
			?>
				</li>
				<?php 
}
?>

<li>
	<a href=""><i class="fa fa-user" aria-hidden="true">Login </i></a>
	<ul class="submenu">
		
		<li><a href="admin.php"><i class="fa fa-sign-in" aria-hidden="true">Admin Login</i></a></li>
<?php 
if(isset($_SESSION["wallet"])){
	?>
	<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true">User Logout</i></a></li>

	<?php
}
else{
	?>
	<li><a href="user.php"><i class="fa fa-sign-in" aria-hidden="true">User Login</i></a></li>

	<?php
	
}
?>

</ul>
</li>
</ul>
</header>	
			
<header class="row pageheader1">

<ul class="social1">
    <li ><a href="index.php" class="foo1 fa fa-home"><span class="sr-only"></span></a>
    </li>
	
    <li ><a href="indexs.php" class=" foo12 fa fa-picture-o" ><span class="sr-only"></span></a>
    </li>
	<li ><a href="" class=" foo12 fa fa-info-circle" ><span class="sr-only"></span></a>
    </li>
	<li ><a href="" class=" foo12 fa fa-phone-square" ><span class="sr-only"></span></a>
    </li>
	
</ul>

</header>
			<section class="row contentx">
			</section>
