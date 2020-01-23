<?php
include("../modelo/Cliente.php");
include("../control/CtrCliente.php");
include("../control/CtrConexion.php");
        $nomCliente="";
        $idCliente="";
        $dirCliente="";
        $telCliente = "";
        $sexoCliente="";
        $fechaCliente="";
        $afcDep= false;
        $afcLit= false;
        $afcTec= false;
        $afcMus= false;
        $afcCin= false;
        $afcOtr= false;
        $afcCual= "";
        $documentos="";
        $observ="";
        $fotoCliente="";
        $boton="";
        $vectorTelefonos=null;
 try{
     $nomCliente=$_POST["txtNombre"];
     $idCliente=$_POST["txtId"];
     $dirCliente=$_POST["txtDir"];
     $telCliente=$_POST["cboTelefonos"];
     $sexoCliente=$_POST["rdbSexo"];
     $fechaCliente=$_POST["txtFecha"];
     $afcDep=$_POST["chkDeporte"];
     $afcLit=$_POST["chkLiteratura"];
     $afcTec=$_POST["chkTecnologia"];
     $afcMus=$_POST["chkMusica"];
     $afcCin=$_POST["chkCine"];
     $afcOtr=$_POST["chkOtro"];
     $afcCual=$_POST["txtCual"];
     $documentos=$_POST["filesCliente"];
     $observ=$_POST["txtObservaciones"];
     $boton =  $_POST["boton"];

   if($boton =="consultar"){

             $objCliente=new Cliente("",$idCliente,"","","","","","","","","","","","","","","");
             $objCtrCliente =new CtrCliente($objCliente);
             $objCliente = $objCtrCliente->consultar();
             $nomCliente=$objCliente->getNomCliente();
             $fotoCliente=$objCliente->getFotoCliente();

             $vectorTelefonos= $objCtrCliente->listarTelefonos();
             $tam = $vectorTelefonos[0];
             echo  "el n�mero de tel�fonos de ". $nomCliente." es = ". $tam. "<br>";
    }
 }
   catch (Exception $exp)
   {
        echo "ERROR SELECCIONANDO LA BASE DE DATOS".$exp->getMessage()."\n";
   }

 echo "
 <html><head>
<meta http-equiv=\"content-type\" content=\"text/html; charset=ISO-8859-1\"><title>CLIENTE</title>

<script language=\"JavaScript\" src=\"validar.js\"> </script>
<script language=\"javascript\" type=\"text/javascript\">
function validar_formulario_cliente(){
if (document.frmClientes.txtId.value.length==0){
alert(\"Debe ingresar el Identificaci�n\")
}
if (document.frmClientes.txtNombre.value.length==0){
alert(\"Debe ingresar el nombre\")
}
if (document.frmClientes.cboTelefonos.value.length==0){
alert(\"Debe seleccionar un tel�fono\")
}
  mensaje(\"Este es un mensaje para el curso...\")
}
</script>
</head>
<body>
<form name=\"frmClientes\" action=\"VISTACLIENTE.PHP\" method=\"post\">
<table style=\"text-align: left; height: 405px; width: 1040px;\" border=\"1\" cellpadding=\"2\" cellspacing=\"1\">
<tbody>
<tr align=\"center\">
<td style=\"width: 608px;\" colspan=\"3\" rowspan=\"1\"><span style=\"font-weight: bold;\">CLIENTE</span></td>
</tr>
<tr>
<td style=\"width: 161px;\">NOMBRE</td>
<td style=\"width: 608px;\"><input size=\"80\" name=\"txtNombre\" value = \" ". $nomCliente." \"></td>
<td colspan=\"1\" rowspan=\"7\"><input value=\"\" src=\"imagenes/".$fotoCliente."\" alt=\"\" name=\"imgFotoCliente\" height=\"180\" type=\"image\" width=\"280\"></td>
</tr>
<tr>
<td style=\"width: 161px;\">IDENTIFICACI�N</td>
<td style=\"width: 608px;\"><input name=\"txtId\"></td>
</tr>
<tr>
<td style=\"width: 161px;\">DIRECCI�N</td>
<td style=\"width: 608px;\"><input size=\"90\" name=\"txtDir\"></td>
</tr>
<tr>
<td style=\"width: 161px;\">TEL�FONOS</td>
<td style=\"width: 608px;\">
<select name=\"cboTelefonos\"><option></option>";
for($i=1;$i<=$tam;$i++){
 $listaTel=$listaTel."<option>".$vectorTelefonos[$i]."</option>";
}
$listaTel=$listaTel."</select>";
echo $listaTel.
"<br>
</td>
</tr>
<tr>
<td style=\"width: 161px;\">SEXO</td>
<td style=\"width: 608px;\"><input name=\"rdbSexo\" value=\"M\" type=\"radio\">Masculino &nbsp; <input name=\"rdbSexo\" value=\"F\" type=\"radio\">Femenino<br>
</td>
</tr>
<tr>
<td>FECHA NACIMIENTO</td>
<td><input value=\"01/01/01\" name=\"txtFecha\">dd/mm/aa</td>
</tr>
<tr>
<td style=\"width: 161px;\">AFICIONES</td>
<td style=\"width: 608px;\"><input name=\"chkDeporte\" type=\"checkbox\">Deportes <input name=\"chkLiteratura\" type=\"checkbox\">Literatura <input name=\"chkTecnologia\" type=\"checkbox\">Tecnolog�a <input name=\"chkMusica\" type=\"checkbox\">M�sica <input name=\"chkCine\" type=\"checkbox\">Cine <br>
<input name=\"chkOtro\" type=\"checkbox\">Otro
cu�l? <input name=\"txtCual\"><br>
</td>
</tr>
<tr>
<td style=\"width: 161px;\">DOCUMENTOS ASOCIADOS</td>
<td style=\"width: 608px;\"><input name=\"filesCliente\" size=\"90\" type=\"file\"></td>
<td></td>
</tr>
<tr>
<td>OBSERVACIONES</td>
<td><textarea cols=\"80\" rows=\"10\" name=\"txtObservaciones\"></textarea></td>
<td></td>
</tr>
<tr>
<td></td>
<td><input name=\"boton\" value=\"consultar\" onclick=\"validar_formulario_cliente()\" type=\"submit\">
</td>
<td></td>
</tr>
</tbody>
</table>
<br>
</form>
</body></html>
";
?>