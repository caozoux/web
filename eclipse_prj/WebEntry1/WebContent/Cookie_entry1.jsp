<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.net.URLDecoder"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
 Cookie[] cookie = request.getCookies();
 String user="";
 String date="";
 if (cookie != null) {
	 for (int i=0;i<cookie.length;i++) {
		 if (cookie[i].getName().equals("mrCookie")) {
			 user = URLDecoder.decode(cookie[i].getValue().split("#")[0]);
			 user = cookie[i].getValue().split("#")[1];
		 }
	 }
	 
 }
 
 if ("".equals(user) && "".equals(date)) {
%>
  Hello! visitor
  <form action="Cookie_user_jump.jsp" method="post">
  <p>input name:<input name="user" type="text" value=""></p>
  <input type="submit" value="Submit" />
</form>
<%
 } else {
	
%>	
 <%=user%>
<%
 }
 %>
</body>
</html>