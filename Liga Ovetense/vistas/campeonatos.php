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
                      <li class='menu-item active open'>
                        <a href='javascript:void(0);' class='menu-link menu-toggle'>
                          <i class='menu-icon tf-icons bx bx-football'></i>
                          <div>Campeonatos</div>
                        </a>
                        <ul class='menu-sub'>
                          <li class='menu-item active'>
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
                          text: 'El club ya se encuentra registrado',  
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
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Campeonatos /</span> Registrar Campeonatos</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Listado de Campeonatos</a>
                              </li>
                              <li class='nav-item'>
                                <button type='button' class='nav-link btn btn-link' data-bs-toggle='modal' disabled data-bs-target='#modalRegistrarCampeonato'>
                                  Registrar Nuevo Campeonato
                                </button>
                              </li>
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'>Listado de Campeonatos Organizados por la Liga Ovetense de Fútbol</h5>
                              <div class='card-body'>
                                <div class='input-group rounded mb-3'>
                                  <span class='input-group-text border-0' id='search-addon'>
                                    <i class='ri-search-line'></i>
                                  </span>
                                  <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                </div>";
                                $sql = "SELECT c.*, 
                                               l.descripcion AS liga, 
                                               t.descripcion AS tipo_campeonato
                                        FROM campeonatos c
                                        LEFT JOIN liga l ON c.idliga = l.id
                                        LEFT JOIN tipo_campeonato t ON c.idtipocampeonato = t.id
                                        WHERE c.estado = 'ACTIVO'
                                        ORDER BY c.id DESC";
                                $res = mysqli_query($conexion, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                  echo "<div class='table-responsive text-nowrap' style='overflow-x: auto; max-height: 800px;'>
                                    <table class='table table-hover'>
                                      <thead class='table-primary text-center'>
                                        <tr>
                                          <th>ID</th>
                                          <th>Descripción</th>
                                          <th>Fecha de Inicio</th>
                                          <th>Fecha de Finalización Esperada</th>
                                          <th>Fecha de Finalización Real</th>
                                          <th>Estado de Marcha</th>
                                          <th>Liga</th>
                                          <th>Tipo de Campeonato</th>
                                          <th>Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody id='tablaCampeonatos' class='table-border-bottom-0 buscar'>";
                                        while ($reg = mysqli_fetch_array($res)) {
                                          echo "<tr class='fila-editar' style='cursor: pointer; text-align: center;'
                                            data-id='{$reg['id']}'
                                            data-descripcion='{$reg['descripcion']}'
                                            data-fecha_i='{$reg['fecha_i']}'
                                            data-fecha_f='{$reg['fecha_f']}'
                                            data-estado_marcha='{$reg['estado_marcha']}'
                                            data-idliga='{$reg['idliga']}'
                                            data-idtipocampeonato='{$reg['idtipocampeonato']}'>
                                            <td>{$reg['id']}</td>
                                            <td>{$reg['descripcion']}</td>
                                            <td>{$reg['fecha_i']}</td>
                                            <td>{$reg['fecha_f']}</td>
                                            <td>{$reg['fecha_culminacion_real']}</td>
                                            <td>{$reg['estado_marcha']}</td>
                                            <td>{$reg['liga']}</td>
                                            <td>{$reg['tipo_campeonato']}</td>
                                            <td>
                                              <button class='btn btn-sm btn-success finalizar-btn' data-id='{$reg['id']}'>
                                                <i class='bx bx-check'></i>
                                              </button>
                                              <a class='btn btn-sm btn-danger' href='../logica/eliminarCampeonato.php?usuario={$uActual}&id={$reg['id']}'>
                                                <i class='bx bx-trash'></i>
                                              </a>
                                            </td>
                                          </tr>";
                                        }
                                      echo "</tbody>
                                    </table>
                                  </div>";
                                } else {
                                  echo "<div class='alert alert-warning' role='alert'>No hay ningún campeonato registrado.</div>";
                                }
                                echo"
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalRegistrarCampeonato' tabindex='-1' aria-labelledby='modalRegistrarCampeonatoLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formRegistrarCampeonato'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalRegistrarCampeonatoLabel'>Registrar Campeonato</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Nombre del Campeonato</label>
                                    <input type='text' name='campeonato_descripcion' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Estado de Marcha</label>
                                    <select name='campeonato_estado_marcha' class='form-control' required>
                                      <option value='EN CURSO'>EN CURSO</option>
                                      <option value='SUSPENDIDO'>SUSPENDIDO</option>
                                      <option value='POSTERGADO'>POSTERGADO</option>
                                    </select>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Fecha de Inicio</label>
                                    <input type='date' name='campeonato_fecha_i' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Fecha de Finalización</label>
                                    <input type='date' name='campeonato_fecha_f' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Liga</label>
                                    <select name='campeonato_liga' class='form-control' required>";
                                        $sql = "SELECT id, descripcion FROM liga";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r['id']}'>{$r['descripcion']}</option>";
                                        }
                                      echo"
                                    </select>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Tipo de Campeonato</label>
                                    <select name='campeonato_tipo' class='form-control' required>";
                                        $sql = "SELECT id, descripcion FROM tipo_campeonato WHERE estado = 'ACTIVO'";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r['id']}'>{$r['descripcion']}</option>";
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


                    <div class='modal fade' id='modalEditarCampeonato' tabindex='-1' aria-labelledby='modalEditarCampeonatoLabel' aria-hidden='true'>
                      <div class='modal-dialog'>
                        <form id='formEditarCampeonato'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='modalEditarCampeonatoLabel'>Editar Campeonato</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                            </div>
                            <div class='modal-body'>
                              <input type='hidden' name='campeonato_id' id='editar_campeonato_id'>

                              <div class='row'>
                                <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Nombre del Campeonato</label>
                                  <input type='text' name='campeonato_descripcion' id='editar_campeonato_descripcion' class='form-control' required>
                                </div>
                                <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Estado de Marcha</label>
                                  <select name='campeonato_estado_marcha' id='editar_campeonato_estado_marcha' class='form-control' required>
                                    <option value='EN CURSO'>EN CURSO</option>
                                    <option value='SUSPENDIDO'>SUSPENDIDO</option>
                                    <option value='POSTERGADO'>POSTERGADO</option>
                                  </select>
                                </div>
                              </div>
                              <div class='row'>
                                <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Fecha de Inicio</label>
                                  <input type='date' name='campeonato_fecha_i' id='editar_campeonato_fecha_i' class='form-control' required>
                                </div>
                                <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Fecha de Finalización</label>
                                  <input type='date' name='campeonato_fecha_f' id='editar_campeonato_fecha_f' class='form-control' required>
                                </div>
                              </div>

                              <div class='row'>
                                <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Liga</label>
                                  <select name='campeonato_liga' id='editar_campeonato_liga' class='form-control' required>
                                  </select>
                                </div>
                                <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Tipo de Campeonato</label>
                                  <select name='campeonato_tipo' id='editar_campeonato_tipo' class='form-control' required>
                                  </select>
                                </div>
                              </div>

                            </div>
                            <div class='modal-footer'>
                              <input type='hidden' name='usuario' value='$uActual'>
                              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              <button type='submit' class='btn btn-primary'>Guardar Cambios</button>
                            </div>
                          </div>
                        </form>
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
                      <li class='menu-item active open'>
                        <a href='javascript:void(0);' class='menu-link menu-toggle'>
                          <i class='menu-icon tf-icons bx bx-football'></i>
                          <div>Campeonatos</div>
                        </a>
                        <ul class='menu-sub'>
                          <li class='menu-item active'>
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
                          text: 'El club ya se encuentra registrado',  
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
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Campeonatos /</span> Registrar Campeonatos</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Listado de Campeonatos</a>
                              </li>
                              <li class='nav-item'>
                                <button type='button' class='nav-link btn btn-link' data-bs-toggle='modal' data-bs-target='#modalRegistrarCampeonato'>
                                  Registrar Nuevo Campeonato
                                </button>
                              </li>
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'>Listado de Campeonatos Organizados por la Liga Ovetense de Fútbol</h5>
                              <div class='card-body'>
                                <div class='input-group rounded mb-3'>
                                  <span class='input-group-text border-0' id='search-addon'>
                                    <i class='ri-search-line'></i>
                                  </span>
                                  <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                </div>";
                                $sql = "SELECT c.*, 
                                               l.descripcion AS liga, 
                                               t.descripcion AS tipo_campeonato
                                        FROM campeonatos c
                                        LEFT JOIN liga l ON c.idliga = l.id
                                        LEFT JOIN tipo_campeonato t ON c.idtipocampeonato = t.id
                                        WHERE c.estado = 'ACTIVO'
                                        ORDER BY c.id DESC";
                                $res = mysqli_query($conexion, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                  echo "<div class='table-responsive text-nowrap' style='overflow-x: auto; max-height: 800px;'>
                                    <table class='table table-hover'>
                                      <thead class='table-primary text-center'>
                                        <tr>
                                          <th>ID</th>
                                          <th>Descripción</th>
                                          <th>Fecha de Inicio</th>
                                          <th>Fecha de Finalización Esperada</th>
                                          <th>Fecha de Finalización Real</th>
                                          <th>Estado de Marcha</th>
                                          <th>Liga</th>
                                          <th>Tipo de Campeonato</th>
                                          <th>Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody id='tablaCampeonatos' class='table-border-bottom-0 buscar'>";
                                        while ($reg = mysqli_fetch_array($res)) {
                                          echo "<tr class='fila-editar' style='cursor: pointer; text-align: center;'
                                            data-id='{$reg['id']}'
                                            data-descripcion='{$reg['descripcion']}'
                                            data-fecha_i='{$reg['fecha_i']}'
                                            data-fecha_f='{$reg['fecha_f']}'
                                            data-estado_marcha='{$reg['estado_marcha']}'
                                            data-idliga='{$reg['idliga']}'
                                            data-idtipocampeonato='{$reg['idtipocampeonato']}'>
                                            <td>{$reg['id']}</td>
                                            <td>{$reg['descripcion']}</td>
                                            <td>{$reg['fecha_i']}</td>
                                            <td>{$reg['fecha_f']}</td>
                                            <td>{$reg['fecha_culminacion_real']}</td>
                                            <td>{$reg['estado_marcha']}</td>
                                            <td>{$reg['liga']}</td>
                                            <td>{$reg['tipo_campeonato']}</td>
                                            <td>
                                              <button class='btn btn-sm btn-success finalizar-btn' data-id='{$reg['id']}'>
                                                <i class='bx bx-check'></i>
                                              </button>
                                              <a class='btn btn-sm btn-danger' href='../logica/eliminarCampeonato.php?usuario={$uActual}&id={$reg['id']}'>
                                                <i class='bx bx-trash'></i>
                                              </a>
                                            </td>
                                          </tr>";
                                        }
                                      echo "</tbody>
                                    </table>
                                  </div>";
                                } else {
                                  echo "<div class='alert alert-warning' role='alert'>No hay ningún campeonato registrado.</div>";
                                }
                                echo"
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalRegistrarCampeonato' tabindex='-1' aria-labelledby='modalRegistrarCampeonatoLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formRegistrarCampeonato'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalRegistrarCampeonatoLabel'>Registrar Campeonato</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Nombre del Campeonato</label>
                                    <input type='text' name='campeonato_descripcion' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Estado de Marcha</label>
                                    <select name='campeonato_estado_marcha' class='form-control' required>
                                      <option value='EN CURSO'>EN CURSO</option>
                                      <option value='SUSPENDIDO'>SUSPENDIDO</option>
                                      <option value='POSTERGADO'>POSTERGADO</option>
                                    </select>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Fecha de Inicio</label>
                                    <input type='date' name='campeonato_fecha_i' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Fecha de Finalización</label>
                                    <input type='date' name='campeonato_fecha_f' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Liga</label>
                                    <select name='campeonato_liga' class='form-control' required>";
                                        $sql = "SELECT id, descripcion FROM liga";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r['id']}'>{$r['descripcion']}</option>";
                                        }
                                      echo"
                                    </select>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Tipo de Campeonato</label>
                                    <select name='campeonato_tipo' class='form-control' required>";
                                        $sql = "SELECT id, descripcion FROM tipo_campeonato WHERE estado = 'ACTIVO'";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r['id']}'>{$r['descripcion']}</option>";
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


                    <div class='modal fade' id='modalEditarCampeonato' tabindex='-1' aria-labelledby='modalEditarCampeonatoLabel' aria-hidden='true'>
                      <div class='modal-dialog'>
                        <form id='formEditarCampeonato'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='modalEditarCampeonatoLabel'>Editar Campeonato</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                            </div>
                            <div class='modal-body'>
                              <input type='hidden' name='campeonato_id' id='editar_campeonato_id'>

                              <div class='row'>
                                <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Nombre del Campeonato</label>
                                  <input type='text' name='campeonato_descripcion' id='editar_campeonato_descripcion' class='form-control' required>
                                </div>
                                <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Estado de Marcha</label>
                                  <select name='campeonato_estado_marcha' id='editar_campeonato_estado_marcha' class='form-control' required>
                                    <option value='EN CURSO'>EN CURSO</option>
                                    <option value='SUSPENDIDO'>SUSPENDIDO</option>
                                    <option value='POSTERGADO'>POSTERGADO</option>
                                  </select>
                                </div>
                              </div>
                              <div class='row'>
                                <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Fecha de Inicio</label>
                                  <input type='date' name='campeonato_fecha_i' id='editar_campeonato_fecha_i' class='form-control' required>
                                </div>
                                <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Fecha de Finalización</label>
                                  <input type='date' name='campeonato_fecha_f' id='editar_campeonato_fecha_f' class='form-control' required>
                                </div>
                              </div>

                              <div class='row'>
                                <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Liga</label>
                                  <select name='campeonato_liga' id='editar_campeonato_liga' class='form-control' required>
                                  </select>
                                </div>
                                <div class='col-md-6 mb-3'>
                                  <label class='form-label'>Tipo de Campeonato</label>
                                  <select name='campeonato_tipo' id='editar_campeonato_tipo' class='form-control' required>
                                  </select>
                                </div>
                              </div>

                            </div>
                            <div class='modal-footer'>
                              <input type='hidden' name='usuario' value='$uActual'>
                              <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              <button type='submit' class='btn btn-primary'>Guardar Cambios</button>
                            </div>
                          </div>
                        </form>
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
      document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formRegistrarCampeonato").addEventListener("submit", function (e) {
          e.preventDefault();

          const form = e.target;
          const datos = new FormData(form);

          fetch("../logica/registrarCampeonatos.php", {
            method: "POST",
            body: datos
          })
          .then(res => res.json())
          .then(data => {
            if (data.exito) {
              // Cerrar el modal
              const modal = bootstrap.Modal.getInstance(document.getElementById('modalRegistrarCampeonato'));
              modal.hide();

              // Limpiar el formulario
              form.reset();

              // Agregar la nueva fila a la tabla
              const tabla = document.getElementById("tablaCampeonatos");
              if (tabla) {
                const nuevaFila = `
                  <tr class="fila-editar" style="text-align: center;"
                    data-id="${data.id}"
                    data-descripcion="${data.descripcion}"
                    data-fecha_i="${data.fecha_i}"
                    data-fecha_f="${data.fecha_f}"
                    data-estado_marcha="${data.estado_marcha}"
                    data-idliga="${data.idliga}"
                    data-idtipocampeonato="${data.idtipocampeonato}">
                    <td>${data.id}</td>
                    <td>${data.descripcion}</td>
                    <td>${data.fecha_i}</td>
                    <td>${data.fecha_f}</td>
                    <td>${data.fecha_culminacion_real}</td>
                    <td>${data.estado_marcha}</td>
                    <td>${data.liga}</td>
                    <td>${data.tipo_campeonato}</td>
                    <td>
                      <button class='btn btn-sm btn-success finalizar-btn' data-id='${data.id}'>
                        <i class='bx bx-check'></i>
                      </button>
                      <a class='btn btn-sm btn-danger' href='../logica/eliminarCampeonato.php?usuario=${data.usuario}&id=${data.id}'>
                        <i class='bx bx-trash'></i>
                      </a>
                    </td>
                  </tr>
                `;
                tabla.insertAdjacentHTML("afterbegin", nuevaFila);
              } else {
                console.error("Elemento 'tablaCampeonatos' no encontrado.");
              }
            } else {
              alert("Error: " + data.mensaje);
            }
          })
          .catch(error => {
            console.error("Error en el registro:", error);
            alert("Ocurrió un error al registrar el campeonato.");
          });
        });
      });
    </script>


    <script>
      $(document).ready(function () {
        $(document).on('dblclick', '.fila-editar', function () {
          const id = $(this).data('id');
          const descripcion = $(this).data('descripcion');
          const estado_marcha = $(this).data('estado_marcha');
          const fecha_i = $(this).data('fecha_i');
          const fecha_f = $(this).data('fecha_f');
          const liga_id = $(this).data('idliga');
          const tipo_id = $(this).data('idtipocampeonato');

          // Rellenar los campos del modal
          $('#editar_campeonato_id').val(id);
          $('#editar_campeonato_descripcion').val(descripcion);
          $('#editar_campeonato_estado_marcha').val(estado_marcha);
          $('#editar_campeonato_fecha_i').val(fecha_i);
          $('#editar_campeonato_fecha_f').val(fecha_f);
          $('#editar_campeonato_liga').val(liga_id);
          $('#editar_campeonato_tipo').val(tipo_id);

          // Realizar una solicitud AJAX para cargar las opciones de Liga y Tipo de Campeonato
          $.ajax({
            url: '../logica/get_select_dataCampeonatos.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
              const selectLiga = $('#editar_campeonato_liga');
              const selectTipo = $('#editar_campeonato_tipo');

              // Limpiar y rellenar el select de liga
              selectLiga.empty();
              selectLiga.append('<option value="">Seleccione una liga</option>');
              data.ligas.forEach(function (liga) {
                const selected = liga.id == liga_id ? 'selected' : '';
                selectLiga.append(`<option value="${liga.id}" ${selected}>${liga.descripcion}</option>`);
              });

              // Limpiar y rellenar el select de tipo de campeonato
              selectTipo.empty();
              selectTipo.append('<option value="">Seleccione un tipo de campeonato</option>');
              data.tipos.forEach(function (tipo) {
                const selected = tipo.id == tipo_id ? 'selected' : '';
                selectTipo.append(`<option value="${tipo.id}" ${selected}>${tipo.descripcion}</option>`);
              });

              // Mostrar el modal
              $('#modalEditarCampeonato').modal('show');
            },
            error: function () {
              alert('Error al cargar los datos de liga y tipo de campeonato.');
            }
          });
        });
      });
    </script>

    <script>
      $('#formEditarCampeonato').submit(function (e) {
        e.preventDefault();

        const datosFormulario = $(this).serialize();

        $.ajax({
          url: '../logica/editarCampeonato.php',
          method: 'POST',
          data: datosFormulario,
          dataType: 'json',
          success: function (response) {
            if (response.exito) {
              $('#modalEditarCampeonato').modal('hide');
              alert('Campeonato actualizado correctamente');
              location.reload(); // o podés actualizar tu tabla sin recargar la página
            } else {
              alert('Error: ' + (response.mensaje || 'No se pudo actualizar.'));
            }
          },
          error: function () {
            alert('Error en la conexión con el servidor.');
          }
        });
      });
    </script>

    <script>
  document.addEventListener('click', function (e) {
    const btn = e.target.closest('.finalizar-btn');
    if (btn) {
      const id = btn.getAttribute('data-id');
      if (confirm('¿Estás seguro que deseas finalizar este campeonato?')) {
        fetch('../logica/finalizarCampeonato.php', {
          method: 'POST',
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},
          body: 'id=' + id
        })
        .then(res => res.json())
        .then(data => {
          if (data.exito) {
            alert('Campeonato finalizado correctamente.');
            location.reload();
          } else {
            alert('Error al finalizar el campeonato.');
          }
        });
      }
    }
  });
</script>


  </body>
</html>