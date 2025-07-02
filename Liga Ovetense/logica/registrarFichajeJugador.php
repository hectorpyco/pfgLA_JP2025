<?php
    require("../conectar.php");
    header('Content-Type: application/json');
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    function toUpper($str) {
        return strtoupper(trim($str));
    }

    // DATOS DEL JUGADOR
    $nombre = toUpper($_POST['jugador_nombre']);
    $apellido = toUpper($_POST['jugador_apellido']);
    $ci = toUpper($_POST['jugador_ci']);
    $telefono = toUpper($_POST['jugador_telefono'] ?? '');
    $fecha_nac = $_POST['jugador_fecha_nac'];
    $nacionalidad = toUpper($_POST['jugador_nacionalidad'] ?? '');

    // DATOS DEL FICHAJE
    $fecha_fichaje = $_POST['fichaje_fecha'];
    $descripcion = toUpper($_POST['fichaje_descripcion']);
    $club_origen = $_POST['fichaje_club_origen'];
    $club_destino = $_POST['fichaje_club_destino'];
    $tipo_fichaje = toUpper($_POST['fichaje_tipo']);
    $duracion = $_POST['fichaje_duracion'];
    $costo = $_POST['fichaje_costo'];
    $salario = $_POST['fichaje_salario'];
    $clausula = $_POST['fichaje_clausula'] ?? null;
    $observacion = toUpper($_POST['fichaje_observacion'] ?? '');
    $estado_fichaje = toUpper($_POST['fichaje_estado_fichaje']);
    $usuario = $_POST['usuario'];

    // 1. VERIFICAR SI EL JUGADOR YA EXISTE
    $sql_buscar = "SELECT id FROM jugadores WHERE ci = '$ci' AND estado = 'ACTIVO'";
    $result_buscar = mysqli_query($conexion, $sql_buscar);

    if ($result_buscar && mysqli_num_rows($result_buscar) > 0) {
        $row = mysqli_fetch_assoc($result_buscar);
        $idjugador = $row['id'];
    } else {
        // 2. INSERTAR JUGADOR NUEVO
        $sql_insert_jugador = "INSERT INTO jugadores (nombre, apellido, ci, telefono, fecha_nac, nacionalidad, foto, estado)
                               VALUES ('$nombre', '$apellido', '$ci', '$telefono', '$fecha_nac', '$nacionalidad', 'jugador_defecto.jpg', 'ACTIVO')";
        if (!mysqli_query($conexion, $sql_insert_jugador)) {
            echo json_encode(['exito' => false, 'mensaje' => 'Error al registrar jugador: ' . mysqli_error($conexion)]);
            exit;
        }
        $idjugador = mysqli_insert_id($conexion);
    }

    // VERIFICAR FICHAJE EN CURSO
    $sql_verificar_fichaje = "SELECT fecha, duracion_contrato, estado_fichaje 
                              FROM fichajes 
                              WHERE idjugador = $idjugador 
                                AND estado = 'ACTIVO' 
                                AND estado_fichaje = 'EN CURSO' 
                              ORDER BY fecha DESC 
                              LIMIT 1";

    $res_verificar = mysqli_query($conexion, $sql_verificar_fichaje);

    if ($res_verificar && mysqli_num_rows($res_verificar) > 0) {
        $fichaje_actual = mysqli_fetch_assoc($res_verificar);
        $fecha_inicio = new DateTime($fichaje_actual['fecha']);
        $duracion_meses = intval($fichaje_actual['duracion_contrato']);

        // Calcular fecha de finalización
        $fecha_fin = clone $fecha_inicio;
        $fecha_fin->modify("+$duracion_meses months");
        $fecha_actual = new DateTime();

        // Si aún no terminó el fichaje, no permitir fichar
        if ($fecha_actual < $fecha_fin) {
            echo json_encode([
                'exito' => false,
                'mensaje' => 'El jugador aún tiene un fichaje en curso hasta el ' . $fecha_fin->format('d/m/Y') . '. No se puede registrar un nuevo fichaje.'
            ]);
            exit;
        }
    }

    // 3. INSERTAR FICHAJE
    $sql_insert_fichaje = "INSERT INTO fichajes (idjugador, fecha, descripcion, idclub_origen, idclub_destino, tipo_fichaje, duracion_contrato, costo_transferencia, salario_anual, clausula_rescision, observacion, estado_fichaje, estado)
                           VALUES ($idjugador, '$fecha_fichaje', '$descripcion', $club_origen, $club_destino, '$tipo_fichaje', '$duracion', '$costo', '$salario', '$clausula', '$observacion', '$estado_fichaje', 'ACTIVO')";

    if (!mysqli_query($conexion, $sql_insert_fichaje)) {
        echo json_encode(['exito' => false, 'mensaje' => 'Error al registrar fichaje: ' . mysqli_error($conexion)]);
        exit;
    }

    // Recuperar los datos del fichaje insertado
    $idfichaje = mysqli_insert_id($conexion);

        // Obtener datos del fichaje recién insertado
    $sqlDatos = "
      SELECT 
        f.*, 
        j.nombre, j.apellido, j.ci, j.telefono, j.fecha_nac, j.nacionalidad,
        c1.descripcion AS club_origen_desc,
        c2.descripcion AS club_destino_desc
      FROM fichajes f
      INNER JOIN jugadores j ON f.idjugador = j.id
      INNER JOIN clubes c1 ON f.idclub_origen = c1.id
      INNER JOIN clubes c2 ON f.idclub_destino = c2.id
      WHERE f.id = '$idfichaje'
    ";
    $resDatos = mysqli_query($conexion, $sqlDatos);
    $datos = mysqli_fetch_assoc($resDatos);

    if ($datos) {
      // Preparar auditoría
      $accion = "INSERTAR";
      $ip = $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
      $fecha_hora = date("Y-m-d H:i:s");

      // Variables del jugador
      $nombre = $datos['nombre'];
      $apellido = $datos['apellido'];
      $ci = $datos['ci'];
      $telefono = $datos['telefono'];
      $fecha_nac = $datos['fecha_nac'];
      $nacionalidad = $datos['nacionalidad'];

      // Variables del fichaje
      $fecha_fichaje = $datos['fecha'];
      $descripcion = $datos['descripcion'];
      $tipo_fichaje = $datos['tipo_fichaje'];
      $duracion = $datos['duracion_contrato'];
      $costo = $datos['costo_transferencia'];
      $salario = $datos['salario_anual'];
      $clausula = $datos['clausula_rescision'];
      $estado_fichaje = $datos['estado_fichaje'];
      $observacion = $datos['observacion'];

      // Variables de los clubes
      $club_origen = $datos['idclub_origen'] . " - " . $datos['club_origen_desc'];
      $club_destino = $datos['idclub_destino'] . " - " . $datos['club_destino_desc'];

      // Descripción detallada
      $descripcionAudit = "FICHAJE REGISTRADO:\n" .
                          "Jugador: {$nombre} {$apellido} (CI: {$ci}), Fecha Nac: {$fecha_nac}, Nacionalidad: {$nacionalidad}, Tel: {$telefono}\n" .
                          "Fichaje: Fecha: {$fecha_fichaje}, Descripción: {$descripcion}, Tipo: {$tipo_fichaje}, Duración: {$duracion} meses\n" .
                          "Club Origen: {$club_origen}, Club Destino: {$club_destino}\n" .
                          "Costo: {$costo}, Salario: {$salario}, Cláusula: {$clausula}\n" .
                          "Estado Fichaje: {$estado_fichaje}, Observación: {$observacion}";

      // Insertar en auditoría
      $sql_auditoria = "INSERT INTO auditoria_fichajes (idfichaje, accion, usuario_sistema, ip_acceso, fecha_hora, descripcion)
                        VALUES ('$idfichaje', '$accion', '$usuario', '$ip', '$fecha_hora', '$descripcionAudit')";

      mysqli_query($conexion, $sql_auditoria);
    }
    
    $sql_fichaje = "SELECT f.*, 
                            j.nombre AS jugador_nombre, 
                            j.apellido AS jugador_apellido, 
                            j.ci AS jugador_ci,
                            j.telefono AS jugador_telefono,
                            j.fecha_nac AS jugador_fecha_nacimiento,
                            j.nacionalidad AS jugador_nacionalidad,
                            co.descripcion AS club_origen, 
                            cd.descripcion AS club_destino
                     FROM fichajes f
                     LEFT JOIN jugadores j ON f.idjugador = j.id
                     LEFT JOIN clubes co ON f.idclub_origen = co.id
                     LEFT JOIN clubes cd ON f.idclub_destino = cd.id
                     WHERE f.id = $idfichaje";

    $res_fichaje = mysqli_query($conexion, $sql_fichaje);
    $fichaje = mysqli_fetch_assoc($res_fichaje);

    // Devolver la respuesta con los datos
    echo json_encode([
        'exito' => true,
        'fichaje' => $fichaje,
        'usuario' => $usuario
    ]);
?>
