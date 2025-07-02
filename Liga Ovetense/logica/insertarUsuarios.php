<?php 
  $u = $_POST["usuario"];
  $n = strtoupper($_POST["nombre"]);
  $a = strtoupper($_POST["ape"]);
  $ci = $_POST["ci"];
  $t = $_POST["tel"];
  $dire = strtoupper($_POST["dire"]);
  $idF = $_POST["if"]; // Renombrado por claridad
  $e = $_POST["email"];
  $nivel = $_POST["nivel"];

  require("../conectar.php");

  // Verificar si ya existe CI
  $sql = "SELECT * FROM usuarios WHERE ci='$ci' AND estado='ACTIVO'";
  $res = mysqli_query($conexion, $sql);

  if (mysqli_num_rows($res) == 0) {
    // Verificar si ya existe Email
    $sql2 = "SELECT * FROM usuarios WHERE email='$e' AND estado='ACTIVO'";
    $res2 = mysqli_query($conexion, $sql2);

    if (mysqli_num_rows($res2) == 0) {
      $passEncriptada = md5($ci);

      $sqlInsert = "INSERT INTO usuarios (id, nombre, apellido, ci, telefono, direccion, email, pass, idtipou, idliga, estado)
        VALUES (NULL, '$n', '$a', '$ci', '$t', '$dire', '$e', '$passEncriptada', '$nivel', '$idF', 'ACTIVO')";
      mysqli_query($conexion, $sqlInsert);

      // Auditoría después de la inserción
      $idNuevoUsuario = mysqli_insert_id($conexion);
      $accion = "INSERTAR";
      $descripcion = "NUEVO USUARIO REGISTRADO: $e";
      $ip = $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
      $fecha_hora = date("Y-m-d H:i:s");

      $sqlAudit = "INSERT INTO auditoria_usuarios (idusuario, accion, usuario_sistema, ip_acceso, fecha_hora, descripcion)
                   VALUES ('$idNuevoUsuario', '$accion', '$u', '$ip', '$fecha_hora', '$descripcion')";
      mysqli_query($conexion, $sqlAudit);

      header("Location: ../vistas/usuarios.php?respuesta=1&usuario=$u");
    } else {
      // Email ya registrado
      header("Location: ../vistas/usuarios.php?respuesta=6&usuario=$u");
    }

  } else {
    // CI ya registrado
    header("Location: ../vistas/usuarios.php?respuesta=2&usuario=$u");
  }

  mysqli_close($conexion);
?>
