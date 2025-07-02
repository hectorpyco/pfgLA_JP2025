<?php
  require("../conectar.php");

  $idjugador = intval($_GET['idjugador']);

  $sql = "SELECT fecha, tipo, diagnostico, tratamiento, medico_tratante FROM historial_medico WHERE idjugador = $idjugador ORDER BY fecha DESC";
  $res = mysqli_query($conexion, $sql);

  if (mysqli_num_rows($res) > 0) {
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
      <th>Tipo</th>
      <th>Diagnóstico</th>
      <th>Tratamiento</th>
      <th>Médico tratante</th>
    </tr>
  </thead>
  <tbody>
";

while ($row = mysqli_fetch_assoc($res)) {
  echo "<tr>
          <td>{$row['fecha']}</td>
          <td>{$row['tipo']}</td>
          <td>{$row['diagnostico']}</td>
          <td>{$row['tratamiento']}</td>
          <td>{$row['medico_tratante']}</td>
        </tr>";
}

echo "
  </tbody>
</table>
";


  } else {
    echo "<p>No se encontraron registros médicos.</p>";
  }
?>
