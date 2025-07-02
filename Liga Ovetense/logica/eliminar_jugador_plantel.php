<?php
    require("../conectar.php");

    if (isset($_POST['idDet'])) {
        $idDet = $_POST['idDet'];

        // Eliminar jugador del plantel
        $query = "DELETE FROM det_plantel WHERE id = $idDet";
        
        if (mysqli_query($conexion, $query)) {
            echo "ELIMINADO"; // Si se elimina correctamente
        } else {
            echo "ERROR"; // Si ocurre un error
        }
    } else {
        echo "ERROR"; // Si no se recibe el idDet
    }
?>
