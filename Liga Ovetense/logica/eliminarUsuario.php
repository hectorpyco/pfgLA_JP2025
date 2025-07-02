<?php 
  $u = $_GET["usuario"];
  $id = $_GET["id"];

  require("../conectar.php");

  // Obtener el ID del usuario que está realizando la acción
  $sqlU = "SELECT id FROM usuarios WHERE email = '$u'";
  $resultU = mysqli_query($conexion, $sqlU);
  if ($resultU && mysqli_num_rows($resultU) > 0) {
    $rowU = mysqli_fetch_assoc($resultU);
    $idUsuario = $rowU['id'];
  } else {
    $idUsuario = null;
  }

  // Impedir que un usuario se elimine a sí mismo
  if ($idUsuario == $id) {
    header("location:../vistas/usuarios.php?respuesta=7&usuario=$u");
    exit();
  } else {
    // Obtener los datos del usuario antes de inactivarlo
    $sqlDatos = "SELECT * FROM usuarios WHERE id='$id'";
    $resDatos = mysqli_query($conexion, $sqlDatos);
    $datos = mysqli_fetch_assoc($resDatos);

    if (!$datos) {
      header("location:../vistas/usuarios.php?respuesta=7&usuario=$u");
      exit();
    }

    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $ci = $datos['ci'];
    $telefono = $datos['telefono'];
    $direccion = $datos['direccion'];
    $email = $datos['email'];
    $idliga = $datos['idliga'];
    $idtipou = $datos['idtipou'];

    // Marcar como inactivo
    $sql = "UPDATE usuarios SET estado='INACTIVO' WHERE id='$id'";
    $res = mysqli_query($conexion, $sql);

    if ($res) {
      // Registrar auditoría
      $accion = "BAJA";
      $ip = $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
      $fecha_hora = date("Y-m-d H:i:s");
      $descripcion = "USUARIO DADO DE BAJA:\nNombre: $nombre, Apellido: $apellido, CI: $ci, Tel: $telefono, Dirección: $direccion, Email: $email, Liga: $idliga, Nivel: $idtipou";

      $sqlAudit = "INSERT INTO auditoria_usuarios (idusuario, accion, usuario_sistema, ip_acceso, fecha_hora, descripcion)
                   VALUES ('$id', '$accion', '$u', '$ip', '$fecha_hora', '$descripcion')";
      mysqli_query($conexion, $sqlAudit);

      header("location:../vistas/usuarios.php?respuesta=5&usuario=$u");
    } else {
      header("location:../vistas/usuarios.php?respuesta=7&usuario=$u");
    }
  }

  mysqli_close($conexion);
?>
