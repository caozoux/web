package WebEntry.servelt;

import java.io.IOException;
import javax.servlet.Filter;
import javax.servlet.FilterChain;
import javax.servlet.FilterConfig;
import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.ServletRequest;
import javax.servlet.ServletResponse;
import javax.servlet.annotation.WebFilter;

import org.apache.catalina.servlet4preview.http.HttpServletRequest;

/**
 * Servlet Filter implementation class filter_entry
 */
@WebFilter("/filter_entry")
public class filter_entry implements Filter {
	private int  count;
    /**
     * Default constructor. 
     */
    public filter_entry() {
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see Filter#destroy()
	 */
	public void destroy() {
		// TODO Auto-generated method stub
	}

	/**
	 * @see Filter#doFilter(ServletRequest, ServletResponse, FilterChain)
	 */
	public void doFilter(ServletRequest request, ServletResponse response, FilterChain chain) throws IOException, ServletException {
		// TODO Auto-generated method stub
		// place your code here

		// pass the request along the filter chain
		count++;
		HttpServletRequest req = (HttpServletRequest) request;
		ServletContext context = req.getSession().getServletContext();
		context.setAttribute("count", count);
		chain.doFilter(request, response);
	}

	/**
	 * @see Filter#init(FilterConfig)
	 */
	public void init(FilterConfig fConfig) throws ServletException {
		// TODO Auto-generated method stub
		//String param = fConfig.getInitParameter("count");
		//count = Integer.valueOf(param);
		count = 2000;
	}

}
