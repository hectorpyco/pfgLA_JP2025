<?php
require("../conectar.php");
$idplantel = $_GET['idplantel'];

// Obtener el ID del club al que pertenece el plantel
$plantelInfo = mysqli_query($conexion, "SELECT idclub FROM planteles WHERE id = $idplantel");
$club = mysqli_fetch_assoc($plantelInfo)['idclub'];

// Obtener todos los jugadores del club
$jugadoresQuery = mysqli_query($conexion, "SELECT j.id, j.nombre, j.apellido 
                                            FROM fichajes f 
                                            JOIN jugadores j ON f.idjugador = j.id 
                                            WHERE f.idclub_destino = $club");

$jugadoresClub = [];
while ($j = mysqli_fetch_assoc($jugadoresQuery)) {
  $jugadoresClub[] = $j;
}

// Detalle del plantel
$sql = "SELECT dp.*, j.id AS idjugador, j.nombre, j.apellido, f.tipo_fichaje
        FROM det_plantel dp
        LEFT JOIN fichajes f ON dp.idfichaje = f.id
        LEFT JOIN jugadores j ON f.idjugador = j.id
        WHERE dp.idplantel = $idplantel";
$res = mysqli_query($conexion, $sql);

if (mysqli_num_rows($res) > 0) {
  echo "<form id='formEditarJugadores'>";
    echo "<input type='hidden' name='idPlantel' value='$idplantel'>";
    echo "<div class='table-responsive'>";
      echo "<table class='table table-striped table-bordered align-middle'>";
        echo "<thead class='table-primary text-center'>
          <tr>
            <th>JUGADOR</th>
            <th>POSICIÓN</th>
            <th>ACCIONES</th>
          </tr>
        </thead>
        <tbody>";
          while ($row = mysqli_fetch_assoc($res)) {
            $idDP = $row['id'];
            $idJugadorActual = $row['idjugador'];
            echo "<tr style='cursor: pointer; text-align: center;'>
              <td>
                <select name='jugadores[$idDP][idjugador]' class='form-select' disabled>";
                  foreach ($jugadoresClub as $jugador) {
                    $selected = ($jugador['id'] == $idJugadorActual) ? "selected" : "";
                    echo "<option value='{$jugador['id']}' $selected>{$jugador['nombre']} {$jugador['apellido']}</option>";
                  }
                echo "</select>
                <input type='hidden' name='jugadores[$idDP][iddet]' value='$idDP'>
              </td>
              <td>
                <input type='text' class='form-control text-center' name='jugadores[$idDP][posicion]' value='{$row['posicion']}'>
              </td>
             <td>
                <button type='button' class='btn btn-success btn-sm guardar-jugador' data-id='{$row['id']}' title='Guardar'>
                  <i class='bi bi-save'></i>
                </button>
                <button type='button' class='btn btn-danger btn-sm eliminar-jugador' data-id='{$row['id']}' title='Eliminar'>
                  <i class='bi bi-trash'></i>
                </button>
              </td>
            </tr>";
          }
        echo "</tbody>
      </table>";
    echo "</div>";
  echo "</form>";
} else {
  echo "<div class='alert alert-warning'>Este plantel no tiene jugadores cargados aún.</div>";
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
