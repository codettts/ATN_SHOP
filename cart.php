<?php 
session_start();
require_once("inc/conn.php");
include("inc/header.php");
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$id =$_POST['id'];

	if (empty($_SESSION['cart'][$id])) {
		$q=pg_query($dbconn,"SELECT * FROM product WHERE productid = {$id}");
		$product = pg_fetch_assoc($q);
		$_SESSION['cart'][$id]=$product;
		$_SESSION['cart'][$id]['sl']=$_POST['sl'];
		header('Location: cart.php');
	}else{
		
		$sMoi = $_SESSION['cart'][$id]['sl'] + $_POST['sl'];
		$_SESSION['cart'][$id]['sl']=$sMoi;
	}
 }
 ?>
 <div class="container-fluid">
 <div class="row">
 <link rel="stylesheet" type="text/css" href="cart.css">
 	<h3 class="giohang"><i class="fas fa-shopping-cart"></i>  Cart</h3>
  <br>
  <br>
 	<?php 
 	if (!empty($_SESSION['cart'])) {
 		foreach ($_SESSION['cart'] as $item) :
 		?>
 		<div class="products" style="border: 2px solid black">
 	 	<a href="single.php?id=<?php echo $item['productid']?>" style="text-decoration: none;">
 	 	<div><img src="img/<?php echo $item['productimg']?>" class="img-cart"></div>
 	 	<h2><?php echo $item['productname'] ?></h2>
        <p style="color: red">Price: <?php echo $item['productprice']." $"; ?></p>
		<p style="float: right; padding: 30px;">Number: <?php echo $item['sl'] ?></p>
        <?php
		echo "<a href='delcart.php?productid=$item[productid]' style='text-decoration: none;'>Delete</a>";
		?>
         </a>
         </div>
         	 <?php
 	endforeach;
 	}
 	else 
 		echo "There are no products in the product";
 	?>
 	<br>
   <?php
 		 $tong = 0;
 		  foreach($_SESSION["cart"] as $item ) :
 		 	$tong += $item['sl'] * $item['productprice'];
		   endforeach;
 		 ?>
	 <?php
	 if ($tong !=0){
		?>
		<a href="delcart.php?productid=0" style="text-decoration: none; color: white"><button type="button" class="btn btn-danger">Delete All</button></a>
	 <div id="total" class="clearfix">
 		 <h3>Total: <?php echo number_format($tong) ." $" ?></h3>
 	</div>
		<div class="container" style="border-top:0.5px solid ;margin-top: 20px">
 	
 	<form method="POST" action="thanhtoan.php" class="was-validated" style="text-align: center">	 
       <input type="submit" class="btn btn-primary"  value="Continue Checkout">  
 	</form>
 	
		<?php
		}
		?>
 </div>
 </div>
 </div>
 <?php 
 include ('inc/footer.php');
  ?>
  
