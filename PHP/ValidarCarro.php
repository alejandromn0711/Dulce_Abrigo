<?php
include "../PHP/configPDO.php";
include "../PHP/ConexionPDO.php";
include "../Carrito.php";
?>
<?php

$total = 0;
$SID = session_id();
$correo = $_SESSION['correo'];

foreach ($_SESSION['CARRITO'] as $indice => $producto) {
  $total = $total + ($producto['precio']) * $producto['cantidad'];
}

$sentencia = $pdo->prepare("INSERT INTO `ventas` (`id`, `clave_transaccion`, `fecha`, `correocli`, `total`, `estatus`)  VALUES 
     (NULL, :clave_transaccion, NOW(), :correo, :total, 'Pendiente' );");

$sentencia->bindParam(":clave_transaccion", $SID);
$sentencia->bindParam(":correo", $correo);
$sentencia->bindParam(":total", $total);
$sentencia->execute();
$idVenta = $pdo->lastInsertId();


foreach ($_SESSION['CARRITO'] as $indice => $producto) {

  $sentencia = $pdo->prepare("INSERT INTO `detalleventas` (`id`, `idventa`, `idproducto`, `preciounit`, `cantidad`) VALUES
     (NULL, :idventa, :idproducto, :preciounit, :cantidad);");

  $sentencia->bindParam(":idventa", $idVenta);
  $sentencia->bindParam(":idproducto", $producto['codproducto']);
  $sentencia->bindParam(":preciounit", $producto['precio']);
  $sentencia->bindParam(":cantidad", $producto['cantidad']);
  $sentencia->execute();
  $completado = $sentencia->rowCount();
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Colchones Dulce Abrigo</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../iconos/fontawesome/css/all.css">
</head>

<body>
  <div class="jumbotron text-center">
    <h1 class="display-4">¡Compra Realizada!</h1>
    <p class="lead"></p>
    <hr class="my-4">
    <p> Tu Pedido Ha Sido Realizado El Pago Contra Entrega Sera De:
    <h4>$<?php echo number_format($total); ?></h4>
    <h6>(IVA Incluido)</h6>
    </p>
    <a class="btn btn-primary btn-lg" href="../index.php" role="button">Volver Al Inicio</a><br><br><br>
    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#ventanamodal">Ver Factura</button><br><br><br>
    <p>
      Se Te Contactara Para Validar Tu Compra Y Los Productos Seran Enviados A La Puerta De Tu Casa 10 Dias Despues De Tu Encargo<br>
      <strong>(Para Dudas O Quejas: AsistenciaDulceAbrigo@gmail.com)</strong>
    </p>
  </div>

  <div class="modal fade bd-example-modal-lg" id="ventanamodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Factura</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            <?php
            if ($completado >= 1) {
              $sentencia = $pdo->prepare("SELECT * FROM `ventas` INNER JOIN `detalleventas` ON detalleventas.idventa = ventas.id 
          INNER JOIN `producto` ON detalleventas.idproducto = producto.codproducto WHERE ventas.id = :idventa");

              $sentencia->bindParam(":idventa", $idVenta);
              $sentencia->execute();

              $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            }
            ?>

          <div class="row">
            <?php
            foreach ($listaproductos as $producto) { ?>
              <div class="col-9">
                <div class="card">
                  <div class="card-body">
                    <p class="card-text">
                      <?php
                      echo "<b>Producto: </b>". $producto['nombre_producto'];
                      ?><br><?php echo "<b>Precio: </b>$" . $producto['precio'];
                            ?><br><?php echo "<b>Cantidad: </b>" . $producto['cantidad'];
                                  ?><br><?php echo "<b>Total: </b>$" . $producto['precio']*$producto['cantidad'];
                                        ?>
                    </p>
                  </div>
                </div>
              </div>
          </div>
        <?php
            } ?>

        </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Descargar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>

</html>