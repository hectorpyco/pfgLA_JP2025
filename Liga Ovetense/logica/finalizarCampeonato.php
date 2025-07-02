<?php
    require("../conectar.php");

    $response = ['exito' => false];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $id = intval($_POST['id']);
        $fecha_actual = date('Y-m-d');

        $sql = "UPDATE campeonatos 
                SET estado_marcha = 'FINALIZADO', 
                    fecha_culminacion_real = ?
                WHERE id = ?";

        $stmt = mysqli_prepare($conexion, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'si', $fecha_actual, $id);
            if (mysqli_stmt_execute($stmt)) {
                $response['exito'] = true;
            }
            mysqli_stmt_close($stmt);
        }
    }

    echo json_encode($response);
?>
