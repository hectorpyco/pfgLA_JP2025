<?php
    require("../conectar.php");
    header('Content-Type: application/json');

    $sql = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
    $resultado = mysqli_query($conexion, $sql);

    $clubes = [];

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $clubes[] = $fila;
    }

    echo json_encode($clubes);
?>