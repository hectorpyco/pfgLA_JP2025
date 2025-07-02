<?php 
  $u = $_GET["usuario"];
  $id = $_GET["id"];

  require("../conectar.php");

  // Obtener los datos del historial antes de inactivarlo
  $sqlDatos = "SELECT * FROM historiales_futbolistico WHERE id='$id'";
  $resDatos = mysqli_query($conexion, $sqlDatos);
  $datos = mysqli_fetch_assoc($resDatos);

  if (!$datos) {
    header("location:../vistas/hFutbolistico.php?respuesta=7&usuario=$u");
    exit();
  }

  $idjugador = $datos['idjugador'];
  $fecha = $datos['fecha'];
  $partidos_jugados = $datos['partidos_jugados'];
  $goles = $datos['goles'];
  $asistencias = $datos['asistencias'];
  $tarjetas_amarillas = $datos['tarjetas_amarillas'];
  $tarjetas_rojas = $datos['tarjetas_rojas'];
  $minutos_jugados = $datos['minutos_jugados'];
  $pases_completados = $datos['pases_completados'];
  $faltas_cometidas = $datos['faltas_cometidas'];
  $atajadas = $datos['atajadas'];

  // Obtener nombre y apellido del jugador para la auditoría
  $sqlJugador = "SELECT nombre, apellido FROM jugadores WHERE id = '$idjugador'";
  $resJugador = mysqli_query($conexion, $sqlJugador);
  $jugador = mysqli_fetch_assoc($resJugador);
  $nombreCompleto = $jugador ? $jugador['nombre'] . ' ' . $jugador['apellido'] : 'Desconocido';

  // Actualizar estado a INACTIVO
  $sql = "UPDATE historiales_futbolistico SET estado='INACTIVO' WHERE id='$id'";
  $res = mysqli_query($conexion, $sql); 

  if ($res) {
    // Registrar auditoría
    $accion = "BAJA";
    $ip = $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
    $fecha_hora = date("Y-m-d H:i:s");

    $descripcion = "HISTORIAL DADO DE BAJA:\n" .
                   "ID Jugador: $idjugador ($nombreCompleto), Fecha: $fecha, Partidos Jugados: $partidos_jugados, Goles: $goles,\n" .
                   "Asistencias: $asistencias, Tarjetas Amarillas: $tarjetas_amarillas, Tarjetas Rojas: $tarjetas_rojas,\n" .
                   "Minutos Jugados: $minutos_jugados, Pases Completados: $pases_completados,\n" .
                   "Faltas Cometidas: $faltas_cometidas, Atajadas: $atajadas";

    $sqlAudit = "INSERT INTO auditoria_historiales (idhistorial, accion, usuario_sistema, ip_acceso, fecha_hora, descripcion)
                 VALUES ('$id', '$accion', '$u', '$ip', '$fecha_hora', '$descripcion')";
    mysqli_query($conexion, $sqlAudit);

    header("location:../vistas/hFutbolistico.php?respuesta=5&usuario=$u");
  } else {
    header("location:../vistas/hFutbolistico.php?respuesta=7&usuario=$u");
  }
  mysqli_close($conexion);
?>
