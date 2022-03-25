<?php session_start(); include 'link.php';
if(isset($_POST['val'])) {
 switch ($_POST['val']){
 case 1 : //autentificacion de usuario login
 if(isset($_POST['email']) && $_POST['email']!='' && isset($_POST['password'])
&& $_POST['password']!=''){ #llegaron los datos
 $sql = "select * from usuario where email='$_POST[email]'";
 $query = mysqli_query($link,$sql);
 $num = mysqli_num_rows($query);
 if ($num==0) {?>
 <script> alert("No existe el usuario. "); </script><?PHP
 } else { # se encontro registro
 $row = mysqli_fetch_array($query); #descargo en el arreglo $row la 1era fila
 if ($row['password'] != md5($_POST['password'])){ #No coincide clave ?>
 <script> alert("Contraseña Incorrecta. ");
 window.location.href="ingresar.php"; </script><?PHP
 } else { # Autentificacion (Creamos variables de sesión con los datos)
 $_SESSION['id_usuario'] = $row['id_usuario'];
 $_SESSION['nombre'] = $row['nombre'];
 $_SESSION['apellido'] = $row['apellido'];
 $_SESSION['cedula'] = $row['cedula'];
 $_SESSION['tipo'] = $row['tipo'];
 header("location:index.php");
 }
 }
 }
 Else { ?>
 <script> alert("Debe rellenar todos los datos. "); 
 window.location.href="ingresar.php";</script> <?php
 } break;?>
 <?php
case 2 :// registro de usarios
    if (isset($_POST['login']) && $_POST['login']!='' && isset($_POST['password']) 
   && $_POST['password']!='' &&
    isset($_POST['nombre']) && $_POST['nombre']!='' && 
   isset($_POST['apellido']) && $_POST['apellido']!='' &&
    isset($_POST['cedula']) && $_POST['cedula']!='') {
    $sql = "insert into usuario
    values('','$_POST[login]','".md5($_POST['password'])."','$_POST[nombre]', 
   '$_POST[apellido]', '$_POST[cedula]', 'usuario')";
    // die ($sql);
    mysqli_query($link,$sql); // error en el insert
    if(mysqli_error($link)) {?>
    <script> alert("Error en el registro de usuario. ");
    window.location.href="registrar.php"; </script> <?php
    } else { // sin error ?>
    <script> alert("Usuario registrado exitosamente. "); 
    window.location.href="index.php"; </script> <?php

    }
    } else { // no se reciben los datos ?>
    <script> alert("Debe rellenar todos los datos. "); </script>
    <?php }
    break;
    case 3 : //carga de productos en la tienda
        if (isset($_FILES['img']['name']) && $_FILES['img']['name']!='' && 
       isset($_POST['nombre']) && $_POST['nombre']!='' && isset($_POST['telefono']) && 
       $_POST['telefono']!='' && isset($_POST['t']) && $_POST['t']!='' && 
       isset($_POST['descripcion']) && $_POST['descripcion']!='' && 
       isset($_POST['ubicacion']) && $_POST['ubicacion']!='') { // se reciben los datos
        $temporal = $_FILES['img']['tmp_name'];
        $arch = $_FILES['img']['name']; $tipo = getimagesize($temporal); #El índice 2 del arreglo que genera getimagesize  es una bandera que indica el tipo de imagen: 1 = GIF, 2 = JPG, 3 = PNG,
        if($tipo[2]!=1 && $tipo[2]!=2 && $tipo[2]!=3) { //1(gif) - 2(jpg) -3(png) ?>
        <script> alert("Tipo de imagen no permitido. "); </script><?php 
        } else { # el tipo de archivo es correcto se efectua la carga del producto
        if (copy($temporal,'images/'.$arch)) { # Foto copiada en la carpeta del servidor
        $sql="insert into producto values
       ('','$_POST[nombre]','$_POST[telefono]','$_POST[t]','$_POST[descripcion]','$_POST[ubicacion]','$arch')"; 
        mysqli_query($link,$sql);
        if(mysqli_error($link)) { #error en la insercion ?>
        <script> alert("Error en la carga de los datos "); </script> <?php 
        } else { # se cargaron los datos sin error?>
        <script> alert("El producto ha sido ingresdo al sistema "); window.location.href="index.php"; </script> <?php
        }
        } else {?>
        <script> alert("Error en la carga de la foto. Intente de nuevo "); window.location.href="producto.php"; </script> <?php
        }
        }
        }
        else { // no se reciben los datos ?>
        <script> alert("Debe rellenar todos los datos "); window.location.href="producto.php"; </script> <?php
        }
        break;
        case 4 : //carga de productos en el carrito
            date_default_timezone_set('America/Caracas');
            $fecha = date('Y-m-d h:i:s');
            $sql = "insert into carrito values('','$_SESSION[id_usuario]','$_POST[id_producto]',
            '$fecha')";
            mysqli_query($link,$sql);
            print_r(mysqli_error($link));
            if (mysqli_error($link)) {?>
            <script> alert("Error en la carga del servicio a la lista. "); window.location.href="index.php"; </script> <?php
            } else {
            ?>
            <script> alert("El servicio ha sido agregado en su lista. "); window.location.href="index.php"; </script> <?php
            }
            break;
case 5 : //eliminar de productos en el carrito
$sql = "delete from carrito where id_usuario='$_SESSION[id_usuario]' and
id_producto='$_POST[idp]'";
mysqli_query($link,$sql);
if (mysqli_error($link)) {?>
<script> alert("Error en la eliminación del producto. "); </script> <?php
} else { $sql1 = "update producto set tipo = tipo +'$_POST[cant]' where
id_producto='$_POST[idp]' ";
mysqli_query($link,$sql1);?>
<script> alert("El producto ha sido eliminado exitosamente ");window.location.href="index.php"; </script> <?php
} break;
case '6' : // Compra de productos
date_default_timezone_set('America/Caracas');
$fecha = date('Y-m-d h:i:s');
$sql = "insert into compra values('',$_SESSION[id_usuario],'$fecha')";
mysqli_query($link,$sql);
if (mysqli_error($link)){ ?>
<script> alert("Error en la compra. Intente nuevamente. "); </script> <?php
} else {
$sql = "select max(id_compra) from compra where id_usuario=$_SESSION[id_usuario]";
$query = mysqli_query($link,$sql);
$idc = mysqli_fetch_array($query);
// se elimina el producto del carrito
$sql = "delete from carrito where id_usuario= '$_SESSION[id_usuario]' ";
mysqli_query($link,$sql);
?><script> alert("Su compra se ha efectuado. Gracias ");  window.location.href="index.php"; </script> <?php }
break;
}
}
