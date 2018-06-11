<?php

 date_default_timezone_set('Asia/Bangkok');

$servername ="localhost";
$username = "root";
$password = "12345678";
$dbname = "arduino";
$now = new DateTime();

$temp = $_REQUEST['temp'];
$humidity = $_REQUEST['humidity'];


$conn = mysqli_connect("localhost","root","");
if (!$conn)
{
    die('Could not connect: ' . mysqli_error());
}
//$con_result = mysqli_select_db($dbname);
$con_result = mysqli_select_db($conn, $dbname) or die(mysqli_error($con));
if(!$con_result)
{
 die('Could not connect to specific database: ' . mysqli_error());
}

 $datenow = $now->format("Y-m-d H:i:s");
 $hvalue = $value;

 $sql ="insert  into  temp  (id,temp,humidity,date) values ( null,$temp,$humidity,'$datenow')";
// echo $sql;


 $result = mysqli_query($conn, $sql);
 if (!$result) {
  die('Invalid query: ' . mysqli_error());
 }
 echo "<h1 align=center>THE DATA HAS BEEN SENT!!</h1>";
 mysqli_close($conn);

?>
