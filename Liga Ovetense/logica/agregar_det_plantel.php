<?php
  require("../conectar.php");

  $idplantel = $_POST['idplantel'];
  $idfichaje = $_POST['idfichaje'];
  $posicion = strtoupper($_POST['posicion']);

  if ($idplantel && $idfichaje && $posicion) {
    // Verificar si el jugador ya está en ese plantel
    $verificar = mysqli_query($conexion, "SELECT * FROM det_plantel WHERE idplantel = '$idplantel' AND idfichaje = '$idfichaje' AND estado = 'ACTIVO'");
    
    if (mysqli_num_rows($verificar) > 0) {
      echo "YA_EXISTE"; // ya está en el plantel
    } else {
      $query = "INSERT INTO det_plantel (idplantel, idfichaje, posicion, estado) VALUES ('$idplantel', '$idfichaje', '$posicion', 'ACTIVO')";
      if (mysqli_query($conexion, $query)) {
        echo "AGREGADO";
      } else {
        echo "ERROR";
      }
    }
  } else {
    echo "FALTAN_DATOS";
  }
?>