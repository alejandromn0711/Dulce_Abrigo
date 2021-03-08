<?php
require_once ("../composer/vendor/autoload.php");
require "../PHP/ClasesCarro.php";
require "../PHP/ConexionBD.php";


$objConexion = Conectarse();
$objProducto = new Carro();

$resultado = $objProducto->consultarVenta();


$sql = "SELECT * FROM ventas";
$conexion = Conectarse();
$resul = mysqli_query($conexion, $sql);
if (mysqli_num_rows($resul) > 0) {
	while ($row = mysqli_fetch_array($resul)) {
$css=file_get_contents('../css/stylepdf.css');

$mpdf= new \Mpdf\Mpdf([

]);
$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS); 

$mpdf-> WriteHTML('<body>
    <header class="clearfix">
      <div id="logo">
        <img style="width:180px;" src="../img/1600738901566.png">
      </div>
      <h1>FACTURA N° '.$row["id"].' </h1>
      <div id="company" class="clearfix">
        <div>Dulce Abrigo</div>
        <div>Alfonso Lopez,<br /> Usme</div>
        <div><a style="  color: #5D6975;
      text-decoration: underline;" href="AsistenciaDulceAbrigo@gmail.com">AsistenciaDulceAbrigo@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>N° DE VENTA  </span>'. $row["id"]  .'</div>
        <div><span>CLIENTE  </span>'. $row["cliente"]. '</div>
        <div><span>DIRECCION  </span>'.$row["direccion"].'</div>
        <div><span>EMAIL  </span>'.$row["correocli"].'</div>
        <div><span>FECHA  </span>'.$row["fecha"].'</div>
        <div><span>ESTATUS  </span>'.$row["estatus"].'</div>
     </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">PRODUCTO</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRECIO</th>
            <th>CANTIDAD</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Design</td>
            <td class="desc">Creating a recognizable design solution based on the companys existing visual identity</td>
            <td class="unit">$40.00</td>
            <td class="qty">26</td>
            <td class="total">$1,040.00</td>
          </tr>
          <tr>
            <td class="service">Development</td>
            <td class="desc">Developing a Content Management System-based Website</td>
            <td class="unit">$40.00</td>
            <td class="qty">80</td>
            <td class="total">$3,200.00</td>
          </tr>
          <tr>
            <td class="service">SEO</td>
            <td class="desc">Optimize the site for search engines (SEO)</td>
            <td class="unit">$40.00</td>
            <td class="qty">20</td>
            <td class="total">$800.00</td>
          </tr>
          <tr>
            <td class="service">Training</td>
            <td class="desc">Initial training sessions for staff responsible for uploading web content</td>
            <td class="unit">$40.00</td>
            <td class="qty">4</td>
            <td class="total">$160.00</td>
          </tr>
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$'.$row["total"].'</td>
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
  </body>', \Mpdf\HTMLParserMode::HTML_BODY );



$mpdf->output("Factura_".$row["cliente"].".pdf","I");
 }
}
?>