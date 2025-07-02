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
              const url = new URL(window.location.href);
    if (url.searchParams.has('temporada')) {
      url.searchParams.delete('temporada');
      window.history.replaceState({}, document.title, url);
    }

    $('#exportar-pdf').on('click', function () {
  const clubValor = $('#filtro-club').val();
  const clubTexto = $('#filtro-club option:selected').text();


  const tempValor = $('#filtro-temporada').val();
  const tempTexto = $('#filtro-temporada option:selected').text();

  const { jsPDF } = window.jspdf;
  const doc = new jsPDF('p', 'pt', 'a4');

  // 🔧 Declarar pageWidth
  const pageWidth = doc.internal.pageSize.getWidth();

  // Título centrado
  const titulo = 'LISTADO DE JUGADORES - LIGA OVETENSE DE FÚTBOL';
  const tituloWidth = doc.getTextWidth(titulo);
  const tituloX = (pageWidth - tituloWidth) / 2;
  doc.setFontSize(16);
  doc.setFont('helvetica', 'bold');
  doc.text(titulo, tituloX, 40);

  // Subtítulo centrado (si hay club)
  let topOffset = 60;
  if (clubValor) {
    const subtitulo = `${clubTexto.toUpperCase().trim()}`;
    doc.setFontSize(14);
    doc.setFont('helvetica', 'normal');
    const subtituloWidth = doc.getTextWidth(subtitulo);
    const subtituloX = (pageWidth - subtituloWidth) / 2;
    doc.text(subtitulo, subtituloX, 65);
    topOffset = 85;
  }else if(tempValor) {
    const subtitulo = `${tempTexto.toUpperCase().trim()}`;
    doc.setFontSize(14);
    doc.setFont('helvetica', 'normal');
    const subtituloWidth = doc.getTextWidth(subtitulo);
    const subtituloX = (pageWidth - subtituloWidth) / 2;
    doc.text(subtitulo, subtituloX, 65);
    topOffset = 85;
 }
  //const container = document.querySelector('.row.row-cols-1');
  const container = document.querySelector('.row.gy-3');

  html2canvas(container, {
    scrollY: -window.scrollY,
    useCORS: true
  }).then(canvas => {
    const imgData = canvas.toDataURL('image/png');
    const imgWidth = pageWidth - 80;
    const imgHeight = canvas.height * imgWidth / canvas.width;

    doc.addImage(imgData, 'PNG', 40, topOffset, imgWidth, imgHeight);
    const nombreArchivo = tempValor
  ? `jugadores_${tempTexto.trim().replace(/\s+/g, '_')}.pdf`
  : clubValor
    ? `jugadores_${clubTexto.trim().replace(/\s+/g, '_')}.pdf`
    : 'jugadores_todos.pdf';
    doc.save(nombreArchivo);
  });
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
      $anio = isset($_GET['temporada']) ? (int) $_GET['temporada'] : null;
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
                          <li class='menu-item active'>
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
                          text: 'El Historial Futbolístico ya se encuentra registrado',  
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
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Fichajes /</span> Historial Futbolístico</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Listado de Historiales Futbolísticos</a>
                              </li>
                              <li class='nav-item'>
                                <button type='button' disabled class='nav-link btn btn-link' data-bs-toggle='modal' data-bs-target='#modalRegistrarHistorialF'>
                                  Registrar Nuevo Historial
                                </button>
                              </li>
                              <!--<li class='nav-item'>
                                <a class='nav-link' href='../vistas/listadoEstadistico.php?usuario=$uActual' class='menu-link'>Listado de Jugadores</a>
                              </li>-->
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'>Listado de Historiales</h5>
                              <!--<div class='card-body'>
                                <div class='input-group rounded mb-3'>
                                  <span class='input-group-text border-0' id='search-addon'>
                                    <i class='ri-search-line'></i>
                                  </span>
                                  <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                </div>";
                                  $sql = "SELECT 
                                    j.id AS idjugador,
                                    j.nombre,
                                    j.apellido,
                                    j.ci,
                                    j.foto,
                                    h.id AS idhistorial,
                                    h.fecha,
                                    h.partidos_jugados,
                                    h.goles,
                                    h.asistencias,
                                    h.tarjetas_amarillas,
                                    h.tarjetas_rojas,
                                    h.minutos_jugados,
                                    h.pases_completados,
                                    h.faltas_cometidas,
                                    h.atajadas,
                                    h.video,
                                    f.idclub_destino,
                                    f.estado_fichaje,
                                    c.descripcion AS nombre_club
                                  FROM jugadores j
                                  INNER JOIN historiales_futbolistico h 
                                    ON j.id = h.idjugador AND h.estado = 'ACTIVO'
                                  LEFT JOIN (
                                    SELECT f1.*
                                    FROM fichajes f1
                                    INNER JOIN (
                                      SELECT idjugador, MAX(fecha) AS ultima_fecha
                                      FROM fichajes
                                      WHERE estado = 'ACTIVO'
                                      GROUP BY idjugador
                                    ) f2 
                                    ON f1.idjugador = f2.idjugador AND f1.fecha = f2.ultima_fecha
                                  ) f 
                                    ON j.id = f.idjugador
                                  LEFT JOIN clubes c
                                    ON f.idclub_destino = c.id AND c.estado = 'ACTIVO'
                                  WHERE j.estado = 'ACTIVO' and h.estado='ACTIVO'
                                  ORDER BY h.fecha DESC";                                
                                $res = mysqli_query($conexion, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                  echo "<div class='table-responsive text-nowrap' style='overflow-x: auto; max-height: 800px;'>
                                    <table class='table table-hover'>
                                      <thead class='table-primary text-center'>
                                        <tr>
                                          
                                          <th>Fecha</th>
                                          <th>Foto</th>
                                          <th>Nombre</th>
                                          <th>Apellido</th>
                                          <th>CI</th>
                                          <th>Goles</th>
                                          <th>Asistencias</th>
                                          <th>Min. Jugados</th>
                                          <th>Club Actual</th>
                                          <th>Acción</th>
                                        </tr>
                                      </thead>
                                      <tbody class='table-border-bottom-0 buscar'>";
                                        while ($row = mysqli_fetch_assoc($res)) {
                                          echo "<tr class='fila-detalle' style='cursor: pointer; text-align: center;'
                                            data-idjugador='{$row['idjugador']}'
                                            data-nombre='{$row['nombre']}'
                                            data-apellido='{$row['apellido']}'
                                            data-ci='{$row['ci']}'
                                            data-foto='{$row['foto']}'
                                            data-goles='{$row['goles']}'
                                            data-asistencias='{$row['asistencias']}'
                                            data-partidos_jugados='{$row['partidos_jugados']}'
                                            data-minutos='{$row['minutos_jugados']}'
                                            data-tarjetas_amarillas='{$row['tarjetas_amarillas']}'
                                            data-tarjetas_rojas='{$row['tarjetas_rojas']}'
                                            data-pases_completados='{$row['pases_completados']}'
                                            data-faltas_cometidas='{$row['faltas_cometidas']}'
                                            data-atajadas='{$row['atajadas']}'
                                            data-club='{$row['nombre_club']}'
                                            data-video='{$row['video']}'>
                                        
                                            <td>{$row['fecha']}</td>
                                            <td><img src='../fotos_jugadores/{$row['foto']}' class='rounded-circle' width='40' height='40'></td>
                                            <td>{$row['nombre']}</td>
                                            <td>{$row['apellido']}</td>
                                            <td>{$row['ci']}</td>
                                            <td>{$row['goles']}</td>
                                            <td>{$row['asistencias']}</td>
                                            <td>{$row['minutos_jugados']}</td>
                                            <td>{$row['nombre_club']}</td>
                                            <td><i class='bx bx-show'></i> Ver más
                                            <a class='btn btn-sm btn-danger' href='../logica/eliminarhFutbolistico.php?usuario={$uActual}&id={$row['idhistorial']}'>
                                                <i class='bx bx-trash'></i>
                                              </a></td>
                                          </tr>";
                                        }
                                      echo "</tbody>
                                    </table>
                                  </div>";
                                } else {
                                  echo "<div class='alert alert-warning'>No hay registros de historial futbolístico.</div>";
                                } echo"
                              </div>-->
                              <div class='card-body'>
                                <div class='row mb-3'>
                                  <div class='col-md-4'>
                                    <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                  </div>
                                  <div class='col-md-3'>
                                    <select id='filtro-temporada' class='form-select'>
                                     <option value=''>--Seleccionar Temporada--</option>";
                                      $sqlTemp = "SELECT descripcion, RIGHT(descripcion, 4) AS temporada FROM `temporadas` WHERE estado ='ACTIVO'";
                                      $resTemp = mysqli_query($conexion, $sqlTemp);
                                      while ($temp = mysqli_fetch_assoc($resTemp)) {
                                        $selected = ($temp['temporada'] == $anio) ? "selected" : "";
                                        echo "<option value='" . htmlspecialchars($temp['temporada']) . "' $selected>" . htmlspecialchars($temp['descripcion']) . "</option>";
                                      }echo"
                                    </select>
                                  </div>
                                  <div class='col-md-3'>
                                    <select id='filtro-club' class='form-select'>
                                      <option value=''>--Seleccionar Club--</option>";
                                      $sqlClubes = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                      $resClubes = mysqli_query($conexion, $sqlClubes);
                                      while ($club = mysqli_fetch_assoc($resClubes)) {
                                        echo "<option value='" . htmlspecialchars($club['descripcion']) . "'>" . htmlspecialchars($club['descripcion']) . "</option>";
                                      }echo"
                                    </select>
                                  </div>
                                  <div class='col-md-2' >
                                    <button id='exportar-pdf' class='btn btn-danger mb-3'>
                                      <i class='bx bx-download'></i> Exportar PDF
                                    </button>
                                  </div>
                                </div>
                                ";
                                  // Mejoramos la consulta SQL para incluir la puntuación de talento

                                  $sql = "SELECT 
                                    j.id AS idjugador,
                                    j.nombre,
                                    j.apellido,
                                    j.ci,
                                    j.foto,
                                    h.id AS idhistorial,
                                    h.fecha,
                                    h.partidos_jugados,
                                    h.goles,
                                    h.asistencias,
                                    h.tarjetas_amarillas,
                                    h.tarjetas_rojas,
                                    h.minutos_jugados,
                                    h.pases_completados,
                                    h.faltas_cometidas,
                                    h.atajadas,
                                    h.video,
                                    f.idclub_destino,
                                    f.estado_fichaje,
                                    c.descripcion AS nombre_club,
                                    YEAR(h.fecha) AS temporada";
                                  
                                    if($anio){
                                      $sql .= " FROM jugadores j 
                                                INNER JOIN (
                                                SELECT * FROM historiales_futbolistico h1 WHERE h1.estado = 'ACTIVO' 
                                                AND h1.fecha = ( 
                                                      SELECT MAX(h2.fecha) 
                                                      FROM historiales_futbolistico h2 
                                                      WHERE h2.idjugador = h1.idjugador AND h2.estado = 'ACTIVO' 
                                                      AND EXTRACT(YEAR FROM h2.fecha) = {$anio} ) ) h ON j.id = h.idjugador 
                                                LEFT JOIN ( 
                                                      SELECT f1.* FROM fichajes f1 
                                                      INNER JOIN ( 
                                                          SELECT idjugador, MAX(fecha) AS ultima_fecha 
                                                          FROM fichajes WHERE estado = 'ACTIVO' GROUP BY idjugador ) f2 
                                                          ON f1.idjugador = f2.idjugador AND f1.fecha = f2.ultima_fecha ) f 
                                                          ON j.id = f.idjugador LEFT JOIN clubes c ON f.idclub_destino = c.id 
                                                          AND c.estado = 'ACTIVO' WHERE j.estado = 'ACTIVO' ";
                                    }else {
                                      $sql .= " FROM jugadores j
                                INNER JOIN (
                                    SELECT *
                                    FROM historiales_futbolistico h1
                                    WHERE h1.estado = 'ACTIVO'
                                    AND h1.fecha = (
                                        SELECT MAX(h2.fecha)
                                        FROM historiales_futbolistico h2
                                        WHERE h2.idjugador = h1.idjugador AND h2.estado = 'ACTIVO'
                                    )
                                ) h ON j.id = h.idjugador
                                LEFT JOIN (
                                    SELECT f1.*
                                    FROM fichajes f1
                                    INNER JOIN (
                                        SELECT idjugador, MAX(fecha) AS ultima_fecha
                                        FROM fichajes
                                        WHERE estado = 'ACTIVO'
                                        GROUP BY idjugador
                                    ) f2 
                                    ON f1.idjugador = f2.idjugador AND f1.fecha = f2.ultima_fecha
                                ) f ON j.id = f.idjugador
                                LEFT JOIN clubes c
                                    ON f.idclub_destino = c.id AND c.estado = 'ACTIVO'
                                WHERE j.estado = 'ACTIVO'";
                                    } 


                                $sql .= " ORDER BY h.fecha DESC";

                                // Ordenamos por la puntuación de talento
                                  $res = mysqli_query($conexion, $sql);
                                  if (mysqli_num_rows($res) > 0) {
                                    echo "<div class='container border rounded p-3 shadow-sm' style='max-height: 600px; overflow-y: auto;'>
                                    <div class='row gy-3 '>"; // Cuadrícula de tarjetas
                                    while ($row = mysqli_fetch_assoc($res)) {
                                      // Visualizamos la información en un estilo cuadrado
                                      //echo "<div class='col mb-4 buscar' data-club='{$row['nombre_club']}' ondblclick='abrirModalJugador({$row['idjugador']})'>
                                      echo "<div class='col-12 buscar fila-detalle' 
                                              data-idjugador='{$row['idjugador']}'
                                              data-nombre='{$row['nombre']}'
                                              data-apellido='{$row['apellido']}'
                                              data-ci='{$row['ci']}'
                                              data-foto='{$row['foto']}'
                                              data-goles='{$row['goles']}'
                                              data-asistencias='{$row['asistencias']}'
                                              data-partidos_jugados='{$row['partidos_jugados']}'
                                              data-minutos='{$row['minutos_jugados']}'
                                              data-tarjetas_amarillas='{$row['tarjetas_amarillas']}'
                                              data-tarjetas_rojas='{$row['tarjetas_rojas']}'
                                              data-pases_completados='{$row['pases_completados']}'
                                              data-faltas_cometidas='{$row['faltas_cometidas']}'
                                              data-atajadas='{$row['atajadas']}'
                                              data-club='{$row['nombre_club']}'
                                              data-temporada='{$row['temporada']}'
                                              data-video='{$row['video']}'
                                              >
                                             

                                            <div class='d-flex align-items-center border rounded p-2 shadow-sm'>
                                                <img src='../fotos_jugadores/{$row['foto']}' alt='{$row['nombre']}' class='me-3' style='width: 120px; height: auto; object-fit: cover;'>
                                                <div>
                                                  <h5 class='mb-1'>{$row['nombre']} {$row['apellido']}</h5>
                                                  <p class='mb-1'><strong>Temporada:</strong> {$row['temporada']}</p>
                                                  <p class='mb-1'><strong>Goles:</strong> {$row['goles']}</p>
                                                  <p class='mb-1'><strong>Asistencias:</strong> {$row['asistencias']}</p>
                                                  <p class='mb-0'><strong>Club Actual:</strong> {$row['nombre_club']}</p>
                                                </div>
                                              </div>



                                              
                                            </div>";
                                    }
                                    echo "</div></div>";
                                  } else {
                                    echo "<div class='alert alert-warning'>No hay registros de historial futbolístico.</div>";
                                  }
                                echo"
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>
                      <div class='modal fade' id='modalDetalleJugador' tabindex='-1' aria-labelledby='detalleJugadorLabel' aria-hidden='true'>
                      <div class='modal-dialog modal-fullscreen'>
                      <!-- <div class='modal-dialog modal-xl modal-dialog-scrollable'> -->
                        <div class='modal-content shadow-lg rounded-4 border-0 overflow-hidden'>
                        <!-- Header -->
                        <div class='modal-header bg-primary text-white py-3'>
                          <h5 class='modal-title text-white' id='detalleJugadorLabel'>Detalle del Jugador</h5>
                          
                        </div>

                        <!-- Body -->
                        <!--<div class='modal-body px-4 py-4' style='max-height: 400px; overflow-y: auto;'>-->
                        <div class='modal-body px-4 py-4'>
                          <!-- Perfil -->
                          <div class='row align-items-center mb-4'>
                            <div class='col-md-3 text-center'>
                              <img id='modalFoto' src='' alt='Foto jugador' class='img-fluid rounded-circle border border-3' style='width: 100px; height: 100px; object-fit: cover;'>
                            </div>
                            <div class='col-md-9'>
                              <h4 id='modalNombre' class='fw-bold mb-1'>Nombre del Jugador</h4>
                              <p class='mb-1'><strong>CI:</strong> <span id='modalCI'>0000000</span></p>
                              <p class='mb-0'><strong>Club actual:</strong> <span id='modalClub'>Nombre del Club</span></p>
                            </div>
                            
                          </div>
                          <hr/>
                          <!-- Estadísticas - Fila 1 -->
                          <div class='row text-center mb-3'>
                            <div class='col-md-4'>
                              <div class='bg-light rounded p-2 shadow-sm'>
                                <strong>Partidos</strong><br><span id='modalPartidos' class='fs-5 fw-semibold'>0</span>
                              </div>
                            </div>
                            <div class='col-md-4'>
                              <div class='bg-light rounded p-2 shadow-sm'>
                                <strong>Minutos Jugados</strong><br><span id='modalMinutos' class='fs-5 fw-semibold'>0</span>
                              </div>
                            </div>
                            <div class='col-md-4'>
                              <div class='bg-light rounded p-2 shadow-sm'>
                                <strong>Goles</strong><br><span id='modalGoles' class='fs-5 fw-semibold'>0</span>
                              </div>
                            </div>
                          </div>

                          <!-- Estadísticas - Fila 2 -->
                          <div class='row text-center mb-3'>
                            <div class='col-md-4'>
                              <div class='bg-light rounded p-2 shadow-sm'>
                                <strong>Asistencias</strong><br><span id='modalAsistencias' class='fs-5 fw-semibold'>0</span>
                              </div>
                            </div>
                            <div class='col-md-4'>
                              <div class='bg-light rounded p-2 shadow-sm'>
                                <strong>Tarjetas Amarillas</strong><br><span id='modalAmarillas' class='fs-5 fw-semibold'>0</span>
                              </div>
                            </div>
                            <div class='col-md-4'>
                              <div class='bg-light rounded p-2 shadow-sm'>
                                <strong>Tarjetas Rojas</strong><br><span id='modalRojas' class='fs-5 fw-semibold'>0</span>
                              </div>
                            </div>
                          </div>

                          <!-- Estadísticas - Fila 3 -->
                          <div class='row text-center mb-4'>
                            <div class='col-md-4'>
                              <div class='bg-light rounded p-2 shadow-sm'>
                                <strong>Pases Completados</strong><br><span id='modalPases' class='fs-5 fw-semibold'>0</span>
                              </div>
                            </div>
                            <div class='col-md-4'>
                              <div class='bg-light rounded p-2 shadow-sm'>
                                <strong>Faltas Cometidas</strong><br><span id='modalFaltas' class='fs-5 fw-semibold'>0</span>
                              </div>
                            </div>
                            <div class='col-md-4'>
                              <div class='bg-light rounded p-2 shadow-sm'>
                                <strong>Atajadas</strong><br><span id='modalAtajadas' class='fs-5 fw-semibold'>0</span>
                              </div>
                            </div>
                          </div>
                          <hr/>
                          <!-- Video -->
                          <div class='text-center' id='modalVideoContainer'>
                            <!-- Video se inserta dinámicamente -->
                          </div>
                          <hr style='margin: 30px 0; border-color: #ccc;' />
                          <div class='row text-center mb-5'>
                        <div class='col p-4 border'>
                          <h6>Historial Médico</h6>
                          <div id='historialMedicoJugador' class='border p-2' style='max-height: 300px; overflow-y: auto;'>
                            Cargando...
                          </div>
                        </div>
                      </div>

                      <div class='row text-center mb-5'>
                        <div class='col p-4 border'>
                          <h6>Historial de Fichajes</h6>
                          <div id='historialFichajesJugador' class='border p-2' style='max-height: 300px; overflow-y: auto;'>
                            Cargando...
                          </div>
                        </div>
                      </div>

                        </div>



                        <!-- Footer -->
                        <div class='modal-footer border-0 px-4 pb-4'>
                          <button class='btn btn-outline-secondary' data-bs-dismiss='modal'>Cerrar</button>
                        </div>
                      </div>

                      </div>
                    </div>

                      <div class='modal fade' id='modalDetalleJugadorOld' tabindex='-1' aria-labelledby='detalleJugadorLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg modal-dialog-scrollable'>
                          <div class='modal-content'>
                            <div class='modal-header bg-primary text-white'>
                              <h5 class='modal-title' id='detalleJugadorLabel'>Detalle del Jugador-3</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                            </div>
                            <div class='modal-body'>
                              <div class='row mb-3'>
                                <div class='col-md-3 text-center'>
                                  <img id='modalFoto' src='' class='img-fluid rounded-circle' width='100' height='100'>
                                </div>
                                <div class='col-md-9'>
                                  <h5 id='modalNombre'></h5>
                                  <p><strong>CI:</strong> <span id='modalCI'></span></p>
                                  <p><strong>Club actual:</strong> <span id='modalClub'></span></p>
                                </div>
                              </div>

                              <div class='row text-center'>
                                <div class='col-md-4'><strong>Partidos:</strong> <span id='modalPartidos'></span></div>
                                <div class='col-md-4'><strong>Minutos Jugados:</strong> <span id='modalMinutos'></span></div>
                                <div class='col-md-4'><strong>Goles:</strong> <span id='modalGoles'></span></div>
                              </div>

                              <div class='row text-center mt-3'>
                                <div class='col-md-4'><strong>Asistencias:</strong> <span id='modalAsistencias'></span></div>
                                <div class='col-md-4'><strong>Tarjetas Amarillas:</strong> <span id='modalAmarillas'></span></div>
                                <div class='col-md-4'><strong>Tarjetas Rojas:</strong> <span id='modalRojas'></span></div>
                              </div>

                              <div class='row text-center mt-3'>
                                <div class='col-md-4'><strong>Pases Completados:</strong> <span id='modalPases'></span></div>
                                <div class='col-md-4'><strong>Faltas Cometidas:</strong> <span id='modalFaltas'></span></div>
                                <div class='col-md-4'><strong>Atajadas:</strong> <span id='modalAtajadas'></span></div>
                              </div>

                              <div class='mt-4 text-center' id='modalVideoContainer'>
                                <!-- El video se carga aquí si existe -->
                              </div>
                            </div>
                            <div class='modal-footer'>
                              <button class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalRegistrarHistorialF' tabindex='-1' aria-labelledby='modalRegistrarHistorialLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form action='../logica/registrar_historial.php' method='POST'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title'>Registrar Historial Futbolístico</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                              </div>
                              <div class='modal-body'>
                                <div class='row mb-3'>
                                  <div class='col-md-8'>
                                    <label class='form-label'>Jugador</label>
                                    <div class='input-group'>
                                      <input type='hidden' name='usuario' value='$uActual'>
                                      <input type='hidden' name='idjugador' id='idjugador'>
                                      <input type='text' id='nombre_jugador' class='form-control' placeholder='Seleccione un jugador' readonly required>
                                      <button type='button' class='btn btn-secondary' id='btnAbrirModalBuscarJugador'>Buscar</button>
                                    </div>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Fecha del Historial</label>
                                    <input type='date' name='fecha' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row mb-3'>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Partidos Jugados</label>
                                    <input type='number' name='partidos_jugados' class='form-control' required>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Goles</label>
                                    <input type='number' name='goles' class='form-control'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Asistencias</label>
                                    <input type='number' name='asistencias' class='form-control'>
                                  </div>
                                </div>

                                <div class='row mb-3'>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Tarjetas Amarillas</label>
                                    <input type='number' name='tarjetas_amarillas' class='form-control'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Tarjetas Rojas</label>
                                    <input type='number' name='tarjetas_rojas' class='form-control'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Minutos Jugados</label>
                                    <input type='number' name='minutos_jugados' class='form-control'>
                                  </div>
                                </div>

                                <div class='row mb-3'>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Pases Completados</label>
                                    <input type='number' name='pases_completados' class='form-control'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Faltas Cometidas</label>
                                    <input type='number' name='faltas_cometidas' class='form-control'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Atajadas</label>
                                    <input type='number' name='atajadas' class='form-control'>
                                  </div>
                                </div>
                                <div class='mb-3'>
                                  <label class='form-label' for='video_url'>Enlace del Video de YouTube</label>
                                  <input type='url' name='video_url' class='form-control' id='video_url' placeholder='https://www.youtube.com/watch?v=tu_codigo'>
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
                    </div>

                    <div class='modal fade' id='modalBuscarJugador' tabindex='-1' aria-hidden='true'>
                      <div class='modal-dialog modal-lg'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title'>Seleccionar Jugador</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                          </div>
                          <div class='modal-body'>
                            <input type='text' id='buscarJugadorInput' placeholder='Buscar jugador...' class='form-control mb-3'>
                            <table class='table table-hover' id='tablaJugadores'>
                              <thead class='table-primary text-center'>
                                <tr>
                                  <th>Foto</th>
                                  <th>Nombre</th>
                                  <th>CI</th>
                                  <th>Acción</th>
                                </tr>
                              </thead>
                              <tbody>";
                                $query = "SELECT id, nombre, apellido, ci, foto FROM jugadores WHERE estado = 'ACTIVO' ORDER BY nombre ASC";
                                $res = mysqli_query($conexion, $query);
                                while ($row = mysqli_fetch_assoc($res)) {
                                  echo "<tr class='text-center'>
                                    <td><img src='../fotos_jugadores/{$row['foto']}' width='40' height='40' class='rounded-circle'></td>
                                    <td>{$row['nombre']} {$row['apellido']}</td>
                                    <td>{$row['ci']}</td>
                                    <td>
                                      <button type='button' class='btn btn-success btn-sm seleccionar-jugador'
                                        data-id='{$row['id']}'
                                        data-nombre='{$row['nombre']} {$row['apellido']}'>
                                        Seleccionar
                                      </button>
                                    </td>
                                  </tr>";
                                }
                                echo"
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
              </div>";
          }else if ($reg[8]=='2'){
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
                        <a href='../vistas/listadoEstadistico.php?usuario=$uActual' class='menu-link'>
                          <div data-i18n='Without menu'>Historial Futbolísticos</div>
                        </a>
                      </li>
                      <!--<li class='menu-item active'>
                        <a href='../vistas/hFutbolistico.php?usuario=$uActual' class='menu-link'>
                          <div data-i18n='Without menu'>Historiales por jugador</div>
                        </a>
                      </li>-->
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
                            <a href='../vistas/miPerfil.php?usuario=$uActual' class='menu-link'>
                              <div data-i18n='Account'>Mi perfil</div>
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
                                      <small class='text-muted'>Scout</small>
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
                    </nav>";
                    //<!-- Panel Principal -->
                    echo "
                    <div class='content-wrapper'>
                      <div class='container-xxl flex-grow-1 container-p-y'>
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Fichajes /</span> Historial Futbolístico</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Listado de Historiales Futbolísticos</a>
                              </li>
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'>Listado de Historiales</h5>
                              <div class='card-body'>
                                <div class='input-group rounded mb-3'>
                                  <span class='input-group-text border-0' id='search-addon'>
                                    <i class='ri-search-line'></i>
                                  </span>
                                  <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                </div>";
                                  $sql = "SELECT 
                                    j.id AS idjugador,
                                    j.nombre,
                                    j.apellido,
                                    j.ci,
                                    j.foto,
                                    h.id AS idhistorial,
                                    h.fecha,
                                    h.partidos_jugados,
                                    h.goles,
                                    h.asistencias,
                                    h.tarjetas_amarillas,
                                    h.tarjetas_rojas,
                                    h.minutos_jugados,
                                    h.pases_completados,
                                    h.faltas_cometidas,
                                    h.atajadas,
                                    h.video,
                                    f.idclub_destino,
                                    f.estado_fichaje,
                                    c.descripcion AS nombre_club
                                  FROM jugadores j
                                  INNER JOIN historiales_futbolistico h 
                                    ON j.id = h.idjugador AND h.estado = 'ACTIVO'
                                  LEFT JOIN (
                                    SELECT f1.*
                                    FROM fichajes f1
                                    INNER JOIN (
                                      SELECT idjugador, MAX(fecha) AS ultima_fecha
                                      FROM fichajes
                                      WHERE estado = 'ACTIVO'
                                      GROUP BY idjugador
                                    ) f2 
                                    ON f1.idjugador = f2.idjugador AND f1.fecha = f2.ultima_fecha
                                  ) f 
                                    ON j.id = f.idjugador
                                  LEFT JOIN clubes c
                                    ON f.idclub_destino = c.id AND c.estado = 'ACTIVO'
                                  WHERE j.estado = 'ACTIVO' and h.estado='ACTIVO'
                                  ORDER BY h.fecha DESC";                                
                                $res = mysqli_query($conexion, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                  echo "<div class='table-responsive text-nowrap' style='overflow-x: auto; max-height: 800px;'>
                                    <table class='table table-hover'>
                                      <thead class='table-primary text-center'>
                                        <tr>
                                          
                                          <th>Fecha</th>
                                          <th>Foto</th>
                                          <th>Nombre</th>
                                          <th>Apellido</th>
                                          <th>CI</th>
                                          <th>Goles</th>
                                          <th>Asistencias</th>
                                          <th>Min. Jugados</th>
                                          <th>Club Actual</th>
                                          <th>Acción</th>
                                        </tr>
                                      </thead>
                                      <tbody class='table-border-bottom-0 buscar'>";
                                        while ($row = mysqli_fetch_assoc($res)) {
                                          echo "<tr class='fila-detalle' style='cursor: pointer; text-align: center;'
                                            data-idjugador='{$row['idjugador']}'
                                            data-nombre='{$row['nombre']}'
                                            data-apellido='{$row['apellido']}'
                                            data-ci='{$row['ci']}'
                                            data-foto='{$row['foto']}'
                                            data-goles='{$row['goles']}'
                                            data-asistencias='{$row['asistencias']}'
                                            data-partidos_jugados='{$row['partidos_jugados']}'
                                            data-minutos='{$row['minutos_jugados']}'
                                            data-tarjetas_amarillas='{$row['tarjetas_amarillas']}'
                                            data-tarjetas_rojas='{$row['tarjetas_rojas']}'
                                            data-pases_completados='{$row['pases_completados']}'
                                            data-faltas_cometidas='{$row['faltas_cometidas']}'
                                            data-atajadas='{$row['atajadas']}'
                                            data-club='{$row['nombre_club']}'
                                            data-video='{$row['video']}'>
                                            
                                            <td>{$row['fecha']}</td>
                                            <td><img src='../fotos_jugadores/{$row['foto']}' class='rounded-circle' width='40' height='40'></td>
                                            <td>{$row['nombre']}</td>
                                            <td>{$row['apellido']}</td>
                                            <td>{$row['ci']}</td>
                                            <td>{$row['goles']}</td>
                                            <td>{$row['asistencias']}</td>
                                            <td>{$row['minutos_jugados']}</td>
                                            <td>{$row['nombre_club']}</td>
                                            <td><i class='bx bx-show'></i> Ver más
                                          </tr>";
                                        }
                                      echo "</tbody>
                                    </table>
                                  </div>";
                                } else {
                                  echo "<div class='alert alert-warning'>No hay registros de historial futbolístico.</div>";
                                } echo"
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalDetalleJugador' tabindex='-1' aria-labelledby='detalleJugadorLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg modal-dialog-scrollable'>
                          <div class='modal-content'>
                            <div class='modal-header bg-primary text-white'>
                              <h5 class='modal-title' id='detalleJugadorLabel'>Detalle del Jugador-2</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                            </div>
                            <div class='modal-body'>
                              <div class='row mb-3'>
                                <div class='col-md-3 text-center'>
                                  <img id='modalFoto' src='' class='img-fluid rounded-circle' width='100' height='100'>
                                </div>
                                <div class='col-md-9'>
                                  <h5 id='modalNombre'></h5>
                                  <p><strong>CI:</strong> <span id='modalCI'></span></p>
                                  <p><strong>Club actual:</strong> <span id='modalClub'></span></p>
                                </div>
                              </div>

                              <div class='row text-center'>
                                <div class='col-md-4'><strong>Partidos:</strong> <span id='modalPartidos'></span></div>
                                <div class='col-md-4'><strong>Minutos Jugados:</strong> <span id='modalMinutos'></span></div>
                                <div class='col-md-4'><strong>Goles:</strong> <span id='modalGoles'></span></div>
                              </div>

                              <div class='row text-center mt-3'>
                                <div class='col-md-4'><strong>Asistencias:</strong> <span id='modalAsistencias'></span></div>
                                <div class='col-md-4'><strong>Tarjetas Amarillas:</strong> <span id='modalAmarillas'></span></div>
                                <div class='col-md-4'><strong>Tarjetas Rojas:</strong> <span id='modalRojas'></span></div>
                              </div>

                              <div class='row text-center mt-3'>
                                <div class='col-md-4'><strong>Pases Completados:</strong> <span id='modalPases'></span></div>
                                <div class='col-md-4'><strong>Faltas Cometidas:</strong> <span id='modalFaltas'></span></div>
                                <div class='col-md-4'><strong>Atajadas:</strong> <span id='modalAtajadas'></span></div>
                              </div>

                              <div class='mt-4 text-center' id='modalVideoContainer'>
                              </div>
                            </div>
                            <div class='modal-footer'>
                              <button class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
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
                          <li class='menu-item active'>
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
                          text: 'El Historial Futbolístico ya se encuentra registrado',  
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
                        <h4 class='fw-bold py-3 mb-4'><span class='text-muted fw-light'>Fichajes /</span> Historial Futbolístico</h4>
                        <div class='row'>
                          <div class='col-md-12'>
                            <ul class='nav nav-pills flex-column flex-md-row mb-3'>
                              <li class='nav-item'>
                                <a class='nav-link active' href='javascript:void(0);'>Listado de Historiales Futbolísticos</a>
                              </li>
                              <li class='nav-item'>
                                <button type='button' class='nav-link btn btn-link' data-bs-toggle='modal' data-bs-target='#modalRegistrarHistorialF'>
                                  Registrar Nuevo Historial
                                </button>
                              </li>
                              <!--<li class='nav-item'>
                                <a class='nav-link' href='../vistas/listadoEstadistico.php?usuario=$uActual' class='menu-link'>Listado de Jugadores</a>
                              </li>--> 
                            </ul>
                            <div class='card mb-4'>
                              <h5 class='card-header'>Listado de Historiales</h5>
                              <!--<div class='card-body'>
                                <div class='input-group rounded mb-3'>
                                  <span class='input-group-text border-0' id='search-addon'>
                                    <i class='ri-search-line'></i>
                                  </span>
                                  <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                </div>";
                                  $sql = "SELECT 
                                    j.id AS idjugador,
                                    j.nombre,
                                    j.apellido,
                                    j.ci,
                                    j.foto,
                                    h.id AS idhistorial,
                                    h.fecha,
                                    h.partidos_jugados,
                                    h.goles,
                                    h.asistencias,
                                    h.tarjetas_amarillas,
                                    h.tarjetas_rojas,
                                    h.minutos_jugados,
                                    h.pases_completados,
                                    h.faltas_cometidas,
                                    h.atajadas,
                                    h.video,
                                    f.idclub_destino,
                                    f.estado_fichaje,
                                    c.descripcion AS nombre_club
                                  FROM jugadores j
                                  INNER JOIN historiales_futbolistico h 
                                    ON j.id = h.idjugador AND h.estado = 'ACTIVO'
                                  LEFT JOIN (
                                    SELECT f1.*
                                    FROM fichajes f1
                                    INNER JOIN (
                                      SELECT idjugador, MAX(fecha) AS ultima_fecha
                                      FROM fichajes
                                      WHERE estado = 'ACTIVO'
                                      GROUP BY idjugador
                                    ) f2 
                                    ON f1.idjugador = f2.idjugador AND f1.fecha = f2.ultima_fecha
                                  ) f 
                                    ON j.id = f.idjugador
                                  LEFT JOIN clubes c
                                    ON f.idclub_destino = c.id AND c.estado = 'ACTIVO'
                                  WHERE j.estado = 'ACTIVO' and h.estado='ACTIVO'
                                  ORDER BY h.fecha DESC";                                
                                $res = mysqli_query($conexion, $sql);
                                if (mysqli_num_rows($res) > 0) {
                                  echo "<div class='table-responsive text-nowrap' style='overflow-x: auto; max-height: 800px;'>
                                    <table class='table table-hover'>
                                      <thead class='table-primary text-center'>
                                        <tr>
                                          
                                          <th>Fecha</th>
                                          <th>Foto</th>
                                          <th>Nombre</th>
                                          <th>Apellido</th>
                                          <th>CI</th>
                                          <th>Goles</th>
                                          <th>Asistencias</th>
                                          <th>Min. Jugados</th>
                                          <th>Club Actual</th>
                                          <th>Acción</th>
                                        </tr>
                                      </thead>
                                      <tbody class='table-border-bottom-0 buscar'>";
                                        while ($row = mysqli_fetch_assoc($res)) {
                                          echo "<tr class='fila-detalle' style='cursor: pointer; text-align: center;'
                                            data-idjugador='{$row['idjugador']}'
                                            data-nombre='{$row['nombre']}'
                                            data-apellido='{$row['apellido']}'
                                            data-ci='{$row['ci']}'
                                            data-foto='{$row['foto']}'
                                            data-goles='{$row['goles']}'
                                            data-asistencias='{$row['asistencias']}'
                                            data-partidos_jugados='{$row['partidos_jugados']}'
                                            data-minutos='{$row['minutos_jugados']}'
                                            data-tarjetas_amarillas='{$row['tarjetas_amarillas']}'
                                            data-tarjetas_rojas='{$row['tarjetas_rojas']}'
                                            data-pases_completados='{$row['pases_completados']}'
                                            data-faltas_cometidas='{$row['faltas_cometidas']}'
                                            data-atajadas='{$row['atajadas']}'
                                            data-club='{$row['nombre_club']}'
                                            data-video='{$row['video']}'>
                                           
                                            <td>{$row['fecha']}</td>
                                            <td><img src='../fotos_jugadores/{$row['foto']}' class='rounded-circle' width='40' height='40'></td>
                                            <td>{$row['nombre']}</td>
                                            <td>{$row['apellido']}</td>
                                            <td>{$row['ci']}</td>
                                            <td>{$row['goles']}</td>
                                            <td>{$row['asistencias']}</td>
                                            <td>{$row['minutos_jugados']}</td>
                                            <td>{$row['nombre_club']}</td>
                                            <td><i class='bx bx-show'></i> Ver más
                                            <a class='btn btn-sm btn-danger' href='../logica/eliminarhFutbolistico.php?usuario={$uActual}&id={$row['idhistorial']}'>
                                                <i class='bx bx-trash'></i>
                                              </a></td>
                                          </tr>";
                                        }
                                      echo "</tbody>
                                    </table>
                                  </div>";
                                } else {
                                  echo "<div class='alert alert-warning'>No hay registros de historial futbolístico.</div>";
                                } echo"
                              </div>-->
                              <div class='card-body'>
                                <div class='row mb-3'>
                                  <div class='col-md-4'>
                                    <input class='filtrar form-control rounded' type='search' placeholder='Buscador...'>
                                  </div>
                                  <div class='col-md-4'>
                                    <select id='filtro-temporada' class='form-select'>
                                     <option value=''>--Seleccionar Temporada--</option>";
                                      $sqlTemp = "SELECT descripcion, RIGHT(descripcion, 4) AS temporada FROM `temporadas` WHERE estado ='ACTIVO'";
                                      $resTemp = mysqli_query($conexion, $sqlTemp);
                                      while ($temp = mysqli_fetch_assoc($resTemp)) {
                                        $selected = ($temp['temporada'] == $anio) ? "selected" : "";
                                        echo "<option value='" . htmlspecialchars($temp['temporada']) . "' $selected>" . htmlspecialchars($temp['descripcion']) . "</option>";
                                      }echo"
                                    </select>
                                  </div>
                                  <div class='col-md-4'>
                                    <select id='filtro-club' class='form-select'>
                                      <option value=''>--Seleccionar Club--</option>";
                                      $sqlClubes = "SELECT id, descripcion FROM clubes WHERE estado = 'ACTIVO'";
                                      $resClubes = mysqli_query($conexion, $sqlClubes);
                                      while ($club = mysqli_fetch_assoc($resClubes)) {
                                        echo "<option value='" . htmlspecialchars($club['descripcion']) . "'>" . htmlspecialchars($club['descripcion']) . "</option>";
                                      }echo"
                                    </select>
                                  </div>
                                  <!--<div class='col-md-2' >
                                    <button id='exportar-pdf' class='btn btn-danger mb-3'>
                                      <i class='bx bx-download'></i> Exportar PDF
                                    </button>
                                  </div>-->
                                </div>
                                ";
                                  // Mejoramos la consulta SQL para incluir la puntuación de talento

                                  $sql = "SELECT 
                                    j.id AS idjugador,
                                    j.nombre,
                                    j.apellido,
                                    j.ci,
                                    j.foto,
                                    h.id AS idhistorial,
                                    h.fecha,
                                    h.partidos_jugados,
                                    h.goles,
                                    h.asistencias,
                                    h.tarjetas_amarillas,
                                    h.tarjetas_rojas,
                                    h.minutos_jugados,
                                    h.pases_completados,
                                    h.faltas_cometidas,
                                    h.atajadas,
                                    h.video,
                                    f.idclub_destino,
                                    f.estado_fichaje,
                                    c.descripcion AS nombre_club,
                                    YEAR(h.fecha) AS temporada";
                                  
                                    if($anio){
                                      $sql .= " FROM jugadores j 
                                                INNER JOIN (
                                                SELECT * FROM historiales_futbolistico h1 WHERE h1.estado = 'ACTIVO' 
                                                AND h1.fecha = ( 
                                                      SELECT MAX(h2.fecha) 
                                                      FROM historiales_futbolistico h2 
                                                      WHERE h2.idjugador = h1.idjugador AND h2.estado = 'ACTIVO' 
                                                      AND EXTRACT(YEAR FROM h2.fecha) = {$anio} ) ) h ON j.id = h.idjugador 
                                                LEFT JOIN ( 
                                                      SELECT f1.* FROM fichajes f1 
                                                      INNER JOIN ( 
                                                          SELECT idjugador, MAX(fecha) AS ultima_fecha 
                                                          FROM fichajes WHERE estado = 'ACTIVO' GROUP BY idjugador ) f2 
                                                          ON f1.idjugador = f2.idjugador AND f1.fecha = f2.ultima_fecha ) f 
                                                          ON j.id = f.idjugador LEFT JOIN clubes c ON f.idclub_destino = c.id 
                                                          AND c.estado = 'ACTIVO' WHERE j.estado = 'ACTIVO' ";
                                    }else {
                                      $sql .= " FROM jugadores j
                                INNER JOIN (
                                    SELECT *
                                    FROM historiales_futbolistico h1
                                    WHERE h1.estado = 'ACTIVO'
                                    AND h1.fecha = (
                                        SELECT MAX(h2.fecha)
                                        FROM historiales_futbolistico h2
                                        WHERE h2.idjugador = h1.idjugador AND h2.estado = 'ACTIVO'
                                    )
                                ) h ON j.id = h.idjugador
                                LEFT JOIN (
                                    SELECT f1.*
                                    FROM fichajes f1
                                    INNER JOIN (
                                        SELECT idjugador, MAX(fecha) AS ultima_fecha
                                        FROM fichajes
                                        WHERE estado = 'ACTIVO'
                                        GROUP BY idjugador
                                    ) f2 
                                    ON f1.idjugador = f2.idjugador AND f1.fecha = f2.ultima_fecha
                                ) f ON j.id = f.idjugador
                                LEFT JOIN clubes c
                                    ON f.idclub_destino = c.id AND c.estado = 'ACTIVO'
                                WHERE j.estado = 'ACTIVO'";
                                    } 


                                $sql .= " ORDER BY h.fecha DESC";

                                // Ordenamos por la puntuación de talento
                                  $res = mysqli_query($conexion, $sql);
                                  if (mysqli_num_rows($res) > 0) {
                                    echo "<div class='container border rounded p-3 shadow-sm' style='max-height: 600px; overflow-y: auto;'>
                                    <div class='row gy-3 '>"; // Cuadrícula de tarjetas
                                    while ($row = mysqli_fetch_assoc($res)) {
                                      // Visualizamos la información en un estilo cuadrado
                                      //echo "<div class='col mb-4 buscar' data-club='{$row['nombre_club']}' ondblclick='abrirModalJugador({$row['idjugador']})'>
                                      echo "<div class='col-12 buscar fila-detalle' 
                                              data-idjugador='{$row['idjugador']}'
                                              data-nombre='{$row['nombre']}'
                                              data-apellido='{$row['apellido']}'
                                              data-ci='{$row['ci']}'
                                              data-foto='{$row['foto']}'
                                              data-goles='{$row['goles']}'
                                              data-asistencias='{$row['asistencias']}'
                                              data-partidos_jugados='{$row['partidos_jugados']}'
                                              data-minutos='{$row['minutos_jugados']}'
                                              data-tarjetas_amarillas='{$row['tarjetas_amarillas']}'
                                              data-tarjetas_rojas='{$row['tarjetas_rojas']}'
                                              data-pases_completados='{$row['pases_completados']}'
                                              data-faltas_cometidas='{$row['faltas_cometidas']}'
                                              data-atajadas='{$row['atajadas']}'
                                              data-club='{$row['nombre_club']}'
                                              data-temporada='{$row['temporada']}'
                                              data-video='{$row['video']}'
                                              >
                                             

                                            <div class='d-flex align-items-center border rounded p-2 shadow-sm'>
                                                <img src='../fotos_jugadores/{$row['foto']}' alt='{$row['nombre']}' class='me-3' style='width: 120px; height: auto; object-fit: cover;'>
                                                <div>
                                                  <h5 class='mb-1'>{$row['nombre']} {$row['apellido']}</h5>
                                                  <p class='mb-1'><strong>Temporada:</strong> {$row['temporada']}</p>
                                                  <p class='mb-1'><strong>Goles:</strong> {$row['goles']}</p>
                                                  <p class='mb-1'><strong>Asistencias:</strong> {$row['asistencias']}</p>
                                                  <p class='mb-0'><strong>Club Actual:</strong> {$row['nombre_club']}</p>
                                                </div>
                                              </div>



                                              
                                            </div>";
                                    }
                                    echo "</div></div>";
                                  } else {
                                    echo "<div class='alert alert-warning'>No hay registros de historial futbolístico.</div>";
                                  }
                                echo"
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalDetalleJugador' tabindex='-1' aria-labelledby='detalleJugadorLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg modal-dialog-scrollable'>
                          <div class='modal-content'>
                            <div class='modal-header bg-primary text-white'>
                              <h5 class='modal-title' id='detalleJugadorLabel'>Detalle del Jugador-1</h5>
                              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                            </div>
                            <div class='modal-body'>
                              <div class='row mb-3'>
                                <div class='col-md-3 text-center'>
                                  <img id='modalFoto' src='' class='img-fluid rounded-circle' width='100' height='100'>
                                </div>
                                <div class='col-md-9'>
                                  <h5 id='modalNombre'></h5>
                                  <p><strong>CI:</strong> <span id='modalCI'></span></p>
                                  <p><strong>Club actual:</strong> <span id='modalClub'></span></p>
                                </div>
                              </div>

                              <div class='row text-center'>
                                <div class='col-md-4'><strong>Partidos:</strong> <span id='modalPartidos'></span></div>
                                <div class='col-md-4'><strong>Minutos Jugados:</strong> <span id='modalMinutos'></span></div>
                                <div class='col-md-4'><strong>Goles:</strong> <span id='modalGoles'></span></div>
                              </div>

                              <div class='row text-center mt-3'>
                                <div class='col-md-4'><strong>Asistencias:</strong> <span id='modalAsistencias'></span></div>
                                <div class='col-md-4'><strong>Tarjetas Amarillas:</strong> <span id='modalAmarillas'></span></div>
                                <div class='col-md-4'><strong>Tarjetas Rojas:</strong> <span id='modalRojas'></span></div>
                              </div>

                              <div class='row text-center mt-3'>
                                <div class='col-md-4'><strong>Pases Completados:</strong> <span id='modalPases'></span></div>
                                <div class='col-md-4'><strong>Faltas Cometidas:</strong> <span id='modalFaltas'></span></div>
                                <div class='col-md-4'><strong>Atajadas:</strong> <span id='modalAtajadas'></span></div>
                              </div>

                              <div class='mt-4 text-center' id='modalVideoContainer'>
                                <!-- El video se carga aquí si existe -->
                              </div>
                            </div>
                            <div class='modal-footer'>
                              <button class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class='modal fade' id='modalRegistrarHistorialF' tabindex='-1' aria-labelledby='modalRegistrarHistorialLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                          <form action='../logica/registrar_historial.php' method='POST'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title'>Registrar Historial Futbolístico</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                              </div>
                              <div class='modal-body'>
                                <div class='row mb-3'>
                                  <div class='col-md-8'>
                                    <label class='form-label'>Jugador</label>
                                    <div class='input-group'>
                                      <input type='hidden' name='usuario' value='$uActual'>
                                      <input type='hidden' name='idjugador' id='idjugador'>
                                      <input type='text' id='nombre_jugador' class='form-control' placeholder='Seleccione un jugador' readonly required>
                                      <button type='button' class='btn btn-secondary' id='btnAbrirModalBuscarJugador'>Buscar</button>
                                    </div>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Fecha del Historial</label>
                                    <input type='date' name='fecha' class='form-control' required>
                                  </div>
                                </div>
                                <div class='row mb-3'>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Partidos Jugados</label>
                                    <input type='number' name='partidos_jugados' class='form-control' required>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Goles</label>
                                    <input type='number' name='goles' class='form-control'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Asistencias</label>
                                    <input type='number' name='asistencias' class='form-control'>
                                  </div>
                                </div>

                                <div class='row mb-3'>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Tarjetas Amarillas</label>
                                    <input type='number' name='tarjetas_amarillas' class='form-control'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Tarjetas Rojas</label>
                                    <input type='number' name='tarjetas_rojas' class='form-control'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Minutos Jugados</label>
                                    <input type='number' name='minutos_jugados' class='form-control'>
                                  </div>
                                </div>

                                <div class='row mb-3'>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Pases Completados</label>
                                    <input type='number' name='pases_completados' class='form-control'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Faltas Cometidas</label>
                                    <input type='number' name='faltas_cometidas' class='form-control'>
                                  </div>
                                  <div class='col-md-4'>
                                    <label class='form-label'>Atajadas</label>
                                    <input type='number' name='atajadas' class='form-control'>
                                  </div>
                                </div>
                                <div class='mb-3'>
                                  <label class='form-label' for='video_url'>Enlace del Video de YouTube</label>
                                  <input type='url' name='video_url' class='form-control' id='video_url' placeholder='https://www.youtube.com/watch?v=tu_codigo'>
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
                    </div>

                    <div class='modal fade' id='modalBuscarJugador' tabindex='-1' aria-hidden='true'>
                      <div class='modal-dialog modal-lg'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title'>Seleccionar Jugador</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                          </div>
                          <div class='modal-body'>
                            <input type='text' id='buscarJugadorInput' placeholder='Buscar jugador...' class='form-control mb-3'>
                            <table class='table table-hover' id='tablaJugadores'>
                              <thead class='table-primary text-center'>
                                <tr>
                                  <th>Foto</th>
                                  <th>Nombre</th>
                                  <th>CI</th>
                                  <th>Acción</th>
                                </tr>
                              </thead>
                              <tbody>";
                                $query = "SELECT id, nombre, apellido, ci, foto FROM jugadores WHERE estado = 'ACTIVO' ORDER BY nombre ASC";
                                $res = mysqli_query($conexion, $query);
                                while ($row = mysqli_fetch_assoc($res)) {
                                  echo "<tr class='text-center'>
                                    <td><img src='../fotos_jugadores/{$row['foto']}' width='40' height='40' class='rounded-circle'></td>
                                    <td>{$row['nombre']} {$row['apellido']}</td>
                                    <td>{$row['ci']}</td>
                                    <td>
                                      <button type='button' class='btn btn-success btn-sm seleccionar-jugador'
                                        data-id='{$row['id']}'
                                        data-nombre='{$row['nombre']} {$row['apellido']}'>
                                        Seleccionar
                                      </button>
                                    </td>
                                  </tr>";
                                }
                                echo"
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
      $(document).on("dblclick", ".fila-detalle", function () {
      
        
        $("#modalFoto").attr("src", "../fotos_jugadores/" + $(this).data("foto"));
        $("#modalNombre").text($(this).data("nombre") + " " + $(this).data("apellido"));
        $("#modalCI").text($(this).data("ci"));
        $("#modalClub").text($(this).data("club"));

        $("#modalPartidos").text($(this).data("partidos_jugados"));
        $("#modalMinutos").text($(this).data("minutos"));
        $("#modalGoles").text($(this).data("goles"));
        $("#modalAsistencias").text($(this).data("asistencias"));
        $("#modalAmarillas").text($(this).data("tarjetas_amarillas"));
        $("#modalRojas").text($(this).data("tarjetas_rojas"));
        $("#modalPases").text($(this).data("pases_completados"));
        $("#modalFaltas").text($(this).data("faltas_cometidas"));
        $("#modalAtajadas").text($(this).data("atajadas"));

        const video = $(this).data("video");
        const idJugador = $(this).data("idjugador");
        if (video) {
          // Expresiones regulares para varios formatos de YouTube
          const regexes = [
            /(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/,
            /youtube\.com\/shorts\/([a-zA-Z0-9_-]{11})/
          ];

          let videoId = null;
          for (const regex of regexes) {
            const match = video.match(regex);
            if (match && match[1]) {
              videoId = match[1];
              break;
            }
          }

          if (videoId) {
            $("#modalVideoContainer").html(`
              <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/${videoId}" 
                        title="Video del jugador" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                </iframe>
              </div>
            `);
          } else {
            $("#modalVideoContainer").html("<p class='text-muted'>Enlace de video no válido</p>");
          }
        } else {
          $("#modalVideoContainer").html("<p class='text-muted'>Sin video disponible</p>");
        }
        // Mostrar mensaje mientras carga
        document.getElementById('historialMedicoJugador').innerHTML = 'Cargando...';
        document.getElementById('historialFichajesJugador').innerHTML = 'Cargando...';

        // Cargar historial médico
        fetch('../logica/get_historial_medico.php?idjugador=' + idJugador)
        .then(response => response.text())
        .then(data => {
          document.getElementById('historialMedicoJugador').innerHTML = data;
        });

        // Cargar historial de fichajes
        fetch('../logica/get_historial_fichajes.php?idjugador=' + idJugador)
        .then(response => response.text())
        .then(data => {
          document.getElementById('historialFichajesJugador').innerHTML = data;
        });
        $("#modalDetalleJugador").modal("show");
      });
    </script>

    <script>
      // Mostrar modal hijo sin cerrar el modal padre
      document.getElementById('btnAbrirModalBuscarJugador').addEventListener('click', function () {
        const modalBuscarJugador = new bootstrap.Modal(document.getElementById('modalBuscarJugador'));
        modalBuscarJugador.show();
      });

      // Filtrado en tiempo real
      document.getElementById('buscarJugadorInput').addEventListener('keyup', function () {
        const value = this.value.toLowerCase();
        document.querySelectorAll('#modalBuscarJugador tbody tr').forEach(function (row) {
          row.style.display = row.innerText.toLowerCase().includes(value) ? '' : 'none';
        });
      });

      // Evento para seleccionar jugador
      document.querySelectorAll('.seleccionar-jugador').forEach(button => {
        button.addEventListener('click', () => {
          const id = button.getAttribute('data-id');
          const nombre = button.getAttribute('data-nombre');
          document.getElementById('idjugador').value = id;
          document.getElementById('nombre_jugador').value = nombre;

          // Cierra el modal hijo después de seleccionar
          bootstrap.Modal.getInstance(document.getElementById('modalBuscarJugador')).hide();
        });
      });
    </script>

    <script>
      document.querySelector("form").addEventListener("submit", function(e) {
        const archivo = document.getElementById("video").files[0];
        if (archivo && archivo.size > 20971520) { // 20MB
          e.preventDefault();
          alert("⚠️ El archivo excede los 20MB permitidos.");
        }
      });
    </script>
        <script>
      document.addEventListener('DOMContentLoaded', function () {
        const buscador = document.querySelector('.filtrar');
        const filtroClub = document.getElementById('filtro-club');
        const filtroTemp = document.getElementById('filtro-temporada');

        function filtrar() {
          const tarjetas = document.querySelectorAll('.buscar');
          const texto = buscador.value.toLowerCase();
          const club = filtroClub.value;
          const temp = filtroTemp.value;

          tarjetas.forEach(card => {
            const nombre = card.querySelector('.card-title')?.innerText.toLowerCase() || '';
            const clubActual = card.getAttribute('data-club') || '';
            const tempActual = card.getAttribute('data-temporada')

            const coincideTexto = nombre.includes(texto);
            const coincideClub = !club || clubActual === club;
            const coincideTemp = !temp || tempActual === temp;


            if (coincideTexto && coincideClub && coincideTemp) {
              card.style.display = '';
            } else {
              card.style.display = 'none';
            }
          });
        }

        buscador.addEventListener('input', filtrar);
        filtroClub.addEventListener('change', filtrar);
        filtroTemp.addEventListener('change', filtrar);
      });
    </script>
    <script>
    document.getElementById('filtro-temporada').addEventListener('change', function () {
  const temporada = this.value;

  
const params = new URLSearchParams(window.location.search);
  params.set('temporada', temporada); // actualiza o agrega anio

  window.location.search = params.toString(); 
  });
    </script>
  </body>
</html>