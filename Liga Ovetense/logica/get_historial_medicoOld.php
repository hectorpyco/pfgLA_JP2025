<?php
  require("../conectar.php");

  $idjugador = intval($_GET['idjugador']);

  $sql = "SELECT fecha, tipo, diagnostico, tratamiento, medico_tratante FROM historial_medico WHERE idjugador = $idjugador ORDER BY fecha DESC";
  $res = mysqli_query($conexion, $sql);

  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      echo "<div class='mb-3'>
        <p><strong>Fecha:</strong> {$row['fecha']}</p>
        <p><strong>Tipo:</strong> {$row['tipo']}</p>
        <p><strong>Diagnóstico:</strong> {$row['diagnostico']}</p>
        <p><strong>Tratamiento:</strong> {$row['tratamiento']}</p>
        <p><strong>Médico tratante:</strong> {$row['medico_tratante']}</p>
      </div><hr>";
    }
  } else {
    echo "<p>No se encontraron registros médicos.</p>";
  }
?>
