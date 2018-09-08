<%@page import="java.util.Date"%>
<%@page import="java.net.URLEncoder"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.net.URLDecoder"%>
<%@ page import="java.util.Date"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
	response.setCharacterEncoding("GB18030");
	String user=URLEncoder.encode(request.getParameter("user"), "utf-8");
	System.out.print("mrCookie "+user+"#"+new Date().toLocaleString());
	Cookie cookie=new Cookie("mrCookie",user+"#12");
	cookie.setMaxAge(60*60*5);
	response.addCookie(cookie);
%>
 user jump
</body>
</html>