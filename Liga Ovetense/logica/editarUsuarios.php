<?php 
  $u = $_POST["usuario"];
  $id = $_POST["id"];
  $n = strtoupper($_POST["nombre"]);
  $a = strtoupper($_POST["ape"]);
  $ci = strtoupper($_POST["ci"]);
  $t = strtoupper($_POST["tel"]);
  $dire = strtoupper($_POST["dire"]);
  $idF = $_POST["idF"];
  $e = $_POST["email"];
  $p = $_POST["pass"];
  $nivel = $_POST["nivel"];

  require("../conectar.php");

  // Obtener datos anteriores del usuario
  $sqlAnterior = "SELECT * FROM usuarios WHERE id='$id'";
  $resAnterior = mysqli_query($conexion, $sqlAnterior);
  $usuarioAnterior = mysqli_fetch_assoc($resAnterior);

  if ($usuarioAnterior) {
    $nombreAnterior = $usuarioAnterior['nombre'];
    $apellidoAnterior = $usuarioAnterior['apellido'];
    $ciAnterior = $usuarioAnterior['ci'];
    $telAnterior = $usuarioAnterior['telefono'];
    $direAnterior = $usuarioAnterior['direccion'];
    $emailAnterior = $usuarioAnterior['email'];
    $ligaAnterior = $usuarioAnterior['idliga'];
    $tipoAnterior = $usuarioAnterior['idtipou'];
  }

  $sql = "SELECT * FROM usuarios WHERE email='$e'";
  $res = mysqli_query($conexion, $sql);

  $continuar = false;

  if (mysqli_num_rows($res) > 0) {
    while ($reg = mysqli_fetch_array($res)) {
      if ($reg[0] == $id) {
        $sql1 = "SELECT * FROM usuarios WHERE ci='$ci'";
        $res1 = mysqli_query($conexion, $sql1);
        if (mysqli_num_rows($res1) > 0) {
          while ($reg1 = mysqli_fetch_array($res1)) {
            if ($reg1[3] == $ci && $reg1[0] == $id) {
              $continuar = true;
            } else {
              header("location:../vistas/usuarios.php?respuesta=2&usuario=$u&id=$id");
              exit;
            }
          }
        } else {
          $continuar = true;
        }
      } else {
        header("location:../vistas/usuarios.php?respuesta=6&usuario=$u&id=$id");
        exit;
      }
    }
  } else {
    $sql1 = "SELECT * FROM usuarios WHERE ci='$ci'";
    $res1 = mysqli_query($conexion, $sql1);
    if (mysqli_num_rows($res1) > 0) {
      while ($reg1 = mysqli_fetch_array($res1)) {
        if ($reg1[3] == $ci && $reg1[0] == $id) {
          $continuar = true;
        } else {
          header("location:../vistas/usuarios.php?respuesta=2&usuario=$u&id=$id");
          exit;
        }
      }
    } else {
      $continuar = true;
    }
  }

  if ($continuar) {
    $sqlSet = "nombre='$n', apellido='$a', ci='$ci', telefono='$t', direccion='$dire', email='$e', idliga='$idF', idtipou='$nivel', estado='ACTIVO'";
    if (!empty($p)) {
      $hashedPass = md5($p);
      $sqlSet .= ", pass='$hashedPass'";
    }

    $sqlUpdate = "UPDATE usuarios SET $sqlSet WHERE id='$id'";
    $resUpdate = mysqli_query($conexion, $sqlUpdate);

    if ($resUpdate) {
      $accion = "MODIFICAR";
      $ip = $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
      $fecha_hora = date("Y-m-d H:i:s");

      $descripcion = "MODIFICACION DE USUARIO:\n";
      $descripcion .= "ANTES: Nombre: $nombreAnterior, Apellido: $apellidoAnterior, CI: $ciAnterior, Tel: $telAnterior, Dir: $direAnterior, Email: $emailAnterior, Liga: $ligaAnterior, Nivel: $tipoAnterior\n";
      $descripcion .= "DESPUES: Nombre: $n, Apellido: $a, CI: $ci, Tel: $t, Dir: $dire, Email: $e, Liga: $idF, Nivel: $nivel";

      $sqlAudit = "INSERT INTO auditoria_usuarios (idusuario, accion, usuario_sistema, ip_acceso, fecha_hora, descripcion)
                   VALUES ('$id', '$accion', '$u', '$ip', '$fecha_hora', '$descripcion')";
      mysqli_query($conexion, $sqlAudit);

      header("location:../vistas/usuarios.php?respuesta=3&usuario=$u&id=$id");
    } else {
      header("location:../vistas/usuarios.php?respuesta=4&usuario=$u&id=$id");
    }
  }

  mysqli_close($conexion);
?>
