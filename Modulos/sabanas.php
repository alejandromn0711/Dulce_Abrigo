 <?php
if (!isset($_GET["c"])) {
  $c = "3";
} else {
  $c = $_GET["c"];
}
?>
  
<?php
require_once "PHP/conexionbd.php";
if(isset($_POST['agregar']))
{
    if(isset($_SESSION['add_carro']))
    {
        $item_array_id_cart = array_column($_SESSION['add_carro'],'item_id');
        if(!in_array($_GET['id'],$item_array_id_cart))
        {

            $count= count($_SESSION['add_carro']);
            $item_array = array(
                'item_id'        => $_GET['id'],
                'item_nombre'    => $_POST['hidden_nombre'],
                'item_precio'    => $_POST['hidden_precio'],
                'item_cantidad'  => $_POST['cantidad'],
            );

            $_SESSION['add_carro'][$count]=$item_array;
        }
        else
            {
              echo '<script>alert("El Producto ya existe!");</script>';
            }
    }
    else
        {
            $item_array = array(
                'item_id'        => $_GET['id'],
                'item_nombre'    => $_POST['hidden_nombre'],
                'item_precio'    => $_POST['hidden_precio'],
                'item_cantidad'  => $_POST['cantidad'],
            );

            $_SESSION['add_carro'][0] = $item_array;
        }
}
if(isset($_GET['action']))
{
    if($_GET['action']=='delete')
    {
        foreach ($_SESSION['add_carro'] AS $key => $value)
        {
            if($value['item_id'] == $_GET['id'])
            {
                unset($_SESSION['add_carro'][$key]);
                echo '<script>alert("El Producto Fue Eliminado!");</script>';
                echo '<script>window.location="index.php";</script>';
            }

        }

    }

}
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Productos</title>
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
        <div class="carousel-inner" style="padding-bottom: 20px; background-color: #eaeaea;">

            <div class="carousel-item active">
                <img src="./img/promociones.jpg" alt="" style="width: 100%; height: 10%;">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>



            <div class="carousel-item">
                <img src="./img/promociones.jpg" alt="" style="width: 100%; height: 10%;">
                <div class="carousel-caption d-none d-md-block">
                </div>

            </div>



            <div class="carousel-item">
                <img src="./img/promociones.jpg" alt="" style="width: 100%; height: 10%;">
                <div class="carousel-caption d-none d-md-block">
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
  <div class="container">
    <br>
    <?php if ($mensaje!="") { ?>
    <div class="alert alert-primary">
        <?php 
        echo $mensaje;
        ?>
        <a href="index.php?p=MostrarCarrito" class="badge badge-primary" style="background: #4981b3">Ver Carrito</a>
    </div>
<?php } ?>
</div>

<div class="categorias_var">
    <ul>
        <li><a href="?p=colchones"><img src="img/catColchon.jpg"><br>COLCHONES</a></li>
        <li><a href="?p=almohadas"><img src="img/catAlmohada.jpg"><br>ALMOHADAS</a></li>
        <li><a href="?p=sabanas"><img src="img/catSabana.jpg"><br>SABANAS</a></li>
        <li><a href="?p=bases"><img src="img/catBase.jpg"><br>BASE CAMAS</a></li>
        <li><a href="?p=telas"><img src="img/catTela.jpg"><br>TELAS</a></li>

    </ul>
        
</div>

<?php
$sql="SELECT * FROM producto where fk_idcategoria=$c";
$conexion=Conectarse();
$resul= mysqli_query($conexion,$sql);
if(mysqli_num_rows($resul) > 0){
    while ($row=mysqli_fetch_array($resul)){
?>

<div class="proc">   
    <div class="col-3" style="min-width: 300px; margin-left:142px; margin-top: 90px; margin-right: -140px;">
        <div class="card" style="border-color: #cdcdcd">
                <img 
                title="<?php echo $row['nombre_producto'];?>"
                alt="<?php echo $row['nombre_producto'];?>"          
                class="card-img-top" 
                src="img/<?php echo $row['imagen'];?>" 
                data-toggle="popover"
                data-trigger="hover"
                data-content="<?php echo $row['descripcion'];?>"
                >
                <div class="card-body">
                <h5><?php echo $row['nombre_producto'];?></h5>
                <h5 class="card-title">$<?php echo $row['precio'];?></h5>
               
            <form action="" method="post">
                <input type="hidden" name="codproducto" id="codproducto" value="<?php echo openssl_encrypt($row['codproducto'], COD, KEY);?>">
                <input type="hidden" name="nombre_producto" id="nombre_producto" value="<?php echo openssl_encrypt($row['nombre_producto'], COD, KEY);?>">
                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($row['precio'], COD, KEY);?>">
                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY);?>">
                <button class="btn btn-primary"
                name="btnAccion"  
                value="Agregar"
                type="submit"
                style="background: #204a87; border: solid 1px #204a87;">Agregar</button>
            </form>
        </div>
    </div>
</div>            
</div>
    
  </body>
</html>

        <?php
    }
}
    ?>
