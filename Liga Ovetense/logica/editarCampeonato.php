<?php
    require("../conectar.php");

    $response = ['exito' => false];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['campeonato_id'];
        $descripcion = mb_strtoupper(trim($_POST['campeonato_descripcion']), 'UTF-8');
        $estado_marcha = mb_strtoupper(trim($_POST['campeonato_estado_marcha']), 'UTF-8');
        $fecha_i = $_POST['campeonato_fecha_i'];
        $fecha_f = $_POST['campeonato_fecha_f'];
        $idliga = $_POST['campeonato_liga'];
        $idtipo = $_POST['campeonato_tipo'];

        if ($id && $descripcion && $estado_marcha && $fecha_i && $fecha_f && $idliga && $idtipo) {

            // Validar que no exista otro campeonato con la misma descripción y diferente ID
            $check_sql = "SELECT id FROM campeonatos WHERE descripcion = ? AND id != ?";
            $check_stmt = mysqli_prepare($conexion, $check_sql);
            if ($check_stmt) {
                mysqli_stmt_bind_param($check_stmt, "si", $descripcion, $id);
                mysqli_stmt_execute($check_stmt);
                mysqli_stmt_store_result($check_stmt);

                if (mysqli_stmt_num_rows($check_stmt) > 0) {
                    $response['mensaje'] = "Ya existe otro campeonato con ese nombre.";
                } else {
                    // Si no hay duplicado, se procede a actualizar
                    $sql = "UPDATE campeonatos 
                            SET descripcion = ?, estado_marcha = ?, fecha_i = ?, fecha_f = ?, idliga = ?, idtipocampeonato = ?
                            WHERE id = ?";

                    $stmt = mysqli_prepare($conexion, $sql);
                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "ssssiii", $descripcion, $estado_marcha, $fecha_i, $fecha_f, $idliga, $idtipo, $id);
                        if (mysqli_stmt_execute($stmt)) {
                            $response['exito'] = true;
                        } else {
                            $response['mensaje'] = "Error al ejecutar: " . mysqli_stmt_error($stmt);
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        $response['mensaje'] = "Error al preparar: " . mysqli_error($conexion);
                    }
                }

                mysqli_stmt_close($check_stmt);
            } else {
                $response['mensaje'] = "Error al preparar verificación: " . mysqli_error($conexion);
            }
        } else {
            $response['mensaje'] = "Campos incompletos.";
        }
    } else {
        $response['mensaje'] = "Método no permitido.";
    }

    header('Content-Type: application/json');
    echo json_encode($response);
?>
