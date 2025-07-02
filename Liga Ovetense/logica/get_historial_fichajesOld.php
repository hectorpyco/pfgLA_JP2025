<?php
  require("../conectar.php");

  $idjugador = intval($_GET['idjugador']);

  $sql = "SELECT f.fecha, f.tipo_fichaje, c.descripcion AS club, f.estado_fichaje 
          FROM fichajes f 
          INNER JOIN clubes c ON f.idclub_destino = c.id 
          WHERE f.idjugador = $idjugador 
          ORDER BY f.fecha DESC";
  $res = mysqli_query($conexion, $sql);
  if (mysqli_num_rows($res) > 0) {
    $totalFichajes = mysqli_num_rows($res);
    echo "<h5 class='mb-3'>Total de fichajes: <strong>{$totalFichajes}</strong></h5>";
    while ($row = mysqli_fetch_assoc($res)) {
       echo "<div class='mb-3'>
          <p><strong>Fecha:</strong> {$row['fecha']}</p>
          <p><strong>Tipo de fichaje:</strong> {$row['tipo_fichaje']}</p>
          <p><strong>Club:</strong> {$row['club']}</p>
          <p><strong>Estado del fichaje:</strong> {$row['estado_fichaje']}</p>
        </div><hr>";
    }
  } else {
    echo "<p>No se encontraron fichajes.</p>";
  }
?>
