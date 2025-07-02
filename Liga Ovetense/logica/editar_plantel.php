<?php
  require("../conectar.php");
  $id = $_POST['idPlantel'];
  $descripcion = strtoupper (trim($_POST['descripcion']));
  $periodo = strtoupper (trim($_POST['periodo']));
  $temporada = strtoupper (trim($_POST['temporada']));
  $idcategoria = $_POST['idcategoria'];
  $idclub = $_POST['idclub'];

  // Verificar si ya existe un plantel con los mismos datos (excluyendo el actual)
  $verificar = mysqli_query($conexion, "
    SELECT id FROM planteles 
    WHERE 
      descripcion = '$descripcion' AND 
      periodo = '$periodo' AND 
      temporada = '$temporada' AND 
      idcategoria = '$idcategoria' AND 
      idclub = '$idclub' AND 
      id != '$id'
  ");

  if (mysqli_num_rows($verificar) > 0) {
    echo 'Ya existe el plantel';
    exit;
  }

  // Realizar el update si no hay duplicado
  $update = mysqli_query($conexion, "
    UPDATE planteles SET 
      descripcion = '$descripcion',
      periodo = '$periodo',
      temporada = '$temporada'
    WHERE id = '$id'
  ");

  if ($update) {
    echo 'Modificación Exitosa';
  } else {
    echo 'error: ' . mysqli_error($conexion);
  }
?>
