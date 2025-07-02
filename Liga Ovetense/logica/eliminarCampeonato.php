<?php 
  $u=$_GET["usuario"];
  $id=$_GET["id"];

  require("../conectar.php");
    $sql="update campeonatos set estado='INACTIVO' where id='$id' ";
    $res= mysqli_query($conexion, $sql); 
    if($res){
      header("location:../vistas/campeonatos.php?respuesta=5&usuario=$u");
    }else {
      header("location:../vistas/campeonatos.php?respuesta=7&usuario=$u");
    }
  mysqli_close($conexion);
?>