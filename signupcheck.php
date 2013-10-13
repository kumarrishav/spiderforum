
<html>
<body bgcolor='black'>
<?php
$k=0;
$user=$_POST['username'];
$pass=$_POST['password'];
$rpass=$_POST['rpassword'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$address=$_POST['address'];

if($user==""  || $user==null )
{echo "<script>"."alert('<??????  Fill The Name ??????>')"."</script>";
$k++;}

/*
if($address==""  || $address==null )
{echo "<script>"."alert('<??????  Fill The Address ??????>')"."</script>";
$k++;}
*/

if($contact==""  || $contact==null || strlen($contact)!=10 )
{echo "<script>"."alert('<??????  Fill The 10 Digit Mobile No. ??????>')"."</script>";
$k++;}


$atpos=strpos($email,"@");
$dotpos=strpos($email,".");
if($email=="" || $email==null || $atpos<1 || $dotpos<$atpos+2 || $dotpos+2>=strlen($email))
{echo "<script>"."alert('<??????  Enter Valid Email-Id ??????>')"."</script>";
$k++;}

if($pass=="" || $pass==null || preg_match('/[^a-zA-Z0-9_]/i', $pass))  
{echo "<script>"."alert('<??????  Please Fill the Password[contains only digits,alphabets,underscore] ??????>')"."</script>";
$k++;}

if($rpass=="" || $rpass==null || $pass!=$rpass)
{echo "<script>"."alert('<??????  Password not matched??????>')"."</script>";
$k++;}

/*
if (isset ( $_FILES['file'] ) )
 {
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    if (($file_size > 1024*1024))
    {
	echo "<script>"."alert('<??????  File too large. File must be less than 1 MB.  ??????>')"."</script>";
    $k++;}	
	if( $file_type != "image/jpeg" && $file_type != "image/jpg"  && $file_type != "image/png")
    {echo "<script>"."alert('<??????  Invalid file type. Only  JPG, and PNG types are accepted. ??????>')"."</script>";
    $k++;} 
 }  
if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
	  echo "<script>"."alert('<<<-----SORRY.....THIS AVTAR Already Exist-----Try AGAIN With Other AVTAR-------->>>')"."</script>";
      $k++;
	  }
    else
      {
	  if($k==0)
	  {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
	  }
      }
*/
	  
{	  
include("connection.php");     
$query11="SELECT username FROM user WHERE username='$user'";
$ck11=mysql_query($query11,$dbc);
if(mysql_num_rows($ck11)!=0)
{
echo mysql_num_rows($ck11);
echo "<script>"."alert('<<<-----USERNAME alredy exist...Try with a new username -------->>>')"."</script>";
$k++;
}
}
if($k==0)
{
include("connect.php");
$pic=$_FILES["file"]["name"];     
$query="INSERT INTO user"."(USERNAME,PASSWORD,EMAIL,DETAIL)"."VALUES('$user','$pass','$email','$contact')";

$ck=mysql_query($query,$dbc);

/* chat
if($ck==true)
{
$dbc1 =mysql_connect("localhost","root","");
mysql_select_db("spider",$dbc1);
$query1="INSERT INTO user"."(USERNAME,PASSWORD)"."VALUES('$user','$pass')";
mysql_query($query1,$dbc1);
$query2="INSERT INTO online"."(USERNAME)"."VALUES('$user')";
mysql_query($query2,$dbc1);*/
mysql_close($dbc1);

echo "<script>"."alert('!!!!Thank You For Registering')"."</script>";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=frontpage.php">';    
}
else
{
echo "<script>"."alert('<<<--Errror in form filling>>>')"."</script>";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=signup.php">';
//include("newuser.php");
}

?>
</body>
</html>