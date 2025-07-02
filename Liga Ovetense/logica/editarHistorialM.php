<?php
  require("../conectar.php");

  $id = $_POST['historial_id'];
  $fecha = $_POST['fecha'];
  $tipo = $_POST['tipo'];
  $diagnostico = $_POST['diagnostico'];
  $tratamiento = $_POST['tratamiento'];
  $fecha_recuperacion = $_POST['fecha_recuperacion'];
  $medico = $_POST['medico_tratante'];
  $observaciones = $_POST['observaciones'];

  $consulta = "UPDATE historial_medico SET 
    fecha='$fecha',
    tipo='$tipo',
    diagnostico='$diagnostico',
    tratamiento='$tratamiento',
    fecha_recuperacion='$fecha_recuperacion',
    medico_tratante='$medico',
    observaciones='$observaciones'
  WHERE id='$id'";

  if (mysqli_query($conexion, $consulta)) {
    echo "ok";
  } else {
    echo "Error: " . mysqli_error($conexion);
  }
?>
