<?php
    require("../conectar.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Capturar datos del formulario
        $descripcion = mysqli_real_escape_string($conexion, $_POST['resultado_descripcion']);
        $idpartido = $_POST['resultado_idpartido'];
        $u = $_POST['usuario'];

        // Insertar resultado en la base de datos
        $sql_resultado = "INSERT INTO resultados (idpartido, descripcion, estado) 
                          VALUES ('$idpartido', '$descripcion', 'ACTIVO')";
        
        if (mysqli_query($conexion, $sql_resultado)) {
            // Actualizar el estado del partido a 'FINALIZADO'
            $sql_actualizar_partido = "UPDATE partidos SET finalizado = 'FINALIZADO' WHERE id = '$idpartido'";

            if (mysqli_query($conexion, $sql_actualizar_partido)) {
                header("location:../vistas/resultados.php?respuesta=1&usuario=$u");
                exit;
            } else {
                // Si falla la actualización del partido
                header("location:../vistas/resultados.php?respuesta=3&usuario=$u");
                exit;
            }
        } else {
            // Si falla la inserción del resultado
            header("location:../vistas/resultados.php?respuesta=2&usuario=$u");
            exit;
        }

        mysqli_close($conexion);
    }
?>
