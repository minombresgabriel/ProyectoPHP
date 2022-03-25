<?php session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirmacion</title>
<link rel="stylesheet" href="css/estilos.css">
</head>

<body>
<?php
include "link.php";
$sql = "select * from producto where id_producto ='$_GET[pro]'";
$query = mysqli_query($link,$sql);
$vector = mysqli_fetch_array($query);
?>
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

  <a href="carrito.php" class="registro">Ver carrito </a> <?php
}?>

<a href="cierre.php" class="registro">Salir</a><?php
}
?>
      <a href="index.php">  <H2 id="logo"> <span>W</span>ork<span>F</span>or<span>W</span>ork</H2> </a>
      
        </header>
       
<div class="producto">
<table>
<tr>
<td style="background: white;">
<img style="margin:60px;" src="images/<?php echo $vector['imagen']; ?>" >
</td>

<td style="background: #150553; width: 780px;">

<form id="form1" name="form1" method="post" action="validacion.php">
<h2 style="margin-left:200px; color:white;">Deseas agregar este servicio a su lista?</h2>

<input type="hidden" name="id_producto" value ="<?php echo $vector[0]; ?>">
<input type="hidden" name="val" value="4">
<input style="margin-left:250px; margin-top:30px; cursor:pointer; background:#311699; color:white; border-radius:10px; width:100px; height:90px; font-size:22px; display:inline-block;" type="submit" value="SI">
</form>
 <input  type="button" onclick="location.href='index.php';" value="NO" style="margin-left:250px; margin-top:30px; cursor:pointer; background:#311699; color:white; border-radius:10px; width:100px; height:90px; font-size:22px; position:relative; bottom:120px; left:200px;" NO/>

</td>
</tr>
</table>
</div>
</div>
</body>
</html>
