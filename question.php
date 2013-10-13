<?php
session_start();
if(isset($_SESSION['USER']))
{

include("connection.php");
 $title=$_POST['title'];
 $desc=$_POST['desc'];
 $tags=$_POST['tags'];
 $use=$_SESSION['USER'];
 
 $result = mysql_query("Select user_id From user where username='$use'");
 $id=mysql_fetch_array($result)['user_id'];
 $query="INSERT INTO question"."(ques_id,ques_desc,ques_title,tags,stamp,use_id)"."VALUES(DEFAULT,'$desc','$title','$tags',NOW(),'$id')";
 if(mysql_query($query))
 header("Location: frontpage.php");
 else
 die(mysql_error());

 }
 
else
{

			echo "<script>"."alert('<??????  First Login in your Account ??????>')"."</script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=signup.php">';
			}

?>