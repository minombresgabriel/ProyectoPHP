<?php
session_start();
 ?>
 <html lang="en" dir="ltr">
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <title> Agregar servicios</title>
     <link rel="stylesheet" href="css/ingreso.css">
   </head>

   <body>
    <div id="cont">
      <header>
        <H2 id="logo"> <span>W</span>ork<span>F</span>or<span>W</span>ork</H2>
         <a href="index.php" class="registro">Inicio</a>  <a href="cierre.php" class="registro">Salir</a> 
         </header>
   <div id="contenedor" style="height:700px;"> 
      <h4>Agregar servicios</h4> <br> <br>
       <form name="productos" enctype="multipart/form-data" action="validacion.php" method="post">
         <table>
           <tr>
             <td> <input type="file" name="img" style="cursor: pointer;"> </td>
           </tr>
           <tr>
            <td> <input type="text" name="nombre" placeholder="nombre"> </td>
           </tr>
           <tr>
           <td> <input type="text" name="telefono" placeholder="telefono"> </td>
           </tr>
           <tr>
          <td> <input type="text" name="t" placeholder="tipo"> </td>
           </tr>
           <tr>
          <td> <input name="descripcion" placeholder="Escriba ubicacion" cols="50" rows="5" id="area" maxlength="50" style="margin-top: 20px;" ></input> </td>
           </tr>
           <tr>
          <td> <textarea name="ubicacion" placeholder="Escriba descripcion" cols="50" rows="5" id="area" maxlength="50" style="margin-top: 20px;" ></textarea> </td>
           </tr>
           <tr>
             <td>
               <input type="submit" name="" value="Enviar" class="boton">
               <input type="hidden" name="val" value="3">
             </td>
           </tr>
         </table>
       </form>
      </div>

    </div>


   </body>
 </html>
