<?php
    require("../conectar.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Conversión a mayúsculas y obtención de datos
        $idjugador = $_POST['idjugador'];
        $fecha = $_POST['fecha'];

        $partidos = $_POST['partidos_jugados'];
        $goles = $_POST['goles'];
        $asistencias = $_POST['asistencias'];
        $amarillas = $_POST['tarjetas_amarillas'];
        $rojas = $_POST['tarjetas_rojas'];
        $minutos = $_POST['minutos_jugados'];
        $pases = $_POST['pases_completados'];
        $faltas = $_POST['faltas_cometidas'];
        $atajadas = $_POST['atajadas'];
        $u = $_POST["usuario"];
        $video_url = !empty($_POST['video_url']) ? $_POST['video_url'] : null;

        // Validar duplicados: mismo jugador y misma fecha
        $verificar = "SELECT * FROM historiales_futbolistico WHERE idjugador = '$idjugador' 
        AND EXTRACT(YEAR FROM fecha) = EXTRACT(YEAR FROM DATE '$fecha')";
        //AND fecha = '$fecha'";
        $resultado = mysqli_query($conexion, $verificar);

        if (mysqli_num_rows($resultado) > 0) {
            // Ya existe un historial con ese jugador y esa fecha
            header("location:../vistas/hFutbolistico.php?respuesta=2&usuario=$u");
            exit();
        }


        // Inserción segura
        $sql = "INSERT INTO historiales_futbolistico (idjugador, fecha, partidos_jugados, goles, asistencias, tarjetas_amarillas, tarjetas_rojas, minutos_jugados, pases_completados, faltas_cometidas, atajadas, video, estado) VALUES ('$idjugador', '$fecha', '$partidos', '$goles', '$asistencias', '$amarillas', '$rojas', '$minutos', '$pases', '$faltas', '$atajadas', " . ($video_url ? "'$video_url'" : "NULL") . ", 'ACTIVO')";
        if (mysqli_query($conexion, $sql)) {
            
            $idhistorial = mysqli_insert_id($conexion); // obtener ID insertado
            $accion = "INSERTAR";
            $ip = $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
            $fecha_hora = date("Y-m-d H:i:s");
            
            // Consultar nombre y apellido del jugador para la auditoría
            $sqlJugador = "SELECT nombre, apellido FROM jugadores WHERE id = '$idjugador'";
            $resJugador = mysqli_query($conexion, $sqlJugador);
            $jugador = mysqli_fetch_assoc($resJugador);
            $nombreCompleto = $jugador ? $jugador['nombre'] . ' ' . $jugador['apellido'] : 'Desconocido';

            $descripcion = "Se insertó un nuevo historial futbolístico para el jugador ID $idjugador ($nombreCompleto) con fecha $fecha.\n" .
               "Partidos Jugados: $partidos, Goles: $goles, Asistencias: $asistencias, " .
               "Tarjetas Amarillas: $amarillas, Tarjetas Rojas: $rojas, Minutos Jugados: $minutos, " .
               "Pases Completados: $pases, Faltas Cometidas: $faltas, Atajadas: $atajadas.";

            // Insertar en tabla de auditoría
            $auditoria_sql = "INSERT INTO auditoria_historiales (
                            idhistorial, accion, usuario_sistema, ip_acceso, fecha_hora, descripcion
                          ) VALUES (
                            '$idhistorial', '$accion', '$u', '$ip', '$fecha_hora', '$descripcion'
                          )";
            mysqli_query($conexion, $auditoria_sql); // Ejecutar sin detener si falla

            header("location:../vistas/hFutbolistico.php?respuesta=1&usuario=$u");
        } else {
            echo "Error al insertar: " . mysqli_error($conexion);
        }
    }
?>