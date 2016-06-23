<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="/res/css/base.css" rel="stylesheet" type="text/css">
<title>View Control</title>
<style>

.div_left {
display: block;
width: 16%;
float: left;
margin-right: 1%;
}

.div_left a {
background-color: #f6f4f0
padding:4px;
border-bottom: 1px solid #efefef
display: block;
}
</style>
</head>
<body>

<div>
<form action="HelloForm" method="GET">
名字：<input type="text" name="first_name">
<br />
姓氏：<input type="text" name="last_name" />
<input type="submit" value="提交" />
</form>
</div>

<div>
<form action="web/testanddbg.jsp" method="GET">
First Name: <input type="text" name="first_name">
<br />
Last Name: <input type="text" name="last_name" />
<input type="submit" value="Submit" />
</form>
</div>

<div>
	<div class="div_left">
		<a target="_top" title="CSS 参考手册" href="http://www.runoob.com/cssref/css-reference.html" style="display:block">CSS datasheet</a>
		<a target="_top" title="CSS 参考手册" href="http://www.runoob.com/cssref/css-reference.html" style="display:block">CSS datasheet</a>
		<a target="_top" title="CSS 参考手册" href="http://www.runoob.com/cssref/css-reference.html" style="display:block">CSS datasheet</a>
		<a target="_top" title="CSS 参考手册" href="http://www.runoob.com/cssref/css-reference.html" style="display:block">CSS datasheet</a>
	</div>
</div>
</body>
</html>
