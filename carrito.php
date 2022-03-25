<?php
session_start();
include "link.php";
$sql = "select p.id_producto,p.nombre,p.telefono, p.imagen , p.ubicacion from producto as p,carrito as c where c.id_usuario=".$_SESSION['id_usuario'] . " and c.id_producto=p.id_producto";
$query = mysqli_query($link,$sql);
$num = mysqli_num_rows($query);
print "".mysqli_error($link);
if($num == 0)
{?>
<script> alert("Su lista esta vacia "); window.location.href="index.php"; </script> <?php
}
else
{
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Lista</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />

<script language="javascript1.5" type="text/javascript">
function eliminar(nom,idp,cant) {
if (confirm("Esta seguro de eliminar el producto " + nom))
{
document.formae.idp.value = idp;
document.formae.cant.value = cant;
document.formae.submit();
}
}
</script>
</head>
<body>
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
<div class="dcont">
<br><br>
<b style="margin-left:590px; font-size:25px; color:white; background: #150553; ">Lista de tus servicios favoritos<br />
</b><br />
<form name="forma1" method="post" action="validacion.php">
<table style="margin:0px auto;" >
<tr style="background:#150153; height:30px; text-align:center; color:white;">
<td ><b>Nombre</b></td>
<td ><b>Imagen</b></td>
<td ><b>Telefono</b></td>
<td ><b>Descripcion</b></td>
<td ><b>Eliminar servicio </b></td>

<td><input type="hidden" name="val" value="6"> 
<input type="hidden" name="numprod" value="<?php echo $num; ?>"></td>
</tr>
<?php
$todo=0;
while ($row = mysqli_fetch_array($query))
{ ?>
<tr style="background:white;">
<td>
<b style="color:black; padding:20px;  font-size: 25px; display:inline-block;"> <?php echo $row[1]; ?> </b>
</td>
<td>
<b  style="color:black; padding:20px;  font-size: 25px;"><img src="images/<?php echo $row[3]; ?>"  name="img" /> </b> 
</td>
<td>
<b style="color:black; padding:20px;  font-size: 25px; display:inline-block; "> <?php echo $row[2]; ?> </b>
</td>
<td>
<b style="color:black; padding:20px; font-size: 25px; display:inline-block; "> <?php echo $row[4]; ?> </b>
</td>
<td>
<b style="color:black; padding:20px;  font-size: 25px;"> <a href="#" onclick="eliminar('<?php echo $row[1]; ?>','<?php echo $row[0]; ?>','<?php echo $row[3]; ?>')">
<img src="images/eliminar.png" alt="borrar" style="width: 90px; height:70px;"  /> </b>
</a>
</td>

</tr>

  <?php  
}?>


<tr style="height:30px;  text-align:center;">
<td width="150" colspan="6" style="padding:33px;" >
<input type="submit" value="Confirmar servicios"  style="background: #150553; color:white; height:50px; width:160px; border-radius:10px;"/>
</td>
</tr>
</table>
</form>
<form name="formae" method="post" action="validacion.php">
<input type="hidden" name="val" value="5">
<input type="hidden" name="idp" value="">
<input type="hidden" name="cant" value="">
</form>
</div>
</body>
</html>
<?php
}
?>
