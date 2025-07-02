<?php
    require("../conectar.php");

    $idclub = $_GET['idclub'] ?? 0;

    $query = "SELECT f.id, j.nombre 
              FROM fichajes f 
              JOIN jugadores j ON f.idjugador = j.id 
              WHERE f.idclub_destino = '$idclub' AND f.estado_fichaje = 'EN CURSO' AND f.estado = 'ACTIVO'";
    $result = mysqli_query($conexion, $query);

    $jugadores = [];
    while ($fila = mysqli_fetch_assoc($result)) {
        $jugadores[] = $fila;
    }

    echo json_encode($jugadores);
?>