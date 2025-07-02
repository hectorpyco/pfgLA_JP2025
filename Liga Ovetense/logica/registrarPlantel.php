<?php
require("../conectar.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Datos del plantel (convertidos a mayúsculas)
    $descripcion = strtoupper(mysqli_real_escape_string($conexion, $_POST['descripcion']));
    $periodo     = strtoupper(mysqli_real_escape_string($conexion, $_POST['periodo']));
    $temporada   = strtoupper(mysqli_real_escape_string($conexion, $_POST['temporada']));
    $idclub      = mysqli_real_escape_string($conexion, $_POST['idclub']);
    $idcategoria = mysqli_real_escape_string($conexion, $_POST['idcategoria']);
    $usuario     = strtoupper(mysqli_real_escape_string($conexion, $_POST['usuario']));

    // Listas de fichajes y posiciones (posiciones también en mayúsculas)
    $idsFichajes = $_POST['idsfichajes'] ?? [];
    $posiciones  = $_POST['posiciones'] ?? [];

    // Validar que haya detalles
    if (count($idsFichajes) > 0 && count($posiciones) === count($idsFichajes)) {
        mysqli_begin_transaction($conexion);

        try {
            $detalleJugadores = ""; 
            $sqlPlantel = "INSERT INTO planteles (descripcion, idcategoria, idclub, periodo, temporada, estado) 
                           VALUES ('$descripcion', '$idcategoria', '$idclub', '$periodo', '$temporada', 'ACTIVO')";
            mysqli_query($conexion, $sqlPlantel);
            $idPlantel = mysqli_insert_id($conexion);

            // Obtener descripción del club
            $sqlClub = "SELECT descripcion FROM clubes WHERE id = '$idclub'";
            $resClub = mysqli_query($conexion, $sqlClub);
            $descClub = mysqli_fetch_assoc($resClub)['descripcion'] ?? 'Desconocido';

            // Obtener descripción de la categoría
            $sqlCat = "SELECT descripcion FROM categorias WHERE id = '$idcategoria'";
            $resCat = mysqli_query($conexion, $sqlCat);
            $descCat = mysqli_fetch_assoc($resCat)['descripcion'] ?? 'Desconocido';

            // Obtener detalle de jugadores fichados con nombre
            $detalleJugadores = "";
            for ($i = 0; $i < count($idsFichajes); $i++) {
                $idfichaje = mysqli_real_escape_string($conexion, $idsFichajes[$i]);
                $posicion  = strtoupper(mysqli_real_escape_string($conexion, $posiciones[$i]));

                $sqlDetalle = "INSERT INTO det_plantel (idfichaje, idplantel, posicion, estado) 
                               VALUES ('$idfichaje', '$idPlantel', '$posicion', 'ACTIVO')";
                mysqli_query($conexion, $sqlDetalle);
                
                // Buscar nombre del jugador de ese fichaje
                $sqlJugador = "SELECT j.nombre, j.apellido 
                               FROM fichajes f
                               INNER JOIN jugadores j ON f.idjugador = j.id
                               WHERE f.id = '$idfichaje'";
                $resJugador = mysqli_query($conexion, $sqlJugador);
                $datosJugador = mysqli_fetch_assoc($resJugador);

                $nombreCompleto = $datosJugador ? $datosJugador['nombre'] . ' ' . $datosJugador['apellido'] : 'Desconocido';
                $detalleJugadores .= "ID Fichaje: $idfichaje, Jugador: $nombreCompleto, Posición: $posicion\n";
            }

            // Insertar en tabla de auditoría
            $accion = "INSERTAR";
            $ip = $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
            $fecha_hora = date("Y-m-d H:i:s");
            $descripcionAudit = "PLANTEL REGISTRADO:\n" .
                    "Descripción: $descripcion, Periodo: $periodo, Temporada: $temporada\n" .
                    "Club: $idclub - $descClub, Categoría: $idcategoria - $descCat\n" .
                    "DETALLE DE JUGADORES:\n" . $detalleJugadores;

            $sqlAudit = "INSERT INTO auditoria_planteles (idplantel, accion, usuario_sistema, ip_acceso, fecha_hora, descripcion) 
                         VALUES ('$idPlantel', '$accion', '$usuario', '$ip', '$fecha_hora', '$descripcionAudit')";
            mysqli_query($conexion, $sqlAudit);


            mysqli_commit($conexion);
            echo 'ok';
        } catch (Exception $e) {
            mysqli_rollback($conexion);
            echo 'Error al registrar el plantel: ' . $e->getMessage();
        }
    } else {
        echo 'Debe agregar al menos un jugador al plantel.';
    }
}
?>
