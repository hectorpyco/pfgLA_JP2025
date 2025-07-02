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
                      <li class='menu-item active open'>
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
                          <li class='menu-item active'>
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
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Fichajes /</span> Registrar Historial Médico</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Listado de Historial Médico</a>
                              </li>
                              <li class='nav-item'>
                                <button type='button' disabled class='nav-link btn btn-link' data-bs-toggle='modal' data-bs-target='#modalRegistrarHistorial'>
                                  Registrar Nuevo Historial Médico
                                </button>
                              </li>
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'>Listado de Historial Médico</h5>
                              <div class='card-body'>
                                <div class='input-group rounded mb-3'>
                                  <span class='input-group-text border-0' id='search-addon'>
                                    <i class='ri-search-line'></i>
                                  </span>
                                  <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                </div>";
                                $sql = "SELECT h.*, 
                                               j.nombre AS jugador_nombre, 
                                               j.apellido AS jugador_apellido, 
                                               j.ci AS jugador_ci,
                                               j.telefono AS jugador_telefono,
                                               j.fecha_nac AS jugador_fecha_nacimiento,
                                               j.nacionalidad AS jugador_nacionalidad
                                        FROM historial_medico h
                                        LEFT JOIN jugadores j ON h.idjugador = j.id
                                        WHERE h.estado = 'ACTIVO'
                                        ORDER BY h.id DESC";
                                $res = mysqli_query($conexion, $sql);
                                $num_rows = mysqli_num_rows($res);  // Guardamos el número de registros encontrados
                                echo"
                                <div class='table-responsive text-nowrap' style='overflow-x: auto; max-height: 800px;'>
                                  <table class='table table-hover'>
                                    <thead class='table-primary text-center'>
                                      <tr>
                                        <th>ID</th>
                                        <th>Jugador</th>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Diagnóstico</th>
                                        <th>Tratamiento</th>
                                        <th>Fecha Recuperación</th>
                                        <th>Médico Tratante</th>
                                        <th>Observaciones</th>
                                        <th>Acciones</th>
                                      </tr>
                                    </thead>
                                    <tbody id='tablaHistorial' class='table-border-bottom-0 buscar'>";
                                      // Si hay registros, mostramos la tabla con los datos
                                      if ($num_rows > 0) {
                                        while ($reg = mysqli_fetch_array($res)) {
                                          echo "<tr class='fila-editar-historial' style='cursor: pointer; text-align: center;'
                                            data-id='{$reg['id']}'
                                            data-idjugador='{$reg['idjugador']}'
                                            data-jugador_nombre='{$reg['jugador_nombre']}'
                                            data-jugador_apellido='{$reg['jugador_apellido']}'
                                            data-fecha='{$reg['fecha']}'
                                            data-tipo='{$reg['tipo']}'
                                            data-diagnostico='{$reg['diagnostico']}'
                                            data-tratamiento='{$reg['tratamiento']}'
                                            data-fecha-recuperacion='{$reg['fecha_recuperacion']}'
                                            data-medico='{$reg['medico_tratante']}'
                                            data-observaciones='{$reg['observaciones']}'>
                                            <td>{$reg['id']}</td>
                                            <td>{$reg['jugador_nombre']} {$reg['jugador_apellido']}</td>
                                            <td>{$reg['fecha']}</td>
                                            <td>{$reg['tipo']}</td>
                                            <td>{$reg['diagnostico']}</td>
                                            <td>{$reg['tratamiento']}</td>
                                            <td>{$reg['fecha_recuperacion']}</td>
                                            <td>{$reg['medico_tratante']}</td>
                                            <td>{$reg['observaciones']}</td>
                                            <td>
                                              <a class='btn btn-sm btn-danger' href='../logica/eliminarHistorialM.php?usuario={$uActual}&id={$reg['id']}'>
                                                <i class='bx bx-trash'></i>
                                              </a>
                                            </td>
                                          </tr>";
                                        }
                                      } else {
                                        // Si no hay registros, mostramos el mensaje en la tabla
                                        echo "<tr><td colspan='10' class='text-center alert alert-warning'>No hay registros en el historial médico.</td></tr>";
                                      }
                                      echo"
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalRegistrarHistorial' tabindex='-1' aria-labelledby='modalRegistrarHistorialLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formRegistrarHistorial'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalRegistrarHistorialLabel'>Registrar Historial Médico</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <h6 class='mb-3'>Buscar Jugador</h6>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Cédula de Identidad</label>
                                    <div class='input-group'>
                                      <input type='text' name='ci_buscar' id='ci_buscar' class='form-control' placeholder='Ingrese CI del jugador'>
                                      <button class='btn btn-outline-primary' type='button' id='btnBuscarJugador'>Buscar</button>
                                    </div>
                                  </div>
                                </div>
                                <div id='datosJugador' class='d-none'>
                                  <h6 class='mb-3'>Datos del Jugador</h6>
                                  <div class='row'>
                                    <div class='col-md-4 mb-3'>
                                      <label class='form-label'>ID</label>
                                      <input type='text' name='idjugador' id='idjugador' class='form-control' readonly>
                                    </div>
                                    <div class='col-md-4 mb-3'>
                                      <label class='form-label'>Nombre</label>
                                      <input type='text' name='nombre_jugador' id='nombre_jugador' class='form-control' readonly>
                                    </div>
                                    <div class='col-md-4 mb-3'>
                                      <label class='form-label'>Apellido</label>
                                      <input type='text' name='apellido_jugador' id='apellido_jugador' class='form-control' readonly>
                                    </div>
                                  </div>
                                </div>
                                <div id='mensajeErrorCI' class='alert alert-danger d-none'>⚠️ No existe un jugador con ese número de cédula.</div>
                                <hr>
                                <h6 class='mb-3'>Datos del Historial Médico</h6>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha</label>
                                    <input type='date' name='fecha' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Tipo</label>
                                    <input type='text' name='tipo' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha de Recuperación</label>
                                    <input type='date' name='fecha_recuperacion' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Diagnóstico</label>
                                    <textarea name='diagnostico' class='form-control' rows='2' required></textarea>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Tratamiento</label>
                                    <textarea name='tratamiento' class='form-control' rows='2' required></textarea>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Médico Tratante</label>
                                    <input type='text' name='medico_tratante' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Observaciones</label>
                                    <textarea name='observaciones' class='form-control' rows='2'></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <input type='hidden' name='usuario' value='$uActual'>
                                <button type='submit' class='btn btn-success' id='btnGuardarHistorial' disabled>Guardar</button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

                      <div class='modal fade' id='modalEditarHistorial' tabindex='-1' aria-labelledby='modalEditarHistorialLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formEditarHistorial'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalEditarHistorialLabel'>Editar Historial Médico y Jugador</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <input type='hidden' name='historial_id' id='editar_historial_id'>
                                <input type='hidden' name='jugador_id' id='editar_jugador_id'>

                                <h6 class='mb-3'>Datos del Jugador</h6>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Nombre</label>
                                    <input type='text' name='jugador_nombre' id='editar_jugador_nombre' class='form-control' readonly>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Apellido</label>
                                    <input type='text' name='jugador_apellido' id='editar_jugador_apellido' class='form-control' readonly>
                                  </div>
                                </div>
                                <hr>
                                <h6 class='mb-3'>Datos del Historial Médico</h6>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha</label>
                                    <input type='date' name='fecha' id='editar_fecha' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Tipo</label>
                                    <input type='text' name='tipo' id='editar_tipo' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Médico Tratante</label>
                                    <input type='text' name='medico_tratante' id='editar_medico_tratante' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Diagnóstico</label>
                                    <textarea name='diagnostico' id='editar_diagnostico' class='form-control' rows='2' required></textarea>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Tratamiento</label>
                                    <textarea name='tratamiento' id='editar_tratamiento' class='form-control' rows='2' required></textarea>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Fecha de Recuperación</label>
                                    <input type='date' name='fecha_recuperacion' id='editar_fecha_recuperacion' class='form-control'>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Observaciones</label>
                                    <textarea name='observaciones' id='editar_observaciones' class='form-control' rows='2'></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <input type='hidden' name='usuario' value='$uActual'>
                                <button type='submit' class='btn btn-primary'>Guardar Cambios</button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
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
                </div>  
              </div>";
          }else if ($reg[8]=='4'){
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
                      <li class='menu-item active open'>
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
                          <li class='menu-item active'>
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
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Fichajes /</span> Registrar Historial Médico</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Listado de Historial Médico</a>
                              </li>
                              <li class='nav-item'>
                                <button type='button' class='nav-link btn btn-link' data-bs-toggle='modal' data-bs-target='#modalRegistrarHistorial'>
                                  Registrar Nuevo Historial Médico
                                </button>
                              </li>
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'>Listado de Historial Médico</h5>
                              <div class='card-body'>
                                <div class='input-group rounded mb-3'>
                                  <span class='input-group-text border-0' id='search-addon'>
                                    <i class='ri-search-line'></i>
                                  </span>
                                  <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                </div>";
                                $sql = "SELECT h.*, 
                                               j.nombre AS jugador_nombre, 
                                               j.apellido AS jugador_apellido, 
                                               j.ci AS jugador_ci,
                                               j.telefono AS jugador_telefono,
                                               j.fecha_nac AS jugador_fecha_nacimiento,
                                               j.nacionalidad AS jugador_nacionalidad
                                        FROM historial_medico h
                                        LEFT JOIN jugadores j ON h.idjugador = j.id
                                        WHERE h.estado = 'ACTIVO'
                                        ORDER BY h.id DESC";
                                $res = mysqli_query($conexion, $sql);
                                $num_rows = mysqli_num_rows($res);  // Guardamos el número de registros encontrados
                                echo"
                                <div class='table-responsive text-nowrap' style='overflow-x: auto; max-height: 800px;'>
                                  <table class='table table-hover'>
                                    <thead class='table-primary text-center'>
                                      <tr>
                                        <th>ID</th>
                                        <th>Jugador</th>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Diagnóstico</th>
                                        <th>Tratamiento</th>
                                        <th>Fecha Recuperación</th>
                                        <th>Médico Tratante</th>
                                        <th>Observaciones</th>
                                        <th>Acciones</th>
                                      </tr>
                                    </thead>
                                    <tbody id='tablaHistorial' class='table-border-bottom-0 buscar'>";
                                      // Si hay registros, mostramos la tabla con los datos
                                      if ($num_rows > 0) {
                                        while ($reg = mysqli_fetch_array($res)) {
                                          echo "<tr class='fila-editar-historial' style='cursor: pointer; text-align: center;'
                                            data-id='{$reg['id']}'
                                            data-idjugador='{$reg['idjugador']}'
                                            data-jugador_nombre='{$reg['jugador_nombre']}'
                                            data-jugador_apellido='{$reg['jugador_apellido']}'
                                            data-fecha='{$reg['fecha']}'
                                            data-tipo='{$reg['tipo']}'
                                            data-diagnostico='{$reg['diagnostico']}'
                                            data-tratamiento='{$reg['tratamiento']}'
                                            data-fecha-recuperacion='{$reg['fecha_recuperacion']}'
                                            data-medico='{$reg['medico_tratante']}'
                                            data-observaciones='{$reg['observaciones']}'>
                                            <td>{$reg['id']}</td>
                                            <td>{$reg['jugador_nombre']} {$reg['jugador_apellido']}</td>
                                            <td>{$reg['fecha']}</td>
                                            <td>{$reg['tipo']}</td>
                                            <td>{$reg['diagnostico']}</td>
                                            <td>{$reg['tratamiento']}</td>
                                            <td>{$reg['fecha_recuperacion']}</td>
                                            <td>{$reg['medico_tratante']}</td>
                                            <td>{$reg['observaciones']}</td>
                                            <td>
                                              <a class='btn btn-sm btn-danger' href='../logica/eliminarHistorialM.php?usuario={$uActual}&id={$reg['id']}'>
                                                <i class='bx bx-trash'></i>
                                              </a>
                                            </td>
                                          </tr>";
                                        }
                                      } else {
                                        // Si no hay registros, mostramos el mensaje en la tabla
                                        echo "<tr><td colspan='10' class='text-center alert alert-warning'>No hay registros en el historial médico.</td></tr>";
                                      }
                                      echo"
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalRegistrarHistorial' tabindex='-1' aria-labelledby='modalRegistrarHistorialLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formRegistrarHistorial'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalRegistrarHistorialLabel'>Registrar Historial Médico</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <h6 class='mb-3'>Buscar Jugador</h6>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Cédula de Identidad</label>
                                    <div class='input-group'>
                                      <input type='text' name='ci_buscar' id='ci_buscar' class='form-control' placeholder='Ingrese CI del jugador'>
                                      <button class='btn btn-outline-primary' type='button' id='btnBuscarJugador'>Buscar</button>
                                    </div>
                                  </div>
                                </div>
                                <div id='datosJugador' class='d-none'>
                                  <h6 class='mb-3'>Datos del Jugador</h6>
                                  <div class='row'>
                                    <div class='col-md-4 mb-3'>
                                      <label class='form-label'>ID</label>
                                      <input type='text' name='idjugador' id='idjugador' class='form-control' readonly>
                                    </div>
                                    <div class='col-md-4 mb-3'>
                                      <label class='form-label'>Nombre</label>
                                      <input type='text' name='nombre_jugador' id='nombre_jugador' class='form-control' readonly>
                                    </div>
                                    <div class='col-md-4 mb-3'>
                                      <label class='form-label'>Apellido</label>
                                      <input type='text' name='apellido_jugador' id='apellido_jugador' class='form-control' readonly>
                                    </div>
                                  </div>
                                </div>
                                <div id='mensajeErrorCI' class='alert alert-danger d-none'>⚠️ No existe un jugador con ese número de cédula.</div>
                                <hr>
                                <h6 class='mb-3'>Datos del Historial Médico</h6>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha</label>
                                    <input type='date' name='fecha' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Tipo</label>
                                    <input type='text' name='tipo' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha de Recuperación</label>
                                    <input type='date' name='fecha_recuperacion' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Diagnóstico</label>
                                    <textarea name='diagnostico' class='form-control' rows='2' required></textarea>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Tratamiento</label>
                                    <textarea name='tratamiento' class='form-control' rows='2' required></textarea>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Médico Tratante</label>
                                    <input type='text' name='medico_tratante' class='form-control' required>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Observaciones</label>
                                    <textarea name='observaciones' class='form-control' rows='2'></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <input type='hidden' name='usuario' value='$uActual'>
                                <button type='submit' class='btn btn-success' id='btnGuardarHistorial' disabled>Guardar</button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

                      <div class='modal fade' id='modalEditarHistorial' tabindex='-1' aria-labelledby='modalEditarHistorialLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formEditarHistorial'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalEditarHistorialLabel'>Editar Historial Médico y Jugador</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <input type='hidden' name='historial_id' id='editar_historial_id'>
                                <input type='hidden' name='jugador_id' id='editar_jugador_id'>

                                <h6 class='mb-3'>Datos del Jugador</h6>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Nombre</label>
                                    <input type='text' name='jugador_nombre' id='editar_jugador_nombre' class='form-control' readonly>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Apellido</label>
                                    <input type='text' name='jugador_apellido' id='editar_jugador_apellido' class='form-control' readonly>
                                  </div>
                                </div>
                                <hr>
                                <h6 class='mb-3'>Datos del Historial Médico</h6>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha</label>
                                    <input type='date' name='fecha' id='editar_fecha' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Tipo</label>
                                    <input type='text' name='tipo' id='editar_tipo' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Médico Tratante</label>
                                    <input type='text' name='medico_tratante' id='editar_medico_tratante' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Diagnóstico</label>
                                    <textarea name='diagnostico' id='editar_diagnostico' class='form-control' rows='2' required></textarea>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Tratamiento</label>
                                    <textarea name='tratamiento' id='editar_tratamiento' class='form-control' rows='2' required></textarea>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Fecha de Recuperación</label>
                                    <input type='date' name='fecha_recuperacion' id='editar_fecha_recuperacion' class='form-control'>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Observaciones</label>
                                    <textarea name='observaciones' id='editar_observaciones' class='form-control' rows='2'></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <input type='hidden' name='usuario' value='$uActual'>
                                <button type='submit' class='btn btn-primary'>Guardar Cambios</button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
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
                </div>  
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
        const btnBuscar = document.getElementById('btnBuscarJugador');
        const btnGuardar = document.getElementById('btnGuardarHistorial');
        const form = document.getElementById('formRegistrarHistorial');

        // Desactivar el botón "Guardar" al iniciar
        if (btnGuardar) btnGuardar.disabled = true;

        btnBuscar.addEventListener('click', function () {
          const ci = document.getElementById('ci_buscar').value.trim();

          if (ci === '') {
           alert('Ingrese un número de cédula.');
          }

          fetch('../logica/buscar_jugador_por_ci.php?ci=' + ci)
            .then(res => res.json())
            .then(data => {
              if (data.existe) {
                document.getElementById('idjugador').value = data.id;
                document.getElementById('nombre_jugador').value = data.nombre;
                document.getElementById('apellido_jugador').value = data.apellido;

                document.getElementById('datosJugador').classList.remove('d-none');
                document.getElementById('mensajeErrorCI').classList.add('d-none');

                // Habilitar botón guardar
                btnGuardar.disabled = false;
              } else {
                document.getElementById('datosJugador').classList.add('d-none');
                document.getElementById('mensajeErrorCI').classList.remove('d-none');

                // Limpiar campos por si había datos anteriores
                document.getElementById('idjugador').value = '';
                document.getElementById('nombre_jugador').value = '';
                document.getElementById('apellido_jugador').value = '';

                // Deshabilitar botón guardar
                btnGuardar.disabled = true;
              }
            })
            .catch(err => {
              console.error('Error al buscar jugador', err);
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo buscar al jugador. Intente de nuevo más tarde.',
              });
            });
        });

        // Validación al enviar el formulario
        form.addEventListener('submit', function (e) {
          const idJugador = document.getElementById('idjugador').value.trim();

          if (idJugador === '') {
            e.preventDefault();
            Swal.fire({
              icon: 'error',
              title: 'Jugador no encontrado',
              text: 'Debe buscar y seleccionar un jugador antes de registrar el historial médico.',
            });
          }
        });
      });
    </script>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("formRegistrarHistorial").addEventListener("submit", function (e) {
          e.preventDefault();

          const form = e.target;
          const datos = new FormData(form);

          fetch("../logica/registrarHistorialMedico.php", {
            method: "POST",
            body: datos
          })
          .then(res => res.json())
          .then(data => {
            if (data.exito) {
              // Cerrar el modal
              const modal = bootstrap.Modal.getInstance(document.getElementById('modalRegistrarHistorial'));
              modal.hide();

              // Limpiar el formulario
              form.reset();
              Swal.fire({
                icon: 'success',
                title: '',
                text: 'Historial Médico registrado correctamente',
              });

              // 🔁 Recargar la página inmediatamente después del registro
              location.reload();

              // Agregar la nueva fila a la tabla (esto ya no se verá, porque la página se recargó)
              const tabla = document.getElementById("tablaHistorial");
              if (tabla) {
                const nuevaFila = `
                  <tr class="text-center" data-id="${data.id}">
                    <td>${data.id}</td>
                    <td>${data.jugador_nombre} ${data.jugador_apellido}</td>
                    <td>${data.fecha}</td>
                    <td>${data.tipo}</td>
                    <td>${data.diagnostico}</td>
                    <td>${data.tratamiento}</td>
                    <td>${data.fecha_recuperacion}</td>
                    <td>${data.medico_tratante}</td>
                    <td>${data.observaciones}</td>
                    <td>
                      <a class='btn btn-sm btn-danger' href='../logica/eliminarHistorialM.php?usuario=${data.usuario}&id=${data.id}'>
                        <i class='bx bx-trash'></i>
                      </a>
                    </td>
                  </tr>
                `;
                tabla.insertAdjacentHTML("afterbegin", nuevaFila);
              } else {
                console.error("Elemento 'tablaHistorial' no encontrado.");
              }
            } else {
              alert("Error: " + data.mensaje);
            }
          })
          .catch(error => {
            console.error("Error en el registro:", error);
            alert("Ocurrió un error al registrar el historial médico.");
          });
        });
      });
    </script>

    <script>
      $(document).ready(function () {
        $(document).on('dblclick', '.fila-editar-historial', function () {
          const fila = $(this);

          // Capturar los datos de la fila desde los atributos data-*
          const historialId = fila.data('id') || '';
          const idJugador = fila.data('idjugador') || '';
          const nombre = fila.data('jugador_nombre') || '';
          const apellido = fila.data('jugador_apellido') || '';
          const fecha = fila.data('fecha') || '';
          const tipo = fila.data('tipo') || '';
          const diagnostico = fila.data('diagnostico') || '';
          const tratamiento = fila.data('tratamiento') || '';
          const fechaRecuperacion = fila.data('fecha-recuperacion') || '';
          const medico = fila.data('medico') || '';
          const observaciones = fila.data('observaciones') || '';

          // Asignar los valores a los campos del modal
          $('#editar_historial_id').val(historialId);
          $('#editar_jugador_id').val(idJugador);
          $('#editar_jugador_nombre').val(nombre);
          $('#editar_jugador_apellido').val(apellido);
          $('#editar_fecha').val(fecha);
          $('#editar_tipo').val(tipo);
          $('#editar_diagnostico').val(diagnostico);
          $('#editar_tratamiento').val(tratamiento);
          $('#editar_fecha_recuperacion').val(fechaRecuperacion);
          $('#editar_medico_tratante').val(medico);
          $('#editar_observaciones').val(observaciones);

          // Mostrar el modal
          $('#modalEditarHistorial').modal('show');
        });
      });

      // Enviar el formulario por AJAX
      document.getElementById('formEditarHistorial').addEventListener('submit', function(e) {
        e.preventDefault(); // Evita el envío normal del formulario

        const formData = new FormData(this);

        fetch('../logica/editarHistorialM.php', {
          method: 'POST',
          body: formData
        })
        .then(res => res.text())
        .then(respuesta => {
          if (respuesta.trim() === 'ok') {
            alert('Historial actualizado correctamente.');
            location.reload(); // Recarga la tabla
          } else {
            alert('Error al actualizar: ' + respuesta);
          }
        })
        .catch(error => {
          console.error('Error en la petición:', error);
          alert('Ocurrió un error al procesar la solicitud.');
        });
      });
    </script>

  </body>
</html>