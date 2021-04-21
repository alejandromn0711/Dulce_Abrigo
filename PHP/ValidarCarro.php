<?php
include "../PHP/configPDO.php";
include "../PHP/ConexionPDO.php";
include "../Carrito.php";
?>
<?php

$total = 0;
$SID = session_id();
$correo = $_SESSION['nombre'];
foreach ($_SESSION['CARRITO'] as $indice => $producto) {
  $total = $total + ($producto['precio']) * $producto['cantidad'];
}

$sentencia = $pdo->prepare("INSERT INTO `ventas` (`id`, `session_id`, `fecha`, `correocli`, `total`, `estatus`)  VALUES 
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
    <form action="../index.php" method="post">
      <input type="submit" class="btn btn-primary btn-lg" name="sesionDestroy" value="Finalizar" />
    </form><br>
    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#ventanamodal">Resumen Compra</button><br><br><br>
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

            echo "Factura Nro: " . $idVenta . " Para el cliente " . $correo;
            ?>


          <div class="row">
            <table class="table">
              <tr style="text-align: center;">
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
              </tr>
              <?php
              foreach ($listaproductos as $producto) { ?>
                <tbody>
                  <tr style="text-align: center;">
                    <td> <?php echo $producto['codproducto'] ?></td>
                    <td><?php echo $producto['nombre_producto'] ?></td>
                    <td>$<?php echo $producto['precio'] ?> </td>
                    <td> <?php echo $producto['cantidad'] ?> </td>
                    <td>$<?php echo $producto['precio'] * $producto['cantidad'] ?></td>
                  </tr>
                <?php
              } ?>
                <tr style="text-align: center;">
                  <td><b> TOTAL </b></td>
                  <td> - </td>
                  <td> - </td>
                  <td> - </td>
                  <td> $<?php echo $total ?> </td>
                </tr>
          </div>
        </div>
      </div>
    </div>

    </p>
  </div>
  <div class="modal-footer">
    <a class="btn btn-primary" target="_blank" download="Factura.pdf" href="../Modulos/Factura.php">Ver Factura</a>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
  </div>
  </div>
  </div>
  </div>
</body>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.js"></script>

</html>