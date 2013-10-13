<?php
session_start();
if(isset($_SESSION['USER']))
{
include("connection.php");
$reply=$_POST['reply'];
$quesid=$_POST['ques'];
$use=$_SESSION['USER'];

$result = mysql_query("Select user_id From user where username='$use'");
$id=mysql_fetch_array($result)['user_id'];
$query="INSERT INTO answer"."(answ_desc,stamp,userr_id,quest_id)"."VALUES('$reply',NOW(),'$id','$quesid')";

 if(mysql_query($query))
 header("Location: detail.php?id=".$quesid);
 else
 die(mysql_error());

}
else
{

			echo "<script>"."alert('<??????  First Login in your Account ??????>')"."</script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=signup.php">';
			}

?>