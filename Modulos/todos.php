<?php
$sql="SELECT * FROM producto";
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
    <?php
}
}
?>
