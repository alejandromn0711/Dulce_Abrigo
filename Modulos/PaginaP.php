<!DOCTYPE html>
<html>

<head>
    <title>Colchones Dulce Abrigo</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../iconos/fontawesome/css/all.css">
</head>

<body>



    <!--  IMG CARRUSEL -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="6000">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <!--CONTENIDO CARRUSEL-->
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="./img/banner3.jpg" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bienvenidos a nuestro sitio web</h5>
                    <p>Aqui podras encontrar productos para tu bienestar y un buen descanso.</p>
                </div>
            </div>



            <div class="carousel-item">
                <img src="./img/banner2.jpg" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Te ofrecemos los mejores productos</h5>
                </div>

            </div>



            <div class="carousel-item">
                <img src="./img/banner4.jpg" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Encontraras variacion de colores a tu preferencia</h5>
                    
                </div>
            </div>

        </div>
        <!--FIN CONTENIDO CARRUSEL-->

        <!--BOTONES CARRUSEL-->

        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="fas fa-chevron-left fa-2x"></span>
        </a>

        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="fas fa-chevron-right fa-2x"></span>
        </a>
        <!--FIN BOTONES CARRUSEL-->

    </div>

    <!--FIN IMG CARRUSEL-->

    <!--encabezado de la página principal-->

    <div class="col-12 text-center mt-5">
        <h1 class="text-dark pt-4">Conoce nuestros productos</h1>
        <div class="border-top border-primary w-25 mx-auto my-3"></div>
        <p class="lead">Aquí encontraras los mejores precios para sus camas, contamos con el mejor servicio en colchones, almohadas,sabanas y protectores.</p>
    </div>

    <!--SECCION TRES COLUMNAS-->

    <div class="container">
        <div class="row my-5">

            <div class="col-md-4 my-4">
                <img src="./img/ortopedicosolo.jpg" alt="" class="w-100">
                <h4 class="my-4">Colchones</h4>
                <p>Colchones Que Se Ajustan A Tus Necesidades</p>
                <a href="?p=colchones" class="btn btn-outline-dark btn-md">Ver productos...</a>
            </div>

            <div class="col-md-4 my-4">
                <img src="./img/almohadasola.jpg" alt="" class="w-100">
                <h4 class="my-4">Almohadas</h4>
                <p>Almohadas En Oferta</p>
                <a href="?p=almohadas" class="btn btn-outline-dark btn-md">Ver productos...</a>
            </div>

            <div class="col-md-4 my-4">
                <img src="./img/sabanasola.jpg" alt="" class="w-100">
                <h4 class="my-4">Sabanas</h4>
                <p>Las Mejores Sabanas Y Cobertores Para Colchon</p>
                <a href="?p=sabanas" class="btn btn-outline-dark btn-md">Ver productos...</a>
            </div>

        </div>
    </div>

    <!-- FIN SECCION TRES COLUMNAS-->

    <!--IMAGEN DE FONDO FIJA-->

    <div class="fixed-background">

        <div class="row text-dark py-5">
            <div class="col-12 text-center">
                <h1>Ya tienes un usuario?</h1>
                <h3 class="py-3">Registrate aqui</h3>


                <button type="button" data-toggle="modal" data-target="#modal1" class="btn btn-secondary btn-lg ml-2">Ver mas...</button>

            </div>
        </div>

        <div class="fixed-wrap">
            <div class="fixed"></div>
        </div>
    </div>

    <!-- FIN IMAGEN DE FONDO FIJA-->


    <!--MODAL-->

    <div class="modal fade" id="modal1">
        <div class="modal-dialog">
            <img src="./img/mol.gif" alt="" class="w-100">
        </div>
    </div>
    <!--FIN MODAL-->

    <!--SECCION DOS COLUMNAS-->

    <div class="container my-5">
        <div class="row py-4">

            <div class="col-lg-4 mb-4 my-lg-auto">
                <h1 class="text-dark font-weight-bold mb-3">Comodidad para tu hogar</h1>
                <p class="mb-4">Fabricamos colchones que cumplan con las espectativas de nuestros clientes, tambien ofrecemos sabanas, almohadas y protectores de colchon de muy buena calidad. </p>
                <a href="#" class="btn btn-outline-dark">Ver mas...</a>
            </div>

            <div class="col-lg-8"><img src="./img/banner.jpg" alt="" class="w-100"></div>

        </div>
    </div>
    <!--FIN SECCION DOS COLUMNAS-->

    <!--PARTE DE ABAJO DE LAS DOS COLUMNAS-->

    <div class="jumbotron py-5 mb-0">
        <div class="container">
            <div class="row">

                <div class="col-md-7 col-lg-8 col-xl-9 my-auto">
                    <h4>Conoce todos nuestros productos</h4>
                </div>

                <div class="col-md-5 col-lg-4 col-xl-3 pt-4 pt-md-0">
                    <a href="?p=Productos" class="btn btn-outline-dark">Ver productos</a>
                </div>
            </div>
        </div>
    </div>

    <!--FIN PARTE DE ABAJO DE LAS DOS COLUMNAS-->


</body>

</html>



<script src="../js/bootstrap.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/all.min.js"></script>
