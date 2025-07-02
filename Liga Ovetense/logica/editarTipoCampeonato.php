<?php
	require("../conectar.php");

	$id = $_POST['id'];
	$descripcion = strtoupper(trim($_POST['descripcion']));
	$usuario = $_POST['usuario'];

	// Verificar si ya existe otra categoría con la misma descripción
	$sql_verificar = "SELECT id FROM tipo_campeonato WHERE UPPER(descripcion) = '$descripcion' AND id != '$id'";
	$resultado = mysqli_query($conexion, $sql_verificar);

	if (mysqli_num_rows($resultado) > 0) {
	    // Ya existe otro registro con la misma descripción
	    header("Location: ../vistas/tipoCampeonato.php?usuario=$usuario&respuesta=2"); // código 4 = duplicado
	} else {
	    // No hay duplicado, se puede actualizar
	    $sql = "UPDATE tipo_campeonato SET descripcion = '$descripcion' WHERE id = '$id'";
	    mysqli_query($conexion, $sql);
	    header("Location: ../vistas/tipoCampeonato.php?usuario=$usuario&respuesta=3"); // código 3 = éxito
	}
?>
