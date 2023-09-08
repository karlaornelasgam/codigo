<?php
$title = "Administración de Capacitacion";
//require_once(dirname(dirname(dirname(__FILE__))) . "\controllers\conexion.php");
require_once("../../controllers/conexion.php");

if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION['userId'])) {
        header('location: ../../login.php');
    } else {
        switch ($_SESSION['userRoleName']) {
            case 'Administrador':
                break;
            case 'Asesor':
                break;
            default:
                header('location: ../../capacitaciones.php');
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/dashboard/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/dashboard/img/favicon.png">
    <link rel="shortcut icon" href="../../assets/dashboard/img/favicon.png" type="image/x-icon">
    <title>
        Administrador - <?php echo $title ?>
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/dashboard/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>

<body class="g-sidenav-show  bg-gray-200">
    <?php include_once('sources/navDashb.php'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <div class="me-3 ms-0">
                    <a href="capacitaciones.php" class="fs-5"><i class="bi bi-arrow-left"></i>Volver</a>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Inicio</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Administrador</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0"><?php echo $title ?></h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none"><?php echo $_SESSION['userName'] ?></span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <!--Aquí va el contenido de la página-->
        <section>
            <div class="container-fluid pt-4">
                <?php include_once('sources/modal.agregar.tema.php') ?>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarTemaModal">
                    <i class="material-icons opacity-10">add</i> Agregar Tema
                </button>
            </div>
        </section>
        <!--<section>
            <div class="container-flush">
                <div class="card m-4 p-3">
                    <?php /* $conexion = new Conexion();
                    $list = $conexion->ejecutarQuery("SELECT * FROM capacitaciones WHERE id={$_GET['id']}");
                    $array = mysqli_fetch_assoc($list); ?>
                    <h4 class="text-center">Datos de la capacitacion:</h4>
                    <div class="input-group input-group-dynamic mb-4 is-filled">
                        <label class="form-label">Nombre</label>
                        <input type="text" value="<?php echo $array['nombre']; ?>" class="form-control" disabled>
                    </div>
                    <div class="input-group input-group-dynamic mb-4 is-filled">
                        <label class="form-label">Descripcion</label>
                        <input type="text" value="<?php echo $array['descripcion']; ?>" class="form-control" disabled>
                    </div>
                    <div class="input-group input-group-dynamic mb-4 is-filled">
                        <label class="form-label">Objetivo</label>
                        <input type="text" value="<?php echo $array['objetivo']; ?>" class="form-control" disabled>
                    </div>
                    <div class="input-group input-group-dynamic mb-4 is-filled">
                        <label class="form-label">Horas</label>
                        <input type="text" value="<?php echo $array['horas']; */ ?>" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </section>-->
        <section>
            <div class="container-flex container-curso2 mt-5">
                <?php
                $conexion = new Conexion();
                $list = $conexion->ejecutarQuery("SELECT * FROM temas WHERE idCapacitacion='{$_GET['id']}'");
                while ($row = mysqli_fetch_assoc($list)) { ?>
                    <?php include('sources/modal.agregar.sesion.php');
                    $tabla = "temas";
                    require("sources/modal.eliminar.php"); ?>
                    <div class="card m-4 p-3">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <div class="row">
                                        <div class="col">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#TemaAcordeon<?php echo $row['numero'] ?>" aria-expanded="false" aria-controls="TemaAcordeon<?php echo $row['numero'] ?>">
                                                <i class="material-icons">circle</i>
                                                <div class="text-uppercase fw-bold fs-5">
                                                    Tema <?php echo $row['numero'] . ": " . $row['nombre'] ?>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-sm btn-outline-danger float-end" data-bs-toggle="modal" data-bs-target="#eliminarModal<?php echo $row['id'] ?>">
                                                <i class="material-icons fs-4">delete</i>
                                            </button>
                                        </div>
                                    </div>
                                </h2>
                                <div id="TemaAcordeon<?php echo $row['numero'] ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne">
                                    <div class="accordion-body"><?php echo $row['descripcion'] ?>
                                        <div style="text-align: -webkit-center;">
                                            <?php
                                            $conexion = new Conexion();
                                            $list2 = $conexion->ejecutarQuery("SELECT * FROM sesiones WHERE idTema = {$row['id']}");
                                            while ($row2 = mysqli_fetch_assoc($list2)) { ?>
                                                <div class="card lesson">
                                                    <div class="card-body">
                                                        <a href="sesion.php?id=<?php echo $_GET['id'] ?>&ref=<?php echo $row2['id'] ?>"><button class="btnGear"><i class="bi bi-gear"></i></button></a>
                                                        <p class="fs-5 fw-bold"><?php echo $row2['nombre'] ?>:</p>
                                                        <p><?php echo $row2['descripcion'] ?></p>
                                                    </div>
                                                </div>
                                                <p class="fs-2"><i class="bi bi-arrow-down"></i></p>
                                            <?php }
                                            ?>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarSesionModal<?php echo $row['id']; ?>">
                                                <i class="material-icons opacity-10">add</i> Agregar Sesion
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                mysqli_free_result($list) ?>
            </div>
        </section>

    </main>
    <?php require_once('sources/plugin.php'); ?>
    <!--   Core JS Files   -->
    <script src="../../assets/dashboard/js/core/popper.min.js"></script>
    <script src="../../assets/dashboard/js/core/bootstrap.min.js"></script>
    <script src="../../assets/dashboard/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/dashboard/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../../assets/dashboard/js/plugins/chartjs.min.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/dashboard/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>