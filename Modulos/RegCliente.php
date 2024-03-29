<head>
    <link rel="stylesheet" href="../iconos/fontawesome/css/all.css">
    <link rel="stylesheet" href="../CSS/Login.css">
    <title></title>
</head>

<body>
    <div class="wrapper">
        <div id="container">
            <h2 class="active">Registrate</h2>
            <form name="loginform" method="post" action="../PHP/Validar_Registro.php" class="caja">
                <div class="centrar_log">
                    <img class="iconocliente" src="../IMG/logo1.png" alt="">
                </div>

                <div class="form-group">
                    <input type="text" class="fadeIn second" placeholder="Cedula" name="cedula" required="" autocomplete="off" pattern="[0-9]+">
                </div>

                <div class=" form-group">
                    <input type="text" class="fadeIn second" placeholder="Nombre" name="nombre" required="" autocomplete="off" pattern="[A-Za-z ]+" >
                </div>

                <div class=" form-group">
                    <input type="email" class="fadeIn second" placeholder="Correo" name="correo" required="" autocomplete="off">
                </div>


                <div class="form-group">
                    <input type="text" class="fadeIn second" placeholder="Telefono" name="telefono" required="" autocomplete="off" pattern="[0-9]+">
                </div>

                <div class=" form-group">
                    <input type="text" class="fadeIn second" placeholder="Direccion" name="direccion" required="" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Contraseña" name="clave" required="" autocomplete="off">
                </div>

        </div><br>

        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div><br>

        <button class="btn-primary" name="enviar">Registrarse</button>

        <a href="../index.php" style="color: #336699; text-decoration:none;"><em class="fas fa-chevron-circle-left fa-1x">&nbsp;</em>Regresar</a>


        </form>

    </div>
    </div>