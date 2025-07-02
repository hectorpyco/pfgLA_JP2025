<?php 
  $u = $_GET["usuario"];
  $id = $_GET["id"];

  require("../conectar.php");

  // Obtener los datos del fichaje y datos relacionados
  $sqlDatos = "
    SELECT 
      f.*, 
      j.nombre AS nombre_jugador, j.apellido AS apellido_jugador, j.ci AS ci_jugador,
      c1.descripcion AS club_origen,
      c2.descripcion AS club_destino
    FROM fichajes f
    INNER JOIN jugadores j ON f.idjugador = j.id
    INNER JOIN clubes c1 ON f.idclub_origen = c1.id
    INNER JOIN clubes c2 ON f.idclub_destino = c2.id
    WHERE f.id = '$id'
  ";
  
  $resDatos = mysqli_query($conexion, $sqlDatos);
  $datos = mysqli_fetch_assoc($resDatos);

  if (!$datos) {
    header("location:../vistas/fichajes.php?respuesta=7&usuario=$u");
    exit();
  }

  // Desactivar fichaje
  $sql = "UPDATE fichajes SET estado='INACTIVO', estado_fichaje='SUSPENDIDO' WHERE id='$id'";
  $res = mysqli_query($conexion, $sql); 

  if ($res) {
    // Preparar datos para la auditoría
    $accion = "BAJA";
    $ip = $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
    $fecha_hora = date("Y-m-d H:i:s");

    $descripcion = "FICHAJE DADO DE BAJA:\n" .
                   "Jugador: {$datos['nombre_jugador']} {$datos['apellido_jugador']} (CI: {$datos['ci_jugador']}),\n" .
                   "Fecha: {$datos['fecha']}, Descripción: {$datos['descripcion']},\n" .
                   "Club Origen: {$datos['club_origen']}, Club Destino: {$datos['club_destino']},\n" .
                   "Tipo: {$datos['tipo_fichaje']}, Duración Contrato en meses: {$datos['duracion_contrato']},\n" .
                   "Costo Transferencia: {$datos['costo_transferencia']}, Salario Anual: {$datos['salario_anual']},\n" .
                   "Cláusula Rescisión: {$datos['clausula_rescision']}, Observación: {$datos['observacion']}.";

    // Registrar en auditoría
    $sqlAudit = "INSERT INTO auditoria_fichajes (idfichaje, accion, usuario_sistema, ip_acceso, fecha_hora, descripcion)
                 VALUES ('$id', '$accion', '$u', '$ip', '$fecha_hora', '$descripcion')";
    mysqli_query($conexion, $sqlAudit);

    header("location:../vistas/fichajes.php?respuesta=5&usuario=$u");
  } else {
    header("location:../vistas/fichajes.php?respuesta=7&usuario=$u");
  }

  mysqli_close($conexion);
?>
