package com.baseWeb;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.*;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


/**
 * Servlet implementation class baseServlet
 */
@WebServlet("/baseServlet")
public class baseServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
	private List<String> list;
    /**
     * @see HttpServlet#HttpServlet()
     */
    public baseServlet() {
        super();
        list =new ArrayList<String>();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//response.getWriter().append("Served at: ").append(request.getContextPath());
		
		//response.getWriter().append("Served at: ").append(request.getParameter("first_name"));
		// 设置响应内容类型
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
		String param_str = request.getParameter("first_name");
		list.add(param_str);


      	for(int i = 0; i < list.size(); i++)  
        {  
            String str = list.get(i);  
			out.println("<h1>" + str + "</h1>");
        }  
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
