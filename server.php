<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'sem5project');

// REGISTER USER
if (isset($_POST['reg_user'])) 
{
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $areacode = mysqli_real_escape_string($db, $_POST['areacode']);
  $address = mysqli_real_escape_string($db, $_POST['address']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (username, email, password, address, name, phone, areacode) 
  			  VALUES('$username', '$email', '$password' , '$address' , '$name', '$phone', '$areacode')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}


if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
	array_push($errors);
  	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
	$num_rows = mysqli_num_rows($results);
  	if ($num_rows == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";

  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

if (isset($_POST['book-now'])) {

  $postcode = mysqli_real_escape_string($db, $_POST['postcode']);
  $selected_ser = $_POST['selected-service'];
  $date = mysqli_real_escape_string($db, $_POST['date']);
  $_SESSION['postcode'] = $postcode;
  $_SESSION['selected-service'] = $selected_ser;
  $_SESSION['date'] = $date;
  header('location: selectworker.php');
}

if (isset($_POST['book-final'])) {

  $selected_worker = $_POST['selected-worker'];
  $username_id=$_SESSION['username'];
  $_SESSION['selected-worker'] = $selected_worker;
  $db = mysqli_connect('localhost', 'root', '', 'sem5project');
  $query = "SELECT Userid from user where username='$username_id'";
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
  $user_id=$row['Userid'];


  $query = "SELECT Workerid from worker where Name='$selected_worker'";
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
  $worker_id=$row['Workerid'];

  
  $_SESSION['id'] = $user_id;
  $_SESSION['wid'] = $worker_id;


  $t=$_SESSION['date'];
  $ser=$_SESSION['selected-service'];
  $query = "SELECT Serviceid from service where Name='$ser'";
  $result = mysqli_query($db,$query);
  $row = mysqli_fetch_assoc($result);
  $service_id=$row['Serviceid'];
  $_SESSION['sid'] = $service_id;
  header('location: confirmation.php');

  $query = "INSERT INTO appointment (Appoint_time, userid, serviceid , Workerid) VALUES('$t','$user_id','$service_id','$worker_id')";
  mysqli_query($db, $query);

}


if (isset($_POST['login_worker'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
	array_push($errors, "$password");
  	$query = "SELECT * FROM worker WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
	$num_rows = mysqli_num_rows($results);
  	if ($num_rows == 1) {
  	  $_SESSION['w-username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";

  	  header('location: worker-dashboard.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}


if (isset($_POST['reg_worker'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $category = mysqli_real_escape_string($db, $_POST['category']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $areacode = mysqli_real_escape_string($db, $_POST['areacode']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }

  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM worker WHERE username='$username'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

  
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO worker (username, password, AreaCode, Name, Phone, category) 
  			  VALUES('$username',  '$password' , '$areacode', '$name', '$phone', '$category')";
  	mysqli_query($db, $query);
  	$_SESSION['w-username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: worker-dashboard.php');
  }
}



if (isset($_POST['review'])) {

  $serid=$_SESSION['rateserid'];
  $workid=$_SESSION['rateworkid'];
  $u=$_SESSION['username'];
  //From values
  $q1=  $_POST['q1'];
  $q2=  $_POST['q2'];
  $q3=  $_POST['q3'];
  $q4=  $_POST['q4'];

  // echo $q1,$q2,$q3,$q4;

  $query="SELECT appointid from appointment where serviceid='$serid' and workerid='$workid' and is_reviewed=0 and userid=(SELECT Userid from user where username='$u') LIMIT 1";
  $result = mysqli_query($db, $query);
  $res = mysqli_fetch_assoc($result);
  $a_id= $res['appointid'];

  $query="INSERT INTO reviews (q1,q2,q3,q4,appointmentid,workerid) 
  VALUES('$q1',  '$q2' , '$q3', '$q4', '$a_id', '$workid')";
  mysqli_query($db, $query);


  $query="UPDATE appointment SET is_reviewed=1 where appointid='$a_id'";
  mysqli_query($db, $query);
  


  $query="select (avg(q1)+avg(q2)+avg(q3)+avg(q4))/4 as rating from reviews where Workerid='$workid' GROUP by Workerid";
  $result = mysqli_query($db, $query);
  $r = mysqli_fetch_assoc($result);
  $avg = $r['rating'];


  $query="UPDATE worker SET Rating='$avg' where Workerid='$workid'";
  mysqli_query($db, $query);


  header('location: user-dashboard.php');
  
}

?>