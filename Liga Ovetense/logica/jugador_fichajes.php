<?php
  require("../conectar.php");
  $id = intval($_GET['id']);

  $sql = "SELECT f.*, 
                 co.descripcion AS club_origen, 
                 cd.descripcion AS club_destino
          FROM fichajes f
          LEFT JOIN clubes co ON f.idclub_origen = co.id
          LEFT JOIN clubes cd ON f.idclub_destino = cd.id
          WHERE f.idjugador = $id AND f.estado = 'ACTIVO'
          ORDER BY f.id DESC";

  $res = mysqli_query($conexion, $sql);

  if (mysqli_num_rows($res) > 0) {
    echo "<div class='table-responsive'><table class='table table-bordered table-hover'>";
    echo "<thead class='table-secondary'><tr>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Club Origen</th>
            <th>Club Destino</th>
            <th>Tipo</th>
            <th>Duración</th>
            <th>Costo</th>
            <th>Salario</th>
            <th>Cláusula</th>
            <th>Observación</th>
            <th>Estado</th>
          </tr></thead><tbody>";
    while ($r = mysqli_fetch_assoc($res)) {
      echo "<tr>
              <td>{$r['fecha']}</td>
              <td>{$r['descripcion']}</td>
              <td>{$r['club_origen']}</td>
              <td>{$r['club_destino']}</td>
              <td>{$r['tipo_fichaje']}</td>
              <td>{$r['duracion_contrato']}</td>
              <td>{$r['costo_transferencia']}</td>
              <td>{$r['salario_anual']}</td>
              <td>{$r['clausula_rescision']}</td>
              <td>{$r['observacion']}</td>
              <td>{$r['estado_fichaje']}</td>
            </tr>";
    }
    echo "</tbody></table></div>";
  } else {
    echo "<div class='alert alert-info'>Este jugador no tiene fichajes registrados.</div>";
  }
?>