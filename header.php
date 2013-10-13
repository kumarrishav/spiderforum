<html>
<head>
<link type="text/css" rel="stylesheet" href="template.css" />
<script>
//for circular path
function display()
{
var x=150; 
var y=90;
var check=0;
function draw()
{
if(check==1)
{
 y+=1;
var d = document.getElementById('img1');
d.style.display="block";
var e = document.getElementById('img');
e.style.display="none";
d.style.position = "absolute";
d.style.top= y +'px';
d.style.left=x+'px';
if(y==90)
check=0;
}
else
{
 y-=1;
var d = document.getElementById('img');
d.style.display="block";
var e = document.getElementById('img1');
e.style.display="none";
d.style.position = "absolute";
d.style.top= y +'px';
d.style.left=x+'px';
if(y==30)
check=1;
}
}
function gameLoop()
   {
    window.setTimeout(gameLoop,100);
    draw()
   }
   gameLoop();
}

</script>
</head>
<body bgcolor="#F2F2F2" onload="display();"> 
<div class="container">
<!--<div class="header">
</div>-->
<div class='forum'>
<p> &nbsp;&nbsp;&nbsp;&nbsp;SPIDER FORUM</p>
</div>
<div class="desp">
<p>Interdisciplinary Project Discussion Forum</p>
</div>
<div id="img">
<img src="spider.png" width="100" height="100" style="display:block;">
</div>
<div id="img1">
<img src="spider3.png" width="100" height="100" style="display:block;">
</div>
<div id="sign">
<table>
<tr>   
<?php       
session_start();
if(isset($_SESSION['USER']))
{
  echo "<td>
                             <span style='font-size: 20px'>Hi!&nbsp;&nbsp;".$_SESSION['USER']."</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                               <a href='logout.php' style='text-decoration: none'><span style='font-size: 20px'>Log Out</span></a>&nbsp;&nbsp;&nbsp;
                             <input type='text' placeholder='Search'>
			
			</td>";
}
else
{
 echo       "<td>
                               <a href='signup.php' style='text-decoration: none'><span style='font-size: 20px'>Sign Up</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                               <a href='signup.php' style='text-decoration: none'><span style='font-size: 20px'>Log in</span></a>&nbsp;&nbsp;&nbsp;
                             <input type='text' placeholder='Search'>
			
			</td>";
}
?>
			</tr>
			</table>
			</div>
<div id="menu">
<table>
<tr>   
                 <td><hr>
                               <a href="frontpage.php" style="text-decoration: none"><span style="font-size: 20px">Home</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                               <a href="frontpage.php" style="text-decoration: none"><span style="font-size: 20px">Coding</span></a>&nbsp;&nbsp;&nbsp;
							   <a href="frontpage.php" style="text-decoration: none"><span style="font-size: 20px">Web-Dev</span></a>&nbsp;&nbsp;&nbsp;
                               <a href="frontpage.php" style="text-decoration: none"><span style="font-size: 20px">App-Dev</span></a>&nbsp;&nbsp;&nbsp;
                               <a href="frontpage.php" style="text-decoration: none"><span style="font-size: 20px">Electronic</span></a>&nbsp;&nbsp;&nbsp;   
                               <a href="frontpage.php" style="text-decoration: none"><span style="font-size: 20px">Notification</span></a>&nbsp;&nbsp;&nbsp;
			                   <a href="frontpage.php" style="text-decoration: none"><span style="font-size: 20px">Rules & Regulations</span></a>&nbsp;&nbsp;&nbsp;
			            <a href="ask.php" style="text-decoration: none"><span style="font-size: 20px;background-color: orange;">  Ask Question </span></a>&nbsp;&nbsp;&nbsp;
			<hr></td>
			</tr>
			</table>

</div>
</div>