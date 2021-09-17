<?php
//---AQUI ESTA LA CONEXION CON LA BASE DE DATOS
require_once("../composer/vendor/autoload.php");
include "../PHP/configPDO.php";
include "../PHP/ConexionPDO.php";
include "../Carrito.php";
?>

<?php
$total = 0;
$SID = session_id();
$correo = $_SESSION['email'];
$nombre = $_SESSION['nombre'];
$fechaActual = date('Y-m-d');
$estatus = "Pendiente";

foreach ($_SESSION['CARRITO'] as $indice => $producto) {
  $total = $total + ($producto['precio']) * $producto['cantidad'];
}

$sentencia = $pdo->prepare("INSERT INTO `ventas` (`id`, `session_id`, `fecha`, `nombrecli`, `total`, `estatus`)  VALUES 
     (NULL, :clave_transaccion, :fecha, :nombre, :total, :estatus );");

$sentencia->bindParam(":clave_transaccion", $SID);
$sentencia->bindParam(":nombre", $nombre);
$sentencia->bindParam(":total", $total);
$sentencia->bindParam(":estatus", $estatus);
$sentencia->bindParam(":fecha", $fechaActual);
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


  $html = '<body>
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
        <div><span>CLIENTE: '. $nombre .' </span></div>
        <div><span>DIRECCION: '. $_SESSION['direccion'] .' </span></div>
        <div><span>EMAIL: </span>'. $_SESSION['correo'] .'</div>
        <div><span>FECHA: </span>' . $fechaActual . '</div>
        <div><span>ESTATUS: </span>' . $estatus . ' </span></div>
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
        <tbody>'
            ; foreach ($listaproductos as $producto):
            $html .=
               '
          <tr>

            <td class="service">'. $producto['codproducto'] .'</td>
            <td class="desc">' . $producto['nombre_producto'] .'</td>
            <td class="unit">' . $producto['precio'] .'</td>
            <td class="qty">' . $producto['cantidad'] .'</td>
            <td class="total">' . $producto['cantidad']* $producto['precio'] . '</td>
          </tr>'; endforeach;
          $html .=
         '<tr style="text-align: center;">
              <td><b> TOTAL </b></td>
              <td> - </td>
              <td> - </td>
              <td> - </td>
              <td> $'. $total.' </td>
          </tr>
        </tbody>
      </table>
      <div id="AVISO">
        <div>NOTICE:</div>
        <div class="notice">Su Pedido Sera Entregado En La Proxima Semana En La Direccion Que Tiene Registrada Su Usuario</div>
      </div>
    </main>
    <footer>
      Guarde Una Copia De Esta Factura En Caso De Que Se Presente Un Error
    </footer>
  </body>';
    $mpdf->WriteHTML($html);
    $mpdf->Output();
        