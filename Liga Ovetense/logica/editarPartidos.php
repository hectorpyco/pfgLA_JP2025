<?php
require("../conectar.php");

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $partido_id = $_POST['partido_id'];
    $descripcion = $_POST['partido_descripcion'];
    $fecha = $_POST['partido_fecha'];
    $hora = $_POST['partido_hora'];
    $idcampeonato = $_POST['idcampeonato'];
    $idlocal = $_POST['idlocal'];
    $idvisitante = $_POST['idvisitante'];
    $cancha_id = $_POST['partido_cancha'];
    $finalizado = $_POST['partido_finalizado']; // aseguramos que este campo venga bien del formulario
    $u = $_POST['usuario'];

    // Validar que todos los campos estén completos
    if (empty($partido_id) || empty($descripcion) || empty($fecha) || empty($idcampeonato) || empty($idlocal) || empty($idvisitante) || empty($cancha_id) || empty($finalizado)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Validación para evitar duplicados (sin comparar consigo mismo)
    $sql_check_duplicate = "SELECT COUNT(*) FROM partidos 
                            WHERE fecha = ? 
                              AND idcampeonato = ? 
                              AND idlocal = ? 
                              AND idvisitante = ? 
                              AND idcancha = ? 
                              AND id != ?";

    if ($stmt = mysqli_prepare($conexion, $sql_check_duplicate)) {
        mysqli_stmt_bind_param($stmt, "siiiii", $fecha, $idcampeonato, $idlocal, $idvisitante, $cancha_id, $partido_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $count);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($count > 0) {
            header("location:../vistas/partidos.php?respuesta=4&usuario=$u");
            exit;
        }
    } else {
        echo "Error en la preparación de la verificación: " . mysqli_error($conexion);
        exit;
    }

    // Actualizar el partido
    $sql_update = "UPDATE partidos SET 
                    descripcion = ?, 
                    fecha = ?, 
                    hora = ?, 
                    idcampeonato = ?, 
                    idlocal = ?, 
                    idvisitante = ?, 
                    idcancha = ?, 
                    finalizado = ? 
                  WHERE id = ?";

    if ($stmt = mysqli_prepare($conexion, $sql_update)) {
        // Corregimos el tipo de bind_param para que `finalizado` sea tratado como string
        mysqli_stmt_bind_param($stmt, "sssiiiisi", $descripcion, $fecha, $hora, $idcampeonato, $idlocal, $idvisitante, $cancha_id, $finalizado, $partido_id);

        if (mysqli_stmt_execute($stmt)) {
            header("location:../vistas/partidos.php?respuesta=3&usuario=$u");
        } else {
            echo "Error al actualizar los datos: " . mysqli_error($conexion);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la actualización: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
?>
