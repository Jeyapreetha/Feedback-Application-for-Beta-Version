<?php
include "config.php";
?>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css"> 
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/lightbox.min.css">
<script src="js/jquery-3.0.0.min.js" ></script>
<script src="js/bootstrap.min.js"> </script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>
<body>
<script>
  google.load("visualization", "1.1", {packages:["bar"]});
  google.setOnLoadCallback(drawIncomeChart);
  function drawIncomeChart() 
  {
    var data = google.visualization.arrayToDataTable([
    ['Product Description', 'Rating', { role: 'style' } ],
<?php
	 $query = "SELECT SUM(a.poll_value) as total,a.product_id,a.poll_id,b.poll_content,b.id 
					FROM tbl_poll a  LEFT JOIN tbl_poll_description b ON a.poll_id=b.id
					WHERE a.product_id =".$_GET["id"]." GROUP BY a.poll_id";
	 $result1= $conn->query($query);
	 $vals = "";
	 while($row2 = $result1->fetch_assoc()): 
$vals .=  "['".$row2["poll_content"]."', ".$row2["total"].", '#b87333'],";
 endwhile;
$vals = rtrim($vals, ",");
echo $vals;
 ?>

         
	]);

   var options = {
    chart: {
     title: 'Rating',
     subtitle: ''
    },
    series: {
     0: { axis: 'distance' },
     1: { axis: 'brightness' }
    },
    axes: {
     y: {
       distance: {label: 'Rating'},
       brightness: {side: 'right', label: 'apparent magnitude'}
     }
    },
    legend: {position: 'none'}
   };
   var chart = new google.charts.Bar(document.getElementById('chart_div'));
   chart.draw(data, options);
  };
  </script>
  


<script src="js/lightbox-plus-jquery.min.js"></script>

<div class="container">
<?php include "includes/header.php";
?>
			<section class="row content">
<script>

</script>
<table class="table table-striped">
<tr>
				<th>Description</th>
				<th>Rate</th>
				</tr>
</table>

<?php
	$query = "select id,name,image_path,description ,status from tbl_products where id=". $_GET["id"];
			 $result= $conn->query($query);
			$row1 = $result->fetch_assoc(); 
	
?>
			<div class="col-md-12 ">
				<div class="col-md-6">
					<a class="example-image-link" href="products/<?=$row1["image_path"]?>" data-lightbox="<?=$row1["name"]?>">
						<img style="width:100%; margin-bottom:15px;" class="example-image" src="products/<?=$row1["image_path"]?>" alt="image-1" />
					</a>
				</div>  
				<div class="col-md-6">
				<div id="chart_div" style="height: 350px;"></div>
				</div>
			</div>
			<table  class="table table-bordered">
				<tr>
				<th>Product</th>
				<td><?=$row1["name"]?></td>
				</tr>
				<tr>
				<th>Description</th>
				<td><?=$row1["description"]?></td>
				</tr>
			</table>

<h4>Polling</h4>
				<form action="rate_product.php" method="post">
				<table class="table table-striped">
					<input type="hidden" name="productId" value="<?=$row1["id"]?>">
					<?php 
						$query = "select a.poll_content,a.product_id,a.id from  tbl_poll_description a where a.product_id=".$_GET["id"];
						$result=$conn->query($query);
						$counter = 0;
						while($row = $result->fetch_assoc()):
					?>
					<tr>
							<th><?=$row["poll_content"]?></th>
							<td>
								 <div class="stars">
								  	<input type="hidden" name="polId[]" value="<?=$row["id"]?>">
									<input required class="star star<?=$counter?>-5" id="star<?=$counter?>-5" type="radio" name="star<?=$counter?>" value="5"/>
									<label class="star star<?=$counter?>-5" for="star<?=$counter?>-5"></label>
									<input required class="star star<?=$counter?>-4" id="star<?=$counter?>-4" type="radio" name="star<?=$counter?>" value="4"/>
									<label class="star star<?=$counter?>-4" for="star<?=$counter?>-4"></label>
									<input required class="star star<?=$counter?>-3" id="star<?=$counter?>-3" type="radio" name="star<?=$counter?>" value="3"/>
									<label class="star star<?=$counter?>-3" for="star<?=$counter?>-3"></label>
									<input required class="star star<?=$counter?>-2" id="star<?=$counter?>-2" type="radio" name="star<?=$counter?>" value="2"/>
									<label class="star star<?=$counter?>-2" for="star<?=$counter?>-2"></label>
									<input required class="star star<?=$counter?>-1" id="star<?=$counter?>-1" type="radio" name="star<?=$counter?>" value="1"/>
									<label class="star star<?=$counter?>-1" for="star<?=$counter?>-1"></label>
								
								</div>
							</td>
					</tr>
					<?php $counter++; endwhile; ?>
					</table>
					<input type="submit">
				  </form>
</section>
<?php include "includes/footer.php"
?>		
</div>
</body>
<html>




