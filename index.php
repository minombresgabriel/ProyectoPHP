<?php
session_start();
include 'link.php';
$sql = 'select * from producto where cedula>0';
$query = mysqli_query($link,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icono.png" type="image/png">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="jquery.js"></script>
   
    <title>W.F.W</title>
</head>

<body>
    <div id="contenedor" style="width: 1300px;height: 800px;margin: 0 auto;background: #311699;">
    <header>

    <?php
  if (!isset($_SESSION['id_usuario']))
  { ?>
    <a href="ingresar.php" class="registro">Login</a>  <a href="registrar.php" class="registro">Registrarse</a>  <?php
  }
  else
  {
    if ($_SESSION['tipo']=='Administrador')
    {?>
      <a href="producto.php" class="registro">Agregar servicios</a>  <?php
    }
    else
    { ?>

      <a href="carrito.php" class="registro">Ver lista </a> <?php
    }?>

    <a href="cierre.php" class="registro">Salir</a><?php
  }
?>
            <H2 id="logo"> <span>W</span>ork<span>F</span>or<span>W</span>ork</H2>
          
            </header>
           
            
        <nav id="navegacion">
            <ul>
               <a href="historia.html"><li class="nav1">Historia</li></a>
               <a href="terminos.html"><li class="nav1">Terminos y condiciones</li></a>
               <a href="contacto.html"><li class="nav1">Contacto</li></a>

            </ul>
        </nav>
        <div class="blo" style="width: 400px;height: 266px;display: inline-block;margin-left: 20px;margin-top: 20px;"> <a href="moda.php" class="bloques">  <h3>Moda</h3>  <img src="images/ropa.jpg" alt="" class="imagenb"></a></div>
        <div class="blo" style="width: 400px;height: 266px;display: inline-block;margin-left: 20px;margin-top: 20px;">  <a href="mecanica.php" class="bloques">   <h3>Mecanica</h3> <img src="images/taller.jpg" alt="" class="imagenb"> </a></div>
        <div class="blo" style="width: 400px;height: 266px;display: inline-block;margin-left: 20px;margin-top: 20px;"> <a href="turismo.php" class="bloques"><h3>Turismo</h3> <img src="images/turismo.jpg" alt="" class="imagenb"></a></div>
        <div class="blo" style="width: 400px;height: 266px;display: inline-block;margin-left: 20px;margin-top: 20px;"><a href="fiestas.php" class="bloques">  <h3>Fiestas</h3><img src="images/fiestas.jpg" alt="" class="imagenb"></a></div>
        <div class="blo" style="width: 400px;height: 266px;display: inline-block;margin-left: 20px;margin-top: 20px;"> <a href="jardineria.php" class="bloques"> <h3>Jardineria</h3><img src="images/jardineria.jpg" alt="" class="imagenb"></a></div>
        <div class="blo"style="width: 400px;height: 266px;display: inline-block;margin-left: 20px;margin-top: 20px;"><a href="tecnologia.php" class="bloques">  <h3>Tecnologia</h3><img src="images/tecnologia.jpg" alt="" class="imagenb"></a></div>


    </div>

</body>

</html>