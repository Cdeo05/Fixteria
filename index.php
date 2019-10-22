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
<link href="css/bootstrap.min.css" rel="stylesheet"  />
<link href="css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css" />
<link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css" />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!--Wrapper Start-->
<div id="wrapper"> 
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
  
  <!--Banner Start-->
  <section id="banner" class="home-one">
    <div class="container text-center parallax-section">
      <div class="row text-center">
        <div class="col-md-12">
        <?php if (!isset($_SESSION['username'])) : ?>
          <h1 class="panel-heading">Ready to Live Smarter?</h1>
          <?php endif ?>
          <?php  if (isset($_SESSION['username'])) : ?>
          <h1 class="panel-heading">Welcome <?php echo $_SESSION['username'] ?></h1>
          <?php endif ?>
          <p class="caption">Book Expert home cleaners and handymen at a moment's notice. just pick a<br/>
            time and we'll do the rest</p>
            <button style="width: 15%;height: 4rem; margin-top: 10px" type="submit" class="btn btn-primary booknow btn-skin" onclick="window.location.href='booking.php'">Book now</button>
          
        </div>
      </div>
    </div>
  </section>
  
  <!--/Banner End--> 
  
  <!--How it works Section Satrt-->
  <section id="howitwork">
    <div class="container text-center">
      <h1 class="panel-heading">How it works</h1>
      <div class="row">
        <div class="col-md-3 col-xs-offset-0 step-one"> <img  src="images/Book.png" alt="Book" class="img-circle htw" />
          <h4>Book</h4>
          <p>Select the date and time like<br />
            your perofessional to show up</p>
        </div>
        <div class="col-md-1 hidden-xs hidden-sm"> </div>
        <div class="col-md-3 step-two"> <img  src="images/Schedule.png" alt="Schedule" class="img-circle" />
          <h4>Schedule</h4>
          <p>Certified Taskers comes over<br/>
            and done your task</p>
        </div>
        <div class="col-md-1 hidden-xs hidden-sm"> </div>
        <div class="col-md-3"> <img  src="images/Relax.png" alt="Relax" class="img-circle" />
          <h4>Relax</h4>
          <p>your task is completed to your<br/>
            satisfaction - guranteed</p>
        </div>
      </div>
    </div>
  </section>
  <!--How it works Section End--> 
  
  <!--Our services Section Satrt-->
  <section id="services">
    <div  class="container text-center">
      <h1 class="panel-heading">Our services</h1>
      <ul class="services-list">
        <li><a href="service_detail.html"><img src="images/services-icons/cleaning.png" alt="cleaning" /><br />
          Cleaning</a></li>
        <li><a href="service_detail.html"><img src="images/services-icons/electrical.png" alt="electrical" /><br />
          Electrical</a></li>
        <li><a href="#"><img src="images/services-icons/plumbing.png" alt="plumbing" /><br />
          Plumbing</a></li>
        <li><a href="service_detail.html"><img src="images/services-icons/appliances.png" alt="appliances" /><br />
          Appliances</a></li>
        <li><a href="service_detail.html"><img src="images/services-icons/carpentry.png" alt="carpentry" /><br />
          Carpentry</a></li>
        <li><a href="service_detail.html"><img src="images/services-icons/geyser.png" alt="geyser" /><br />
          Geyser Service</a></li>
        <li><a href="service_detail.html"><img src="images/services-icons/vehicle.png" alt="vehicle" /><br />
          Vehicle Care</a></li>
        <li><a href="service_detail.html"><img src="images/services-icons/pest.png" alt="pest" /><br />
          Pest Control</a></li>
        <li><a href="service_detail.html"><img src="images/services-icons/painting.png" alt="painting" /><br />
          Painting</a></li>
        <li><a href="service_detail.html"><img src="images/services-icons/more.png" alt="more" /><br />
          View More</a></li>
      </ul>
    </div>
  </section>
  <!--Our services Section End--> 
  
  <!--Trust Security Section Satrt-->
  <section id="trust-security">
    <div class="container text-center">
      <h1 class="panel-heading">Your Trust and Security</h1>
      <div class="row text-left">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="icon_box_one">
            <div class="icons"><img src="images/time.png" alt="SAVES" /></div>
            <div class="box_content">
              <h4>SAVES YOU TIME</h4>
              <p>We helps you live smarter, giving you time to focus on what's most important.</p>
              <a href="#" class="read-more">Read More <span class="glyphicon glyphicon-menu-right"></span></a> </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="icon_box_one">
            <div class="icons"><img src="images/Safety.png" alt="Safety" /></div>
            <div class="box_content">
              <h4>For Your Safety</h4>
              <p>All of our Helpers undergo rigorous identity checks and personal interviews. Your safety is even our concern too.</p>
              <a href="#" class="read-more">Read More <span class="glyphicon glyphicon-menu-right"></span></a> </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="icon_box_one">
            <div class="icons"><img src="images/best.png" alt="Best"  /></div>
            <div class="box_content">
              <h4>Best-Rated Professionals</h4>
              <p>Our experienced taskers perform their tasks with dedication and perfection. We appreciate your reviews about the service.</p>
              <a href="#" class="read-more">Read More <span class="glyphicon glyphicon-menu-right"></span></a> </div>
          </div>
        </div>
      
       
       
      </div>
    </div>
  </section>

  <!--Trust Security Section End--> 
  
  <!--Our Numbers Satrt-->

  
  <!--/Our Numbers Satrt End--> 
  
  <!--Features Section Satrt-->
  <br>
  

  <!--Features Section End--> 
  
  <!--Testimonails Section Satrt-->
 
  <!--Testimonails Section End--> 
  
  <!--Downlod app Section Satrt-->
 
  <!--Features Section End--> 
  
  <!--Trusted Section Satrt-->

  <!--Trusted Section End--> 
  
  <!--Call To Action Start-->
  
  <!--Call To Action End--> 
  
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
<script src="js/owlcarousel/owl.carousel.min.js"></script> 
<script src="js/custom.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-106074231-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html> 
