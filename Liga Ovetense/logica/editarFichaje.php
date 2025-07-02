<?php
  require("../conectar.php");
  $response = ['exito' => false, 'mensaje' => ''];

  try {
    // Función para convertir a mayúsculas con soporte multibyte (acentos)
    function toUpper($text) {
      return mb_strtoupper(trim($text), 'UTF-8');
    }

    // Datos del jugador (convertidos a mayúsculas)
    $jugador_id = $_POST['jugador_id'];
    $nombre = toUpper($_POST['jugador_nombre']);
    $apellido = toUpper($_POST['jugador_apellido']);
    $ci = toUpper($_POST['jugador_ci']);
    $telefono = toUpper($_POST['jugador_telefono']);
    $fecha_nac = $_POST['jugador_fecha_nac']; // fecha no se convierte
    $nacionalidad = toUpper($_POST['jugador_nacionalidad']);

    // Datos del fichaje (convertidos a mayúsculas)
    $fichaje_id = $_POST['fichaje_id'];
    $fecha = $_POST['fichaje_fecha']; // fecha no se convierte
    $descripcion = toUpper($_POST['fichaje_descripcion']);
    $tipo = toUpper($_POST['fichaje_tipo']);
    $club_origen = toUpper($_POST['fichaje_club_origen']);
    $club_destino = toUpper($_POST['fichaje_club_destino']);
    $duracion = toUpper($_POST['fichaje_duracion']);
    $costo = toUpper($_POST['fichaje_costo']);
    $salario = toUpper($_POST['fichaje_salario']);
    $clausula = toUpper($_POST['fichaje_clausula']);
    $observacion = toUpper($_POST['fichaje_observacion']);
    $estado_fichaje = toUpper($_POST['fichaje_estado_fichaje']);
    $usuario = toUpper($_POST['usuario']);

    // Verificar duplicado de jugador
    $consultaJugadorDuplicado = "
      SELECT id FROM jugadores 
      WHERE ci = '$ci' AND id != '$jugador_id' LIMIT 1";
    $resultadoJugadorDuplicado = mysqli_query($conexion, $consultaJugadorDuplicado);

    if (mysqli_num_rows($resultadoJugadorDuplicado) > 0) {
      $response['mensaje'] = 'Ya existe otro jugador registrado con el mismo número de cédula.';
      echo json_encode($response);
      exit;
    }

    // Verificar duplicado de fichaje
    $consultaFichajeDuplicado = "
      SELECT id FROM fichajes 
      WHERE fecha = '$fecha' 
        AND idclub_origen = '$club_origen'
        AND idclub_destino = '$club_destino'
        AND idjugador = '$jugador_id'
        AND id != '$fichaje_id'
      LIMIT 1";
    $resultadoFichajeDuplicado = mysqli_query($conexion, $consultaFichajeDuplicado);

    if (mysqli_num_rows($resultadoFichajeDuplicado) > 0) {
      $response['mensaje'] = 'Ya existe un fichaje similar para este jugador en esa fecha.';
      echo json_encode($response);
      exit;
    }

    // Actualizar jugador
    $sqlJugador = "
      UPDATE jugadores SET 
        nombre = '$nombre',
        apellido = '$apellido',
        ci = '$ci',
        telefono = '$telefono',
        fecha_nac = '$fecha_nac',
        nacionalidad = '$nacionalidad'
      WHERE id = '$jugador_id'";
      
    if (!mysqli_query($conexion, $sqlJugador)) {
      throw new Exception('Error al actualizar jugador: ' . mysqli_error($conexion));
    }

    // Actualizar fichaje
    $sqlFichaje = "
      UPDATE fichajes SET
        fecha = '$fecha',
        descripcion = '$descripcion',
        tipo_fichaje = '$tipo',
        idclub_origen = '$club_origen',
        idclub_destino = '$club_destino',
        duracion_contrato = '$duracion',
        costo_transferencia = '$costo',
        salario_anual = '$salario',
        clausula_rescision = '$clausula',
        observacion = '$observacion',
        estado_fichaje = '$estado_fichaje'
      WHERE id = '$fichaje_id'";

    if (!mysqli_query($conexion, $sqlFichaje)) {
      throw new Exception('Error al actualizar fichaje: ' . mysqli_error($conexion));
    }

    $response['exito'] = true;

  } catch (Exception $e) {
    $response['mensaje'] = $e->getMessage();
  }

  echo json_encode($response);
?>