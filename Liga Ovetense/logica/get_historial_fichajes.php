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
    echo "
<style>
  table {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
  }
  thead {
    background-color: #f9f9f9; /* amarillo cálido */
    color: #333;
  }
  thead th {
    padding: 10px 15px;
    
  }
  tbody td {
    padding: 10px 15px;
    border-bottom: 1px solid #ddd;
  }
  tbody tr:hover {
    background-color: #f9f9f9;
  }
  caption {
    caption-side: top;
    font-size: 1.5em;
    margin-bottom: 10px;
    font-weight: bold;
    color: #333;
  }
</style>

<table>
  <thead>
    <tr>
      <th>Fecha</th>
      <th>Tipo Fichaje</th>
      <th>Club</th>
      <th>Estado del fichaje</th>
    </tr>
  </thead>
  <tbody>
";
    while ($row = mysqli_fetch_assoc($res)) {
   
    echo "<tr>
          <td>{$row['fecha']}</td>
          <td>{$row['tipo_fichaje']}</td>
          <td>{$row['club']}</td>
          <td>{$row['estado_fichaje']}</td>
        </tr>";
}

echo "
  </tbody>
</table>
";
  } else {
    echo "<p>No se encontraron fichajes.</p>";
  }
?>
