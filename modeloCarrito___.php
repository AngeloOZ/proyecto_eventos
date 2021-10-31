<?php
    session_start();

    $mensaje = "";


    if(isset($_POST['btnAccion'])){
        switch($_POST['btnAccion']){
            case 'Agregar':
                
                    if(is_numeric( $_POST['id_menu'])){
                        $ID = $_POST['id_menu'];
                        $mensaje.="ID Correcto... ".$ID."<br/>";
                    }else{
                        $mensaje.="Upss... ID Incorecto".$ID."<br/>";
                    }


                    if(is_string( $_POST['detalle'])){
                        $DETALLE = $_POST['detalle'];
                        $mensaje.="Nombre ".$DETALLE."<br/>";
                    }else{
                        $mensaje.="Upss... Algo paso con tu nombre".$DETALLE."<br/>";
                    }


                    if(is_numeric( $_POST['cantidad'])){
                        $CANTIDAD =  $_POST['cantidad'];
                        $mensaje.="Cantidad ".$CANTIDAD."<br/>";
                    }else{
                        $mensaje.="Upss... ID Incorecto".$CANTIDAD."<br/>";
                    }


                    if(is_numeric( $_POST['precio'])){
                        $PRECIO = $_POST['precio'];
                        $mensaje.="El precio es... ".$PRECIO."<br/>";
                    }else{
                        $mensaje.="Upss... ID Incorecto".$PRECIO."<br/>";
                    }

                    if(!isset($_SESSION['CARRITO'])){ 
                        $producto=array(
                           'ID'=>$ID,
                           'DETALLE'=>$DETALLE,
                           'CANTIDAD'=>$CANTIDAD,
                           'PRECIO'=>$PRECIO, 
                        );
                        $_SESSION['CARRITO'][0]=$producto;
                        $mensaje = "Producto agregado al carrito";

                    }else{

                        $idProductos = array_column($_SESSION['CARRITO'], "ID");

                        if(in_array($ID, $idProductos)){
                            $mensaje = "El producto ya fue agregado";
                        } else{


                        $NumeroProductos=count($_SESSION['CARRITO']);
                        $producto=array(
                            'ID'=>$ID,
                            'DETALLE'=>$DETALLE,
                            'CANTIDAD'=>$CANTIDAD,
                            'PRECIO'=>$PRECIO, 
                         );
                         $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                         $mensaje = "Producto agregado al carrito";
                    }
                }
                    //$mensaje=print_r($_SESSION,true);
                    
                break;

                case "Eliminar":                    
                        if(is_numeric($_POST['id'])){
                            $ID = $_POST['id'];
                            foreach($_SESSION['CARRITO'] as $indice => $producto){
                                if($producto['ID'] == $ID){
                                    unset($_SESSION['CARRITO'][$indice]);
                                    $_SESSION['CARRITO']=array_values($_SESSION["CARRITO"]); 
                                    echo "<script>alert('Elemento eliminado')</script>";
                                }
                            }
                        } else {

                        }
                break;
        }
    }
?>