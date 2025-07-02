<?php
    // Mostrar errores de PHP si los hay
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Incluir la conexión a la base de datos
    require("../conectar.php");

    // Recuperar los datos enviados desde el formulario
    $descripcion = strtoupper($_POST['cancha_descripcion']);
    $direccion = strtoupper($_POST['cancha_direccion']);
    $capacidad = $_POST['cancha_capacidad'];
    $tipo_superficie = $_POST['cancha_superficie'];
    $disponibilidad = $_POST['cancha_disponibilidad'];
    $idclub = $_POST['cancha_idclub'];

    // Validar si los campos están completos
    if (empty($descripcion) || empty($direccion) || empty($capacidad) || empty($tipo_superficie) || empty($disponibilidad) || empty($idclub)) {
        echo json_encode(['exito' => false, 'mensaje' => 'Por favor, complete todos los campos.']);
        exit;
    }

    // Asegurarse de que 'capacidad' sea un número entero
    $capacidad = intval($capacidad);

    // Verificar si ya existe una cancha con la misma descripción y el mismo club
    $sql_check = "SELECT id FROM canchas WHERE descripcion = ? AND idclub = ? AND estado = 'ACTIVO'";
    $stmt_check = mysqli_prepare($conexion, $sql_check);

    if ($stmt_check) {
        // Vincular parámetros y ejecutar la consulta
        mysqli_stmt_bind_param($stmt_check, "si", $descripcion, $idclub);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);

        // Si se encuentra un registro, significa que ya existe la cancha
        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            echo json_encode(['exito' => false, 'mensaje' => 'Ya existe una cancha con la misma descripción en este club.']);
            mysqli_stmt_close($stmt_check);
            exit;
        }

        mysqli_stmt_close($stmt_check);
    } else {
        echo json_encode(['exito' => false, 'mensaje' => 'Error al verificar duplicados: ' . mysqli_error($conexion)]);
        exit;
    }

    // Consulta SQL para insertar los datos de la cancha
    $sql_insert = "INSERT INTO canchas (id, descripcion, idclub, direccion, tipo_superficie, capacidad, disponibilidad, estado) 
                   VALUES (null, ?, ?, ?, ?, ?, ?, 'ACTIVO')";
    $stmt_insert = mysqli_prepare($conexion, $sql_insert);

    if ($stmt_insert) {
        // Vincular parámetros y ejecutar la consulta
        mysqli_stmt_bind_param($stmt_insert, "sisssi", $descripcion, $idclub, $direccion, $tipo_superficie, $capacidad, $disponibilidad);
        if (mysqli_stmt_execute($stmt_insert)) {
            // Si la inserción es exitosa, recuperar el ID insertado y preparar la respuesta JSON
            $idCancha = mysqli_insert_id($conexion);
            
            // Recuperar el nombre del club
            $clubQuery = "SELECT descripcion FROM clubes WHERE id = '$idclub'";
            $clubResult = mysqli_query($conexion, $clubQuery);
            $club = mysqli_fetch_assoc($clubResult)['descripcion'];

            $response = [
                'exito' => true,
                'id' => $idCancha,
                'descripcion' => $descripcion,
                'direccion' => $direccion,
                'capacidad' => $capacidad,
                'tipo_superficie' => $tipo_superficie,
                'disponibilidad' => $disponibilidad,
                'idclub' => $idclub, // <- ID que necesitás para seleccionar
                'club' => $club,      // <- Nombre (opcional)
            ];
            echo json_encode($response);
        } else {
            // Si ocurre un error en la inserción
            echo json_encode(['exito' => false, 'mensaje' => 'Ocurrió un error al registrar la cancha. Error: ' . mysqli_error($conexion)]);
        }
        mysqli_stmt_close($stmt_insert);
    } else {
        echo json_encode(['exito' => false, 'mensaje' => 'Error al preparar la consulta de inserción: ' . mysqli_error($conexion)]);
    }

    mysqli_close($conexion);
?>
