<?php
	require("../conectar.php");

	$id = $_POST['id'];
	$descripcion = strtoupper(trim($_POST['descripcion']));
	$usuario = $_POST['usuario'];

	// Verificar si la descripción ya existe en otra categoría activa
	$sql_verificar = "SELECT id FROM categorias WHERE descripcion = ? AND id != ? AND estado = 'ACTIVO'";
	$stmt_verificar = mysqli_prepare($conexion, $sql_verificar);

	if ($stmt_verificar) {
	    mysqli_stmt_bind_param($stmt_verificar, "si", $descripcion, $id);
	    mysqli_stmt_execute($stmt_verificar);
	    mysqli_stmt_store_result($stmt_verificar);

	    if (mysqli_stmt_num_rows($stmt_verificar) > 0) {
	        // Ya existe una categoría activa con la misma descripción
	        header("Location: ../vistas/categorias.php?usuario=$usuario&respuesta=2");
	        exit();
	    } else {
	        // Preparar la consulta de actualización
	        $sql_update = "UPDATE categorias SET descripcion = ? WHERE id = ?";
	        $stmt_update = mysqli_prepare($conexion, $sql_update);

	        if ($stmt_update) {
	            // Vincular parámetros
	            mysqli_stmt_bind_param($stmt_update, "si", $descripcion, $id);

	            // Ejecutar la consulta de actualización
	            if (mysqli_stmt_execute($stmt_update)) {
	                // Redirigir si se actualizó correctamente
	                header("Location: ../vistas/categorias.php?usuario=$usuario&respuesta=1");
	            } else {
	                // Si ocurre un error en la actualización
	                header("Location: ../vistas/categorias.php?usuario=$usuario&respuesta=4");
	            }

	            mysqli_stmt_close($stmt_update);
	        } else {
	            // Si ocurre un error al preparar la consulta
	            header("Location: ../vistas/categorias.php?usuario=$usuario&respuesta=4");
	        }
	    }

	    mysqli_stmt_close($stmt_verificar);
	} else {
	    // Si ocurre un error al preparar la consulta de verificación
	    header("Location: ../vistas/categorias.php?usuario=$usuario&respuesta=4");
	}

	mysqli_close($conexion);
?>
