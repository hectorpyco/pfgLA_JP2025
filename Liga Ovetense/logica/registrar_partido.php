<?php
    // Conexión a la base de datos
    require("../conectar.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recoger los datos del formulario
        $descripcion = $_POST['partido_descripcion'];
        $fecha = $_POST['partido_fecha'];
        $hora = $_POST['partido_hora'];
        $idcampeonato = $_POST['partido_idcampeonato'];
        $idcancha = $_POST['partido_idcancha'];
        $idlocal = $_POST['partido_idlocal'];
        $idvisitante = $_POST['partido_idvisitante'];
        $finalizado = $_POST['partido_finalizado'];
        $estado = 'ACTIVO'; 
        $u=$_POST["usuario"];

        // Validar si ya existe un partido con los mismos equipos, campeonato y fecha
        $sql_check = "SELECT * FROM partidos 
                      WHERE (idlocal = '$idlocal' AND idvisitante = '$idvisitante' OR idlocal = '$idvisitante' AND idvisitante = '$idlocal') 
                      AND fecha = '$fecha' AND idcampeonato = '$idcampeonato' AND estado = 'ACTIVO'";

        $res_check = mysqli_query($conexion, $sql_check);
        if (mysqli_num_rows($res_check) > 0) {
            header("location:../vistas/partidos.php?respuesta=2&usuario=$u");
            //echo "Ya existe un partido registrado con estos equipos, campeonato y fecha.";
            exit(); // Termina la ejecución si ya existe un partido duplicado
        }

        // Preparar la consulta para insertar los datos en la base de datos
        $sql = "INSERT INTO partidos (descripcion, fecha, hora, idcampeonato, idcancha, idlocal, idvisitante, finalizado, estado) 
                VALUES ('$descripcion', '$fecha', '$hora', '$idcampeonato', '$idcancha', '$idlocal', '$idvisitante', '$finalizado', '$estado')";

        // Ejecutar la consulta
        if (mysqli_query($conexion, $sql)) {
            //echo "El partido ha sido registrado exitosamente.";
            // Redirigir a la página de partidos o mostrar el mensaje de éxito
            header("location:../vistas/partidos.php?respuesta=1&usuario=$u");
            exit();
        } else {
            echo "Error al registrar el partido: " . mysqli_error($conexion);
        }
    }
?>
