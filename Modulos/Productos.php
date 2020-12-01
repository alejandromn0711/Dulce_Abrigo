  
  
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

 

    <link rel="stylesheet" href="css/style.css">

    <title>Productos</title>
  </head>
 <body>

    <?php
$sql="SELECT * FROM producto";
$conexion=Conectarse();
$resul= mysqli_query($conexion,$sql);
if(mysqli_num_rows($resul) > 0){
    while ($row=mysqli_fetch_array($resul)){
?>
        <form class="proc" method="post" action="carrito.php?action=add&id=<?php echo $row['codproducto']; ?>">
            <?php
            ?>
<div class="row">
    <div class="col-3" style="min-width: 300px">
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
               
                <span class="cant">Cantidad:</span><input type="text" name="cantidad" class="form-control" value="1" /><br>
                <input type="hidden" name="hidden_nombre" value="<?php echo $row['nombre_producto'];?>" />
                <input type="hidden" name="hidden_precio" value="<?php echo $row['precio'];?>" />
                <input type="submit" name="agregar" class="btn btn-primary" class="btnadd" value="Añadir al Carro" style="background: #0062cc" />
                </div>
        </div>
    </div>
</div>            
        </form>

    
  </body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/all.min.js"></script>
        <?php
    }
}
    ?>
