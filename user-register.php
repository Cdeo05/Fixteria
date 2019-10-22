
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
<link rel="stylesheet" type="text/css" href="style.css">
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
  <!--Header Section Start-->
  <header id= "header" data-spy="affix" data-offset-top="60" data-offset-bottom="60" style="position:inherit;">
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
                <li><a href="#services">Service</a></li>                
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
  <?php include('server.php') ?>


  <div class="header">
  	<h2>User Register</h2>
  </div>
	 
  <form method="post" action="user-register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="">
  	</div>
    <div class="input-group">
      <label>Address</label>
      <input type="text" name="address" value="">
    </div>
    <div class="input-group">
      <label>Phone</label>
      <input type="text" name="phone" value="">
    </div>
    <div class="input-group">
      <label>Area code</label>
      <input type="text" name="areacode" value="">
    </div>
    <div class="input-group">
      <label>Full Name</label>
      <input type="name" name="name" value="">
    </div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="user-login.php">Sign in</a>
  	</p>
  </form>

  

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
  <footer style="bottom: 0;width: 100%;" id="contact">
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
