<?php
// Fill up array with names
$a[]="Html";
$a[]="Html5";
$a[]="Css";
$a[]="Css3";
$a[]="JavaScript";
$a[]="Javs";
$a[]="Jquery";
$a[]="Ajax";
$a[]="Php";
$a[]="Json";
$a[]="Sql";
$a[]="Mysql";
$a[]="Asp.Net";
$a[]="Electronics";
$a[]="Android";
$a[]="Coding";
$a[]="Algorithm";
$a[]="DataStrucure";
$a[]="FirefoxOs";
$a[]="Python";
$a[]="Linux";
//language
//get the q parameter from URL
$q=$_GET["q"];

//lookup all hints from array if length of q>0
if (strlen($q) > 0)
  {
  $hint="";
  for($i=0; $i<count($a); $i++)
    {
    if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
      {
      if ($hint=="")
        {
        $hint=$a[$i];
        }
      else
        {
        $hint=$hint." , ".$a[$i];
        }
      }
    }
  }

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint == "")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }

//output the response
echo $response;
?>