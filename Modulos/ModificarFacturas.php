<?php
//---AQUI ESTA LA CONEXION CON LA BASE DE DATOS
include("../PHP/ConexionBD.php");
extract($_REQUEST);
$idVenta = $_REQUEST['id'];
$fecha = $_REQUEST['fecha'];
$nombre = $_REQUEST['nombre'];
$total = $_REQUEST['total'];
$estatus = $_REQUEST['estatus'];
$pedidos = "SELECT * FROM `ventas` INNER JOIN `detalleventas` ON detalleventas.idventa = ventas.id 
              INNER JOIN `producto` ON detalleventas.idproducto = producto.codproducto WHERE ventas.id = $idVenta";
$Conexion = Conectarse();
?>

<head>
    <link rel="stylesheet" type="text/css" href="../css/styleFacturasAd.css">
    <link rel="icon" type="image/jpg" href="../img/icon.ico">
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img style="width:180px;" src="../img/1600738901566.png">
        </div>
        <h1>FACTURA N° <?php echo $idVenta ?> </h1>
        <div id="company" class="clearfix">
            <div>Dulce Abrigo</div>
            <div>Alfonso Lopez,<br /> Usme</div>
            <div>AsistenciaDulceAbrigo@gmail.com</div>
        </div>
        <div id="project">
            <div><span>N° DE VENTA: <?php echo $idVenta ?></span></div>
            <div><span>CLIENTE: <?php echo $nombre ?> </span></div>
            <div><span>FECHA: <?php echo $fecha ?></span></div>
            <div><span>ESTATUS: <?php echo $estatus ?></span></div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">ID</th>
                    <th class="service">ID PRODUCTO</th>
                    <th class="desc">PRODUCTO</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $result = mysqli_query($Conexion, $pedidos);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <td class="service"> <?php echo  $row['idventa'] ?></td>
                        <td class="desc"> <?php echo $row['idproducto'] ?> </td>
                        <td class="desc"> <?php echo $row['nombre_producto'] ?> </td>
                        <td class="unit"><?php echo $row['preciounit'] ?></td>
                        <td class="qty"><?php echo $row['cantidad'] ?></td>
                        <td class="total"><?php echo $row['precio'] * $row['cantidad'] ?></td>

                </tr> <?php } ?>
            <tr style="text-align: center;">
                <td><b> TOTAL </b></td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
                <td><?php echo $total ?></td>
                </td>
            </tr>
            </tbody>

        </table>
</body>