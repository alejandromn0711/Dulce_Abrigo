<?php
	if (!isset($_SESSION)) {
	session_start();
	}
	require "PHP/config.php";
    $mensaje = "";


    if(isset($_POST['btnAccion'])){
        $msj = "Upss... ID Incorrecto";
        switch($_POST['btnAccion']){
            case 'Agregar':
                
                    if(is_numeric(openssl_decrypt( $_POST['codproducto'], COD, KEY))){
                        $ID = openssl_decrypt( $_POST['codproducto'], COD, KEY);
                        $mensaje.="ID Correcto... ".$ID;
                    }else{
                        $mensaje.=$msj.$ID;
                    }


                    if(is_string(openssl_decrypt( $_POST['nombre_producto'], COD, KEY))){
                        $NOMBRE = openssl_decrypt( $_POST['nombre_producto'], COD, KEY);
                        $mensaje.="Nombre ".$NOMBRE;
                    }else{
                        $mensaje.="Upss... Algo paso con tu nombre".$NOMBRE;
                    }


                    if(is_numeric( $_POST['cantidad'])){
                        $CANTIDAD = $_POST['cantidad'];
                        $mensaje.="Cantidad ".$CANTIDAD;
                    }else{
                        $mensaje.=$msj.$CANTIDAD;
                    }


                    if(is_numeric(openssl_decrypt( $_POST['precio'], COD, KEY))){
                        $PRECIO = openssl_decrypt( $_POST['precio'], COD, KEY);
                        $mensaje.="El precio es... ".$PRECIO;
                    }else{
                        $mensaje.=$msj.$PRECIO;
                    }
					if (!isset($_SESSION['CARRITO'])) {

						$producto=array(
							'codproducto'=>$ID,
							'nombre'=>$NOMBRE,
							'precio'=>$PRECIO,
							'cantidad'=>$CANTIDAD
						);
							$_SESSION['CARRITO'][0]=$producto;
                            $mensaje="Producto Agregado.";                            
					}else{
                        $id_productos=array_column($_SESSION['CARRITO'], 'codproducto');
                        if (in_array($ID, $id_productos)) {
                            echo "<script>alert('El Producto Ya Ha Sido Agregado');</script>";
                            $mensaje="";
                        }else{

						$num_productos=count($_SESSION['CARRITO']);
						$producto=array(
							'codproducto'=>$ID,
							'nombre'=>$NOMBRE,
							'precio'=>$PRECIO,
							'cantidad'=>$CANTIDAD		
							);	
						$_SESSION['CARRITO'][$num_productos]=$producto;
                         $mensaje="Producto Agregado.";
					}
                }
					
                break;
                case "Eliminar":
                    if(is_numeric( openssl_decrypt( $_POST['codproducto'], COD, KEY))){
                        $ID = openssl_decrypt( $_POST['codproducto'], COD, KEY);
                
                        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                            if ($producto['codproducto']==$ID) {
                                unset($_SESSION['CARRITO'][$indice]);
                                echo "<script>alert('Elemento Borrado...');</script";
                            }
                        }
                    }else{
                        $mensaje.=$msj;
                    }
                    break;

                    default:
                        

                        break;
        }
    }
?>				



	
