<?php
session_start();
$use=$_GET['id'];
include("connection.php");
if(isset($_SESSION['USER']))
{
$name=$_SESSION['USER'];//here name instead of id
$us=$_GET['te'];
//echo $us;

$sql1=mysql_query("SELECT alikes FROM anslikes WHERE ansid='$use' AND usessid='$name'");
$likes=mysql_num_rows($sql1);

if($likes==0)
{
$stor="INSERT INTO anslikes (ansid, usessid,alikes) VALUES ('$use','$name','$us')";
mysql_query($stor);
}
else 
{
$stor1="UPDATE anslikes SET alikes='$us' WHERE ansid='$use' AND usessid='$name'";
mysql_query($stor1);
}
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