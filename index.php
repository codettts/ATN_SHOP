<?php 
require("inc/conn.php");
include('inc/header.php');
?>
<!-- slide -->
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  font-size: 17px;
}
.containers img {vertical-align: middle;}

.containers .content {
  position: absolute;
  bottom: 0;
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}
</style>
<!-- list product -->
<div class="row banner">
   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 100%;">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <img class="d-block w-100" style="width: auto" src="img/mb2.jpg" alt="First slide">
         </div>
         <div class="carousel-item">
            <img class="d-block w-100" style="width: auto" src="img/oto.png" alt="Second slide">
         </div>
         <div class="carousel-item">
            <img class="d-block w-100" style="width: auto" src="img/sli2.jpg" alt="Third slide">
         </div>
         <div class="carousel-item">
            <img class="d-block w-100" style="width: auto" src="img/sli3.jpg" alt="fourth slide">
         </div>
         <div class="carousel-item">
            <img class="d-block w-100" style="width: auto" src="img/sli4.jpg" alt="Fifth slide">
         </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>
</div>
<br>
<br>
</div>
<div class="container-fluid">
	<div class="row">
		<div style="border-bottom:2px solid #C63D5D;width: 100%; text-align: center">
		  <h2><b>TOYSTORE - VIETNAM'S NO.1 TOYSTORE SALE CHAIN</b></h2>
		</div>
    <div style="width: 100%;color: #FF9900;text-align: center;">
    <marquee behavior="alternate" direction="right"><h4>LIST OF HIGHLIGHTS TOYS</h4></marquee>
    </div>
	<?php 
    $sql="SELECT * FROM product";
    $rs= pg_query($dbconn,$sql);
    if (pg_num_rows($rs)>0) 
    {
      while ($row=pg_fetch_assoc($rs)) 
      {
    ?>
				
        <div class="col-md-2.8" style="background-color: white;margin-top: 20px;margin-left: 35px;overflow: auto;width: 270px; 
					border: 2px solid #F7F7F7;border-radius: 1px;border-bottom: 6px solid #F7F7F7; float: left;">
			      	<a href="single.php?id=<?php echo $row['productid']?>" style=" text-decoration: none; 
			      text-align: center;">
				    <div class="view view-fifth">
				  	  <div class="top_box">
			      <div style="height:80px">
			        <h2><?php echo $row['productname'] ?></h2>
			        </div>
			        <div><img src="img/<?php echo $row['productimg']?>" style="width: 247px;height: 200px;padding: 7px"></div>
					<p style="color: red"><?php echo $row['productprice']." $"; ?></p>
					<div class="mask">
	                       		<div class="info">Quick View</div>
			                  </div>
			      </a>
					</div>
					</div>
    			</div>
    				 	<?php
      }
  }
    ?>
		</div>
		</div>
    <div class="clear"></div>			
				   </div>
				   <br>
				   <br>
				   <br>
    <div style="width: 100%;color: red;text-align: center;">
    <marquee behavior="alternate" direction="right"><h4>107 Nguyen Phong Sac, Cau Giay, Ha Noi -- Hotline: 0989.686.888</h4></marquee>
    </div>
<!-- end list product -->
<?php 
include("inc/footer.php");
 ?>