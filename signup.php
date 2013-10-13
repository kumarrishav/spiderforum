<?php include ("header.php");?>
<?php
if(isset($_SESSION['USER']))
{
header("location:frontpage.php");
}
?> 
<html>
<head>
<title>Login</title>
<style>
.head{
position:absolute; 
left:700px; 
top:180px;
font-family:CF One Two Trees;
}
.logs{
position:absolute; 
left:670px; 
top:300px; 
font-size:20px;
font-color:blue;
}
.head1{
position:absolute; 
left:300px; 
top:180px;
font-family:CF One Two Trees;
}
.logs1{
position:absolute; 
left:270px; 
top:300px; 
font-size:20px;
font-color:blue;
}

</style>
</head>
<body>
<div class='head'>
</br><p><font size='10'><b>SIGN UP</b></font></p>
</div>
<div class='logs'>
<form name='log' method='post' action="signupcheck.php" enctype="multipart/form-data">
<input type='text' name='username' placeholder='Username' size='40px'></br>
<input type='text' name='email' placeholder="Email" size='40px'></br>
<input type='tel' name='contact' placeholder="Contact No." size='40px'></br>
<input type='password' name='password' placeholder='Password' size='40px'></br>
<input type='password' name='rpassword' placeholder='Confirm Password' size='40px'></br>
<font color='red' size='2'>Your Avatar*</font><input type="file" name="file" /></br>
<input type='submit' value='SUBMIT'></br>
</div>
</form>
<div class='head1'>
</br><p><font size='10'><b>SIGN IN</b></font></p>
</div>
<div class='logs1'>
<form name='log1' method='post' action="logincheck.php" enctype="multipart/form-data">
<input type='text' name='username' placeholder='Username' size='40px'></br>
<input type='password' name='password' placeholder='Password' size='40px'></br>
<input type='submit' value='SUBMIT'></br>
</div>
</form>
</body>
</html>