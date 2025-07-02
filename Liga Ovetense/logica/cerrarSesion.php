<?php 
	session_start();
	//eliminar todas las variables creadas
	unset($_SESSION["usuario"]);
	session_destroy();
	header("location:../index.php?error=0");
	exit();
 ?>