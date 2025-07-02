<?php
require("../conectar.php");

$idclub = $_POST['idclub'];

$query = mysqli_query($conexion, "
  SELECT f.id AS idfichaje, j.id AS idjugador, CONCAT(j.nombre, ' ', j.apellido) AS nombre_completo
  FROM fichajes f
  INNER JOIN jugadores j ON f.idjugador = j.id
  WHERE f.idclub_destino = '$idclub'
    AND f.estado_fichaje = 'EN CURSO'
    AND f.estado = 'ACTIVO'
    AND j.estado = 'ACTIVO'
");

$html = '';

while ($row = mysqli_fetch_assoc($query)) {
  $html .= "<tr>
              <td>{$row['idfichaje']}</td>
              <td>{$row['nombre_completo']}</td>
              <td>
                <button type='button' class='btn btn-sm btn-success seleccionar-jugador'
                  data-idfichaje='{$row['idfichaje']}'
                  data-nombre='{$row['nombre_completo']}'>
                  Seleccionar
                </button>
              </td>
            </tr>";
}

echo $html;
?>