<?php
if (!isset($_GET["p"])) {
    $p = "PrincipalADMI";
} else {
    $p = $_GET["p"];
}
?>


<!DOCTYPE html>
<html>

<?php
session_start();
if (isset($_SESSION['ADMI'])) {
?>

<head>

    <title>Administración</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-icons-1.0.0">
    <link rel="stylesheet" type="text/css" href="css/styleADMI.css">

</head>

<body>

    <div class="d-flex">
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold">Dulce Abrigo</h4>
            </div>

            <div class="menu">
                <a href="?p=VerPro" class="d-block text-light p-3"><svg width="1.3em" viewBox="0 0 16 16" class="bi bi-handbag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 0 1 6 0v2h-1V3a2 2 0 0 0-2-2zM5 5H3.361a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.356a2.5 2.5 0 0 0 2.472-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11v1.5a.5.5 0 0 1-1 0V5H6v1.5a.5.5 0 0 1-1 0V5z" />
                    </svg>&nbsp;&nbsp;Productos</a>

                <a href="?p=VerClientes" class="d-block text-light p-3"><svg width="1.3em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>&nbsp;&nbsp;Clientes</a>

                <a href="?p=PedidosADMI" class="d-block text-light p-3"><svg width="1.3em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>&nbsp;&nbsp;Pedidos</a>

                <a href="?p=FacturasADMI" class="d-block text-light p-3"><svg width="1.3em" viewBox="0 0 16 16" class="bi bi-card-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                        <path fill-rule="evenodd" d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                    </svg>&nbsp;&nbsp;Facturas</a>
            </div>
        </div>

        <div class="w-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container">
                    <a class="navbar-brand" href="indexADMI.php">Administración</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo ucwords($_SESSION['nombreADMI']);?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="?p=SalirADMI">Cerrar Sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="content">
                <section class="py-3 px-5">
                    <div class="container">

                        <?php
                        if (file_exists("modulos/" . $p . ".php")) {
                            include "modulos/" . $p . ".php";
                        } else {
                            echo "modulo desconocido";
                        }
                        ?>

                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

<?php
} else {
    header('location: ./Modulos/LoginADMI.php');
}
?>




</html>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle2.min.js"></script>