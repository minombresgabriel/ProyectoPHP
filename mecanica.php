<?php
session_start();
include 'link.php';
$sql = 'select * from producto where t=2';
$query = mysqli_query($link,$sql);
$num = mysqli_num_rows($query);
?>
 <html lang="en" dir="ltr">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
     <title>Mecanica</title>
     <script>

        function carrito(idp) {
          document.formac.idp.value = idp;
          document.formac.submit();
        }
        </script>
    
   </head>
   <body>
   <div id="contenedor">
   <header style="height:105px;">

    <?php
  if (!isset($_SESSION['id_usuario']))
  { ?>
    <a href="ingresar.php" class="registro">Login</a>  <a href="registrar.php" class="registro">Registrarse</a>  <?php
  }
  else
  {
    if ($_SESSION['tipo']=='Administrador')
    {?>
      <a href="producto.php" class="registro">Agregar servicios</a> <a href="index.php" class="registro">Inicio</a> <?php
    }
    else
    { ?>

      <a href="carrito.php" class="registro">Ver lista </a> <?php
    }?>

    <a href="cierre.php" class="registro">Salir</a><?php
  }
?>
          <a href="index.php">  <H2 id="logo"> <span>W</span>ork<span>F</span>or<span>W</span>ork</H2> </a>
          
            </header>
           
    <?php
    if($num==0)
   {
     echo "<b style=\"position:relative; color:white; top:250px; left: 450px; font-size:23px; background: #150553;\"> No existen servicios en este momento.</b>";
    }
    else
    {
    while($row = mysqli_fetch_array($query))
      { ?>
     <div>
        <table>
          <tr>
            <td style="background: white;">
              <img style="margin:60px;" src="images/<?php echo $row['imagen']; ?>" name="img<?php echo $row['id']; ?>">
            </td>
            <td style="background: #150553; width: 780px;">
            <b style="color:white; margin-left:80px; font-size: 25px;">Nombre:</b> <br> <i style="color:white; font-size: 25px;  margin-left:80px;" ><?php echo $row['nombre']; ?></i>
              <?php
              if (isset($_SESSION['tipo']) && $_SESSION['tipo']=='usuario')
                { ?>
                 <a  href="agregar_carro.php?pro=<?php print $row[0];?>"  ?>
                 <img src="images/add.png" style=" float:right; position:relative; bottom:30px; right:30px; height:80px; width:80px; " /></a><?php
                } ?>
                <br />
                <b style="color:white; margin-left:80px; font-size: 25px;">Telefono:</b> <br> <i style="color:white;  margin-left:80px; font-size: 25px;"> <?php echo $row['telefono']; ?><br /> </i>
                <b  style="color:white;  margin-left:80px; font-size: 25px;">Ubicacion:</b> <br> <i style="color:white;  margin-left:80px; font-size: 25px;" > <?php echo $row['descripcion']; ?> <br> </i>
                <b  style="color:white;  margin-left:80px; font-size: 25px;">Descripcion:</b> <br> <i style="color:white;  margin-left:80px; font-size: 25px;" > <?php echo $row['ubicacion']; ?> </i>  
               <br> <br> <br><br>  
               <div style="margin-left:300px;"> 
                <a href="https://web.whatsapp.com/"><div style="display:inline-block;"> <img src="images/wha.png" style="width:50px; height:50px;"> </div> </a> 
                <a href="https://es-la.facebook.com/"><div style="display:inline-block;"> <img src="images/fb.png" style="width:80px; height:50px;"></div>  </a> 
                <a href="https://twitter.com/?lang=es"><div style="display:inline-block;"> <img src="images/tw.png" style="width:50px; height:50px;"></div>  </a> 
              </div>
            </td>
          </tr>
        </table>
        </div>
<?php
    }
  }
?>
      </div>
   </body>
 </html>