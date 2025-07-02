<?php
    require("../conectar.php");

    // Mostrar errores (solo para desarrollo)
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Inicializar respuesta
    $response = ['exito' => false];

    // Verificar que sea una solicitud POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recoger y limpiar datos
        $descripcion = mb_strtoupper(trim($_POST['campeonato_descripcion']), 'UTF-8');
        $fecha_i = $_POST['campeonato_fecha_i'];
        $fecha_f = $_POST['campeonato_fecha_f'];
        $estado_marcha = mb_strtoupper(trim($_POST['campeonato_estado_marcha']), 'UTF-8');
        $idliga = $_POST['campeonato_liga'];
        $idtipo = $_POST['campeonato_tipo'];
        $fecha_culminacion_real = '2025-01-01';

        // Validar que todos los campos estén presentes
        if ($descripcion && $fecha_i && $fecha_f && $estado_marcha && $idliga && $idtipo) {
            // Verificar si ya existe un campeonato con misma descripción, fecha de inicio y tipo
            $sql_verificar = "SELECT id FROM campeonatos 
                              WHERE descripcion = ? 
                              AND fecha_i = ? 
                              AND idtipocampeonato = ? 
                              AND estado = 'ACTIVO'";
            $stmt_verificar = mysqli_prepare($conexion, $sql_verificar);
            if ($stmt_verificar) {
                mysqli_stmt_bind_param($stmt_verificar, "ssi", $descripcion, $fecha_i, $idtipo);
                mysqli_stmt_execute($stmt_verificar);
                mysqli_stmt_store_result($stmt_verificar);

                if (mysqli_stmt_num_rows($stmt_verificar) > 0) {
                    // Ya existe un campeonato con esa combinación
                    $response['mensaje'] = "Ya existe un campeonato activo con esa descripción, fecha de inicio y tipo.";
                    echo json_encode($response);
                    exit;
                }
                mysqli_stmt_close($stmt_verificar);
            }

            // Preparar la inserción
            $sql = "INSERT INTO campeonatos 
                    (descripcion, fecha_i, fecha_f, fecha_culminacion_real, estado_marcha, idliga, idtipocampeonato, estado)
                    VALUES (?, ?, ?, ?, ?, ?, ?, 'ACTIVO')";

            $stmt = mysqli_prepare($conexion, $sql);

            if ($stmt) {
                // Vincular parámetros
                mysqli_stmt_bind_param($stmt, "sssssii", $descripcion, $fecha_i, $fecha_f, $fecha_culminacion_real, $estado_marcha, $idliga, $idtipo);

                // Ejecutar la consulta
                if (mysqli_stmt_execute($stmt)) {
                    $inserted_id = mysqli_insert_id($conexion);

                    // Obtener los datos relacionados de liga y tipo
                    $sql_datos = "SELECT 
                                    (SELECT descripcion FROM liga WHERE id = ?) AS liga, 
                                    (SELECT descripcion FROM tipo_campeonato WHERE id = ?) AS tipo_campeonato";
                    $stmt_datos = mysqli_prepare($conexion, $sql_datos);
                    if ($stmt_datos) {
                        mysqli_stmt_bind_param($stmt_datos, "ii", $idliga, $idtipo);
                        mysqli_stmt_execute($stmt_datos);
                        mysqli_stmt_bind_result($stmt_datos, $liga, $tipo_campeonato);
                        mysqli_stmt_fetch($stmt_datos);

                        $response = [
                            'exito' => true,
                            'id' => $inserted_id,
                            'descripcion' => $descripcion,
                            'fecha_i' => $fecha_i,
                            'fecha_f' => $fecha_f,
                            'fecha_culminacion_real' => $fecha_culminacion_real,
                            'estado_marcha' => $estado_marcha,
                            'idliga' => $idliga,
                            'idtipocampeonato' => $idtipo,
                            'liga' => $liga,
                            'tipo_campeonato' => $tipo_campeonato
                        ];
                        mysqli_stmt_close($stmt_datos);
                    } else {
                        $response['mensaje'] = "Error al preparar la consulta de datos relacionados: " . mysqli_error($conexion);
                    }
                } else {
                    $response['mensaje'] = "Error al ejecutar el insert: " . mysqli_stmt_error($stmt);
                }
                mysqli_stmt_close($stmt);
            } else {
                $response['mensaje'] = "Error al preparar el insert: " . mysqli_error($conexion);
            }
        } else {
            $response['mensaje'] = "Datos incompletos.";
        }
    } else {
        $response['mensaje'] = "Método no permitido.";
    }

    // Devolver la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
?>
