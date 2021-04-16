<?php
require_once("../composer/vendor/autoload.php");
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
if ($completado >= 1) {
  $sentencia = $pdo->prepare("SELECT * FROM `ventas` INNER JOIN `detalleventas` ON detalleventas.idventa = ventas.id 
              INNER JOIN `producto` ON detalleventas.idproducto = producto.codproducto WHERE ventas.id = :idventa");

  $sentencia->bindParam(":idventa", $idVenta);
  $sentencia->execute();

  $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
}

?>
<?php

  $css = file_get_contents('../css/stylepdf.css');

  $mpdf = new \Mpdf\Mpdf([]);
  $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);

  $mpdf->WriteHTML(
  '<body>
    <header class="clearfix">
      <div id="logo">
        <img style="width:180px;" src="../img/1600738901566.png">
      </div>
      <h1>FACTURA N° '. $idVenta .'</h1>
      <div id="company" class="clearfix">
        <div>Dulce Abrigo</div>
        <div>Alfonso Lopez,<br /> Usme</div>
        <div><a style="  color: #5D6975;
      text-decoration: underline;" href="AsistenciaDulceAbrigo@gmail.com">AsistenciaDulceAbrigo@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>N° DE VENTA: '. $idVenta .'  </span></div>
        <div><span>CLIENTE: '. $correo .' </span></div>
        <div><span>DIRECCION: '. $_SESSION['direccion'] .' </span></div>
        <div><span>EMAIL: </span>'. $_SESSION['correo'] .'</div>
        <div><span>FECHA: </span>' . $producto['fecha'] . '</div>
        <div><span>ESTATUS: </span></div>
     </div>
    </header>
    <main>


      <table>
        <thead>
          <tr>
            <th class="service">ID</th>
            <th class="desc">PRODUCTO</th>
            <th>PRECIO</th>
            <th>CANTIDAD</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">'. $producto['codproducto'] .'</td>
            <td class="desc">' . $producto['nombre_producto'] .'</td>
            <td class="unit">' . $producto['precio'] .'</td>
            <td class="qty">' . $producto['cantidad'] .'</td>
            <td class="total">' . $producto['cantidad']* $producto['precio'] . '</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>', \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->output("Factura_ .pdf", "I");
?>