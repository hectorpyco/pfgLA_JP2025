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
                          <li class='menu-item active'>
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
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Fichajes /</span> Registrar Fichajes</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Listado de Fichajes</a>
                              </li>
                              <li class='nav-item'>
                                <button type='button' disabled class='nav-link btn btn-link' data-bs-toggle='modal' data-bs-target='#modalRegistrarFichaje'>
                                  Registrar Nuevo Fichaje
                                </button>
                              </li>
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'>Listado de Fichajes de la Liga</h5>
                              <div class='card-body'>
                                <div class='input-group rounded mb-3'>
                                  <span class='input-group-text border-0' id='search-addon'>
                                    <i class='ri-search-line'></i>
                                  </span>
                                  <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                </div>";
                                $sql = "SELECT f.*, 
                                               j.nombre AS jugador_nombre, 
                                               j.apellido AS jugador_apellido, 
                                               j.ci AS jugador_ci,
                                               j.telefono AS jugador_telefono,
                                               j.fecha_nac AS jugador_fecha_nacimiento,
                                               j.nacionalidad AS jugador_nacionalidad,
                                               co.descripcion AS club_origen, 
                                               cd.descripcion AS club_destino
                                        FROM fichajes f
                                        LEFT JOIN jugadores j ON f.idjugador = j.id
                                        LEFT JOIN clubes co ON f.idclub_origen = co.id
                                        LEFT JOIN clubes cd ON f.idclub_destino = cd.id
                                        WHERE f.estado = 'ACTIVO'
                                        ORDER BY f.id DESC";
                                $res = mysqli_query($conexion, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                  echo "<div class='table-responsive text-nowrap' style='overflow-x: auto; max-height: 800px;'>
                                    <table class='table table-hover'>
                                      <thead class='table-primary text-center'>
                                        <tr>
                                          <th>ID</th>
                                          <th>Jugador</th>
                                          <th>Fecha</th>
                                          <th>Descripción</th>
                                          <th>Club Origen</th>
                                          <th>Club Destino</th>
                                          <th>Tipo</th>
                                          <th>Duración</th>
                                          <th>Costo</th>
                                          <th>Salario</th>
                                          <th>Cláusula</th>
                                          <th>Observación</th>
                                          <th>Estado</th>
                                          <th>Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody id='tablaFichajes' class='table-border-bottom-0 buscar'>";
                                        while ($reg = mysqli_fetch_array($res)) {
                                          echo "<tr class='fila-editar-fichaje' style='cursor: pointer; text-align: center;'
                                            data-id='{$reg['id']}'
                                            data-idjugador='{$reg['idjugador']}'
                                            data-nombre='{$reg['jugador_nombre']}'
                                            data-apellido='{$reg['jugador_apellido']}'
                                            data-ci='{$reg['jugador_ci']}'
                                            data-telefono='{$reg['jugador_telefono']}'
                                            data-fechanac='{$reg['jugador_fecha_nacimiento']}'
                                            data-nacionalidad='{$reg['jugador_nacionalidad']}'
                                            data-fecha='{$reg['fecha']}'
                                            data-descripcion='{$reg['descripcion']}'
                                            data-idclub_origen='{$reg['idclub_origen']}'
                                            data-idclub_destino='{$reg['idclub_destino']}'
                                            data-tipo_fichaje='{$reg['tipo_fichaje']}'
                                            data-duracion_contrato='{$reg['duracion_contrato']}'
                                            data-costo_transferencia='{$reg['costo_transferencia']}'
                                            data-salario_anual='{$reg['salario_anual']}'
                                            data-clausula_rescision='{$reg['clausula_rescision']}'
                                            data-observacion='{$reg['observacion']}'
                                            data-estado_fichaje='{$reg['estado_fichaje']}'>
                                            
                                            <td>{$reg['id']}</td>
                                            <td>{$reg['jugador_nombre']} {$reg['jugador_apellido']}</td>
                                            <td>{$reg['fecha']}</td>
                                            <td>{$reg['descripcion']}</td>
                                            <td>{$reg['club_origen']}</td>
                                            <td>{$reg['club_destino']}</td>
                                            <td>{$reg['tipo_fichaje']}</td>
                                            <td>{$reg['duracion_contrato']}</td>
                                            <td>{$reg['costo_transferencia']}</td>
                                            <td>{$reg['salario_anual']}</td>
                                            <td>{$reg['clausula_rescision']}</td>
                                            <td>{$reg['observacion']}</td>
                                            <td>{$reg['estado_fichaje']}</td>
                                            <td>
                                              <a class='btn btn-sm btn-danger' href='../logica/eliminarFichaje.php?usuario={$uActual}&id={$reg['id']}'>
                                                <i class='bx bx-trash'></i>
                                              </a>
                                            </td>
                                          </tr>";
                                        }
                                      echo "</tbody>
                                    </table>
                                  </div>";
                                } else {
                                  echo "<div class='alert alert-warning' role='alert'>No hay ningún registro.</div>";
                                } echo"
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalRegistrarFichaje' tabindex='-1' aria-labelledby='modalRegistrarFichajeLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formRegistrarFichaje'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalRegistrarFichajeLabel'>Registrar Fichaje y Jugador</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>

                                <h6 class='mb-3'>Datos del Jugador</h6>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Nombre</label>
                                    <input type='text' name='jugador_nombre' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Apellido</label>
                                    <input type='text' name='jugador_apellido' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Cédula de Identidad</label>
                                    <input type='text' name='jugador_ci' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Teléfono</label>
                                    <input type='text' name='jugador_telefono' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha de Nacimiento</label>
                                    <input type='date' name='jugador_fecha_nac' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Nacionalidad</label>
                                    <input type='text' name='jugador_nacionalidad' class='form-control' required>
                                  </div>
                                </div>

                                <hr>
                                <h6 class='mb-3'>Datos del Fichaje</h6>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha del Fichaje</label>
                                    <input type='date' name='fichaje_fecha' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Descripción</label>
                                    <select name='fichaje_descripcion' class='form-select' required>
                                      <option value='CONTRATO'>CONTRATO</option>
                                      <option value='PRESTAMO'>PRESTAMO</option>
                                      <option value='TRANSFERENCIA'>TRANSFERENCIA</option>
                                    </select>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>TIPO DE FICHAJE</label>
                                    <select name='fichaje_tipo' class='form-select' required>
                                      <option value='FICHAJE DE JUGADOR NUEVO'>FICHAJE DE JUGADOR NUEVO</option>
                                      <option value='FICHAJE POR TRANSFERENCIA'>FICHAJE POR TRANSFERENCIA</option>
                                      <option value='FICHAJE DE MENOR DE EDAD'>FICHAJE DE MENOR DE EDAD</option>
                                    </select>
                                  </div>
                                </div>

                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Club Origen</label>
                                    <select name='fichaje_club_origen' class='form-control' required>";
                                        $sql = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r["id"]}'>{$r["descripcion"]}</option>";
                                        }echo"
                                    </select>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Club Destino</label>
                                    <select name='fichaje_club_destino' class='form-control' required>";
                                        $sql = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r["id"]}'>{$r["descripcion"]}</option>";
                                        }echo"
                                    </select>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Duración del Contrato (meses)</label>
                                    <input type='text' name='fichaje_duracion' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Costo de Transferencia (Gs)</label>
                                    <input type='text' name='fichaje_costo' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Salario Anual ($)</label>
                                    <input type='text' name='fichaje_salario' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Cláusula de Rescisión ($)</label>
                                    <input type='text' name='fichaje_clausula' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Estado de Fichaje</label>
                                    <select name='fichaje_estado_fichaje' class='form-control' required>
                                      <option value='EN CURSO'>EN CURSO</option>
                                      <option value='SUSPENDIDO'>SUSPENDIDO</option>
                                      <option value='FINALIZADO'>FINALIZADO</option>
                                    </select>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Observaciones</label>
                                    <textarea name='fichaje_observacion' class='form-control' rows='2'></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <input type='hidden' name='usuario' value='$uActual'>
                                <button type='submit' class='btn btn-success'>Guardar</button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>


                      <div class='modal fade' id='modalEditarFichaje' tabindex='-1' aria-labelledby='modalEditarFichajeLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formEditarFichaje'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalEditarFichajeLabel'>Editar Fichaje y Jugador</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <input type='hidden' name='fichaje_id' id='editar_fichaje_id'>
                                <input type='hidden' name='jugador_id' id='editar_jugador_id'>

                                <h6 class='mb-3'>Datos del Jugador</h6>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Nombre</label>
                                    <input type='text' name='jugador_nombre' id='editar_jugador_nombre' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Apellido</label>
                                    <input type='text' name='jugador_apellido' id='editar_jugador_apellido' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Cédula de Identidad</label>
                                    <input type='text' name='jugador_ci' id='editar_jugador_ci' class='form-control' required>
                                  </div>
                                </div>

                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Teléfono</label>
                                    <input type='text' name='jugador_telefono' id='editar_jugador_telefono' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha de Nacimiento</label>
                                    <input type='date' name='jugador_fecha_nac' id='editar_jugador_fecha_nac' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Nacionalidad</label>
                                    <input type='text' name='jugador_nacionalidad' id='editar_jugador_nacionalidad' class='form-control' required>
                                  </div>
                                </div>

                                <hr>
                                <h6 class='mb-3'>Datos del Fichaje</h6>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha del Fichaje</label>
                                    <input type='date' name='fichaje_fecha' id='editar_fichaje_fecha' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Descripción</label>
                                    <select name='fichaje_descripcion' id='editar_fichaje_descripcion' class='form-select' required>
                                      <option value='CONTRATO'>CONTRATO</option>
                                      <option value='PRESTAMO'>PRESTAMO</option>
                                      <option value='TRANSFERENCIA'>TRANSFERENCIA</option>
                                    </select>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>TIPO DE FICHAJE</label>
                                    <select name='fichaje_tipo' id='editar_fichaje_tipo' class='form-select' required>
                                      <option value='FICHAJE DE JUGADOR NUEVO'>FICHAJE DE JUGADOR NUEVO</option>
                                      <option value='FICHAJE POR TRANSFERENCIA'>FICHAJE POR TRANSFERENCIA</option>
                                      <option value='FICHAJE DE MENOR DE EDAD'>FICHAJE DE MENOR DE EDAD</option>
                                    </select>
                                  </div>
                                </div>

                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Club Origen</label>
                                    <select name='fichaje_club_origen' id='editar_fichaje_club_origen' class='form-control' required>";
                                        $sql = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r['id']}'>{$r['descripcion']}</option>";
                                        }
                                        echo"
                                    </select>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Club Destino</label>
                                    <select name='fichaje_club_destino' id='editar_fichaje_club_destino' class='form-control' required>";
                                        $sql = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r['id']}'>{$r['descripcion']}</option>";
                                        }echo"
                                    </select>
                                  </div>
                                </div>

                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Duración del Contrato (meses)</label>
                                    <input type='text' name='fichaje_duracion' id='editar_fichaje_duracion' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Costo de Transferencia (Gs)</label>
                                    <input type='text' name='fichaje_costo' id='editar_fichaje_costo' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Salario Anual ($)</label>
                                    <input type='text' name='fichaje_salario' id='editar_fichaje_salario' class='form-control' required>
                                  </div>
                                </div>

                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Cláusula de Rescisión ($)</label>
                                    <input type='text' name='fichaje_clausula' id='editar_fichaje_clausula' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Estado de Fichaje</label>
                                    <select name='fichaje_estado_fichaje' id='editar_fichaje_estado_fichaje' class='form-control' required>
                                      <option value='EN CURSO'>EN CURSO</option>
                                      <option value='SUSPENDIDO'>SUSPENDIDO</option>
                                      <option value='FINALIZADO'>FINALIZADO</option>
                                    </select>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Observaciones</label>
                                    <textarea name='fichaje_observacion' id='editar_fichaje_observacion' class='form-control' rows='2'></textarea>
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
                      <li class='menu-item active open'>
                        <a href='javascript:void(0);' class='menu-link menu-toggle'>
                          <i class='menu-icon tf-icons bx bxs-spreadsheet'></i>
                          <div>Fichajes</div>
                        </a>
                        <ul class='menu-sub'>
                          <li class='menu-item active'>
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
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Fichajes /</span> Registrar Fichajes</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Listado de Fichajes</a>
                              </li>
                              <li class='nav-item'>
                                <button type='button' class='nav-link btn btn-link' data-bs-toggle='modal' data-bs-target='#modalRegistrarFichaje'>
                                  Registrar Nuevo Fichaje
                                </button>
                              </li>
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'>Listado de Fichajes de la Liga</h5>
                              <div class='card-body'>
                                <div class='input-group rounded mb-3'>
                                  <span class='input-group-text border-0' id='search-addon'>
                                    <i class='ri-search-line'></i>
                                  </span>
                                  <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                </div>";
                                $sql = "SELECT f.*, 
                                               j.nombre AS jugador_nombre, 
                                               j.apellido AS jugador_apellido, 
                                               j.ci AS jugador_ci,
                                               j.telefono AS jugador_telefono,
                                               j.fecha_nac AS jugador_fecha_nacimiento,
                                               j.nacionalidad AS jugador_nacionalidad,
                                               co.descripcion AS club_origen, 
                                               cd.descripcion AS club_destino
                                        FROM fichajes f
                                        LEFT JOIN jugadores j ON f.idjugador = j.id
                                        LEFT JOIN clubes co ON f.idclub_origen = co.id
                                        LEFT JOIN clubes cd ON f.idclub_destino = cd.id
                                        WHERE f.estado = 'ACTIVO'
                                        ORDER BY f.id DESC";
                                $res = mysqli_query($conexion, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                  echo "<div class='table-responsive text-nowrap' style='overflow-x: auto; max-height: 800px;'>
                                    <table class='table table-hover'>
                                      <thead class='table-primary text-center'>
                                        <tr>
                                          <th>ID</th>
                                          <th>Jugador</th>
                                          <th>Fecha</th>
                                          <th>Descripción</th>
                                          <th>Club Origen</th>
                                          <th>Club Destino</th>
                                          <th>Tipo</th>
                                          <th>Duración</th>
                                          <th>Costo</th>
                                          <th>Salario</th>
                                          <th>Cláusula</th>
                                          <th>Observación</th>
                                          <th>Estado</th>
                                          <th>Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody id='tablaFichajes' class='table-border-bottom-0 buscar'>";
                                        while ($reg = mysqli_fetch_array($res)) {
                                          echo "<tr class='fila-editar-fichaje' style='cursor: pointer; text-align: center;'
                                            data-id='{$reg['id']}'
                                            data-idjugador='{$reg['idjugador']}'
                                            data-nombre='{$reg['jugador_nombre']}'
                                            data-apellido='{$reg['jugador_apellido']}'
                                            data-ci='{$reg['jugador_ci']}'
                                            data-telefono='{$reg['jugador_telefono']}'
                                            data-fechanac='{$reg['jugador_fecha_nacimiento']}'
                                            data-nacionalidad='{$reg['jugador_nacionalidad']}'
                                            data-fecha='{$reg['fecha']}'
                                            data-descripcion='{$reg['descripcion']}'
                                            data-idclub_origen='{$reg['idclub_origen']}'
                                            data-idclub_destino='{$reg['idclub_destino']}'
                                            data-tipo_fichaje='{$reg['tipo_fichaje']}'
                                            data-duracion_contrato='{$reg['duracion_contrato']}'
                                            data-costo_transferencia='{$reg['costo_transferencia']}'
                                            data-salario_anual='{$reg['salario_anual']}'
                                            data-clausula_rescision='{$reg['clausula_rescision']}'
                                            data-observacion='{$reg['observacion']}'
                                            data-estado_fichaje='{$reg['estado_fichaje']}'>
                                            
                                            <td>{$reg['id']}</td>
                                            <td>{$reg['jugador_nombre']} {$reg['jugador_apellido']}</td>
                                            <td>{$reg['fecha']}</td>
                                            <td>{$reg['descripcion']}</td>
                                            <td>{$reg['club_origen']}</td>
                                            <td>{$reg['club_destino']}</td>
                                            <td>{$reg['tipo_fichaje']}</td>
                                            <td>{$reg['duracion_contrato']}</td>
                                            <td>{$reg['costo_transferencia']}</td>
                                            <td>{$reg['salario_anual']}</td>
                                            <td>{$reg['clausula_rescision']}</td>
                                            <td>{$reg['observacion']}</td>
                                            <td>{$reg['estado_fichaje']}</td>
                                            <td>
                                              <a class='btn btn-sm btn-danger' href='../logica/eliminarFichaje.php?usuario={$uActual}&id={$reg['id']}'>
                                                <i class='bx bx-trash'></i>
                                              </a>
                                            </td>
                                          </tr>";
                                        }
                                      echo "</tbody>
                                    </table>
                                  </div>";
                                } else {
                                  echo "<div class='alert alert-warning' role='alert'>No hay ningún registro.</div>";
                                } echo"
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalRegistrarFichaje' tabindex='-1' aria-labelledby='modalRegistrarFichajeLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formRegistrarFichaje'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalRegistrarFichajeLabel'>Registrar Fichaje y Jugador</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>

                                <h6 class='mb-3'>Datos del Jugador</h6>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Nombre</label>
                                    <input type='text' name='jugador_nombre' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Apellido</label>
                                    <input type='text' name='jugador_apellido' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Cédula de Identidad</label>
                                    <input type='text' name='jugador_ci' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Teléfono</label>
                                    <input type='text' name='jugador_telefono' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha de Nacimiento</label>
                                    <input type='date' name='jugador_fecha_nac' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Nacionalidad</label>
                                    <input type='text' name='jugador_nacionalidad' class='form-control' required>
                                  </div>
                                </div>

                                <hr>
                                <h6 class='mb-3'>Datos del Fichaje</h6>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha del Fichaje</label>
                                    <input type='date' name='fichaje_fecha' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Descripción</label>
                                    <select name='fichaje_descripcion' class='form-select' required>
                                      <option value='CONTRATO'>CONTRATO</option>
                                      <option value='PRESTAMO'>PRESTAMO</option>
                                      <option value='TRANSFERENCIA'>TRANSFERENCIA</option>
                                    </select>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>TIPO DE FICHAJE</label>
                                    <select name='fichaje_tipo' class='form-select' required>
                                      <option value='FICHAJE DE JUGADOR NUEVO'>FICHAJE DE JUGADOR NUEVO</option>
                                      <option value='FICHAJE POR TRANSFERENCIA'>FICHAJE POR TRANSFERENCIA</option>
                                      <option value='FICHAJE DE MENOR DE EDAD'>FICHAJE DE MENOR DE EDAD</option>
                                    </select>
                                  </div>
                                </div>

                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Club Origen</label>
                                    <select name='fichaje_club_origen' class='form-control' required>";
                                        $sql = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r["id"]}'>{$r["descripcion"]}</option>";
                                        }echo"
                                    </select>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Club Destino</label>
                                    <select name='fichaje_club_destino' class='form-control' required>";
                                        $sql = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r["id"]}'>{$r["descripcion"]}</option>";
                                        }echo"
                                    </select>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Duración del Contrato (meses)</label>
                                    <input type='text' name='fichaje_duracion' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Costo de Transferencia (Gs)</label>
                                    <input type='text' name='fichaje_costo' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Salario Anual ($)</label>
                                    <input type='text' name='fichaje_salario' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Cláusula de Rescisión ($)</label>
                                    <input type='text' name='fichaje_clausula' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Estado de Fichaje</label>
                                    <select name='fichaje_estado_fichaje' class='form-control' required>
                                      <option value='EN CURSO'>EN CURSO</option>
                                      <option value='SUSPENDIDO'>SUSPENDIDO</option>
                                      <option value='FINALIZADO'>FINALIZADO</option>
                                    </select>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Observaciones</label>
                                    <textarea name='fichaje_observacion' class='form-control' rows='2'></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <input type='hidden' name='usuario' value='$uActual'>
                                <button type='submit' class='btn btn-success'>Guardar</button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>


                      <div class='modal fade' id='modalEditarFichaje' tabindex='-1' aria-labelledby='modalEditarFichajeLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form id='formEditarFichaje'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalEditarFichajeLabel'>Editar Fichaje y Jugador</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <input type='hidden' name='fichaje_id' id='editar_fichaje_id'>
                                <input type='hidden' name='jugador_id' id='editar_jugador_id'>

                                <h6 class='mb-3'>Datos del Jugador</h6>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Nombre</label>
                                    <input type='text' name='jugador_nombre' id='editar_jugador_nombre' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Apellido</label>
                                    <input type='text' name='jugador_apellido' id='editar_jugador_apellido' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Cédula de Identidad</label>
                                    <input type='text' name='jugador_ci' id='editar_jugador_ci' class='form-control' required>
                                  </div>
                                </div>

                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Teléfono</label>
                                    <input type='text' name='jugador_telefono' id='editar_jugador_telefono' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha de Nacimiento</label>
                                    <input type='date' name='jugador_fecha_nac' id='editar_jugador_fecha_nac' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Nacionalidad</label>
                                    <input type='text' name='jugador_nacionalidad' id='editar_jugador_nacionalidad' class='form-control' required>
                                  </div>
                                </div>

                                <hr>
                                <h6 class='mb-3'>Datos del Fichaje</h6>
                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Fecha del Fichaje</label>
                                    <input type='date' name='fichaje_fecha' id='editar_fichaje_fecha' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Descripción</label>
                                    <select name='fichaje_descripcion' id='editar_fichaje_descripcion' class='form-select' required>
                                      <option value='CONTRATO'>CONTRATO</option>
                                      <option value='PRESTAMO'>PRESTAMO</option>
                                      <option value='TRANSFERENCIA'>TRANSFERENCIA</option>
                                    </select>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>TIPO DE FICHAJE</label>
                                    <select name='fichaje_tipo' id='editar_fichaje_tipo' class='form-select' required>
                                      <option value='FICHAJE DE JUGADOR NUEVO'>FICHAJE DE JUGADOR NUEVO</option>
                                      <option value='FICHAJE POR TRANSFERENCIA'>FICHAJE POR TRANSFERENCIA</option>
                                      <option value='FICHAJE DE MENOR DE EDAD'>FICHAJE DE MENOR DE EDAD</option>
                                    </select>
                                  </div>
                                </div>

                                <div class='row'>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Club Origen</label>
                                    <select name='fichaje_club_origen' id='editar_fichaje_club_origen' class='form-control' required>";
                                        $sql = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r['id']}'>{$r['descripcion']}</option>";
                                        }
                                        echo"
                                    </select>
                                  </div>
                                  <div class='col-md-6 mb-3'>
                                    <label class='form-label'>Club Destino</label>
                                    <select name='fichaje_club_destino' id='editar_fichaje_club_destino' class='form-control' required>";
                                        $sql = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                        $res = mysqli_query($conexion, $sql);
                                        while ($r = mysqli_fetch_assoc($res)) {
                                          echo "<option value='{$r['id']}'>{$r['descripcion']}</option>";
                                        }echo"
                                    </select>
                                  </div>
                                </div>

                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Duración del Contrato (meses)</label>
                                    <input type='text' name='fichaje_duracion' id='editar_fichaje_duracion' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Costo de Transferencia (Gs)</label>
                                    <input type='text' name='fichaje_costo' id='editar_fichaje_costo' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Salario Anual ($)</label>
                                    <input type='text' name='fichaje_salario' id='editar_fichaje_salario' class='form-control' required>
                                  </div>
                                </div>

                                <div class='row'>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Cláusula de Rescisión ($)</label>
                                    <input type='text' name='fichaje_clausula' id='editar_fichaje_clausula' class='form-control' required>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Estado de Fichaje</label>
                                    <select name='fichaje_estado_fichaje' id='editar_fichaje_estado_fichaje' class='form-control' required>
                                      <option value='EN CURSO'>EN CURSO</option>
                                      <option value='SUSPENDIDO'>SUSPENDIDO</option>
                                      <option value='FINALIZADO'>FINALIZADO</option>
                                    </select>
                                  </div>
                                  <div class='col-md-4 mb-3'>
                                    <label class='form-label'>Observaciones</label>
                                    <textarea name='fichaje_observacion' id='editar_fichaje_observacion' class='form-control' rows='2'></textarea>
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
      document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("formRegistrarFichaje").addEventListener("submit", function (e) {
          e.preventDefault();

          const form = e.target;
          const datos = new FormData(form);

          fetch("../logica/registrarFichajeJugador.php", {
            method: "POST",
            body: datos
          })
          .then(res => res.json())
          .then(data => {
            if (data && data.exito) {
              const modal = bootstrap.Modal.getInstance(document.getElementById('modalRegistrarFichaje'));
              if (modal) modal.hide();
              form.reset();
              location.reload();
              alert("Fichaje y jugador registrados correctamente.");

              if (data.fichaje) {
                const tablaFichajes = document.getElementById("tablaFichajes");

                if (tablaFichajes) {
                  const nuevaFila = `
                    <tr class='fila-editar-fichaje' style='cursor: pointer; text-align: center;'
                      data-id='${data.fichaje.id}'
                      data-idjugador='${data.fichaje.idjugador}'
                      data-nombre='${data.fichaje.jugador_nombre}'
                      data-apellido='${data.fichaje.jugador_apellido}'
                      data-ci='${data.fichaje.jugador_ci}'
                      data-telefono='${data.fichaje.jugador_telefono}'
                      data-fechanac='${data.fichaje.jugador_fecha_nacimiento}'
                      data-nacionalidad='${data.fichaje.jugador_nacionalidad}'
                      data-fecha='${data.fichaje.fecha}'
                      data-descripcion='${data.fichaje.descripcion}'
                      data-idclub_origen='${data.fichaje.idclub_origen}'
                      data-idclub_destino='${data.fichaje.idclub_destino}'
                      data-tipo_fichaje='${data.fichaje.tipo_fichaje}'
                      data-duracion_contrato='${data.fichaje.duracion_contrato}'
                      data-costo_transferencia='${data.fichaje.costo_transferencia}'
                      data-salario_anual='${data.fichaje.salario_anual}'
                      data-clausula_rescision='${data.fichaje.clausula_rescision}'
                      data-observacion='${data.fichaje.observacion}'
                      data-estado_fichaje='${data.fichaje.estado_fichaje}'>
                      <td>${data.fichaje.id}</td>
                      <td>${data.fichaje.jugador_nombre} ${data.fichaje.jugador_apellido}</td>
                      <td>${data.fichaje.fecha}</td>
                      <td>${data.fichaje.descripcion}</td>
                      <td>${data.fichaje.club_origen}</td>
                      <td>${data.fichaje.club_destino}</td>
                      <td>${data.fichaje.tipo_fichaje}</td>
                      <td>${data.fichaje.duracion_contrato}</td>
                      <td>${data.fichaje.costo_transferencia}</td>
                      <td>${data.fichaje.salario_anual}</td>
                      <td>${data.fichaje.clausula_rescision}</td>
                      <td>${data.fichaje.observacion}</td>
                      <td>${data.fichaje.estado_fichaje}</td>
                      <td>
                        <a class='btn btn-sm btn-danger' href='../logica/eliminarFichaje.php?usuario=${data.fichaje.usuario}&id=${data.fichaje.id}'>
                          <i class='bx bx-trash'></i>
                        </a>
                      </td>
                    </tr>`;

                  // Agregar la nueva fila al inicio del tbody
                  tablaFichajes.insertAdjacentHTML("afterbegin", nuevaFila);
                } else {
                  console.error("Elemento con id 'tablaFichajes' no encontrado.");
                }
              }
            } else {
              alert("Error: " + (data.mensaje || "Error desconocido."));
            }
          })
          .catch(error => {
            console.error("Error en el registro del fichaje:", error);
            alert("Hubo un error al registrar el fichaje.");
          });
        });
      });
    </script>
    
    <script>
      $(document).ready(function () {
        $(document).on('dblclick', '.fila-editar-fichaje', function () {
          const fichaje_id = $(this).data('id'); // <-- corregido
          const jugador_id = $(this).data('idjugador');

          const club_origen_id = $(this).data('idclub_origen'); // 
          const club_destino_id = $(this).data('idclub_destino'); // 

          // Datos del jugador
          $('#editar_jugador_id').val(jugador_id);
          $('#editar_jugador_nombre').val($(this).data('nombre'));
          $('#editar_jugador_apellido').val($(this).data('apellido'));
          $('#editar_jugador_ci').val($(this).data('ci'));
          $('#editar_jugador_telefono').val($(this).data('telefono'));
          $('#editar_jugador_fecha_nac').val($(this).data('fechanac'));
          $('#editar_jugador_nacionalidad').val($(this).data('nacionalidad'));

          // Datos del fichaje
          $('#editar_fichaje_id').val(fichaje_id);
          $('#editar_fichaje_fecha').val($(this).data('fecha'));
          $('#editar_fichaje_descripcion').val($(this).data('descripcion'));
          $('#editar_fichaje_tipo').val($.trim($(this).data('tipo_fichaje')));
          $('#editar_fichaje_duracion').val($(this).data('duracion_contrato'));
          $('#editar_fichaje_costo').val($(this).data('costo_transferencia'));
          $('#editar_fichaje_salario').val($(this).data('salario_anual'));
          $('#editar_fichaje_clausula').val($(this).data('clausula_rescision'));
          $('#editar_fichaje_observacion').val($(this).data('observacion'));
          $('#editar_fichaje_estado_fichaje').val($(this).data('estado_fichaje'));

          // Cargar opciones de clubes por AJAX
          $.ajax({
            url: '../logica/get_clubes.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
              const selectOrigen = $('#editar_fichaje_club_origen');
              const selectDestino = $('#editar_fichaje_club_destino');

              selectOrigen.empty();
              selectDestino.empty();

              selectOrigen.append('<option value="">Seleccione club origen</option>');
              selectDestino.append('<option value="">Seleccione club destino</option>');

              data.clubes.forEach(function (club) {
                const selectedOrigen = club.id == club_origen_id ? 'selected' : '';
                const selectedDestino = club.id == club_destino_id ? 'selected' : '';

                selectOrigen.append(`<option value="${club.id}" ${selectedOrigen}>${club.descripcion}</option>`);
                selectDestino.append(`<option value="${club.id}" ${selectedDestino}>${club.descripcion}</option>`);
              });

              $('#modalEditarFichaje').modal('show');
            },
            error: function () {
              alert('Error al cargar los clubes.');
            }
          });
        });
      });
    </script>

    <script>
      $('#formEditarFichaje').submit(function (e) {
        e.preventDefault();
        const datosFormulario = $(this).serialize();

        $.ajax({
          url: '../logica/editarFichaje.php', // Cambialo si tu archivo se llama distinto
          method: 'POST',
          data: datosFormulario,
          dataType: 'json',
          success: function (response) {
            if (response.exito) {
              $('#modalEditarFichaje').modal('hide');
              alert('Fichaje actualizado correctamente');
              location.reload(); // O actualizá la tabla directamente si querés
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

  </body>
</html>