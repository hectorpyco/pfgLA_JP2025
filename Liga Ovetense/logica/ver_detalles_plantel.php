<?php
require("../conectar.php");
$idPlantel = intval($_GET['id']);

$sql = "SELECT dp.*, j.nombre, j.apellido
        FROM det_plantel dp
        LEFT JOIN fichajes f ON dp.idfichaje = f.id
        LEFT JOIN jugadores j ON f.idjugador = j.id
        WHERE dp.idplantel = $idPlantel";

$res = mysqli_query($conexion, $sql);

if (mysqli_num_rows($res) > 0) {
  echo "<div class='card mt-4'>
          <div class='card-header'>Detalles del Plantel (ID: $idPlantel)</div>
          <div class='card-body'>
            <div class='table-responsive'>
              <table class='table table-bordered text-center'>
                <thead class='table-secondary'>
                  <tr>
                    <th>Jugador</th>
                    <th>Posición</th>
                  </tr>
                </thead>
                <tbody>";
  while ($row = mysqli_fetch_assoc($res)) {
    echo "<tr>
            <td>{$row['nombre']} {$row['apellido']}</td>
            <td>{$row['posicion']}</td>
          </tr>";
  }
  echo "    </tbody>
              </table>
            </div>
          </div>
        </div>";
} else {
  echo "<div class='alert alert-info mt-4'>Este plantel no tiene detalles registrados.</div>";
}
?>
