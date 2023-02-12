<?php
include"config.php";
?>
<header class="row pageheader">
<ul class="topmenu">
<li>Welcome:
				
			<?php 
				echo ucwords($_SESSION["first_name"]." ".$_SESSION["last_name"]);
			
			?>
				</li>


<ul class="topmenu">
<li><a href="user.php"><i class="fa fa-sign-in" aria-hidden="true">User Login</i></a></li>
	<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true">Admin Logout</i></a></li>

	<li><a href="user.php">Admin Login</a></li>

</ul>
</li>
</ul>
	
				<nav>
				
					<ul class="menu">
						<li>
							<a href="admin_listing.php"><i class="fa fa-user" aria-hidden="true"> Admins</i>
							</a>
							</li>
						<li>
							<a href="user_listing.php"><i class="fa fa-users" aria-hidden="true"> Users</i>
							</a>
							</li>
							
							<li>
							<a href="products.php"><i class="fa fa-bookmark" aria-hidden="true"> Products</i>
							</a>
							</li>
							
							<li>
							<a href="subcategory.php"><i class="fa fa-th-list" aria-hidden="true"> Sub-Category</i>
							</a>
							</li>
							
							<li>
							<a href="category.php"><i class="fa fa-list-alt" aria-hidden="true"> Category</i>
							</a>
							</li>
													
					</ul>
				</nav>
			</header>	
			