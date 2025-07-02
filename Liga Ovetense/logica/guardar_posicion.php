<?php
require("../conectar.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idDetPlantel = $_POST['iddetplantel'];
    $posicion = strtoupper ($_POST['posicion']);

    // Escapar los valores para evitar inyecciones SQL
    $idDetPlantel = mysqli_real_escape_string($conexion, $idDetPlantel);
    $posicion = mysqli_real_escape_string($conexion, $posicion);

    // Actualizar la posición del jugador en la tabla det_plantel
    $sql = "UPDATE det_plantel SET posicion = '$posicion' WHERE id = '$idDetPlantel' ";
    if (mysqli_query($conexion, $sql)) {
        echo 'Posición guardada correctamente';
    } else {
        echo 'Error al guardar la posición: ' . mysqli_error($conexion);
    }
}
?>
