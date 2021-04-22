/*Se inicia la sesion Active donde se registran en las variables de sesion los datos del cliente, se realiza una consulta en la base datos y si el usuario coincide con el correo y la clave se inicia sesion, se reciben los datos del cliente por metodo POST*/
<?php

$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
    header("location: ../index.php");
} else {

    if (!empty($_POST)) {
        if (empty($_POST['correo']) || empty($_POST['clave'])) {
            $alert = 'Ingrese su usuario y su clave';
        } else {

            require_once "../PHP/ConexionBD.php";
            $objconexion = Conectarse();
            $user = mysqli_real_escape_string($objconexion, $_POST['correo']);
            $pass = md5(mysqli_real_escape_string($objconexion, $_POST['clave']));


            $query = mysqli_query($objconexion, "SELECT * from cliente where correo = '$user' and clave = '$pass'");
            $resul = mysqli_num_rows($query);

            if ($resul > 0) {
                $data = mysqli_fetch_array($query);

                $_SESSION['active'] = true;
                $_SESSION['cedula'] = $data['cedula'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['correo'] = $data['correo'];
                $_SESSION['telefono'] = $data['telefono'];
                $_SESSION['direccion'] = $data['direccion'];
                $_SESSION['imagen'] = $data['imagen'];

                header("location: ../index.php");
            } else {
                $alert = 'El usuario o la clave son incorrectos';
                session_destroy();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../iconos/fontawesome/css/all.css">
    <link rel="stylesheet" href="../CSS/Login.css">
    <title></title>
</head>

<body>
    <div class="wrapper">
        <div id="container">
            <h2 class="active">Iniciar Sesión</h2>
            <form name="loginform" method="post" class="caja">
                <div class="centrar_log">
                    <img class="iconocliente" src="../IMG/logo1.png">
                </div>

                <div class="form-group">
                    <input type="text" class="fadeIn second" placeholder="Correo" name="correo">

                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Contraseña" name="clave" autocomplete="off">

                </div><br>


                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div><br>

                <button class="btn-primary" name="enviar">Ingresar</button>

                <a href="../index.php" style="color: #336699; text-decoration:none;"><i class="fas fa-chevron-circle-left fa-1x">&nbsp;</i>Regresar</a>


                <div id="formFooter">
                    <p class="underlineHover">¿No tienes una cuenta? &nbsp;<a href="RegCliente.php" style="color: #336699; text-decoration:none">Registrate</a></p>
                </div>


            </form>

        </div>
    </div>
</body>

</html>