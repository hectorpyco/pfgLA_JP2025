<?php
    require("../conectar.php");
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nombre = strtoupper($_POST['nombre']);
        $apellido = strtoupper($_POST['apellido']);
        $ci = $_POST['ci'];
        $telefono = $_POST['telefono'];
        $fecha_nac = $_POST['fecha_nac'];
        $nacionalidad = strtoupper($_POST['nacionalidad']);
        $u = $_POST['usuario'];

        // Verificar si ya existe otro jugador con el mismo nombre, apellido y CI (excluyendo el actual)
        $verificar = "SELECT id FROM jugadores 
                      WHERE ci='$ci' AND id != $id";
        $resultado = mysqli_query($conexion, $verificar);

        if (mysqli_num_rows($resultado) > 0) {
            // Jugador duplicado encontrado
            echo "<script>
                    alert('Ya existe un jugador con la misma cédula.');
                    history.back();
                  </script>";
            exit();
        }

        // Manejo de la foto
        $foto = null;
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
            $nombreArchivo = time() . '_' . basename($_FILES['foto']['name']);
            $rutaDestino = '../fotos_jugadores/' . $nombreArchivo;

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaDestino)) {
                $foto = $nombreArchivo;
            }
        }

        // Armar la consulta de actualización
        if ($foto) {
            $sql = "UPDATE jugadores 
                    SET nombre='$nombre', apellido='$apellido', ci='$ci', telefono='$telefono', 
                        fecha_nac='$fecha_nac', nacionalidad='$nacionalidad', foto='$foto'
                    WHERE id=$id";
        } else {
            $sql = "UPDATE jugadores 
                    SET nombre='$nombre', apellido='$apellido', ci='$ci', telefono='$telefono', 
                        fecha_nac='$fecha_nac', nacionalidad='$nacionalidad'
                    WHERE id=$id";
        }

        if (mysqli_query($conexion, $sql)) {
            header("Location: ../vistas/jugadores.php?respuesta=1&usuario=$u");
            exit();
        } else {
            echo "Error al actualizar: " . mysqli_error($conexion);
        }
    } else {
        echo "Acceso no autorizado.";
    }
?>