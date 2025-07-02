<?php
    require("../conectar.php");
    $usuario = $_POST['usuario'];
    $id = $_POST["cancha_id"];
    $descripcion = strtoupper($_POST["cancha_descripcion"]);
    $direccion = strtoupper($_POST["cancha_direccion"]);
    $capacidad = $_POST["cancha_capacidad"];
    $superficie = $_POST["cancha_superficie"];
    $disponibilidad = $_POST["cancha_disponibilidad"];
    $idclub = $_POST["cancha_idclub"];

    // Verificar si la descripción de la cancha ya existe en la base de datos (excluyendo la cancha actual)
    $sql_verificar = "SELECT id FROM canchas WHERE descripcion = '$descripcion' AND id != '$id'";
    $res_verificar = mysqli_query($conexion, $sql_verificar);

    if (mysqli_num_rows($res_verificar) > 0) {
        // Si la cancha ya existe, enviamos un error
        header("Location: ../vistas/canchas.php?usuario=$usuario&respuesta=2");
        exit; // Detenemos el proceso
    }

    // Si no existe, podemos proceder a actualizar la cancha
    $sql = "UPDATE canchas SET 
            descripcion = '$descripcion',
            direccion = '$direccion',
            capacidad = '$capacidad',
            tipo_superficie = '$superficie',
            disponibilidad = '$disponibilidad',
            idclub = '$idclub'
            WHERE id = '$id'";

    if (mysqli_query($conexion, $sql)) {
       header("Location: ../vistas/canchas.php?usuario=$usuario&respuesta=3");
    } else {
        header("Location: ../vistas/canchas.php?usuario=$usuario&respuesta=4"); // Si ocurre un error en la actualización
    }
?>
