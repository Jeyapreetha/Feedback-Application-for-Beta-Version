<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-3.0.0.min.js" ></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/lightbox.min.css">
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
var id=0;
jQuery(document).ready(function(){
	jQuery(".content").css("background","#f2dede");
	

	jQuery(".view").click(function(){
	
window.location.href ="view_product.php?id="+jQuery(this).attr("data-id");	
	 //jQuery.post("view_product.php",{id:jQuery(this).attr("data-id")},function(data,status){
	
	//jQuery(".content").html(data);
	
	
	
	//}); 
	

});
});
</script>
<title>Product</title>
</head>
<body>


<script src="js/lightbox-plus-jquery.min.js"></script>

<div class="container">
<?php include "includes/header.php";
?>
			<section class="row content">
			<h3><?php 
	if (isset($_GET["msg"]))
		echo $_GET["msg"];
?>
 </h3>
  	<div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/Premium-watches-2._V271360969_.jpg" alt="First Slide">
            </div>
            <div class="item">
                <img src="images/laxman.jpg" alt="Second Slide">
            </div>
            <div class="item">
                <img src="images/hg.jpg" alt="Third Slide">
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>

<ul class ="products">
<?php
include "config.php";

			 $query = "select id,name,image_path,description ,status from tbl_products";
			 $result= $conn->query($query);
			 if($result->num_rows!=0)
			 {
				 $statusName="";
				while($row = $result->fetch_assoc())
				 {
					 switch($row["status"])
					 {
						 case 0:
						 $statusName="Enable";
						 break;
						 
						 case 1:
						 $statusName="Disable";
						 break;
						 
						 Default:
						 $statusName="Unknown";
						 break;
					 }
?>
					<li>
					<img class="small" src="products/<?=$row["image_path"]?>"/>
					<span>Item:
					<?=$row["name"]?>
		<button data-id="<?=$row["id"]?>" type="submit" class="btn btn-default view"><i class="fa fa-star" aria-hidden="true"></i></button>
	</span>
	<div class="incart"></div>
	</li>
						
	<?php

	
				 }
			 }

?>
</ul>
</section>
<?php include "includes/footer.php"
?>		
</div>
</body>
<html>




