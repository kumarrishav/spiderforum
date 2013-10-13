
<?php include ("header.php");?> 
<div id="vote" style="word-wrap:break-word;overflow:hidden;">
<table width="600" style="position:absolute; left:250px; top:200px;">
            <tr><td>
<?php
include ("connection.php"); 
$sql="SELECT user.username,user.user_id,ques_desc,ques_title,ques_id,tags,use_id,stamp FROM user,question WHERE user.user_id=question.use_id ";
$loop=mysql_query($sql,$dbc);
/*
$row=mysql_fetch_assoc($loop);
print_r($row);
*/
if($loop === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
while($row = mysql_fetch_array($loop))
  {
  echo  "<div id='flag'></div>"."<a href='detail.php?id=".$row['ques_id']."'"."style='text-decoration: none'><font size='4' color='blue' face='New times roman'>"."<b>".strtoupper($row['ques_title'])."</b>"."</a>"."</font>"."</br>";
  if(strlen($row['ques_desc'])<190)
  {
  echo "</br>"."<font size='4'>".$row['ques_desc']."</font>";
  }
  else
  {
  echo "</br>"."<font size='4'>". substr($row['ques_desc'], 0, 190)."</font>"."..........";
  }
  echo "</br>"."<font size='4' face='arial' color='red'>".$row['tags']."</font>";
  echo "</br>"."<font color='purple'>".str_repeat('&nbsp',95)."asked on".str_repeat('&nbsp',2).$row['stamp']."</font>";
  echo "</br>".str_repeat('&nbsp',120)." &nbsp;".$row['username']."<hr style='border:1px dotted;'>";
  }
 
   include ("footer.php");
   
?>
</td></tr>
</table>
</div>
<table bgcolor="#F0F8FF" style="position:absolute; left:290px; top:225px;">
<tr><td>
<?php include ("sider.php");?> 
</td></tr>
</table>
</body>
</html>