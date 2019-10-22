<?php
session_start();

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Hire A Helper</title>
<!-- Bootstrap -->

<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css" />
<link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css" />
<link  href="css/datetime/bootstrap-datetimepicker.css" rel="stylesheet" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div id="wrapper" class="inner_page booking_page"><!--Wrapper Start--> 
  <!--Header Section Start-->
  <header id= "header" data-spy="affix" data-offset-top="60" data-offset-bottom="60">
    <div class="container">
      <div class="row">
        <div class="col-md-8  col-sm-12 col-xs-12 col-sm-12">
        <nav class="navbar"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand" href="#"><img class="logo-dark hidden-xs"  src="images/logo.png" alt="" /> <img class="logo-dark hidden-lg hidden-md hidden-sm"  src="images/mobile_logo.png" alt="" /></a> </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="main-menu collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-left">
               
                <li><a href="index.php">Home</a></li>
                <li><a href="booking.php">Booking page</a></li>
                                
                <li><a href="#contact">Contact</a></li>
                <?php if (!isset($_SESSION['username'])) : ?>
				<li role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Login <span class="caret"></span> </a>
					<ul class="dropdown-menu">
						<li><a href="user-login.php">User</a></li>
						<li><a href="worker-login.php">Worker</a></li>
					</ul>
				</li>
				<?php endif ?>
				<?php  if (isset($_SESSION['username'])) : ?>
				
        <li><a href="user-dashboard.php">Dashboard</a></li>
				<li>	<a href="index.php?logout='1'" style="color: red;">logout</a>
				</li>
				<?php endif ?>
              </ul>
            </div>
            <!-- /.navbar-collapse --> 
          </nav>
        </div>
       
      </div>
    </div>
    <!-- /.container --> 
  </header>
  <!--/Header Section End--> 
  <!--Page Title Section Satrt-->
  <div id="page_title">
    <div class="container text-center">
      <div class="panel-heading">RATING</div>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Rate Now</li>
      </ol>
    </div>
  </div>
  <!--Page Title Section End--> 
  
  <!--Contact Information Start-->
  <section id="contact_information">
    <div class="container">
      <div class="row"> 
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-1 col-sm-1 col-xs-1">
        <img src="images/accept-circle.png" style="width:100%">
		</div>
		<div class="col-md-11 col-sm-11 col-xs-11">
			<b style="color:green;font-size:40px;">Booking Confirmed</b>
			<button class="btn btn-primary promo_apply" name="dashboard"  type="submit" onclick="location.href = 'user-dashboard.php';" style="float:right;width:20%"> Go to dashboard </button>
			
		</div>
	  </div>
	  </div>
	</div>
  </section>
  
  <!--Footer-->
  <footer id="contact">
    <div class="container-fluid footerbg">
      <div class="container">
        <div class="row">
          <div class="col-md-4"> <a href="#" class="footer-logo"> <img class="logo-dark"  src="images/logo.png" alt="Hire A Helper" /> </a>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <div class="about_info">
              <p><i class="fa fa-map-marker" aria-hidden="true"></i> Lorem Ipsum is simply dummy</p>
              <p><i class="fa fa-envelope" aria-hidden="true"></i> infor@example.com</p>
              <p><i class="fa fa-phone" aria-hidden="true"></i> +91807186985</p>
            </div>
          </div>
         
  
         
        </div>
        <div class="top_awro pull-right" id="back-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i> </div>
      </div>
    </div>
    
    <!--Boottom Footer-->
    
  </footer>
  <!--/Footer--> 
  
</div>
<!--/Wrapper End--> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 

<script src="js/bootstrap.min.js"></script> 
<script  src="js/datetime/moment.js"></script> 
<script  src="js/datetime/bootstrap-datetimepicker.min.js"></script> 
<script src="js/owlcarousel/owl.carousel.min.js"></script> 
<script src="js/custom.js"></script> 

</body>
</html>