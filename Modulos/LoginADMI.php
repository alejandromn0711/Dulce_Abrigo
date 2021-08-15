<?php

$alert = '';
session_start();
if (!empty($_SESSION['ADMI'])) {
    header("location: ../indexADMI.php");
} else {

    if (!empty($_POST)) {
        if (empty($_POST['nombreusuario']) || empty($_POST['clave'])) {
            $alert = 'Ingrese su usuario y su clave';
        } else {

            require_once "../PHP/ConexionBD.php";
            $objconexion = Conectarse();
            $user = mysqli_real_escape_string($objconexion, $_POST['nombreusuario']);
            $pass = md5(mysqli_real_escape_string($objconexion, $_POST['clave']));


            $query = mysqli_query($objconexion, "SELECT * from usuario where nombreusuario = '$user' and clave = '$pass'");
            $resul = mysqli_num_rows($query);

            if ($resul > 0) {
                $data = mysqli_fetch_array($query);

                $_SESSION['ADMI'] = true;
                $_SESSION['idusuario'] = $data['idusuario'];
                $_SESSION['nombreADMI'] = $data['nombre'];
                $_SESSION['correoADMI'] = $data['correo'];


                header("location: ../indexADMI.php");
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
      <link rel="icon" type="image/jpg" href="../img/icon.ico">
    <link rel="stylesheet" href="../iconos/fontawesome/css/all.css">
    <link rel="stylesheet" href="../CSS/Login.css">
    <title></title>
</head>

<body>
    <div class="wrapper">
        <div id="container">
            <h2 class="active">Iniciar Sesión ADMI</h2>
            <form name="loginform" method="post" class="caja">
                <div class="centrar_log">
                    <img class="iconocliente" src="../IMG/logo1.png">
                </div>

                <div class="form-group">
                    <input type="text" class="fadeIn second" placeholder="Usuario" name="nombreusuario" autocomplete="off">

                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Contraseña" name="clave" autocomplete="off">

                </div><br>


                <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div><br>

                <button class="btn-primary" name="enviar">Ingresar</button>

                <a href="../index.php" style="color: #336699; text-decoration:none"><i class="fas fa-chevron-circle-left fa-1x">&nbsp;</i>Regresar</a>




            </form>

        </div>
    </div>
</body>

</html>