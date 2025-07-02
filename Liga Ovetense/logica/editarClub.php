<?php
    require("../conectar.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['club_id'];
        $descripcion = strtoupper(trim($_POST['club_descripcion']));
        $direccion = strtoupper(trim($_POST['club_direccion']));
        $telefono = trim($_POST['club_telefono']);
        $email = trim($_POST['club_email']);
        $presidente = $_POST['club_presidente'];
        $liga = $_POST['club_liga'];
        $u = $_POST['usuario'];

        if (!empty($id) && !empty($descripcion) && !empty($direccion) && !empty($telefono) && !empty($email) && !empty($presidente) && !empty($liga)) {

            // Verificar si ya existe otro club con la misma descripción
            $sqlVerificar = "SELECT * FROM clubes WHERE descripcion = ? AND id != ? AND estado = 'ACTIVO'";
            if ($stmtVerificar = mysqli_prepare($conexion, $sqlVerificar)) {
                mysqli_stmt_bind_param($stmtVerificar, "si", $descripcion, $id);
                mysqli_stmt_execute($stmtVerificar);
                mysqli_stmt_store_result($stmtVerificar);

                if (mysqli_stmt_num_rows($stmtVerificar) > 0) {
                    // Ya existe otro club con esa descripción
                    header("Location: ../vistas/clubes.php?respuesta=4&usuario=$u"); // podés usar ?respuesta=4 para error de duplicado
                    exit();
                }

                mysqli_stmt_close($stmtVerificar);
            }

            // Si no existe duplicado, procedemos a actualizar
            $sql = "UPDATE clubes 
                    SET descripcion = ?, direccion = ?, telefono = ?, email = ?, idpresidente = ?, idliga = ? 
                    WHERE id = ?";

            if ($stmt = mysqli_prepare($conexion, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssssiii", $descripcion, $direccion, $telefono, $email, $presidente, $liga, $id);
                if (mysqli_stmt_execute($stmt)) {
                    header("Location: ../vistas/clubes.php?respuesta=3&usuario=$u"); // éxito
                    exit();
                } else {
                    echo "Error al actualizar: " . mysqli_stmt_error($stmt);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Error al preparar la consulta: " . mysqli_error($conexion);
            }
        } else {
            echo "Todos los campos son obligatorios.";
        }

        mysqli_close($conexion);
    } else {
        echo "Acceso no autorizado.";
    }

?>
