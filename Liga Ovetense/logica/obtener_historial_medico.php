<?php
    header('Content-Type: application/json');
    require("../conectar.php");

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $sql = "SELECT h.*, 
                   j.nombre AS jugador_nombre, 
                   j.apellido AS jugador_apellido
            FROM historial_medico h
            LEFT JOIN jugadores j ON h.idjugador = j.id
            WHERE h.estado = 'ACTIVO'
            ORDER BY h.id DESC";

    $result = $conexion->query($sql);

    if ($result) {
        $historial = [];

        while ($row = $result->fetch_assoc()) {
            $historial[] = $row;
        }

        echo json_encode(['ok' => true, 'historial' => $historial]);
    } else {
        echo json_encode(['ok' => false, 'msg' => 'Error al consultar la base de datos: ' . $conexion->error]);
    }

    $conexion->close();
?>
