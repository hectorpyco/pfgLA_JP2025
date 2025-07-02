<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>Ajuste del Sistema</title>
    <link href="../perfil.png" rel="icon">
    <link href="../perfil.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        (function ($) {
          $('.filtrar').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.buscar tr').hide();
            $('.buscar tr').filter(function () {
            return rex.test($(this).text());
          }).show();
        })
      }(jQuery));
      });
    </script>
  </head>

  <body>
    <?php
      $uActual=$_GET["usuario"];
      $r=0;
      $c=$_GET["id"];
      if (isset($_GET["respuesta"])) {
        $r=$_GET["respuesta"];
      }
      require("../conectar.php");
      $sqlt= "select * from usuarios where id='$c'";
      $rest= mysqli_query($conexion, $sqlt);
      $regt=mysqli_fetch_array($rest);
      $nivel=$regt[8];
      $idLiga= $regt[9];

      $sql= "select * from usuarios where email='$uActual'";
      $res= mysqli_query($conexion, $sql);
      if (mysqli_num_rows($res)>0) {
        while($reg=mysqli_fetch_array($res)){
          if ($reg[8]=='1'){
              //Panel de diseño
              echo "<div class='layout-wrapper layout-content-navbar'>
                <div class='layout-container'>
                  <aside id='layout-menu' class='layout-menu menu-vertical menu bg-menu-theme'>
                    <div class='app-brand demo'>
                      <span class='app-brand-logo demo'>
                        <img class='mb-1' src='../perfil.png' width='60' height='60'>
                      </span>
                      <span class='app-brand-text fw-bolder'>Liga Ovetense</span>
                      <a href='javascript:void(0);' class='layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none'>
                        <i class='bx bx-chevron-left bx-sm align-middle'></i>
                      </a>
                    </div>
                    <div class='menu-inner-shadow'></div>
                    <ul class='menu-inner py-1'>
                      <li class='menu-item'>
                        <a href='../vistas/panelPrincipal.php?usuario=$uActual' class='menu-link'>
                          <i class='menu-icon tf-icons bx bx-home-circle'></i>
                          <div>Inicio</div>
                        </a>
                      </li>
                      <li class='menu-item'>
                        <a href='javascript:void(0);' class='menu-link menu-toggle'>
                          <i class='menu-icon tf-icons bx bx-football'></i>
                          <div>Campeonatos</div>
                        </a>
                        <ul class='menu-sub'>
                          <li class='menu-item'>
                            <a href='../vistas/campeonatos.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Registrar Campeonatos</div>
                            </a>
                          </li>
                          <li class='menu-item'>
                            <a href='../vistas/tipoCampeonato.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Notifications'>Tipo de Campeonato</div>
                            </a>
                          </li>
                          <li class='menu-item'>
                            <a href='../vistas/temporadas.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Notifications'>Registrar Temporadas</div>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class='menu-item'>
                        <a href='javascript:void(0);' class='menu-link menu-toggle'>
                          <i class='menu-icon tf-icons bx bxs-flag-alt'></i>
                          <div>Partidos</div>
                        </a>
                        <ul class='menu-sub'>
                          <li class='menu-item'>
                            <a href='../vistas/partidos.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Registrar Partidos</div>
                            </a>
                          </li>
                          <li class='menu-item'>
                            <a href='../vistas/resultados.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Resultados de Partidos</div>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class='menu-item'>
                        <a href='javascript:void(0);' class='menu-link menu-toggle'>
                          <i class='menu-icon tf-icons bx bxs-spreadsheet'></i>
                          <div>Fichajes</div>
                        </a>
                        <ul class='menu-sub'>
                          <li class='menu-item'>
                            <a href='../vistas/fichajes.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Registrar Fichajes</div>
                            </a>
                          </li>
                          <li class='menu-item'>
                            <a href='../vistas/jugadores.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Jugadores</div>
                            </a>
                          </li>
                          <li class='menu-item'>
                            <a href='../vistas/planteles.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Planteles</div>
                            </a>
                          </li>
                          <li class='menu-item'>
                            <a href='../vistas/hFutbolistico.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Historial Futbolísticos</div>
                            </a>
                          </li>
                          <li class='menu-item'>
                            <a href='../vistas/hMedicos.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Historiales Médicos</div>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class='menu-header small text-uppercase'>
                        <span class='menu-header-text'>Administración</span>
                      </li>
                      <li class='menu-item'>
                        <a href='javascript:void(0);' class='menu-link menu-toggle'>
                          <i class='menu-icon tf-icons bx bxs-trophy'></i>
                          <div data-i18n='Account Settings'>Liga</div>
                        </a>
                        <ul class='menu-sub'>
                          <li class='menu-item'>
                            <a href='../vistas/categorias.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Account'>Categorias</div>
                            </a>
                          </li>
                          <li class='menu-item'>
                            <a href='../vistas/clubes.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Notifications'>Clubes</div>
                            </a>
                          </li>
                          <li class='menu-item'>
                            <a href='../vistas/canchas.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Registrar Canchas</div>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class='menu-header small text-uppercase'>
                        <span class='menu-header-text'>Configuración</span>
                      </li>
                      <li class='menu-item active open'>
                        <a href='javascript:void(0);' class='menu-link menu-toggle'>
                          <i class='menu-icon tf-icons bx bx-cog'></i>
                          <div data-i18n='Account Settings'>Ajustes del Sistema</div>
                        </a>
                        <ul class='menu-sub'>
                          <li class='menu-item active'>
                            <a href='../vistas/usuarios.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Account'>Usuarios</div>
                            </a>
                          </li>
                          <li class='menu-item'>
                            <a href='../vistas/liga.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Notifications'>Liga Ovetense</div>
                            </a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </aside>";
                  //Final del menú e inicio de la barra horizontal donde están las opciones sesión de usuario
                  echo "
                  <div class='layout-page'>
                    
                    <nav class='layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme'
                      id='layout-navbar'>
                      <div class='layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none'>
                        <a class='nav-item nav-link px-0 me-xl-4' href='javascript:void(0)'>
                          <i class='bx bx-menu bx-sm'></i>
                        </a>
                      </div>
                      <div class='navbar-nav-right d-flex align-items-center' id='navbar-collapse'>
                        <ul class='navbar-nav flex-row align-items-center ms-auto'>
                          
                          <li class='nav-item navbar-dropdown dropdown-user dropdown'>
                            <a class='nav-link dropdown-toggle hide-arrow' href='javascript:void(0);' data-bs-toggle='dropdown'>
                              <div class='avatar avatar-online'>
                                <img src='../perfil.png' alt class='w-px-40 h-auto rounded-circle'/>
                              </div>
                            </a>
                            <ul class='dropdown-menu dropdown-menu-end'>
                              <li>
                                <a class='dropdown-item' href='#'>
                                  <div class='d-flex'>
                                    <div class='flex-shrink-0 me-3'>
                                      <div class='avatar avatar-online'>
                                        <img src='../perfil.png' alt class='w-px-40 h-auto rounded-circle'/>
                                      </div>
                                    </div>
                                    <div class='flex-grow-1'>
                                      <span class='fw-semibold d-block'>".$reg[1]." ".$reg[2]."</span>
                                      <small class='text-muted'>Administrador</small>
                                    </div>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <div class='dropdown-divider'></div>
                              </li>
                              <li>
                                  <a class='dropdown-item' href='../vistas/miPerfil.php?usuario=$uActual'>
                                  <i class='bx bx-user me-2'></i>
                                  <span class='align-middle'>Mi perfil</span>
                                </a>
                              </li>
                              <li>
                                <div class='dropdown-divider'></div>
                              </li>
                              <li>
                                <a class='dropdown-item' href='../logica/cerrarSesion.php'>
                                  <i class='bx bx-power-off me-2'></i>
                                  <span class='align-middle'>Cerrar Sesión</span>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </nav>
                    ";
                    if ($r==1) {
                      echo "<script>
                        swal.fire({
                          icon: 'success',
                          title: 'Registro exitoso !',  
                        })
                      </script>";
                    }else if ($r==2) {
                      echo "<script>
                        swal.fire({
                          icon: 'error',
                          title: 'Operación inválida...!',
                          text: 'El usuario ya se encuentra registrado',  
                        })
                        </script>";        
                    }else if ($r==3) {
                      echo "<script>
                        swal.fire({
                          icon: 'success',
                          text: 'Modificación exitosa !',  
                        })
                      </script>";        
                    }else if ($r==4) {
                      echo "<script>
                        swal.fire({
                          icon: 'error',
                          text: 'No se pudo realizar la modificación !',  
                        })
                      </script>";        
                    }else if ($r==5) {
                      echo "<script>
                        swal.fire({
                          icon: 'success',
                          text: 'El registro ha sido dado de baja!',  
                        })
                      </script>";        
                    }else if ($r==6) {
                      echo "<script>
                        swal.fire({
                          icon: 'error',
                          text: 'El username no está disponible !',  
                        })
                      </script>";        
                    }else if ($r==7) {
                      echo "<script>
                        swal.fire({
                          icon: 'error',
                          text: 'No se pudo eliminar el usuario!',  
                        })
                      </script>";        
                    }
                    //<!-- Panel Principal -->
                    echo "
                    <div class='content-wrapper'>
                      <div class='container-xxl flex-grow-1 container-p-y'>
                          <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Ajustes del Sistema /</span> Usuarios</h4>
                          <div class='row'>
                            <div class='col-md-12'>
                              <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                                  <li class='nav-item'>
                                    <a class='nav-link ' href='../vistas/usuarios.php?usuario=$uActual'>Listado de Usuarios</a>
                                  </li>
                                  <li class='nav-item'>
                                    <a class='nav-link active' href='javascript:void(0);'
                                      >Modificar Usuario</a
                                    >
                                  </li>
                              </ul>
                              <div class='card mb-4'>
                                <h5 class='card-header'>Ingrese los datos</h5>
                                <div class='card-body'>
                                  <form action='../logica/editarUsuarios.php' method='POST'>
                                    <div class='row'>
                                      <div class='col-md-4 mb-3'>
                                        <label class='form-label' for='nombre'>Nombre</label>
                                        <input type='text' class='form-control' name='nombre' id='nombre' value=\"".$regt[1]."\" required />
                                      </div> 
                                      <div class='col-md-4 mb-3'>
                                        <label class='form-label' for='ape'>Apellido</label>
                                        <input type='text' class='form-control' id='ape' name='ape' value=\"".$regt[2]."\" required />
                                      </div>
                                      <div class='col-md-4 mb-3'>
                                        <label class='form-label' for='ci'>N° de Cédula</label>
                                        <input type='text' class='form-control' id='ci' name='ci' value=\"".$regt[3]."\" required />
                                      </div>
                                    </div>
                                    <div class='row'>
                                      <div class='col-md-4 mb-3'>
                                        <label class='form-label' for='tel'>N° de Teléfono</label>
                                        <input type='text' class='form-control' id='tel' name='tel' value=\"".$regt[4]."\" required />
                                      </div>
                                      <div class='col-md-4 mb-3'>
                                        <label class='form-label' for='dire'>Dirección</label>
                                        <input type='text' class='form-control' id='dire' name='dire' value=\"".$regt[5]."\" required />
                                      </div>
                                      <div class='col-md-4 mb-3'>
                                        <label class='form-label' for='idF'>Liga</label>";
                                        $sqlP = "select * from liga order by id asc";
                                        $resP = mysqli_query($conexion, $sqlP);
                                        if (mysqli_num_rows($resP)>0){
                                          echo "<select class=\"form-select\" name=\"idF\" id=\"idF\" >";
                                          $sqlP = "select * from liga order by id asc";
                                          $resP = mysqli_query($conexion, $sqlP);
                                          while ($regP=mysqli_fetch_array($resP)) {
                                            if ($idLiga==$regP[0]) {
                                              echo "<option value=".$regP[0]." selected>".$regP[1]."</option>";
                                            }else{
                                              echo "<option value=".$regP[0].">".$regP[1]."</option>";
                                            }
                                          }
                                          echo "</select>";
                                        }else{
                                          echo "<div class=\"alert alert-warning\" role=\"alert\">No hay ningún registro.</div>";
                                        }
                                        echo "
                                      </div>
                                    </div>
                                    <div class='row'>
                                      <div class='col-md-4 mb-3'>
                                        <label class='form-label' for='email'>Email</label>
                                        <input type='email' class='form-control' id='email' name='email' value=\"".$regt[6]."\" required />
                                      </div>
                                      <div class='col-md-4 mb-3'>
                                        <label class='form-label' for='pass'>Contraseña</label>
                                        <input type='password' class='form-control' id='pass' name='pass' placeholder='Dejar en blanco si no desea cambiar'/>
                                      </div>
                                      <div class='col-md-4 mb-3'>
                                        <label class='form-label' for='nivel'>Nivel de Usuario</label>";
                                          if ($nivel=='1') {
                                            echo "<select class=\"form-select\" name='nivel' id='nivel'>
                                              <option value='1' selected>ADMINISTRADOR</option>
                                              <option value='2'>SCOUT</option>
                                              <option value='3'>PRESIDENTE</option>
                                              <option value='4'>SECRETARIO</option>
                                              <option value='5'>AUDITOR</option>
                                            </select>";
                                          }else if ($nivel=='2'){
                                            echo "<select class=\"form-select\" name='nivel' id='nivel'>
                                              <option value='2' selected>SCOUT</option>
                                              <option value='1'>ADMINISTRADOR</option>
                                              <option value='3'>PRESIDENTE</option>
                                              <option value='4'>SECRETARIO</option>
                                              <option value='5'>AUDITOR</option>
                                            </select>";
                                          }else if ($nivel=='3'){
                                            echo "<select class=\"form-select\" name='nivel' id='nivel'>
                                              <option value='3' selected>PRESIDENTE</option>
                                              <option value='2'>SCOUT</option>
                                              <option value='1'>ADMINISTRADOR</option>
                                              <option value='4'>SECRETARIO</option>
                                              <option value='5'>AUDITOR</option>
                                            </select>";
                                          }else if ($nivel=='4'){
                                            echo "<select class=\"form-select\" name='nivel' id='nivel'>
                                              <option value='4' selected>SECRETARIO</option>
                                              <option value='2'>SCOUT</option>
                                              <option value='1'>ADMINISTRADOR</option>
                                              <option value='3'>PRESIDENTE</option>
                                              <option value='5'>AUDITOR</option>
                                            </select>";
                                          }else if ($nivel=='5'){
                                            echo "<select class=\"form-select\" name='nivel' id='nivel'>
                                              <option value='5 selected'>AUDITOR</option>
                                              <option value='1'>ADMINISTRADOR</option>
                                              <option value='2'>SCOUT</option>
                                              <option value='3'>PRESIDENTE</option>
                                              <option value='4'>SECRETARIO</option>
                                            </select>";
                                          }
                                        echo "
                                      </div>
                                    </div>
                                    <input type='hidden' name='usuario' value='$uActual'>
                                    <input type='hidden' name='id' value='$c'>
                                    <center>
                                      <button type='submit' class='btn btn-success'>Guardar</button>
                                      <button type='reset' id=\"btnCancelar\" value=\"Cancelar\" onclick=\"location.href='../vistas/usuarios.php?usuario=$uActual'\" class='btn btn-danger'>Cancelar</button>
                                    </center>
                                  </form>
                                </div>
                              <hr class='my-0' />
                            </div>
                          </div>
                        </div>

                      <footer class='content-footer footer bg-footer-theme'>
                        <div class='container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column'>
                          <div class='mb-2 mb-md-0'>
                            © Liga Ovetense de Fútbol,
                            <script>
                              document.write(new Date().getFullYear());
                            </script>
                          </div>
                        </div>
                      </footer>
                    </div>
                  </div>
                </div>
                <div class='layout-overlay layout-menu-toggle'></div>
              </div>";
          }
        }
      }
    ?>
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
      document.querySelector("form").addEventListener("submit", function (e) {
        const pass = document.getElementById("pass").value;

        // Solo validamos si se ingresó alguna contraseña
        if (pass.length > 0) {
          // Expresión regular para validar la contraseña
          const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{8,}$/;

          if (!regex.test(pass)) {
            e.preventDefault(); // Detener el envío del formulario
            alert("La contraseña debe tener al menos 8 caracteres, incluyendo mayúsculas, minúsculas, números y caracteres especiales.");
          }
        }
      });
    </script>
  </body>
</html>