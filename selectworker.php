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
				<li>
					<a href="index.php?logout='1'" style="color: red;">logout</a>
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
      <div class="panel-heading">book now</div>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Book Now</li>
      </ol>
    </div>
  </div>
  <!--Page Title Section End--> 
  
  <!--Contact Information Start-->
  <section id="contact_information">
    <div class="container">
      <div class="row"> 
        <!--Left Form Part-->
        <div class="col-md-8 col-sm-8 col-xs-12"> 
          
          <!--Contact Information-->
          <div class="contact_information_left "> 
          <?php include('server.php') ?>
            <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
            <div class="booking_form">
              <div class="container-fluid">
                <div class="row">
                  <form method="post" action="selectworker.php">
                    
                    <!--Service Address-->
                    <h2 style="margin-bottom:50px;">Select Worker</h2>
                    
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 select_box ">
                       <select name='selected-worker'class="form-control" style="border-radius: 0px;height: 47px;font-size: 15px;color: #8e8e8e;box-shadow: none;border-color: #dddddd;">
                        <option value="" selected disabled hidden>Select Service</option>
                        <?php
                            $db = mysqli_connect('localhost', 'root', '', 'sem5project');
                            $cat=$_SESSION['selected-service'];
                            $query = "SELECT Name,Rating FROM worker WHERE category='$cat'";
                            $result = mysqli_query($db,$query);
                            ?>
                            <?php while($row = mysqli_fetch_assoc($result)):?>
                              <option value="<?php echo $row['Name'];?>"><?php echo $row['Name']; echo "\tRating:"; echo  $row['Rating'];?></option>
                              <?php endwhile; ?>
                      </select>

                     <!-- <a type="" class="dropdown-toggle select_options" data-toggle="dropdown" /><span class="change-text pull-left">Select Service</span> <i class="fa fa-angle-down pull-right"></i> </a>
                      <ul class="dropdown-menu">
                        <li>Option one</li>
                        <li>Option two</li>
                        <li>Option three</li>
                      </ul>!-->
                    </div>
                    
                    
                    <div class="clearfix"></div>
                    <hr />
                    <!--How often?-->
                   
                    <!--Promo Code-->
                    
                    <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-r">
                      <button class="btn btn-primary promo_apply" name="book-final"  type="submit"> BOOK NOW </button>
                    </div>
                    <div class="clearfix"></div>
                  
                    <!--Choose Your Service-->
                   
                    <!--BOOK NOW-->
                    
                   
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--Contact Information--> 
          
        </div>
        <!--/Left Form Part-->
        
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="contact_information_right text-center">
            <div class="booking_summary">
              <div class="icon_box_one">
                <div class="icons"><img src="images/booking/time3.png" alt="time3" /></div>
                <div class="box_content">
                  <h4>SAVES YOU TIME</h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                </div>
              </div>
              <div class="icon_box_one">
                <div class="icons"><img src="images/booking/Safety3.png" alt="Safety3" /></div>
                <div class="box_content">
                  <h4>For Your Safety</h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                </div>
              </div>
              <div class="icon_box_one">
                <div class="icons"><img src="images/booking/best3.png" alt="best3" /></div>
                <div class="box_content">
                  <h4>Best-Rated Professionals</h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                </div>
              </div>
              <div class="icon_box_one">
                <div class="icons"><img src="images/booking/Equipped3.png" alt="Equipped3" /></div>
                <div class="box_content">
                  <h4>We Are Well Equipped</h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                </div>
              </div>
              <div class="icon_box_one">
                <div class="icons"><img src="images/booking/touch3.png" alt="touch3" /></div>
                <div class="box_content">
                  <h4>Always In Touch</h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                </div>
              </div>
              <div class="icon_box_one">
                <div class="icons"><img src="images/booking/cash3.png" alt="cash3" /></div>
                <div class="box_content">
                  <h4>Cash-Free Facility</h4>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                </div>
              </div>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Contact Information End--> 
  
  <!--Footer-->
  <footer id="contact">
    <div class="container-fluid footerbg">
      <div class="container">
        <div class="row">
          <div class="col-md-3"> <a href="#" class="footer-logo"> <img class="logo-dark"  src="images/logo2.png" alt="logo2" /> </a>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <div class="about_info">
              <p><i class="fa fa-map-marker" aria-hidden="true"></i> Lorem Ipsum is simply dummy</p>
              <p><i class="fa fa-envelope" aria-hidden="true"></i> infor@example.com</p>
              <p><i class="fa fa-phone" aria-hidden="true"></i> +91807186985</p>
            </div>
          </div>
          <div class="col-md-3">
            <h4>Services</h4>
            <ul>
              <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Cleaning</a></li>
              <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Electrical</a></li>
              <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Plumbing</a></li>
              <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Appliances</a></li>
              <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Carpentry</a></li>
            </ul>
            <ul>
              <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Geyser Service</a></li>
              <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Vehicle Care</a></li>
              <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Pest Control</a></li>
              <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Panting</a></li>
            </ul>
          </div>
          <div class="col-md-2">
            <h4>About Us</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4>Singn up Newsletter</h4>
            <form action="#" method="post" class="newsletter">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Enter Email Address" />
                <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                </span> </div>
              <!-- /input-group -->
            </form>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
          </div>
        </div>
        <div class="top_awro pull-right" id="back-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i> </div>
      </div>
    </div>
    
    <!--Boottom Footer-->
    <div class="container-fluid bottom-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p class="copyright pull-left">&copy; Hire A Helper 2017 All Right Reserved</p>
            <ul class="footer-scoails pull-right">
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
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
<script type="application/javascript">
$(document).ready(function(){
    
	$(function () {
                $('#datetimepicker1').datetimepicker();
            });
       
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });	
		
});
</script>
</body>
</html>