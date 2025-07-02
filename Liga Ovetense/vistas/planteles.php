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
                          <li class='menu-item active'>
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
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Fichajes /</span> Registrar Planteles</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Listado de Planteles</a>
                              </li>
                              <li class='nav-item'>
                                <button type='button' disabled class='nav-link btn btn-link' data-bs-toggle='modal' data-bs-target='#modalRegistrarPlantel'>
                                  Registrar Nuevo Plantel
                                </button>
                              </li>
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'>Listado de Planteles de la Liga</h5>
                              <div class='card-body'>
                                <div class='input-group rounded mb-3'>
                                  <span class='input-group-text border-0' id='search-addon'>
                                    <i class='ri-search-line'></i>
                                  </span>
                                  <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                </div>";
                                $sql = "SELECT p.*, 
                                               c.descripcion AS club_nombre,
                                               cat.descripcion AS categoria_nombre
                                        FROM planteles p
                                        LEFT JOIN clubes c ON p.idclub = c.id
                                        LEFT JOIN categorias cat ON p.idcategoria = cat.id where p.estado='ACTIVO'
                                        ORDER BY p.id DESC";
                                $res = mysqli_query($conexion, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                  echo "<div class='table-responsive text-nowrap' style='overflow-x: auto; max-height: 800px;'>
                                    <table class='table table-hover'>
                                      <thead class='table-primary text-center'>
                                        <tr>
                                          <th>ID</th>
                                          <th>Descripción</th>
                                          <th>Categoría</th>
                                          <th>Club</th>
                                          <th>Periodo</th>
                                          <th>Temporada</th>
                                          <th>Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody id='tablaPlanteles' class='table-border-bottom-0 buscar'>";
                                        while ($reg = mysqli_fetch_array($res)) {
                                          echo "<tr class='fila-ver-plantel' style='cursor: pointer; text-align: center;'
                                          data-id='{$reg['id']}'
                                          data-descripcion='{$reg['descripcion']}'
                                          data-idcategoria='{$reg['idcategoria']}'
                                          data-idclub='{$reg['idclub']}'
                                          data-periodo='{$reg['periodo']}'
                                          data-temporada='{$reg['temporada']}'
                                          data-categoria-desc='{$reg['categoria_nombre']}'>
                                            <td>{$reg['id']}</td>
                                            <td>{$reg['descripcion']}</td>
                                            <td>{$reg['categoria_nombre']}</td>
                                            <td>{$reg['club_nombre']}</td>
                                            <td>{$reg['periodo']}</td>
                                            <td>{$reg['temporada']}</td>
                                            <td>
                                              <a class='btn btn-sm btn-danger' href='../logica/eliminarPlantel.php?usuario={$uActual}&id={$reg['id']}'>
                                                <i class='bx bx-trash'></i>
                                              </a>
                                            </td>
                                          </tr>";
                                        }
                                      echo "</tbody>
                                    </table>
                                  </div>";
                                } else {
                                  echo "<div class='alert alert-warning'>No hay registros de planteles.</div>";
                                }
                              echo"</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalDetallePlantel' tabindex='-1' aria-labelledby='modalDetalleLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-xl modal-dialog-scrollable'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='modalDetalleLabel'>Detalles del Plantel</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                            </div>
                            <div class='modal-body'>
                              <form id='formEditarPlantel'>
                                <input type='hidden' id='editIdPlantel' name='idPlantel'>
                                <div class='row mb-3'>
                                  <div class='col-md-4'>
                                    <label for='editDescripcion' class='form-label'>Descripción</label>
                                    <input type='text' class='form-control' id='editDescripcion' name='descripcion'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label for='editPeriodo' class='form-label'>Periodo</label>
                                    <input type='text' class='form-control' id='editPeriodo' name='periodo'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label for='editTemporada' class='form-label'>Temporada</label>
                                    <input type='text' class='form-control' id='editTemporada' name='temporada'>
                                  </div>
                                </div>
                                <div class='row mb-3'>
                                  <div class='col-md-6'>
                                    <label class='form-label'>Club</label>
                                    <select class='form-select' id='editPlantelClub' name='idclub' disabled>
                                      <option value=''>Seleccione un club</option>";
                                        $clubes = mysqli_query($conexion, "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'");
                                        while ($club = mysqli_fetch_assoc($clubes)) {
                                          echo "<option value='{$club['id']}'>{$club['descripcion']}</option>";
                                        }
                                      echo"
                                    </select>
                                  </div>
                                  <div class='col-md-6'>
                                    <label class='form-label'>Categoría</label>
                                    <div class='input-group'>
                                      <input type='hidden' name='idclub' id='editHiddenClub'>
                                      <input type='hidden' name='idcategoria' id='editCategoriaId' required>
                                      <input type='text' class='form-control' id='editCategoriaDesc' placeholder='Seleccione una categoría' readonly required>
                                      <button type='button' class='btn btn-outline-primary' id='btnAbrirModalCategoriaEditar'>Seleccionar</button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              <hr>
                              <h6>Jugadores del Plantel</h6>
                              <div id='detallePlantel'></div>
                              <button type='button' class='btn btn-success' id='btnAgregarJugador'>
                                <i class='bx bx-user-plus'></i> Agregar Jugador
                              </button>
                              <button type='submit' class='btn btn-primary' form='formEditarPlantel'>
                                Guardar Cambios
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalAgregarJugador' tabindex='-1' aria-labelledby='modalAgregarJugadorLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <form id='formAgregarJugador'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalAgregarJugadorLabel'>Agregar Jugador al Plantel</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <input type='hidden' id='jugadorIdPlantel' name='idplantel'>
                                <input type='hidden' id='jugadorIdClub' name='idclub'>
                                <div class='mb-3'>
                                  <label for='idfichaje' class='form-label'>Jugador</label>
                                  <select class='form-select' name='idfichaje' id='idfichaje' required>
                                    <option value=''>Cargando jugadores...</option>
                                  </select>
                                </div>
                                <div class='mb-3'>
                                  <label for='posicion' class='form-label'>Posición</label>
                                  <input type='text' class='form-control' name='posicion' id='posicion' required>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <button type='submit' class='btn btn-primary'>Guardar</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalRegistrarPlantel' tabindex='-1' aria-labelledby='modalRegistrarPlantelLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-xl'>
                          <form id='formRegistrarPlantel'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title'>Registrar Nuevo Plantel</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <div class='row mb-3'>
                                  <div class='col-md-4'>
                                    <label for='descripcion_plantel' class='form-label'>Descripción</label>
                                    <input type='text' class='form-control' id='descripcion_plantel' name='descripcion' required>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Periodo</label>
                                    <input type='text' name='periodo' class='form-control' required>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Temporada</label>
                                    <input type='text' name='temporada' class='form-control' required>
                                  </div>
                                </div>   
                                <div class='row mb-3'>
                                  <div class='col-md-6'>
                                    <label class='form-label'>Club</label>
                                    <select class='form-select' id='plantel_club' name='idclub' required>
                                      <option value=''>Seleccione un club</option>";
                                      $clubes = mysqli_query($conexion, "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'");
                                      while ($club = mysqli_fetch_assoc($clubes)) {
                                        echo "<option value='{$club['id']}'>{$club['descripcion']}</option>";
                                      }
                                      echo"
                                    </select>
                                  </div>
                                  <div class='col-md-6'>
                                    <label class='form-label'>Categoría</label>
                                    <div class='input-group'>
                                      <input type='hidden' name='idcategoria' id='plantel_categoria_id' required>
                                      <input type='text' class='form-control' id='plantel_categoria_desc' placeholder='Seleccione una categoría' readonly required>
                                      <button type='button' class='btn btn-outline-primary' id='btnAbrirModalCategoria'>Seleccionar</button>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <h6>Detalles del Plantel (Jugadores Fichados)</h6>
                                <div class='mb-2'>
                                  <button type='button' class='btn btn-secondary' id='btnAgregarDetalle'>Agregar Jugador</button>
                                </div>
                                <div class='table-responsive'>
                                  <table class='table table-bordered table-hover'>
                                    <thead class='table-light text-center'>
                                      <tr>
                                        <th>Jugador</th>
                                        <th>Club Destino</th>
                                        <th>Posición</th>
                                        <th>Acción</th>
                                      </tr>
                                    </thead>
                                    <tbody id='tablaJugadoresFichados'></tbody>
                                  </table>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <input type='hidden' name='usuario' value='$uActual'>
                                <button type='submit' class='btn btn-primary' id='btnGuardarPlantel' disabled>Guardar Plantel</button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

                      <div class='modal fade' id='modalSeleccionarCategoria' tabindex='-1' aria-labelledby='modalSeleccionarCategoriaLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title'>Seleccionar Categoría</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                            </div>
                            <div class='modal-body'>
                              <table class='table table-hover'>
                                <thead class='table-light'>
                                  <tr>
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th>Acción</th>
                                  </tr>
                                </thead>
                                <tbody>";
                                  $categorias = mysqli_query($conexion, "SELECT id, descripcion FROM categorias WHERE estado = 'ACTIVO' ");
                                  while ($cat = mysqli_fetch_assoc($categorias)) {
                                    echo "<tr>
                                            <td>{$cat['id']}</td>
                                            <td>{$cat['descripcion']}</td>
                                            <td><button type='button' class='btn btn-sm btn-success seleccionar-categoria' 
                                                        data-id='{$cat['id']}' 
                                                        data-desc='{$cat['descripcion']}'>Seleccionar</button></td>
                                          </tr>";
                                  }
                                  echo"
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalSeleccionarJugador' tabindex='-1' aria-labelledby='modalSeleccionarJugadorLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title'>Seleccionar Jugador</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                            </div>
                            <div class='modal-body'>
                              <table class='table table-hover'>
                                <thead class='table-light'>
                                  <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acción</th>
                                  </tr>
                                </thead>
                                <tbody id='tablaListaJugadores'>
                                </tbody>
                              </table>
                            </div>
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
                          <li class='menu-item active'>
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
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Fichajes /</span> Registrar Planteles</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Listado de Planteles</a>
                              </li>
                              <li class='nav-item'>
                                <button type='button' class='nav-link btn btn-link' data-bs-toggle='modal' data-bs-target='#modalRegistrarPlantel'>
                                  Registrar Nuevo Plantel
                                </button>
                              </li>
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'>Listado de Planteles de la Liga</h5>
                              <div class='card-body'>
                                <div class='input-group rounded mb-3'>
                                  <span class='input-group-text border-0' id='search-addon'>
                                    <i class='ri-search-line'></i>
                                  </span>
                                  <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                </div>";
                                $sql = "SELECT p.*, 
                                               c.descripcion AS club_nombre,
                                               cat.descripcion AS categoria_nombre
                                        FROM planteles p
                                        LEFT JOIN clubes c ON p.idclub = c.id
                                        LEFT JOIN categorias cat ON p.idcategoria = cat.id where p.estado='ACTIVO'
                                        ORDER BY p.id DESC";
                                $res = mysqli_query($conexion, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                  echo "<div class='table-responsive text-nowrap' style='overflow-x: auto; max-height: 800px;'>
                                    <table class='table table-hover'>
                                      <thead class='table-primary text-center'>
                                        <tr>
                                          <th>ID</th>
                                          <th>Descripción</th>
                                          <th>Categoría</th>
                                          <th>Club</th>
                                          <th>Periodo</th>
                                          <th>Temporada</th>
                                          <th>Acciones</th>
                                        </tr>
                                      </thead>
                                      <tbody id='tablaPlanteles' class='table-border-bottom-0 buscar'>";
                                        while ($reg = mysqli_fetch_array($res)) {
                                          echo "<tr class='fila-ver-plantel' style='cursor: pointer; text-align: center;'
                                          data-id='{$reg['id']}'
                                          data-descripcion='{$reg['descripcion']}'
                                          data-idcategoria='{$reg['idcategoria']}'
                                          data-idclub='{$reg['idclub']}'
                                          data-periodo='{$reg['periodo']}'
                                          data-temporada='{$reg['temporada']}'
                                          data-categoria-desc='{$reg['categoria_nombre']}'>
                                            <td>{$reg['id']}</td>
                                            <td>{$reg['descripcion']}</td>
                                            <td>{$reg['categoria_nombre']}</td>
                                            <td>{$reg['club_nombre']}</td>
                                            <td>{$reg['periodo']}</td>
                                            <td>{$reg['temporada']}</td>
                                            <td>
                                              <a class='btn btn-sm btn-danger' href='../logica/eliminarPlantel.php?usuario={$uActual}&id={$reg['id']}'>
                                                <i class='bx bx-trash'></i>
                                              </a>
                                            </td>
                                          </tr>";
                                        }
                                      echo "</tbody>
                                    </table>
                                  </div>";
                                } else {
                                  echo "<div class='alert alert-warning'>No hay registros de planteles.</div>";
                                }
                              echo"</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalDetallePlantel' tabindex='-1' aria-labelledby='modalDetalleLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-xl modal-dialog-scrollable'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title' id='modalDetalleLabel'>Detalles del Plantel</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                            </div>
                            <div class='modal-body'>
                              <form id='formEditarPlantel'>
                                <input type='hidden' id='editIdPlantel' name='idPlantel'>
                                <div class='row mb-3'>
                                  <div class='col-md-4'>
                                    <label for='editDescripcion' class='form-label'>Descripción</label>
                                    <input type='text' class='form-control' id='editDescripcion' name='descripcion'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label for='editPeriodo' class='form-label'>Periodo</label>
                                    <input type='text' class='form-control' id='editPeriodo' name='periodo'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label for='editTemporada' class='form-label'>Temporada</label>
                                    <input type='text' class='form-control' id='editTemporada' name='temporada'>
                                  </div>
                                </div>
                                <div class='row mb-3'>
                                  <div class='col-md-6'>
                                    <label class='form-label'>Club</label>
                                    <select class='form-select' id='editPlantelClub' name='idclub' disabled>
                                      <option value=''>Seleccione un club</option>";
                                        $clubes = mysqli_query($conexion, "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'");
                                        while ($club = mysqli_fetch_assoc($clubes)) {
                                          echo "<option value='{$club['id']}'>{$club['descripcion']}</option>";
                                        }
                                      echo"
                                    </select>
                                  </div>
                                  <div class='col-md-6'>
                                    <label class='form-label'>Categoría</label>
                                    <div class='input-group'>
                                      <input type='hidden' name='idclub' id='editHiddenClub'>
                                      <input type='hidden' name='idcategoria' id='editCategoriaId' required>
                                      <input type='text' class='form-control' id='editCategoriaDesc' placeholder='Seleccione una categoría' readonly required>
                                      <button type='button' class='btn btn-outline-primary' id='btnAbrirModalCategoriaEditar'>Seleccionar</button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              <hr>
                              <h6>Jugadores del Plantel</h6>
                              <div id='detallePlantel'></div>
                              <button type='button' class='btn btn-success' id='btnAgregarJugador'>
                                <i class='bx bx-user-plus'></i> Agregar Jugador
                              </button>
                              <button type='submit' class='btn btn-primary' form='formEditarPlantel'>
                                Guardar Cambios
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalAgregarJugador' tabindex='-1' aria-labelledby='modalAgregarJugadorLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <form id='formAgregarJugador'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='modalAgregarJugadorLabel'>Agregar Jugador al Plantel</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <input type='hidden' id='jugadorIdPlantel' name='idplantel'>
                                <input type='hidden' id='jugadorIdClub' name='idclub'>
                                <div class='mb-3'>
                                  <label for='idfichaje' class='form-label'>Jugador</label>
                                  <select class='form-select' name='idfichaje' id='idfichaje' required>
                                    <option value=''>Cargando jugadores...</option>
                                  </select>
                                </div>
                                <div class='mb-3'>
                                  <label for='posicion' class='form-label'>Posición</label>
                                  <input type='text' class='form-control' name='posicion' id='posicion' required>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <button type='submit' class='btn btn-primary'>Guardar</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalRegistrarPlantel' tabindex='-1' aria-labelledby='modalRegistrarPlantelLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-xl'>
                          <form id='formRegistrarPlantel'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title'>Registrar Nuevo Plantel</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                              </div>
                              <div class='modal-body'>
                                <div class='row mb-3'>
                                  <div class='col-md-4'>
                                    <label for='descripcion_plantel' class='form-label'>Descripción</label>
                                    <input type='text' class='form-control' id='descripcion_plantel' name='descripcion' required>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Periodo</label>
                                    <input type='text' name='periodo' class='form-control' required>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Temporada</label>
                                    <input type='text' name='temporada' class='form-control' required>
                                  </div>
                                </div>   
                                <div class='row mb-3'>
                                  <div class='col-md-6'>
                                    <label class='form-label'>Club</label>
                                    <select class='form-select' id='plantel_club' name='idclub' required>
                                      <option value=''>Seleccione un club</option>";
                                      $clubes = mysqli_query($conexion, "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'");
                                      while ($club = mysqli_fetch_assoc($clubes)) {
                                        echo "<option value='{$club['id']}'>{$club['descripcion']}</option>";
                                      }
                                      echo"
                                    </select>
                                  </div>
                                  <div class='col-md-6'>
                                    <label class='form-label'>Categoría</label>
                                    <div class='input-group'>
                                      <input type='hidden' name='idcategoria' id='plantel_categoria_id' required>
                                      <input type='text' class='form-control' id='plantel_categoria_desc' placeholder='Seleccione una categoría' readonly required>
                                      <button type='button' class='btn btn-outline-primary' id='btnAbrirModalCategoria'>Seleccionar</button>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <h6>Detalles del Plantel (Jugadores Fichados)</h6>
                                <div class='mb-2'>
                                  <button type='button' class='btn btn-secondary' id='btnAgregarDetalle'>Agregar Jugador</button>
                                </div>
                                <div class='table-responsive'>
                                  <table class='table table-bordered table-hover'>
                                    <thead class='table-light text-center'>
                                      <tr>
                                        <th>Jugador</th>
                                        <th>Club Destino</th>
                                        <th>Posición</th>
                                        <th>Acción</th>
                                      </tr>
                                    </thead>
                                    <tbody id='tablaJugadoresFichados'></tbody>
                                  </table>
                                </div>
                              </div>
                              <div class='modal-footer'>
                                <input type='hidden' name='usuario' value='$uActual'>
                                <button type='submit' class='btn btn-primary' id='btnGuardarPlantel' disabled>Guardar Plantel</button>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

                      <div class='modal fade' id='modalSeleccionarCategoria' tabindex='-1' aria-labelledby='modalSeleccionarCategoriaLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title'>Seleccionar Categoría</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                            </div>
                            <div class='modal-body'>
                              <table class='table table-hover'>
                                <thead class='table-light'>
                                  <tr>
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th>Acción</th>
                                  </tr>
                                </thead>
                                <tbody>";
                                  $categorias = mysqli_query($conexion, "SELECT id, descripcion FROM categorias WHERE estado = 'ACTIVO' ");
                                  while ($cat = mysqli_fetch_assoc($categorias)) {
                                    echo "<tr>
                                            <td>{$cat['id']}</td>
                                            <td>{$cat['descripcion']}</td>
                                            <td><button type='button' class='btn btn-sm btn-success seleccionar-categoria' 
                                                        data-id='{$cat['id']}' 
                                                        data-desc='{$cat['descripcion']}'>Seleccionar</button></td>
                                          </tr>";
                                  }
                                  echo"
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalSeleccionarJugador' tabindex='-1' aria-labelledby='modalSeleccionarJugadorLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <div class='modal-content'>
                            <div class='modal-header'>
                              <h5 class='modal-title'>Seleccionar Jugador</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                            </div>
                            <div class='modal-body'>
                              <table class='table table-hover'>
                                <thead class='table-light'>
                                  <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acción</th>
                                  </tr>
                                </thead>
                                <tbody id='tablaListaJugadores'>
                                </tbody>
                              </table>
                            </div>
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
      $(document).ready(function () {
        // Abrir modal categoría
        $('#btnAbrirModalCategoria').click(function () {
          $('#modalSeleccionarCategoria').modal('show');
        });

        // Seleccionar categoría
        $(document).on('click', '.seleccionar-categoria', function () {
          const id = $(this).data('id');
          const desc = $(this).data('desc');
          $('#plantel_categoria_id').val(id);
          $('#plantel_categoria_desc').val(desc);
          $('#modalSeleccionarCategoria').modal('hide');
        });

        // Abrir modal jugador
        $('#btnAgregarDetalle').click(function () {
          const idClub = $('#plantel_club').val();
          if (!idClub) {
            alert("Debe seleccionar un club primero.");
            return;
          }

          // Petición AJAX para traer jugadores de ese club
          $.ajax({
            url: '../logica/buscar_jugadores.php',
            type: 'POST',
            data: { idclub: idClub },
            success: function (data) {
              $('#tablaListaJugadores').html(data);
              $('#modalSeleccionarJugador').modal('show');
            },
            error: function () {
              alert("Error al cargar jugadores.");
            }
          });
        });

        // Selección de jugador desde el modal
        $(document).on('click', '.seleccionar-jugador', function () {
          const idFichaje  = $(this).data('idfichaje');
          const nombre = $(this).data('nombre');
          const clubNombre = $('#plantel_club option:selected').text();

          // Verificar si ya está agregado
          const existe = $(`input[name='idsfichajes[]'][value='${idFichaje}']`).length > 0;
          if (existe) {
            alert("Este jugador ya fue agregado.");
            return;
          }

          // Crear fila con input inline para la posición
          const fila = `
            <tr>
              <td>
                <input type='hidden' name='idsfichajes[]' value='${idFichaje}'>
                ${nombre}
              </td>
              <td>${clubNombre}</td>
              <td>
                <input type='text' name='posiciones[]' class='form-control' placeholder='Ej: Defensa' required>
              </td>
              <td class='text-center'>
                <button type='button' class='btn btn-danger btn-sm eliminar-fila'>Quitar</button>
              </td>
            </tr>`;
          
          $('#tablaJugadoresFichados').append(fila);
          $('#modalSeleccionarJugador').modal('hide');
          verificarDetalles();
        });

        // Eliminar fila
        $(document).on('click', '.eliminar-fila', function () {
          $(this).closest('tr').remove();
          verificarDetalles();
        });

        function verificarDetalles() {
          const tieneDetalles = $('#tablaJugadoresFichados tr').length > 0;
          $('#btnGuardarPlantel').prop('disabled', !tieneDetalles);
        }
      });
    </script>

    <script>
      $(document).ready(function () {
        $('#formRegistrarPlantel').on('submit', function (e) {
          e.preventDefault();

          const form = $(this);
          const formData = new FormData(this); // incluye los arrays como idsjugadores[] y posiciones[]

          $.ajax({
            url: '../logica/registrarPlantel.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
              const respuesta = response.trim();

              if (respuesta === 'ok') {
                // Primero cerramos el modal
                $('#modalRegistrarPlantel').modal('hide');

                // Esperamos a que termine la animación del modal (bootstrap usa 300ms por defecto)
                setTimeout(() => {
                  Swal.fire({
                    title: '¡Registro exitoso!',
                    text: 'El plantel se ha registrado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                  }).then(() => {
                    form[0].reset();
                    $('#tablaJugadoresFichados').empty();
                    $('#btnGuardarPlantel').prop('disabled', true);
                    location.reload();
                  });
                }, 350);
              } else {
                Swal.fire({
                  title: 'Atención',
                  text: respuesta,
                  icon: 'warning'
                });
              }
            },
            error: function () {
              Swal.fire({
                title: 'Error',
                text: 'Error al guardar el plantel.',
                icon: 'error'
              });
            }
          });
        });
      });
    </script>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const filas = document.querySelectorAll('.fila-plantel');

        filas.forEach(fila => {
          fila.addEventListener('dblclick', function () {
            const idPlantel = this.dataset.id;

            // Llama al archivo PHP para cargar detalles del plantel
            fetch('../logica/ver_detalles_plantel.php?id=' + idPlantel)
              .then(response => response.text())
              .then(data => {
                document.getElementById('detallesPlantel').innerHTML = data;
              });
          });
        });
      });
    </script>

    <script>
      document.querySelectorAll('.fila-ver-plantel').forEach(fila => {
        fila.addEventListener('dblclick', function () {
          const idPlantel = this.getAttribute('data-id');
          const descripcion = this.getAttribute('data-descripcion');
          const periodo = this.getAttribute('data-periodo');
          const temporada = this.getAttribute('data-temporada');
          const idclub = $(this).data('idclub');
          const idcategoria = $(this).data('idcategoria');
          const categoriaDesc = $(this).data('categoria-desc');

          // Asignar a los inputs
          document.getElementById('editIdPlantel').value = idPlantel;
          document.getElementById('editDescripcion').value = descripcion;
          document.getElementById('editPeriodo').value = periodo;
          document.getElementById('editTemporada').value = temporada;
          $('#editPlantelClub').val(idclub);
          $('#editHiddenClub').val(idclub);
          $('#editCategoriaId').val(idcategoria);
          $('#editCategoriaDesc').val(categoriaDesc);


          // Cargar detalles como siempre
          fetch(`../logica/detalles_plantel.php?idplantel=${idPlantel}`)
            .then(res => res.text())
            .then(data => {
              document.getElementById('detallePlantel').innerHTML = data;
              const modal = new bootstrap.Modal(document.getElementById('modalDetallePlantel'));
              modal.show();
            });
        });
      });
    </script>

    <script>
      document.getElementById('btnAgregarJugador').addEventListener('click', function () {
        const idPlantel = document.getElementById('editIdPlantel').value;
        const idClub = document.getElementById('editPlantelClub').value;

        // Seteamos los hidden del modal
        document.getElementById('jugadorIdPlantel').value = idPlantel;
        document.getElementById('jugadorIdClub').value = idClub;

        // Mostramos el modal
        const modalAgregar = new bootstrap.Modal(document.getElementById('modalAgregarJugador'));
        modalAgregar.show();

        // Cargar jugadores del club en el select
        fetch(`../logica/jugadores_por_club.php?idclub=${idClub}`)
        .then(res => res.json())
        .then(data => {
          const select = document.getElementById('idfichaje');
          select.innerHTML = ''; // Limpiar opciones
          if (data.length === 0) {
            select.innerHTML = '<option value="">No hay jugadores disponibles</option>';
          } else {
            select.innerHTML = '<option value="">Seleccione un jugador</option>';
            data.forEach(jugador => {
              const option = document.createElement('option');
              option.value = jugador.id;
              option.textContent = jugador.nombre;
              select.appendChild(option);
            });
          }
        })
        .catch(error => {
          console.error('Error cargando jugadores:', error);
        });
      });

      document.getElementById('formAgregarJugador').addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('../logica/agregar_det_plantel.php', {
          method: 'POST',
          body: formData
        })
          .then(res => res.text())
          .then(response => {
            const idPlantel = formData.get('idplantel');

            if (response === 'AGREGADO') {
              alert('Jugador agregado correctamente.');
              
              // Actualizar detalle del plantel
              fetch(`../logica/detalles_plantel.php?idplantel=${idPlantel}`)
                .then(res => res.text())
                .then(data => {
                  document.getElementById('detallePlantel').innerHTML = data;
                });

              // Cerrar modal
              bootstrap.Modal.getInstance(document.getElementById('modalAgregarJugador')).hide();
              this.reset();

            } else if (response === 'YA_EXISTE') {
              alert('Este jugador ya está en el plantel.');
            } else if (response === 'FALTAN_DATOS') {
              alert('Todos los campos son obligatorios.');
            } else {
              alert('Ocurrió un error al intentar agregar el jugador.');
            }
          });
      });
      const modalAgregarJugador = document.getElementById('modalAgregarJugador');
      modalAgregarJugador.addEventListener('hidden.bs.modal', function () {
        document.getElementById('formAgregarJugador').reset();
      });
    </script>

    <script>
      // Delegación del evento para los botones que se cargan dinámicamente
      document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('eliminar-jugador')) {
          const idDet = e.target.getAttribute('data-id');
          console.log("Eliminar jugador con ID: " + idDet);

          if (confirm("¿Estás seguro de eliminar este jugador del plantel?")) {
            fetch('../logica/eliminar_jugador_plantel.php', {
              method: 'POST',
              headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
              body: 'idDet=' + idDet
            })
            .then(response => response.text())
            .then(data => {
              console.log(data);
              if (data.trim() === 'ELIMINADO') {
                alert('Jugador eliminado correctamente.');
                // Volver a cargar los detalles del plantel sin recargar la página completa
                const idPlantel = document.getElementById('editIdPlantel').value;
                fetch(`../logica/detalles_plantel.php?idplantel=${idPlantel}`)
                  .then(res => res.text())
                  .then(html => {
                    document.getElementById('detallePlantel').innerHTML = html;
                  });
              } else {
                alert('Ocurrió un error al intentar eliminar el jugador.');
              }
            });
          }
        }
      });
    </script>

    <script>
      document.addEventListener('click', function(e) {
        const boton = e.target.closest('.guardar-jugador');
        if (boton) {
          const idDetPlantel = boton.getAttribute('data-id');
          const fila = boton.closest('tr');
          const inputPosicion = fila.querySelector('input[name^="jugadores["][name$="][posicion]"]');

          if (!inputPosicion) {
            alert('No se pudo encontrar el campo de posición.');
            return;
          }

          const posicion = inputPosicion.value;

          if (posicion.trim() !== '') {
            fetch('../logica/guardar_posicion.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
              },
              body: new URLSearchParams({
                iddetplantel: idDetPlantel,
                posicion: posicion
              })
            })
            .then(response => response.text())
            .then(data => {
              console.log('Respuesta del servidor:', data);
              alert('Posición guardada con éxito');
              const idPlantel = document.getElementById('editIdPlantel').value;
              fetch(`../logica/detalles_plantel.php?idplantel=${idPlantel}`)
              .then(res => res.text())
              .then(html => {
                document.getElementById('detallePlantel').innerHTML = html;
              });
            })
            .catch(error => {
              console.error('Error al guardar la posición:', error);
              alert('Hubo un error al guardar la posición');
            });
          } else {
            alert('La posición no puede estar vacía');
          }
        }
      });
    </script>

    <script>
      document.getElementById('formEditarPlantel').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('../logica/editar_plantel.php', {
          method: 'POST',
          body: formData
        })
        .then(res => res.text())
        .then(data => {
          alert(data); // mensaje de éxito o error
          // Cerrar el modal
          const modal = bootstrap.Modal.getInstance(document.getElementById('modalDetallePlantel'));
          modal.hide();
          location.reload();
        })
        .catch(err => {
          console.error('Error al guardar:', err);
        });
      });
    </script>


  </body>
</html>