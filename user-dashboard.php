<?php
session_start();
$username=$_SESSION['username'];
$db = mysqli_connect('localhost', 'root', '', 'sem5project');
$query_pending = "SELECT * from worker where workerid in (SELECT workerid from appointment where userid=(SELECT userid from user where username='$username') and is_completed=0)";
$result_pending = mysqli_query($db,$query_pending);
// $query_completed = "SELECT * from worker where workerid in (SELECT workerid from appointment where userid=(SELECT userid from user where username='$username') and is_completed=1)";
// $result_completed = mysqli_query($db,$query_completed);
$query_reviewed = "SELECT * from worker where workerid in (SELECT workerid from appointment where userid=(SELECT userid from user where username='$username') and is_completed=1 and is_reviewed=1)";
$result_reviewed = mysqli_query($db,$query_reviewed);
$query_not_reviewed = "SELECT * from worker where workerid in (SELECT workerid from appointment where userid=(SELECT userid from user where username='$username') and is_completed=1 and is_reviewed=0)";
$result_not_reviewed = mysqli_query($db,$query_not_reviewed);

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
<link href="css/dashboard.css" rel="stylesheet" />
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
					<li><a href="index.php?logout='1'" style="color: red;">logout</a>
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
  <section id="banner" class="home-one">
      <div class="worker-header-1">
        <h2>Welcome <?php echo $_SESSION['username'] ?></h2>
      </div>
      <div class="worker-header-2">
          <h3>Dashboard</h3>
        </div>
        <div class="user-dashboard-main">
           <div class="user-pending">
                              <!-- Recent Orders -->
							<div class="card card-table flex-fill">
                  <div class="card-header">
                      <h3 class="card-title" style="color:black;">Pending</h3>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-hover table-center">
                              <thead>
                                  <tr style="font-size: large;">
                                      <th>Name</th>
                                      <th>Catergory</th>
                                      <th class="text-center">pin code</th>
                                      <th class="text-center">Status</th>
                                      <th class="text-right">Phone No.</th>
                                  </tr>
                              </thead>
                              <tbody style="font-size: 1.3rem;">
                              <?php while($row = mysqli_fetch_assoc($result_pending)):?>
                              <tr>
                                    <td class="text-nowrap">
                                        <div class="font-weight-600"><?php echo $row['Name']?></div>
                                    </td>
                                    <td class="text-nowrap"><?php echo $row['category']?></td>
                                    <td class="text-center"><?php echo $row['AreaCode']?></td>
                                    <td class="text-center">
                                        <span class="badge badge-pill bg-warning inv-badge">Pending</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="font-weight-600"><?php echo $row['Phone']?></div>
                                    </td>
                                </tr>
                                  <?php endwhile;?>
                                  
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <!-- /Recent Orders -->

           </div>
           <div class="user-completed">
                         <!-- Recent Orders -->
							<div class="card card-table flex-fill">
                  <div class="card-header">
                      <h3 class="card-title" style="color:black;">Completed</h3>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-hover table-center">
                              <thead>
                                  <tr style="font-size: large;">
                                      <th>Name</th>
                                      <th>Category</th>
                                      <th class="text-center">pin code</th>
                                      <th class="text-center">Status</th>
                                      <th class="text-right">Review</th>
                                  </tr>
                              </thead>
                              <tbody style="font-size: 1.3rem;">
                              <?php while($row = mysqli_fetch_assoc($result_reviewed)):?>
                              <tr>
                                    <td class="text-nowrap">
                                        <div class="font-weight-600"><?php echo $row['Name']?></div>
                                    </td>
                                    <td class="text-nowrap"><?php echo $row['category']?></td>
                                    <td class="text-center"><?php echo $row['AreaCode']?></td>
                                    <td class="text-center">
                                    <span class="badge badge-pill bg-success inv-badge">Completed</span>
                                    </td>
                                    
                                    <td class="text-right">
                                          Done
                                      </td> 
                                </tr>
                                  <?php endwhile;?>


                                  <?php while($row = mysqli_fetch_assoc($result_not_reviewed)):?>
                              <tr>
                                    <td class="text-nowrap">
                                        <div class="font-weight-600"><?php echo $row['Name']?></div>
                                    </td>
                                    <td class="text-nowrap"><?php echo $row['category']?></td>
                                    <td class="text-center"><?php echo $row['AreaCode']?></td>
                                    <td class="text-center">
                                    <span class="badge badge-pill bg-success inv-badge">Completed</span>
                                    </td>
                                    
                                    <td class="text-right">
                                    <?php
                                    $cat=$row['category'];
                                    $query="SELECT Serviceid from service where category='$cat'";
                                    $result = mysqli_query($db,$query);
                                    $r1 = mysqli_fetch_assoc($result);
                                    $serid= $r1['Serviceid'];
                                    $workid=$row['Workerid'];
                                    ?>
<div  onclick="window.location.href='review.php?serviceid=<?php echo $serid?>&amp;workerid=<?php echo $workid?>'" style="cursor: pointer;" class="font-weight-600">Rate</div>
                                      </td> 
                                </tr>
                                  <?php endwhile;?>
                                  
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <!-- /Recent Orders -->


           </div>

        </div>
      
  </section>
  <!--/Header Section End--> 
  

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
  <footer style="position: absolute;bottom: -30rem;width: 100%;" id="contact">
    <div class="container-fluid footerbg">
      <div class="container">
        <div class="row">
          <div class="col-md-4"> <a href="#" class="footer-logo"> <img class="logo-dark"  src="images/logo2.png" alt="Hire A Helper" /> </a>
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
