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
$id = $_REQUEST['id'];
echo $id;


    $sentencia = $pdo->prepare("SELECT * FROM `ventas` INNER JOIN `detalleventas` ON detalleventas.idventa = ventas.id 
              INNER JOIN `producto` ON detalleventas.idproducto = producto.codproducto WHERE ventas.id = :idventa");

    $sentencia->bindParam(":idventa", $id);
    $sentencia->execute();

    $listaproductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<head>
    <link rel="stylesheet" type="text/css" href="css/styleFacturasAd.css">
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img style="width:180px;" src="img/1600738901566.png">
        </div>
        <h1>FACTURA N° </h1>
        <div id="company" class="clearfix">
            <div>Dulce Abrigo</div>
            <div>Alfonso Lopez,<br /> Usme</div>
            <div>AsistenciaDulceAbrigo@gmail.com</div>
        </div>
        <div id="project">
            <div><span>N° DE VENTA: <?php echo $sentencia->idventa ?> ?></span></div>
            <div><span>CLIENTE: </span></div>
            <div><span>DIRECCION: </span></div>
            <div><span>EMAIL: </span></div>
            <div><span>FECHA: </span></div>
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

                    <td class="service"></td>
                    <td class="desc"></td>
                    <td class="unit"></td>
                    <td class="qty"></td>
                    <td class="total"></td>
                </tr>
                <tr style="text-align: center;">
                    <td><b> TOTAL </b></td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td></td>
                </tr>
            </tbody>

        </table>
</body>