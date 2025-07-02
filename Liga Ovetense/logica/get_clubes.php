<?php
    require("../conectar.php");
    $query = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
    $result = mysqli_query($conexion, $query);

    $clubes = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $clubes[] = [
            'id' => $row['id'],
            'descripcion' => $row['descripcion']
        ];
    }

    echo json_encode(['clubes' => $clubes]);
?>
