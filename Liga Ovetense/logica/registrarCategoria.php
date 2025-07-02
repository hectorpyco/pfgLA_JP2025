<?php
    require("../conectar.php");

    $desc = strtoupper($_POST["descripcion"]);
    $usuario = $_POST["usuario"];

    $response = [];

    // Verificar si ya existe una categoría activa con el mismo nombre
    $sql_verificar = "SELECT id FROM categorias WHERE descripcion = ? AND estado = 'ACTIVO'";
    $stmt_verificar = mysqli_prepare($conexion, $sql_verificar);
    if ($stmt_verificar) {
        mysqli_stmt_bind_param($stmt_verificar, "s", $desc);
        mysqli_stmt_execute($stmt_verificar);
        mysqli_stmt_store_result($stmt_verificar);

        if (mysqli_stmt_num_rows($stmt_verificar) > 0) {
            // Ya existe una categoría activa con la misma descripción
            $response["exito"] = false;
            $response["mensaje"] = "Ya existe una categoría activa con esa descripción.";
            mysqli_stmt_close($stmt_verificar);
        } else {
            mysqli_stmt_close($stmt_verificar);

            // Insertar la nueva categoría
            $sql_insert = "INSERT INTO categorias (id, descripcion, estado) VALUES (NULL, ?, 'ACTIVO')";
            $stmt_insert = mysqli_prepare($conexion, $sql_insert);
            if ($stmt_insert) {
                mysqli_stmt_bind_param($stmt_insert, "s", $desc);
                if (mysqli_stmt_execute($stmt_insert)) {
                    $id = mysqli_insert_id($conexion);
                    $response["exito"] = true;
                    $response["id"] = $id;
                    $response["descripcion"] = $desc;
                    $response["usuario"] = $usuario;
                } else {
                    $response["exito"] = false;
                    $response["mensaje"] = "Error al ejecutar la inserción: " . mysqli_stmt_error($stmt_insert);
                }
                mysqli_stmt_close($stmt_insert);
            } else {
                $response["exito"] = false;
                $response["mensaje"] = "Error al preparar la consulta de inserción: " . mysqli_error($conexion);
            }
        }
    } else {
        $response["exito"] = false;
        $response["mensaje"] = "Error al preparar la consulta de verificación: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);

    // Devolver respuesta JSON
    header("Content-Type: application/json");
    echo json_encode($response);
?>