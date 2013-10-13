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
</head>
<body>
<div class="ques">
<p><font size="6" color="green"><b>Ask a Question</b></font></p>
<form id="ask" action="question.php" method="post">
<table border="4" bordercolor="gray" cellpadding="5">
<tr><td>
<b>Title</b><input type="text" name="title" size="50" placeholder="what's your question?Be specific.."/>
</br><textarea name="desc" style="width:600px;display:block; float:left;" rows="15"></textarea></br>
</BR><B>Tags</B></BR><input type="text" name="tags" size="50" placeholder="Minimum one tag & maximun five tags---"/></BR></BR>
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