/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servlets;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Andrei Florez V
 */
@WebServlet(name = "servletHTMLCSS", urlPatterns = {"/servletHTMLCSS"})
public class servletHTMLCSS extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            
            String DatoRadi, DatoCombo;
            String [] DatoCheck;
            
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            
            out.println("<head>");
            out.println("<title>Resultados de datos enviados</title>");            
            out.println("</head>");
            
            out.println("<body>");
            
            DatoRadi=request.getParameter("optSistemaOperativo");
            DatoCombo=request.getParameter("cmbColor");
            DatoCheck=request.getParameterValues("chkControl");
            
            out.println("<h1>El sistema Operativo seleccionado fue: "+DatoRadi+"</h1>");
            out.println("<br>");
            out.println("<h1>El Color seleccionado fue: "+DatoCombo+"</h1>");
            out.println("<br>");
            out.println("<h1>El Listado chequeado fue: </h1>");
            out.println("<br>");
            for(int i=0; i<DatoCheck.length;i++){
                out.println("<h1>"+DatoCheck[i]+"</h1>");
                out.println("<br>");
            }
             out.println("<a href=index.jsp>Volver al Inicio</a>");
            out.println("</body>");
            
            out.println("</html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}