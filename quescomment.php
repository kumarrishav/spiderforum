<?php
session_start();
$use=$_GET['id'];
include("connection.php");
if(isset($_SESSION['USER']))
{
$name=$_SESSION['USER'];//here name instead of id
$us=$_GET['te'];

$stor="INSERT INTO quescomment (quesid, usrname,comment,time) VALUES ('$use','$name','$us',NOW())";
mysql_query($stor);
}

else
{
$page = $_SERVER['PHP_SELF'];
$sec = "10";
header("Refresh: $sec; url=$page");
}
/*
$count2=mysql_query("SELECT alikes FROM anslikes WHERE alikes='yes' AND ansid='$use'");
echo $num2=mysql_num_rows($count2);
*/
?>