<?php
    require("../conectar.php");
    $response = [
        'ligas' => [],
        'tipos' => []
    ];

    // Obtener ligas
    $sqlLigas = "SELECT id, descripcion 
                 FROM liga";
    $resultLigas = mysqli_query($conexion, $sqlLigas);

    if ($resultLigas && mysqli_num_rows($resultLigas) > 0) {
        while ($row = mysqli_fetch_assoc($resultLigas)) {
            $response['ligas'][] = $row;
        }
    }

    // Obtener tipos de campeonato
    $sqlTipos = "SELECT id, descripcion 
                 FROM tipo_campeonato where estado='ACTIVO'";
    $resultTipos = mysqli_query($conexion, $sqlTipos);

    if ($resultTipos && mysqli_num_rows($resultTipos) > 0) {
        while ($row = mysqli_fetch_assoc($resultTipos)) {
            $response['tipos'][] = $row;
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
?>
