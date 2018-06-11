<?php
 date_default_timezone_set('Asia/Bangkok');
$servername ="localhost";
$username = "root";
$password = "12345678";
$dbname = "arduino";
$now = new DateTime();

$temp = $_REQUEST['temp'];
$humidity = $_REQUEST['humidity'];

$conn = mysql_connect("localhost","root","");
if (!$conn)
{
    die('Could not connect: ' . mysql_error());
}
$con_result = mysql_select_db($dbname, $conn);
if(!$con_result)
{
 die('Could not connect to specific database: ' . mysql_error()); 
}

 $datenow = $now->format("Y-m-d H:i:s");
 $hvalue = $value;

 $sql ="insert  into  temp  (id,temp,humidity,date) values ( null,$temp,$humidity,'$datenow')";
// echo $sql;
 

 $result = mysql_query($sql);
 if (!$result) {
  die('Invalid query: ' . mysql_error());
 }
 echo "<h1 align=center>THE DATA HAS BEEN SENT!!</h1>";
 mysql_close($conn);
 include ("show.php");
?>
