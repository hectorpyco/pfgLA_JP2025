<?php 
    // Obtener datos del formulario
    $usuarioIngresado = $_POST["usuario"];
    $contrasenaIngresada = md5($_POST["pass"]);
    $fecha_hora = date("Y-m-d H:i:s");

    require("../conectar.php");

    // Obtener IP real
    $ip = $_SERVER['REMOTE_ADDR'];
    if ($ip === '::1') {
        $ip = '127.0.0.1';
    }

    // Verificar usuario
    $sql = "SELECT * FROM usuarios WHERE email = ? AND pass = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $usuarioIngresado, $contrasenaIngresada);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Usuario válido
        $usuario = mysqli_fetch_assoc($result);
        $id_usuario = $usuario['id'];
        $nombre_usuario = $usuario['email'];
        $estado = 'EXITO';
        $mensaje = 'INICIO DE SESION EXITOSO';

        // Auditoría
        $auditoria_sql = "INSERT INTO auditoria_accesos (idusuario, usuario, ip_acceso, fecha_hora, exito, mensaje)
                          VALUES (?, ?, ?, ?, ?, ?)";
        $auditoria_stmt = mysqli_prepare($conexion, $auditoria_sql);
        mysqli_stmt_bind_param($auditoria_stmt, "isssss", $id_usuario, $nombre_usuario, $ip, $fecha_hora, $estado, $mensaje);
        mysqli_stmt_execute($auditoria_stmt); // <-- IMPORTANTE

        header("Location:../vistas/panelPrincipal.php?usuario=$usuarioIngresado");
        exit;
    } else {
        // Fallo
        $estado = 'FALLIDO';
        $mensaje = "CREDENCIALES INVALIDAS";

        $auditoria_sql = "INSERT INTO auditoria_accesos (idusuario, usuario, ip_acceso, fecha_hora, exito, mensaje)
                          VALUES (NULL, ?, ?, ?, ?, ?)";
        $auditoria_stmt = mysqli_prepare($conexion, $auditoria_sql);
        mysqli_stmt_bind_param($auditoria_stmt, "sssss", $usuarioIngresado, $ip, $fecha_hora, $estado, $mensaje);
        mysqli_stmt_execute($auditoria_stmt); // <-- IMPORTANTE

        header("Location: ../index.php?error=1");
        exit;
    }

    mysqli_free_result($result);
    mysqli_close($conexion);
?>
