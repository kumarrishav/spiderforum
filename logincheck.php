<html>
<body>
<?php
include("connection.php");
if (!isset($_POST['submit']))
{
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$result = mysql_query("Select username From user where username='$username'");
	
	if(mysql_num_rows($result)!=0)
	{
		$result1 = mysql_query("Select password From user where password='$password' AND username='$username'");
		
		
		if(mysql_num_rows($result1)!=0)
		{   
		    session_start();
			$_SESSION['USER']=$username;
			header("location:frontpage.php");

		}
		else
		{
			echo "<script>"."alert('<??????  USERNAME or PASSWORD INCORRECT  ??????>')"."</script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=signup.php">';

		}
	}
	else
	{
		echo "<script>"."alert('USERNAME or PASSWORD INCORRECT')"."</script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=signup.php">';
    }

}
?>
</body>
</html>