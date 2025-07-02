<?php
    require("../conectar.php");

    $desc = strtoupper(trim($_POST["descripcion"]));
    $usuario = $_POST["usuario"];

    $response = [];

    // Verificar si ya existe un registro con la misma descripción
    $sql_verificar = "SELECT id FROM tipo_campeonato WHERE UPPER(descripcion) = '$desc'";
    $resultado = mysqli_query($conexion, $sql_verificar);

    if (mysqli_num_rows($resultado) > 0) {
        $response["exito"] = false;
        $response["mensaje"] = "Ya existe un tipo de campeonato con esa descripción.";
    } else {
        // Si no existe, se inserta el nuevo registro
        $sql = "INSERT INTO tipo_campeonato (id, descripcion, estado) VALUES (null, '$desc', 'ACTIVO')";
        if (mysqli_query($conexion, $sql)) {
            $id = mysqli_insert_id($conexion);
            $response["exito"] = true;
            $response["id"] = $id;
            $response["descripcion"] = $desc;
            $response["usuario"] = $usuario;
        } else {
            $response["exito"] = false;
            $response["mensaje"] = "Error al insertar en la base de datos.";
        }
    }

    mysqli_close($conexion);
    header("Content-Type: application/json");
    echo json_encode($response);
?>
