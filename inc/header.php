<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="icon" href="https://icons8.com/icon/95477/sock-puppet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }
            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });
            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
	<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<style>
	.card-button {
	border: none;
	outline: 0;
	padding: 12px;
	color: white;
	background-color: #000;
	text-align: center;
	cursor: pointer;
	width: 100%;
	font-size: 18px;
  }
  .card-button:hover {
	opacity: 0.7;
  }
	</style>
</head>
<body>
<!-- menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container" >
	  <a class="navbar-brand" href="index.php"><img src="img/logo5.png" style="height: 60px;"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link" href="#" id="navbarDropdown" >
	         <i class="fas fa-align-justify"></i> Genre
	        </a>
	        <div class="dropdown-content">
	          <?php
			    require("conn.php");
	            $listcat="SELECT * FROM category";
	            $kq=pg_query($dbconn,$listcat) or die($listcat);
	            while ($row1=pg_fetch_array($kq)) {
	          ?>
	          <a class="dropdown-item" href="genre.php?categoryid=<?php echo $row1["categoryid"]?>"> <?php echo $row1["categoryname"]; ?></a>
	          <?php 
	     		}
	          ?>
	        </div>
	      </li>
	     <li class="nav-item">
	        <a class="nav-link" href="cart.php"><i class="fas fa-cart-plus"></i> Cart</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
	      <input class="form-control mr-sm-2" type="search" placeholder="Enter toy name" style="width: 400px" name="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
	    </form>
	  </div>
  </div>
</nav>