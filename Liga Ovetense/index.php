<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta content="width=device-width, initial-scale=1.0" name="viewport">
			<title>Inicio de Sesión</title>
			<meta content="" name="description">
			<meta content="" name="keywords">
			<link href="perfil.png" rel="icon">
			<link href="perfil.png" rel="apple-touch-icon">
			<!-- Google Fonts -->
			<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
			<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet">
			<!-- Custom styles for this template-->
			<link href="css/sb-admin-2.min.css" rel="stylesheet">
		</head>
		<body style="background: #E1E1E1">
			<?php 
			$e=0;
			if (isset($_GET["error"])) {
				$e=$_GET["error"];
			}
			?>
			<div class="container">
				<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
								<div class="card mb-3">
									<div class="card-body">
										<div class="pt-4 pb-2">
											<h5 class="card-title text-center pb-0 fs-4">Bienvenido al Sistema !</h5>
											<div class="h3 text-center"><img class="mb-4" src="perfil.png" alt="" width="180" height="180"></div>
										</div>
										<form action="logica/validarSesion.php" method="POST" class="d-flex flex-column">
											<?php
											if ($e==1) {
												echo "<div class='alert alert-danger' role='alert'>Credenciales Inválidas !</div>";
											}
											?>
											<div class="d-flex align-items-center input-field my-1 mb-4">
												<i class="fas fa-solid fa-user" style="font-size: 1.5rem; color: #D50000;"></i>
												<input type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario" required autofocus class="form-control" style="width:250px; margin-left: 10px;">
											</div>
											<div class="d-flex align-items-center input-field mb-4">
												<i class="fas fa-solid fa-lock mr-2" style="font-size: 1.5rem; color: #D50000;"></i>
												<input type="password" placeholder="Ingrese su contraseña" required class="form-control" id="pass" name="pass" style="width: 250px">
												<span class="fas fa-solid fa-eye show-password" style="margin-left: 5px"></span>
											</div>
											<div class="my-3 mx-auto"><input type="submit" value="ACCEDER" class="btn btn-danger"></div> 
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<script type="text/javascript">
			window.addEventListener("load", function() {
				// icono para mostrar contraseña
				showPassword = document.querySelector('.show-password');
				showPassword.addEventListener('click', () => {
					
					// elementos input de tipo clave
					password1 = document.querySelector('#pass');

					if ( password1.type === "text" ) {
						password1.type = "password"
						$('.show-password').removeClass('fas fa-solid fa-eye-slash').addClass('fas fa-solid fa-eye');
					} else {
						password1.type = "text"
						$('.show-password').removeClass('fas fa-solid fa-eye').addClass('fas fa-solid fa-eye-slash');
					}
				})
			});

		</script>
		<!-- Bootstrap core JavaScript-->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="js/sb-admin-2.min.js"></script>

</body>
</html>
