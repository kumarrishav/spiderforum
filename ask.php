<?php include ("header.php");?> 
<html>
<head>
<style>
.ques
{
position:absolute;
top:180;
left:255;
}

</style>
<script>
var str;
function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","gethint.php?q="+str,true);
xmlhttp.send();
}


function tr()
	{
   
  document.getElementById("new").style.display="block";

  }
</script>

</head>
<body>
<div class="ques">
<p><font size="6" color="green"><b>Ask a Question</b></font></p>
<form id="ask" action="question.php" method="post">
<table border="4" bordercolor="gray" cellpadding="5">
<tr><td>
<b>Title</b><input type="text" name="title" size="50" placeholder="what's your question?Be specific.."/>
<b>Profile:-</b><select name="select">
<option>Web Development</option>
<option>Andriod App Development</option>
<option>Coding</option>
<option>Electronics</option>
<option>Miscellanious</option>
</select>
</br>
<textarea name="desc" style="width:600px;display:block; float:left;" rows="15"></textarea></br>
</BR>
<B>Tags:</BR>
<input type="text" name="tags1" size="6" onkeyup="showHint(this.value)" placeholder="max 5 tags"/>
<input type="text" name="tags2" size="6" onkeyup="showHint(this.value)" placeholder="max 5 tags"/>
<input type="text" name="tags3" size="6" onkeyup="showHint(this.value)" placeholder="max 5 tags"/>
<input type="text" name="tags4" size="6" onkeyup="showHint(this.value)" placeholder="max 5 tags"/>
<input type="text" name="tags5" size="6" onkeyup="showHint(this.value)" placeholder="max 5 tags"/>
<input type="button" value="New Tag" onclick="tr()"></B>
<input type="text" id="new" name="tags6" size="6"style="display:none;" placeholder="New tag"/>
</BR></BR>
<p>Tags Suggestion:-<font size="3" color="green"><span id="txtHint"></span></font></p>
<input type="submit" value="Post Your Question">&nbsp;&nbsp;&nbsp;<input type="reset" value="discard">
</form>
</div>
</td></tr>
</table>
</br></br></br></br></br>
</br></br></br></br></br>
<?php include ("sider.php");?> 
<?php include ("footer.php");?> 
</body>

</html>