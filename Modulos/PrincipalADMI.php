<!DOCTYPE html>
<html>

<?php

if (isset($_SESSION['ADMI'])) {

?>

<head>
<link rel="stylesheet" type="text/css" href="css/styleADMI.css">
</head>
<div id="content">
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="font-weight-bold nb-0">Bienvenid@ <?php echo ucwords($_SESSION['nombreADMI']); ?> </h1>
                    <p class="lead text-muted">Revisa la ultima información</p>
                </div>
                <div class="col-lg-3 d-flex">
                    <button class="btn btn-primary w-100 align-self-center">Ver pedidos</button>
                </div>

            </div>
        </div>
    </section>
</div>


<?php } ?>

</html>