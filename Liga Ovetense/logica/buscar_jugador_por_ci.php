<?php
    require("../conectar.php");

    header('Content-Type: application/json');

    // Validar si llegó el parámetro CI
    if (!isset($_GET['ci'])) {
        echo json_encode(['existe' => false, 'error' => 'Falta el parámetro CI']);
        exit;
    }

    $ci = $_GET['ci'];

    // Consultar jugador
    $sql = "SELECT id, nombre, apellido FROM jugadores WHERE ci = ? AND estado = 'ACTIVO'";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $ci);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $jugador = $resultado->fetch_assoc();
        echo json_encode([
            'existe' => true,
            'id' => $jugador['id'],
            'nombre' => $jugador['nombre'],
            'apellido' => $jugador['apellido']
        ]);
    } else {
        echo json_encode(['existe' => false]);
    }
?>