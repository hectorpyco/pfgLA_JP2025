<?php 
  $u=$_GET["usuario"];
  $id=$_GET["id"];

  require("../conectar.php");
    $sql="update canchas set estado='INACTIVO' where id='$id' ";
    $res= mysqli_query($conexion, $sql); 
    if($res){
      header("location:../vistas/canchas.php?respuesta=5&usuario=$u");
    }else {
      header("location:../vistas/canchas.php?respuesta=7&usuario=$u");
    }
  mysqli_close($conexion);
?>