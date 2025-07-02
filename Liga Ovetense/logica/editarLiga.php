<?php 
  $u = $_POST["usuario"];
  $des = strtoupper($_POST["des"]);
  $dire = strtoupper($_POST["dire"]);
  $tel = $_POST["tel"];
  $e = $_POST["email"];

  require("../conectar.php");

  // Obtener datos anteriores
  $sqlAnterior = "SELECT * FROM liga WHERE id = '1'";
  $resAnterior = mysqli_query($conexion, $sqlAnterior);

  if ($resAnterior && mysqli_num_rows($resAnterior) > 0) {
    $datosAnterior = mysqli_fetch_assoc($resAnterior);
    $desAnterior = $datosAnterior['descripcion'];
    $direAnterior = $datosAnterior['direccion'];
    $telAnterior = $datosAnterior['telefono'];
    $emailAnterior = $datosAnterior['email'];
  } else {
    // Si no hay datos anteriores, poner valores vacíos para evitar errores
    $desAnterior = "";
    $direAnterior = "";
    $telAnterior = "";
    $emailAnterior = "";
  }

  // Ejecutar update
  $sql = "UPDATE liga 
          SET descripcion = '$des', telefono = '$tel', direccion = '$dire', email = '$e' 
          WHERE id = '1'";
  $res = mysqli_query($conexion, $sql);

  if ($res) {
    $accion = "MODIFICAR";
    $ip = $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
    $fecha_hora = date("Y-m-d H:i:s");

    // Crear descripción con antes y después
    $descripcion = "MODIFICACION DE LIGA:\n";
    $descripcion .= "ANTES: Descripción: $desAnterior, Dirección: $direAnterior, Teléfono: $telAnterior, Email: $emailAnterior\n";
    $descripcion .= "DESPUES: Descripción: $des, Dirección: $dire, Teléfono: $tel, Email: $e";

    // Insertar en auditoría
    $sqlAudit = "INSERT INTO auditoria_liga (usuario_sistema, ip_acceso, fecha_hora, accion, descripcion)
                 VALUES ('$u', '$ip', '$fecha_hora', '$accion', '$descripcion')";
    mysqli_query($conexion, $sqlAudit);

    header("location:../vistas/liga.php?respuesta=1&usuario=$u");
  } else {
    header("location:../vistas/liga.php?respuesta=2&usuario=$u");
  }

  mysqli_close($conexion);
?>
