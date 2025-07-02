<?php
  require("../conectar.php");

  $descripcion = strtoupper(trim($_POST['club_descripcion']));
  $direccion = strtoupper(trim($_POST['club_direccion']));
  $telefono = trim($_POST['club_telefono']);
  $email = trim($_POST['club_email']);
  $idpresidente = $_POST['club_presidente'];
  $idliga = $_POST['club_liga'];

  // Verificar existencia
  $sqlVerificar = "SELECT * FROM clubes WHERE descripcion = '$descripcion' AND estado = 'ACTIVO'";
  $res = mysqli_query($conexion, $sqlVerificar);

  if (mysqli_num_rows($res) > 0) {
      echo json_encode(["exito" => false, "mensaje" => "El club ya existe"]);
      exit;
  }

  // Insertar
  $sqlInsertar = "INSERT INTO clubes (descripcion, direccion, telefono, email, idpresidente, idliga, estado)
                  VALUES ('$descripcion', '$direccion', '$telefono', '$email', $idpresidente, $idliga, 'ACTIVO')";

  if (mysqli_query($conexion, $sqlInsertar)) {
      $id = mysqli_insert_id($conexion);

      // Obtener nombre completo del presidente y liga
      $sqlDatos = "SELECT 
                      CONCAT(u.nombre, ' ', u.apellido) AS presidente, 
                      l.descripcion AS liga 
                   FROM usuarios u, liga l 
                   WHERE u.id = $idpresidente AND l.id = $idliga";
      $resDatos = mysqli_query($conexion, $sqlDatos);
      $datos = mysqli_fetch_assoc($resDatos);

      echo json_encode([
          "exito" => true,
          "id" => $id,
          "descripcion" => $descripcion,
          "direccion" => $direccion,
          "telefono" => $telefono,
          "email" => $email,
          "presidente" => $datos['presidente'],
          "liga" => $datos['liga'],
          "idpresidente" => $idpresidente,
          "idliga" => $idliga
      ]);
  } else {
      echo json_encode(["exito" => false, "mensaje" => "Error al insertar"]);
  }
?>

