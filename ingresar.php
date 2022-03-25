<?php
session_start();
?>
 <html lang="en" dir="ltr">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ingreso.css">
     <title>Log-in</title>
   </head>
   <body>
    <div id="cont">
    <header>
    <a href="index.php">  <H2 id="logo"> <span>W</span>ork<span>F</span>or<span>W</span>ork</H2> </a>
    <a href="index.php" class="registro">Inicio</a>  <a href="registrar.php" class="registro">Registrarse</a>
    </header>
    <div id="contenedor" style="height:600px;">
      
       <h4>LOG IN</h4> <br><br>
       <img src="images/usuario.png" alt="" id="imagen">
       <form action="validacion.php" method="post">
         <table>
           <tr>
             <td > <input style="color:black; font-size:16px; font-weight:600; padding:10px; text-with:20px;" type="text" name="email" size="20" maxlength="50" placeholder="email"> </td>
           </tr>
           <tr>
             <td> <input style="color:black; font-size:16px; font-weight:600; padding:10px; text-with:20px;" type="password" name="password" size="20" maxlength="16" value="" placeholder="password"> </td>
           </tr>
           <tr>
             <td colspan="2" >
               <input type="submit" value="LOG IN" class="boton">
               <input type="hidden" name="val" value="1">
             </td>
           </tr>
         </table>
       </form>
        <b>Derechos reservados 2021</b>
     </div>
     </div>
   </body>
 </html>