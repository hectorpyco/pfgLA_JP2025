<?php 
  $u=$_POST["usuario"];
  $n=strtoupper($_POST["nombre"]);
  $ape=strtoupper($_POST["ape"]);
  $tel=$_POST["tel"];
  $dire=strtoupper($_POST["dire"]);
  $pass=$_POST["pass"];

  require("../conectar.php");

  // Buscar el ID del usuario por el nombre de usuario
  $sql = "SELECT id FROM usuarios WHERE email = '$u'";
  $resultado = $conexion->query($sql);

  if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $id = $fila['id'];
      
    // Construir la consulta de actualización
    if (!empty($pass)) {
      // En caso de que se haya enviado una nueva contraseña
      $pass_encriptada = md5($pass);
      $sql_upd = "UPDATE usuarios SET nombre='$n', apellido='$ape', telefono='$tel', direccion='$dire', pass='$pass_encriptada' WHERE id=$id";
    } else {
      // Si la contraseña está vacía, no se actualiza
      $sql_upd = "UPDATE usuarios SET nombre = '$n', apellido = '$ape', telefono = '$tel', direccion = '$dire' WHERE id = $id";
    }

    if ($conexion->query($sql_upd) === TRUE) {
      header("location:../vistas/miPerfil.php?respuesta=1&usuario=$u");
    } else {
      header("location:../vistas/liga.php?respuesta=2&usuario=$u"); 
    }
  }else{
    header("location:../vistas/liga.php?respuesta=2&usuario=$u"); 
  }
  
?>