<?php
    require("../conectar.php");
    $response = [
        'presidentes' => [],
        'ligas' => []
    ];

    // Obtener presidentes
    $sqlPresidentes = "SELECT id, CONCAT(nombre, ' ', apellido) AS nombre_completo 
                       FROM usuarios 
                       WHERE idtipou = 3 AND estado = 'ACTIVO' ";
    $resultPresidentes = mysqli_query($conexion, $sqlPresidentes);

    if ($resultPresidentes && mysqli_num_rows($resultPresidentes) > 0) {
        while ($row = mysqli_fetch_assoc($resultPresidentes)) {
            $response['presidentes'][] = $row;
        }
    }

    // Obtener ligas
    $sqlLigas = "SELECT id, descripcion 
                 FROM liga";
    $resultLigas = mysqli_query($conexion, $sqlLigas);

    if ($resultLigas && mysqli_num_rows($resultLigas) > 0) {
        while ($row = mysqli_fetch_assoc($resultLigas)) {
            $response['ligas'][] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
?>
