<%-- 
    Document   : operacionSuma
    Created on : 6/03/2020, 08:17:03 PM
    Author     : Andrei Florez V
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Operacion Suma</title>
    </head>
    <body>
        <form action="ServletOperaciones" methodo="get">
            
            digite el primer numero: <input type="text" name="txtNumero1">
            <br>
            digite el Segundo numero: <input type="text" name="txtNumero2">
            <br>
            <input type="submit" name="btnSumar" value="Sumar">
            <br>
            <a href="index.jsp">Ir al inicio</a>
        </form>
    </body>
</html>