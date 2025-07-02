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
          $('.buscar').hide();
          $('.buscar').filter(function () {
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
          if ($reg[8]=='5'){
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
                          <i class='menu-icon tf-icons bx bxs-spreadsheet'></i>
                          <div>Auditoría</div>
                        </a>
                        <ul class='menu-sub'>
                          <li class='menu-item active'>
                            <a href='../vistas/Afichajes.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Fichajes</div>
                            </a>
                          </li>
                          <li class='menu-item'>
                            <a href='../vistas/Aplanteles.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Planteles</div>
                            </a>
                          </li>
                          <li class='menu-item'>
                            <a href='../vistas/AhFutbolistico.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Without menu'>Historial Futbolísticos</div>
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
                            <a href='../vistas/Ausuarios.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Account'>Usuarios</div>
                            </a>
                          </li>
                          <li class='menu-item'>
                            <a href='../vistas/Aliga.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Notifications'>Liga Ovetense</div>
                            </a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </aside>
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
                                      <small class='text-muted'>Auditor</small>
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

                    <div class='content-wrapper'>
                      <div class='container-xxl flex-grow-1 container-p-y'>
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Auditoría /</span> Fichajes</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Acciones sobre los Fichajes</a>
                              </li>
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'></h5>
                              <div class='card-body'>
                                <div class='row mb-3'>
                                  <div class='col-md-4'>
                                    <label for='filtroFechaDesde' class='form-label'>Desde:</label>
                                    <input type='date' class='form-control' id='filtroFechaDesde'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label for='filtroFechaHasta' class='form-label'>Hasta:</label>
                                    <input type='date' class='form-control' id='filtroFechaHasta'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label for='filtroAccion' class='form-label'>Estado:</label>
                                    <select class='form-select' id='filtroAccion'>
                                      <option value=''>TODOS</option>
                                      <option value='INSERTAR'>INSERTAR</option>
                                      <option value='BAJA'>BAJA</option>
                                    </select>
                                  </div>
                                </div>
                                <div class='table-responsive' style='overflow-x: auto; max-height: 600px;'>
                                  <table class='table table-bordered table-striped align-middle' id='tablaAuditoria'>
                                    <thead class='table-primary text-center'>
                                      <tr>
                                        <th>ID</th>
                                        <th>Jugador</th>
                                        <th>Clubes</th>
                                        <th>Acción</th>
                                        <th>IP</th>
                                        <th>Fecha y Hora</th>
                                        <th>Usuario sistema</th>
                                        <th>Descripción</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                      $sql = "SELECT 
                                        a.id,
                                        a.accion,
                                        a.ip_acceso,
                                        a.fecha_hora,
                                        a.usuario_sistema,
                                        a.descripcion,
                                        j.nombre,
                                        j.apellido,
                                        c_origen.descripcion AS club_origen,
                                        c_destino.descripcion AS club_destino
                                      FROM auditoria_fichajes a
                                      LEFT JOIN fichajes f ON a.idfichaje = f.id
                                      LEFT JOIN jugadores j ON f.idjugador = j.id
                                      LEFT JOIN clubes c_origen ON f.idclub_origen = c_origen.id
                                      LEFT JOIN clubes c_destino ON f.idclub_destino = c_destino.id
                                      ORDER BY a.fecha_hora DESC";
                                    $res = mysqli_query($conexion, $sql);
                                    if (mysqli_num_rows($res) > 0) {
                                      while ($row = mysqli_fetch_assoc($res)) {
                                        $jugador = ($row['nombre'] ?? '') . ' ' . ($row['apellido'] ?? '');
                                        $clubes = ($row['club_origen'] ?? 'Desconocido') . ' → ' . ($row['club_destino'] ?? 'Desconocido');

                                        echo "
                                          <tr>
                                            <td>" . ($row['id'] ?? '-') . "</td>
                                            <td>" . htmlspecialchars($jugador) . "</td>
                                            <td>" . htmlspecialchars($clubes) . "</td>
                                            <td>" . htmlspecialchars($row['accion']) . "</td>
                                            <td>" . htmlspecialchars($row['ip_acceso']) . "</td>
                                            <td>" . htmlspecialchars($row['fecha_hora']) . "</td>
                                            <td>".htmlspecialchars($row['usuario_sistema'])."</td>
                                            <td>" . nl2br(htmlspecialchars($row['descripcion'])) . "</td>
                                          </tr>";
                                      }
                                    } else {
                                      echo "
                                        <tr>
                                          <td colspan='7' class='text-center'>No hay registros en la auditoría de fichajes.</td>
                                        </tr>";
                                    }echo"
                                    </tbody>
                                  </table>
                                </div>

                              </div>
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
      document.addEventListener("DOMContentLoaded", function () {
        const fechaDesde = document.getElementById("filtroFechaDesde");
        const fechaHasta = document.getElementById("filtroFechaHasta");
        const filtroAccion = document.getElementById("filtroAccion");
        const filas = document.querySelectorAll("#tablaAuditoria tbody tr");

        function filtrarTabla() {
          const desde = fechaDesde.value;
          const hasta = fechaHasta.value;
          const accion = filtroAccion.value.toUpperCase();

          filas.forEach(fila => {
            const fecha = fila.children[5].textContent.trim().substring(0, 10); // Fecha y Hora
            const accionFila = fila.children[3].textContent.trim().toUpperCase(); // Acción

            let mostrar = true;

            if (desde && fecha < desde) mostrar = false;
            if (hasta && fecha > hasta) mostrar = false;
            if (accion && accionFila !== accion) mostrar = false;

            fila.style.display = mostrar ? "" : "none";
          });
        }

        fechaDesde.addEventListener("change", filtrarTabla);
        fechaHasta.addEventListener("change", filtrarTabla);
        filtroAccion.addEventListener("change", filtrarTabla);
      });
    </script>


    
  </body>
</html>