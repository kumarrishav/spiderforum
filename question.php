<?php
session_start();
if(isset($_SESSION['USER']))
{

include("connection.php");
 $title=$_POST['title'];
 $desc=$_POST['desc'];
 
 if($_POST['tags1']==null || $_POST['tags1']=="")
 $tags1="";
 else
 $tags1=$_POST['tags1'];
 
 if($_POST['tags2']==null || $_POST['tags2']=="")
 $tags2="";
 else
 $tags2=$_POST['tags2'];
 
 
 if($_POST['tags3']==null || $_POST['tags3']=="")
 $tags3="";
 else
 $tags3=$_POST['tags3'];
 
if($_POST['tags4']==null || $_POST['tags4']=="")
 $tags4="";
 else
 $tags4=$_POST['tags4'];
 
 if($_POST['tags5']==null || $_POST['tags5']=="")
 $tags5="";
 else
 $tags5=$_POST['tags5'];
 
 if($_POST['tags6']==null || $_POST['tags6']=="")
 $tags6="";
 else
 $tags6=$_POST['tags6'];
 
 $profile=$_POST['select'];
 
 
 $use=$_SESSION['USER'];
 
 $result = mysql_query("Select user_id From user where username='$use'");
 $id=mysql_fetch_array($result)['user_id'];
 $query="INSERT INTO question"."(ques_id,ques_desc,ques_title,tag1,tag2,tag3,tag4,tag5,Newtag,profile,stamp,use_id)"."VALUES(DEFAULT,'$desc','$title','$tags1','$tags2','$tags3','$tags4','$tags5','$tags6','$profile',NOW(),'$id')";
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