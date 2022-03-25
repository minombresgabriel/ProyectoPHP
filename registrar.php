<?php
session_start();
?>
 <html lang="en" dir="ltr">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ingreso.css">
     <title>Resgistro</title>
   </head>
   <body>
     <div id="cont">
    <header>
    <a href="index.php">  <H2 id="logo"> <span>W</span>ork<span>F</span>or<span>W</span>ork</H2> </a>
    <a href="index.php" class="registro">Inicio</a>  <a href="ingresar.php" class="registro">Ingresar</a>
    </header>
    <div id="contenedor" style="height:600px;"> 
      
      
      <h4>REGISTRO</h4> <br><br>
      <form name="usuario" action="validacion.php" method="post">
        <table>
          <tr>
            <td> <input style="color:black; font-size:16px; font-weight:600; padding:10px; text-with:20px;" type="text" name="login" value="" placeholder="email" required> </td>
          </tr>
          <tr>
            <td> <input style="color:black; font-size:16px; font-weight:600; padding:10px; text-with:20px;" type="password" name="password" value="" placeholder="password" required> </td>
          </tr>
          <tr>
            <td> <input style="color:black; font-size:16px; font-weight:600; padding:10px; text-with:20px;" type="text" name="nombre" value=""placeholder="nombre" required> </td>
          </tr>
          <tr>
            <td> <input style="color:black; font-size:16px; font-weight:600; padding:10px; text-with:20px;" type="text" name="apellido" value=""placeholder="apellido" required> </td>
          </tr>
          <tr>
            <td> <input style="color:black; font-size:16px; font-weight:600; padding:10px; text-with:20px;" type="text" name="cedula" value=""placeholder="C.I" required> </td>
          </tr>
          <tr>
            <td>
             <input type="checkbox" id="chek" required> Acepto todos los <a href="terminos.html">terminos y condiciones</a> 
            </td>
          </tr>
          <tr>
            <td>
             <input type="submit" name="" value="Registrarse" class="boton">
             <input type="hidden" name="val" value="2">
            </td>
          </tr>
        </table>
      </form>
      </div>
    </div>
    </body>
    </html>