<?php
session_start();
$use=$_GET['id'];
include("connection.php");
if(isset($_SESSION['USER']))
{
$name=$_SESSION['USER'];//here name instead of id
//echo $use;

$us=$_GET['te'];
//echo $us;

$sql1=mysql_query("SELECT likes FROM queslikes WHERE quesid='$use' AND useid='$name'");
$likes=mysql_num_rows($sql1);

if($likes==0)
{
$stor="INSERT INTO queslikes (quesid, useid,likes) VALUES ('$use','$name','$us')";
mysql_query($stor);
}
else 
{
$stor1="UPDATE queslikes SET likes='$us' WHERE quesid='$use' AND useid='$name'";
mysql_query($stor1);
}

$count=mysql_query("SELECT likes FROM queslikes WHERE likes='yes' AND quesid='$use'");
$num=mysql_num_rows($count);
echo $num;
}

else
		{
			$count=mysql_query("SELECT likes FROM queslikes WHERE likes='yes' AND quesid='$use'");
            $num=mysql_num_rows($count);
            echo $num;

		}
?>