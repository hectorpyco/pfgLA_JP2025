<?php 
  $u = $_GET["usuario"];
  $id = $_GET["id"];

  require("../conectar.php");

  // Obtener los datos del plantel antes de inactivarlo
  $sqlDatos = "SELECT * FROM planteles WHERE id='$id'";
  $resDatos = mysqli_query($conexion, $sqlDatos);
  $datos = mysqli_fetch_assoc($resDatos);

  if (!$datos) {
    header("location:../vistas/planteles.php?respuesta=7&usuario=$u");
    exit();
  }

  $descripcion = $datos['descripcion'];
  $idcategoria = $datos['idcategoria'];
  $idclub = $datos['idclub'];
  $periodo = $datos['periodo'];
  $temporada = $datos['temporada'];

  // Obtener la descripción del club
  $sqlClub = "SELECT descripcion FROM clubes WHERE id = '$idclub'";
  $resClub = mysqli_query($conexion, $sqlClub);
  $descClub = mysqli_fetch_assoc($resClub)['descripcion'] ?? 'Desconocido';

  // Obtener la descripción de la categoría
  $sqlCat = "SELECT descripcion FROM categorias WHERE id = '$idcategoria'";
  $resCat = mysqli_query($conexion, $sqlCat);
  $descCat = mysqli_fetch_assoc($resCat)['descripcion'] ?? 'Desconocido';

  // Obtener los datos del det_plantel antes de inactivarlo
  $sqlDatosD = "SELECT * FROM det_plantel WHERE idplantel='$id'";
  $resDatosD = mysqli_query($conexion, $sqlDatosD);

  // Preparamos los datos generales del plantel con nombres y descripciones
  $descripcionAuditoria = "PLANTEL Y DETALLE DADOS DE BAJA:\n" .
               "Descripción del Plantel: {$descripcion}\n" .
               "Categoría: {$idcategoria} - {$descCat}, Club: {$idclub} - {$descClub}\n" .
               "Periodo: {$periodo}, Temporada: {$temporada}\n" .
               "------------------------------------------\n" .
               "Detalles del Plantel:\n";

  if (mysqli_num_rows($resDatosD) > 0) {
    while ($datosD = mysqli_fetch_assoc($resDatosD)) {
      $idfichaje = $datosD['idfichaje'];
      $posicion = $datosD['posicion'];

      // Obtener nombre y apellido del jugador a partir del fichaje
      $sqlJugador = "SELECT j.nombre, j.apellido 
                     FROM fichajes f
                     INNER JOIN jugadores j ON f.idjugador = j.id
                     WHERE f.id = '$idfichaje'";
      $resJugador = mysqli_query($conexion, $sqlJugador);
      $datosJugador = mysqli_fetch_assoc($resJugador);

      $nombreCompleto = $datosJugador ? $datosJugador['nombre'] . ' ' . $datosJugador['apellido'] : 'Desconocido';

      $descripcionAuditoria .= "ID Fichaje: $idfichaje, Jugador: $nombreCompleto, Posición: $posicion\n";
    }
  } else {
    $descripcionAuditoria .= "Sin detalles registrados en det_plantel.";
  }

  // Desactivamos el plantel
  $sql1 = "UPDATE planteles SET estado='INACTIVO' WHERE id='$id'";
  $res1 = mysqli_query($conexion, $sql1);

  if ($res1) {
    // Desactivamos los detalles del plantel
    $sql2 = "UPDATE det_plantel SET estado='INACTIVO' WHERE idplantel='$id'";
    $res2 = mysqli_query($conexion, $sql2);

    if ($res2) {
      // Registrar auditoría
      $accion = "BAJA";
      $ip = $_SERVER['REMOTE_ADDR'] === '::1' ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
      $fecha_hora = date("Y-m-d H:i:s");
      
      $sqlAudit = "INSERT INTO auditoria_planteles (idplantel, accion, usuario_sistema, ip_acceso, fecha_hora, descripcion)
                   VALUES ('$id', '$accion', '$u', '$ip', '$fecha_hora', '$descripcionAuditoria')";
      mysqli_query($conexion, $sqlAudit);

      header("location:../vistas/planteles.php?respuesta=5&usuario=$u");
    } else {
      header("location:../vistas/planteles.php?respuesta=7&usuario=$u");
    }
  } else {
    header("location:../vistas/planteles.php?respuesta=7&usuario=$u");
  }

  mysqli_close($conexion);
?>
