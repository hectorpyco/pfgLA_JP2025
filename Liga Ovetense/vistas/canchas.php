<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>Inicio</title>
    <link href="../perfil.png" rel="icon">
    <link href="../perfil.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"/>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        // Delegación del evento al documento, que siempre existe
        $(document).on('keyup', '.filtrar', function () {
          var rex = new RegExp($(this).val(), 'i');
          $('.buscar tr').hide();
          $('.buscar tr').filter(function () {
            return rex.test($(this).text());
          }).show();
        });
      });
    </script>

  </head>

  <body>
    <?php
      $uActual=$_GET["usuario"];
      $r=0;
      if (isset($_GET["respuesta"])) {
        $r=$_GET["respuesta"];
      }
      require("../conectar.php");

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
                      <li class='menu-item active open'>
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
                          <li class='menu-item active'>
                            <a href='../vistas/canchas.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Registrar Canchas</div>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class='menu-header small text-uppercase'>
                        <span class='menu-header-text'>Configuración</span>
                      </li>
                      <li class='menu-item'>
                        <a href='javascript:void(0);' class='menu-link menu-toggle'>
                          <i class='menu-icon tf-icons bx bx-cog'></i>
                          <div data-i18n='Account Settings'>Ajustes del Sistema</div>
                        </a>
                        <ul class='menu-sub'>
                          <li class='menu-item'>
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
                          text: 'La cancha ya se encuentra registrada',  
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
                          text: 'No se pudo realizar la modificación ! El club ya existe',  
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
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Administración /</span> Canchas</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Listado de Canchas</a>
                              </li>
                              <li class='nav-item'>
                                <button type='button' disabled class='nav-link btn btn-link' data-bs-toggle='modal' data-bs-target='#modalRegistrarCancha'>
                                  Registrar Nueva Cancha
                                </button>
                              </li>
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'>Listado de Canchas</h5>
                              <div class='card-body'>
                                <div class='input-group rounded mb-3'>
                                  <span class='input-group-text border-0' id='search-addon'>
                                    <i class='ri-search-line'></i>
                                  </span>
                                  <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                </div>";
                                $sql1 = "SELECT ca.id, ca.descripcion, ca.idclub, cl.descripcion AS club, ca.direccion, ca.tipo_superficie, ca.capacidad, ca.disponibilidad
                                 FROM canchas ca
                                 LEFT JOIN clubes cl ON ca.idclub = cl.id
                                 WHERE ca.estado = 'ACTIVO'
                                 ORDER BY ca.id DESC";
                                $res1 = mysqli_query($conexion, $sql1);
                                if (mysqli_num_rows($res1) > 0) {
                                  echo "<div class='table-responsive text-nowrap' style='overflow-x: auto; max-height: 800px;'>
                                    <table class='table table-hover'>
                                      <thead class='table-primary text-center'>
                                        <tr>
                                          <th>ID</th>
                                          <th>Descripción</th>
                                          <th>Club</th>
                                          <th>Dirección</th>
                                          <th>Tipo de Superficie</th>
                                          <th>Capacidad</th>
                                          <th>Disponibilidad</th>
                                          <th>Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody id='tablaCanchas' class='table-border-bottom-0 buscar'>";
                                        while ($reg1 = mysqli_fetch_array($res1)) {
                                          echo "<tr style='text-align: center;' class='fila-editar' 
                                            data-id='{$reg1['id']}' 
                                            data-descripcion='{$reg1['descripcion']}'
                                            data-idclub='{$reg1['idclub']}'
                                            data-direccion='{$reg1['direccion']}'
                                            data-tipo_superficie='{$reg1['tipo_superficie']}'
                                            data-capacidad='{$reg1['capacidad']}'
                                            data-disponibilidad='{$reg1['disponibilidad']}'>
                                            <td>{$reg1['id']}</td>
                                            <td>{$reg1['descripcion']}</td>
                                            <td>{$reg1['club']}</td>
                                            <td>{$reg1['direccion']}</td>
                                            <td>{$reg1['tipo_superficie']}</td>
                                            <td>{$reg1['capacidad']}</td>
                                            <td>{$reg1['disponibilidad']}</td>
                                            <td>
                                              <a class='btn btn-sm btn-danger' href='../logica/eliminarCancha.php?usuario={$uActual}&id={$reg1['id']}'>
                                                <i class='bx bx-trash'></i>
                                              </a>
                                            </td>
                                          </tr>";
                                        }
                                      echo "</tbody>
                                    </table>
                                  </div>";
                                } else {
                                    echo "<div class='alert alert-warning' role='alert'>No hay ningún registro de canchas.</div>";
                                }
                                echo"
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalRegistrarCancha' tabindex='-1' aria-labelledby='modalRegistrarCanchaLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formRegistrarCancha'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalRegistrarCanchaLabel'>Registrar Cancha</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Descripción de la Cancha</label>
                                    <input type='text' name='cancha_descripcion' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Dirección</label>
                                    <input type='text' name='cancha_direccion' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Capacidad</label>
                                    <input type='text' name='cancha_capacidad' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Tipo de Superficie</label>
                                    <select name='cancha_superficie' class='form-control' required>
                                      <option value='CESPED NATURAL'>CÉSPED NATURAL</option>
                                      <option value='SINTETICO'>SINTÉTICO</option>
                                      <option value='TIERRA'>TIERRA</option>
                                      <option value='CEMENTO'>CEMENTO</option>
                                    </select>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Disponibilidad</label>
                                    <select name='cancha_disponibilidad' class='form-control' required>
                                      <option value='DISPONIBLE'>DISPONIBLE</option>
                                      <option value='MANTENIMIENTO'>MANTENIMIENTO</option>
                                      <option value='INHABILITADA'>INHABILITADA</option>
                                    </select>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Club</label>
                                    <select name='cancha_idclub' class='form-control' required>
                                      <option value=''>Seleccione un club</option>";
                                        $sql = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r["id"]}'>{$r["descripcion"]}</option>";
                                        }
                                      echo"
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <button type='submit' class='btn btn-success'>Guardar</button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

                      <div class='modal fade' id='modalEditarCancha' tabindex='-1' aria-labelledby='modalEditarCanchaLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formEditarCancha' action='../logica/editarCanchas.php' method='POST'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalEditarCanchaLabel'>Editar Cancha</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <input type='hidden' name='cancha_id' id='editar_id'>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Descripción</label>
                                    <input type='text' name='cancha_descripcion' id='editar_descripcion' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Dirección</label>
                                    <input type='text' name='cancha_direccion' id='editar_direccion' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Capacidad</label>
                                    <input type='text' name='cancha_capacidad' id='editar_capacidad' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Tipo de Superficie</label>
                                    <select name='cancha_superficie' id='editar_superficie' class='form-control' required>
                                      <option value='CESPED NATURAL'>CÉSPED NATURAL</option>
                                      <option value='SINTETICO'>SINTÉTICO</option>
                                      <option value='TIERRA'>TIERRA</option>
                                      <option value='CEMENTO'>CEMENTO</option>
                                    </select>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Disponibilidad</label>
                                    <select name='cancha_disponibilidad' id='editar_disponibilidad' class='form-control' required>
                                      <option value='DISPONIBLE'>DISPONIBLE</option>
                                      <option value='MANTENIMIENTO'>MANTENIMIENTO</option>
                                      <option value='INHABILITADA'>INHABILITADA</option>
                                    </select>
                                  </div>
                                 <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Club</label>
                                  <select name='cancha_idclub' id='editar_idclub' class='form-control' required>
                                    <option value=''>Seleccione un club</option>";
                                      $sql = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                      $res = mysqli_query($conexion, $sql);
                                      while ($r = mysqli_fetch_assoc($res)) {
                                        echo "<option value='{$r["id"]}'>{$r["descripcion"]}</option>";
                                      }
                                    echo"
                                  </select>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <input type='hidden' name='usuario' value='$uActual'>
                                <button type='submit' class='btn btn-primary'>Guardar cambios</button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              </div>
                            </div>
                          </form>
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
                <div class='layout-overlay layout-menu-toggle'></div>
              </div>";
          } else if ($reg[8]=='4'){
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
                      <li class='menu-item active open'>
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
                          <li class='menu-item active'>
                            <a href='../vistas/canchas.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Registrar Canchas</div>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class='menu-header small text-uppercase'>
                        <span class='menu-header-text'>Configuración</span>
                      </li>
                      <li class='menu-item'>
                        <a href='javascript:void(0);' class='menu-link menu-toggle'>
                          <i class='menu-icon tf-icons bx bx-cog'></i>
                          <div data-i18n='Account Settings'>Ajustes del Sistema</div>
                        </a>
                        <ul class='menu-sub'>
                          <li class='menu-item'>
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
                                      <small class='text-muted'>Secretario</small>
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
                          text: 'La cancha ya se encuentra registrada',  
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
                          text: 'No se pudo realizar la modificación ! El club ya existe',  
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
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Administración /</span> Canchas</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Listado de Canchas</a>
                              </li>
                              <li class='nav-item'>
                                <button type='button' class='nav-link btn btn-link' data-bs-toggle='modal' data-bs-target='#modalRegistrarCancha'>
                                  Registrar Nueva Cancha
                                </button>
                              </li>
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'>Listado de Canchas</h5>
                              <div class='card-body'>
                                <div class='input-group rounded mb-3'>
                                  <span class='input-group-text border-0' id='search-addon'>
                                    <i class='ri-search-line'></i>
                                  </span>
                                  <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                </div>";
                                $sql1 = "SELECT ca.id, ca.descripcion, ca.idclub, cl.descripcion AS club, ca.direccion, ca.tipo_superficie, ca.capacidad, ca.disponibilidad
                                 FROM canchas ca
                                 LEFT JOIN clubes cl ON ca.idclub = cl.id
                                 WHERE ca.estado = 'ACTIVO'
                                 ORDER BY ca.id DESC";
                                $res1 = mysqli_query($conexion, $sql1);
                                if (mysqli_num_rows($res1) > 0) {
                                  echo "<div class='table-responsive text-nowrap' style='overflow-x: auto; max-height: 800px;'>
                                    <table class='table table-hover'>
                                      <thead class='table-primary text-center'>
                                        <tr>
                                          <th>ID</th>
                                          <th>Descripción</th>
                                          <th>Club</th>
                                          <th>Dirección</th>
                                          <th>Tipo de Superficie</th>
                                          <th>Capacidad</th>
                                          <th>Disponibilidad</th>
                                          <th>Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody id='tablaCanchas' class='table-border-bottom-0 buscar'>";
                                        while ($reg1 = mysqli_fetch_array($res1)) {
                                          echo "<tr style='text-align: center;' class='fila-editar' 
                                            data-id='{$reg1['id']}' 
                                            data-descripcion='{$reg1['descripcion']}'
                                            data-idclub='{$reg1['idclub']}'
                                            data-direccion='{$reg1['direccion']}'
                                            data-tipo_superficie='{$reg1['tipo_superficie']}'
                                            data-capacidad='{$reg1['capacidad']}'
                                            data-disponibilidad='{$reg1['disponibilidad']}'>
                                            <td>{$reg1['id']}</td>
                                            <td>{$reg1['descripcion']}</td>
                                            <td>{$reg1['club']}</td>
                                            <td>{$reg1['direccion']}</td>
                                            <td>{$reg1['tipo_superficie']}</td>
                                            <td>{$reg1['capacidad']}</td>
                                            <td>{$reg1['disponibilidad']}</td>
                                            <td>
                                              <a class='btn btn-sm btn-danger' href='../logica/eliminarCancha.php?usuario={$uActual}&id={$reg1['id']}'>
                                                <i class='bx bx-trash'></i>
                                              </a>
                                            </td>
                                          </tr>";
                                        }
                                      echo "</tbody>
                                    </table>
                                  </div>";
                                } else {
                                    echo "<div class='alert alert-warning' role='alert'>No hay ningún registro de canchas.</div>";
                                }
                                echo"
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalRegistrarCancha' tabindex='-1' aria-labelledby='modalRegistrarCanchaLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formRegistrarCancha'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalRegistrarCanchaLabel'>Registrar Cancha</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Descripción de la Cancha</label>
                                    <input type='text' name='cancha_descripcion' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Dirección</label>
                                    <input type='text' name='cancha_direccion' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Capacidad</label>
                                    <input type='text' name='cancha_capacidad' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Tipo de Superficie</label>
                                    <select name='cancha_superficie' class='form-control' required>
                                      <option value='CESPED NATURAL'>CÉSPED NATURAL</option>
                                      <option value='SINTETICO'>SINTÉTICO</option>
                                      <option value='TIERRA'>TIERRA</option>
                                      <option value='CEMENTO'>CEMENTO</option>
                                    </select>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Disponibilidad</label>
                                    <select name='cancha_disponibilidad' class='form-control' required>
                                      <option value='DISPONIBLE'>DISPONIBLE</option>
                                      <option value='MANTENIMIENTO'>MANTENIMIENTO</option>
                                      <option value='INHABILITADA'>INHABILITADA</option>
                                    </select>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Club</label>
                                    <select name='cancha_idclub' class='form-control' required>
                                      <option value=''>Seleccione un club</option>";
                                        $sql = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r["id"]}'>{$r["descripcion"]}</option>";
                                        }
                                      echo"
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <button type='submit' class='btn btn-success'>Guardar</button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

                      <div class='modal fade' id='modalEditarCancha' tabindex='-1' aria-labelledby='modalEditarCanchaLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formEditarCancha' action='../logica/editarCanchas.php' method='POST'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalEditarCanchaLabel'>Editar Cancha</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <input type='hidden' name='cancha_id' id='editar_id'>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Descripción</label>
                                    <input type='text' name='cancha_descripcion' id='editar_descripcion' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Dirección</label>
                                    <input type='text' name='cancha_direccion' id='editar_direccion' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Capacidad</label>
                                    <input type='text' name='cancha_capacidad' id='editar_capacidad' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Tipo de Superficie</label>
                                    <select name='cancha_superficie' id='editar_superficie' class='form-control' required>
                                      <option value='CESPED NATURAL'>CÉSPED NATURAL</option>
                                      <option value='SINTETICO'>SINTÉTICO</option>
                                      <option value='TIERRA'>TIERRA</option>
                                      <option value='CEMENTO'>CEMENTO</option>
                                    </select>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Disponibilidad</label>
                                    <select name='cancha_disponibilidad' id='editar_disponibilidad' class='form-control' required>
                                      <option value='DISPONIBLE'>DISPONIBLE</option>
                                      <option value='MANTENIMIENTO'>MANTENIMIENTO</option>
                                      <option value='INHABILITADA'>INHABILITADA</option>
                                    </select>
                                  </div>
                                 <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Club</label>
                                  <select name='cancha_idclub' id='editar_idclub' class='form-control' required>
                                    <option value=''>Seleccione un club</option>";
                                      $sql = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                      $res = mysqli_query($conexion, $sql);
                                      while ($r = mysqli_fetch_assoc($res)) {
                                        echo "<option value='{$r["id"]}'>{$r["descripcion"]}</option>";
                                      }
                                    echo"
                                  </select>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <input type='hidden' name='usuario' value='$uActual'>
                                <button type='submit' class='btn btn-primary'>Guardar cambios</button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              </div>
                            </div>
                          </form>
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
      document.addEventListener('DOMContentLoaded', function () {
        document.getElementById("formRegistrarCancha").addEventListener("submit", function (e) {
          e.preventDefault();

          const form = e.target;
          const datos = new FormData(form);

          fetch("../logica/registrarCancha.php", {
            method: "POST",
            body: datos
          })
          .then(res => res.text())  // Usamos .text() para ver la respuesta cruda
          .then(data => {
            console.log(data);  // Ver lo que devuelve el servidor

            try {
              const jsonData = JSON.parse(data);  // Intentamos convertir la respuesta en JSON

              if (jsonData.exito) {
                // Cerrar el modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('modalRegistrarCancha'));
                modal.hide();

                // Limpiar el formulario
                form.reset();

                // Verificar que la tabla existe antes de intentar insertar la fila
                const tablaCanchas = document.getElementById("tablaCanchas");
                if (tablaCanchas) {
                  // Agregar la nueva fila a la tabla de canchas
                  const nuevaFila = `
                    <tr class="fila-editar" style="text-align: center;"
                      data-id="${jsonData.id}"
                      data-descripcion="${jsonData.descripcion}"
                      data-idclub="${jsonData.idclub}"
                      data-direccion="${jsonData.direccion}"
                      data-tipo_superficie="${jsonData.tipo_superficie}"
                      data-capacidad="${jsonData.capacidad}"
                      data-disponibilidad="${jsonData.disponibilidad}">
                      <td>${jsonData.id}</td>
                      <td>${jsonData.descripcion}</td>
                      <td>${jsonData.club}</td>
                      <td>${jsonData.direccion}</td>
                      <td>${jsonData.tipo_superficie}</td>
                      <td>${jsonData.capacidad}</td>
                      <td>${jsonData.disponibilidad}</td>
                      <td>
                        <a class='btn btn-sm btn-danger' href='../logica/eliminarCancha.php?id=${jsonData.id}'>
                          <i class='bx bx-trash'></i>
                        </a>
                      </td>
                    </tr>
                  `;
                  tablaCanchas.insertAdjacentHTML("afterbegin", nuevaFila);
                }
              } else {
                alert("Error: " + jsonData.mensaje);
              }
            } catch (error) {
              console.error("Error al procesar la respuesta JSON:", error);
              alert("Ocurrió un error al registrar la cancha.");
            }
          })
          .catch(error => {
            console.error("Error en la solicitud:", error);
            alert("Ocurrió un error al registrar la cancha.");
          });
        });
      });

    </script>

    <script>
      document.addEventListener("dblclick", function (e) {
        const fila = e.target.closest(".fila-editar");
        if (fila) {
          const id = fila.dataset.id;
          const descripcion = fila.dataset.descripcion;
          const direccion = fila.dataset.direccion;
          const capacidad = fila.dataset.capacidad;
          const tipo_superficie = fila.dataset.tipo_superficie;
          const disponibilidad = fila.dataset.disponibilidad;
          const idclub = fila.dataset.idclub;

          // Asignar valores a los inputs
          document.getElementById("editar_id").value = id;
          document.getElementById("editar_descripcion").value = descripcion;
          document.getElementById("editar_direccion").value = direccion;
          document.getElementById("editar_capacidad").value = capacidad;
          document.getElementById("editar_superficie").value = tipo_superficie;
          document.getElementById("editar_disponibilidad").value = disponibilidad;

          // Llenar select de clubes usando fetch
          const selectClub = document.getElementById("editar_idclub");
          selectClub.innerHTML = "<option value=''>Cargando clubes...</option>";

          fetch("../logica/obtener_clubes.php")
          .then(res => res.json())
          .then(clubes => {
            selectClub.innerHTML = "<option value=''>Seleccione un club</option>";
            clubes.forEach(club => {
              const option = document.createElement("option");
              option.value = club.id;
              option.textContent = club.descripcion;

              if (String(club.id) === String(idclub)) {
                option.selected = true;
              }
              selectClub.appendChild(option);
            });
          })
          .catch(error => {
            console.error("Error al cargar clubes:", error);
            selectClub.innerHTML = "<option value=''>Error al cargar</option>";
          });

          // Mostrar el modal
          const modal = new bootstrap.Modal(document.getElementById("modalEditarCancha"));
          modal.show();
        }
      });
    </script>

  </body>
</html>