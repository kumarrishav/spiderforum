<?php include ("header.php");?>
<html>
<head>
<script>
var xmlhttp, xmlhttp1, xmlhttp2, xmlhttp3;
var tex,tex1,tex2,tex3,id1,id2;
//vote up
function loadXMLDoc()
{
tex="yes";
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
  
   xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	var c=xmlhttp.responseText;
    document.getElementById("mydiv").innerHTML=c;
    }
  }
 
xmlhttp.open("GET","qlikes.php?te="+tex+"&id="+<?php echo $_GET['id']; ?>,true);
xmlhttp.send();
}

//vote down
function loadXMLDoc1()
{
tex1="no";
if (window.XMLHttpRequest)
  {
  xmlhttp1=new XMLHttpRequest();
  }

   xmlhttp1.onreadystatechange=function()
  {
  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
    {
	var c=xmlhttp1.responseText;
    document.getElementById("mydiv").innerHTML=c;
    }
  }
  
xmlhttp1.open("GET","qlikes.php?te="+tex1+"&id="+<?php echo $_GET['id']; ?>,true);
xmlhttp1.send();
}

//vote up
function loadXMLDoc2(id1)
{
tex2="yes";
if (window.XMLHttpRequest)
  {
  xmlhttp2=new XMLHttpRequest();
  }

   xmlhttp2.onreadystatechange=function()
  {
  if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
    {
	window.location.reload();
    }
  }
  
xmlhttp2.open("GET","anslikes.php?te="+tex2+"&id="+id1,true);
xmlhttp2.send();
}

//vote down
function loadXMLDoc3(id2)
{
tex3="no";

if (window.XMLHttpRequest)
  {
  xmlhttp3=new XMLHttpRequest();
  }

   xmlhttp3.onreadystatechange=function()
  {
  if (xmlhttp3.readyState==4 && xmlhttp3.status==200)
    {
	window.location.reload();
    }
  }
  
xmlhttp3.open("GET","anslikes.php?te="+tex3+"&id="+id2,true);
xmlhttp3.send();
}
</script>
</head>
<body>
<!--Question title,desc,answer and every thing-->

<?php
include ("connection.php"); 

$detail= $_GET['id'];//question id
$sql="SELECT ques_desc,ques_title,ques_id,tags,use_id,stamp FROM user ,question WHERE ques_id='$detail'";
$loop=mysql_query($sql,$dbc);

if($loop === FALSE) 
{
    die(mysql_error()); // TODO: better error handling
}
else
{
$row = mysql_fetch_array($loop);
}

//getting username from user id
$usename=$row['use_id'];
$result = mysql_query("Select username From user where user_id='$usename'");
$name=mysql_fetch_array($result)['username'];

//ques likes count
$count=mysql_query("SELECT likes FROM queslikes WHERE likes='yes' AND quesid='$detail'");
$num=mysql_num_rows($count);

?>


<!--QUESTION TITLE-->
<div  style="position:absolute; left:250px; top:190px; word-break:break-word;" >
<table width="630" >
<tr><td>        
<?php
  echo "<font size='3' color='blue' face='new times roman'>"."<b>".strtoupper($row['ques_title'])."</b>"."</a>"."</font><hr>";
?>
</td></tr>
</table>
</div>

<!--QUESTION DESCRIPTION-->
<table width='600' class='love2' bgcolor="" style="position:absolute; left:250px; top:270px;">
            <tr><td>
		
<?php

//QUESTION DESCRIPTION
  {
  echo "</br>"."<font size='5' face='arial' color='green'>"."QUESTION DESCRIPTION"."</font></br>";
  
  echo "</BR>"."<font size='4' face='arial' color='BLACK'>".$row['ques_desc']."</FONT>";
  echo "</br>"."<font size='4' face='arial' color='red'>".$row['tags']."</font>";
  echo "</br>"."<font color='purple'>".str_repeat('&nbsp',95)."asked on".str_repeat('&nbsp',2).$row['stamp']."</font>";
  echo "<div id='mydiv'>".$num."</div><img src='voteup.png' height='30' width='30' onclick='loadXMLDoc()'>";
  echo "<img src='votedown.png' height='30' width='30' onclick='loadXMLDoc1()'>".str_repeat('&nbsp',30).
       "<a href='sds.php'><font size='1' face='arial' color='red'>COMMENTS</font></a>".str_repeat('&nbsp',55).$name."<hr style='border:1px dotted;'>";
  //echo "<script>document.getElementById('mydiv').innerHTML=".$num.";</script>"; 
  

  }
  
  //ALL answerS of question
  
   echo "</br>"."<font size='5' face='arial' color='green'>"."ANSWERS"."</font></br>"; 
  
$sql1="SELECT answ_id,answ_desc,userr_id,stamp FROM answer WHERE quest_id='$detail'";
$loop1=mysql_query($sql1,$dbc);


while($row1 = mysql_fetch_array($loop1))
{
//getting  userNAME from userID 
$usename1=$row1['userr_id'];
$result1 = mysql_query("Select username From user where user_id='$usename1'");
$name1=mysql_fetch_array($result1)['username'];

//ans likes count
$anslike=$row1['answ_id'];
$count2=mysql_query("SELECT alikes FROM anslikes WHERE alikes='yes' AND ansid='$anslike'");
$num2=mysql_num_rows($count2);
	
  echo "</br>"."<font size='4' face='arial' color='BLACK'>".$row1['answ_desc']."</font>";
  echo "</br>"."<font color='purple'>".str_repeat('&nbsp',95)."asked on".str_repeat('&nbsp',2).$row1['stamp']."</font>";
  echo "<div id='yourdiv'>".$num2."</div><img src='voteup.png' id='".$anslike."' height='30' width='30' onclick='loadXMLDoc2(this.id)'>";
  echo "<img src='votedown.png' id='".$anslike."'  height='30' width='30' onclick='loadXMLDoc3(this.id)'>".str_repeat('&nbsp',30).
       "<a href='sds.php'><font size='1' face='arial' color='red'>COMMENTS</font></a>".str_repeat('&nbsp',55).$name1."<hr style='border:1px dotted;'>";
  //echo "<script>document.getElementById('yourdiv').innerHTML=".$num2.";</script>"; 
} 
  
  
  
  ?>
  <hr><div class="ans">
<p><font size="4" color="green"><b>YOUR ANSWER</b></font></p>
<form id="ans" action="answer.php" method="post">
<table border="4" bordercolor="gray" cellpadding="5">
<tr><td><input type="hidden" name="ques" value="<?php echo $detail;?>">
</br><textarea name="reply" style="width:600px;display:block; float:left;" rows="15"></textarea></br>
<input type="submit" value="Post Your Answer">&nbsp;&nbsp;&nbsp;<input type="reset" value="discard">
</form>
</div>
</td></tr>
</table>
 </div> 
<?php
  
   include ("footer.php");
   
?>
</td></tr>
</table>
<div style="position:absolute; left:290px; top:225px;">
<?php include ("sider.php");?> 
</div>
</body>
</html>