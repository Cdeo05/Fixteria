<?php
 session_start();
// echo $_SESSION['postcode'];
$cat=$_SESSION['selected-service'];
echo $cat;
echo $_SESSION['date'];


// $db = mysqli_connect('localhost', 'root', '', 'sem5project');
// $query = "SELECT Name,Rating FROM worker WHERE category='$cat'";
// $result = mysqli_query($db,$query);
// while($row = mysqli_fetch_assoc($result)):
//     echo $row['Name'];
//     echo $row['Rating'];
// endwhile;
echo $_SESSION['username'];
echo $_SESSION['selected-worker']; 

echo $_SESSION['id'];
echo $_SESSION['wid'];
echo $_SESSION['sid'];
?>