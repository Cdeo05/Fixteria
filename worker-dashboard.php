<?php
session_start();
$username=$_SESSION['w-username'];
$db = mysqli_connect('localhost', 'root', '', 'sem5project');
$q="SELECT * from worker where username='$username'";
$re = mysqli_query($db, $q);
$r = mysqli_fetch_assoc($re);
$wid=$r['Workerid'];
$scat=$r['category'];

if($_GET){
  $sesuid=$_GET['userid'];
  $seswid=$_GET['workerid'];
  $sessid=$_GET['serviceid'];
  $quu="SELECT Appointid from appointment where userid='$sesuid' and serviceid='$sessid' and Workerid='$seswid'";
  $re = mysqli_query($db, $quu);
  $rq = mysqli_fetch_assoc($re);
  $aid=$rq['Appointid'];

  $query="UPDATE appointment SET is_completed=1 where Appointid='$aid'";
  mysqli_query($db, $query);
  
 

}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['w-username']);
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
               
                <li><a href="worker-dashboard.php">Dashboard</a></li>
                        
                <li><a href="#contact">Contact</a></li>
                <?php if (!isset($_SESSION['w-username'])) : ?>
				<li role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Login <span class="caret"></span> </a>
					<ul class="dropdown-menu">
						<li><a href="user-login.php">User</a></li>
						<li><a href="worker-login.php">Worker</a></li>
					</ul>
				</li>
				<?php endif ?>
				<?php  if (isset($_SESSION['w-username'])) : ?>
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
    <!-- /.container --> 
  </header>
  <section id="banner" class="home-one">
      <div class="worker-header-1">
        <h2>Welcome  <?php echo $_SESSION['w-username'] ?>  </h2>
      </div>
      <div class="worker-header-2">
      <?php
      $db = mysqli_connect('localhost', 'root', '', 'sem5project');
      $query="SELECT Rating from worker where username='$username'";
      $result = mysqli_query($db,$query);
      $r=mysqli_fetch_assoc($result);
      ?>
          <h3>Your Rating:<?php echo $r['Rating'] ?></h3>
        </div>
        <?php 
              $db = mysqli_connect('localhost', 'root', '', 'sem5project');
              $query_check="SELECT * FROM user WHERE userid in (SELECT userid from appointment where Workerid=(SELECT Workerid from worker where username='$username') )LIMIT 1";
              $result_check = mysqli_query($db,$query_check);
              $app_check=mysqli_fetch_assoc($result_check);
              if($app_check):
              $query_p = "SELECT * FROM user WHERE userid in (SELECT userid from appointment where Workerid=(SELECT Workerid from worker where username='$username') and is_completed=0)";
              $result_p = mysqli_query($db,$query_p);
              $query_c = "SELECT * FROM user WHERE userid in (SELECT userid from appointment where Workerid=(SELECT Workerid from worker where username='$username') and is_completed=1)";
              $result_c = mysqli_query($db,$query_c);
              
              ?>
        <div class="worker-dashboard-main">
            <!-- Recent Orders -->
							<div class="card card-table flex-fill">
                                    <div class="card-header">
                                        <h3 class="card-title">Appointments</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-center">
                                                <thead>
                                                    <tr style="font-size: large;">
                                                        <th>Name</th>
                                                        <th>Address</th>
                                                        <th class="text-center">pin code</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-right">Phone No.</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-size: 1.3rem;">
                                                <?php while($row = mysqli_fetch_assoc($result_p)):?>
                                                    <tr>
                                                        <td class="text-nowrap">
                                                            <div class="font-weight-600"><?php echo $row['Name']?></div>
                                                        </td>
                                                        <td class="text-nowrap"><?php echo $row['Address']?></td>
                                                        <td class="text-center"><?php echo $row['AreaCode']?></td>
                                                        <td class="text-center">
                                                        <?php $uid=$row['Userid'];
                                                                $q="SELECT Serviceid from service where category='$scat'";
                                                                $re = mysqli_query($db, $q);
                                                                $r = mysqli_fetch_assoc($re);
                                                                $sid=$r['Serviceid'];
                                                         ?>
                                                          <span class="badge badge-pill bg-warning inv-badge" style="cursor: pointer;" onclick="window.location.href='worker-dashboard.php?userid=<?php echo $uid?>&amp;workerid=<?php echo $wid?>&amp;serviceid=<?php echo $sid?>'">Pending</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="font-weight-600"><?php echo $row['Phone']?></div>
                                                        </td>
                                                    </tr>
              <?php endwhile; ?>

                                                    <?php while($row = mysqli_fetch_assoc($result_c)):?>
                                                    <tr>
                                                        <td class="text-nowrap">
                                                            <div class="font-weight-600"><?php echo $row['Name']?></div>
                                                        </td>
                                                        <td class="text-nowrap"><?php echo $row['Address']?></td>
                                                        <td class="text-center"><?php echo $row['AreaCode']?></td>
                                                        <td class="text-center">
                                                        <?php $uid=$row['Userid'];
                                                                $q="SELECT Serviceid from service where category='$scat'";
                                                                $re = mysqli_query($db, $q);
                                                                $r = mysqli_fetch_assoc($re);
                                                                $sid=$r['Serviceid'];
                                                         ?>
                                                          <span class="badge badge-pill bg-success inv-badge">Completed</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="font-weight-600"><?php echo $row['Phone']?></div>
                                                        </td>
                                                    </tr>
                                                <?php endwhile;?>
              <?php else:  ?>
              <div class="worker-header-2">
                <h3>You have no appointments yet! Stay Tuned !</h3 >
                </div>

              <?php endif;?>
                                                   
                                                    
                                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Recent Orders -->

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

  function funct(userid){
    console.log(userid)
    <?php

    ?>
  }

</script>
</body>
</html> 
