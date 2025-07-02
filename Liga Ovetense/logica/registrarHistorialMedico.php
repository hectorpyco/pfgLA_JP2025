<?php
    header('Content-Type: application/json');
    require("../conectar.php");

    $idjugador = $_POST['idjugador'] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $diagnostico = $_POST['diagnostico'] ?? '';
    $tratamiento = $_POST['tratamiento'] ?? '';
    $fecha_recuperacion = $_POST['fecha_recuperacion'] ?? '';
    $medico_tratante = $_POST['medico_tratante'] ?? '';
    $observaciones = $_POST['observaciones'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $estado = 'ACTIVO';

    $response = [];

    if (empty($idjugador)) {
        $response = [
            'exito' => false,
            'mensaje' => 'No se ha especificado un jugador.'
        ];
        echo json_encode($response);
        exit;
    }

    // Consultar nombre y apellido del jugador
    $queryJugador = $conexion->prepare("SELECT nombre, apellido FROM jugadores WHERE id = ?");
    $queryJugador->bind_param("i", $idjugador);
    $queryJugador->execute();
    $resultJugador = $queryJugador->get_result();

    if ($resultJugador->num_rows === 0) {
        $response = [
            'exito' => false,
            'mensaje' => 'El jugador no fue encontrado.'
        ];
        echo json_encode($response);
        exit;
    }

    $jugador = $resultJugador->fetch_assoc();

    // Insertar historial médico
    $sql = "INSERT INTO historial_medico 
    (idjugador, fecha, tipo, diagnostico, tratamiento, fecha_recuperacion, medico_tratante, observaciones, estado) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('issssssss', $idjugador, $fecha, $tipo, $diagnostico, $tratamiento, $fecha_recuperacion, $medico_tratante, $observaciones, $estado);

        if ($stmt->execute()) {
            $idInsertado = $stmt->insert_id;
            $response = [
                'exito' => true,
                'mensaje' => 'Historial médico registrado correctamente.',
                'id' => $idInsertado,
                'jugador_nombre' => $jugador['nombre'],
                'jugador_apellido' => $jugador['apellido'],
                'fecha' => $fecha,
                'tipo' => $tipo,
                'diagnostico' => $diagnostico,
                'tratamiento' => $tratamiento,
                'fecha_recuperacion' => $fecha_recuperacion,
                'medico_tratante' => $medico_tratante,
                'observaciones' => $observaciones
            ];
        } else {
            $response = [
                'exito' => false,
                'mensaje' => 'Error al guardar los datos: ' . $stmt->error
            ];
        }

        $stmt->close();
    } else {
        $response = [
            'exito' => false,
            'mensaje' => 'Error en la preparación de la consulta: ' . $conexion->error
        ];
    }

    $conexion->close();
    echo json_encode($response);

    // Debug en archivo para verificar si hay salida
    file_put_contents("debug_salida.txt", json_encode($response));
?>