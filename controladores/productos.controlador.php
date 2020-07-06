<?php

class ControladorProductos{
    
    /*        Mostrar Productos       */
    
    static public function ctrMostrarProductos($item, $valor){
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
        return $respuesta;
        
    }

    // CREAR PRODUCTO

    static public function ctrCrearProducto(){

        if(isset($_POST["nuevaDescripcion"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÚ ]+$/', $_POST["nuevaDescripcion"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoPrecioCompra"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoPrecioVenta"])){

                    $ruta = "vistas/img/default/anonymous.png";

                $tabla = "productos";

                $datos = array("id_categoria" => $_POST["nuevaCategoria"],
							   "codigo" => $_POST["nuevoCodigo"],
							   "descripcion" => $_POST["nuevaDescripcion"],
							   "stock" => $_POST["nuevoStock"],
							   "precio_compra" => $_POST["nuevoPrecioCompra"],
							   "precio_venta" => $_POST["nuevoPrecioVenta"],
							   "imagen" => $ruta);


            $respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

            

            if($respuesta == "ok"){
                
                echo'<script>
                      swal({
                      title: "El producto ha sido guardado correctamente",
                      showConfirmButtonText: "true",
                      confirmButtonText: "cerrar",
                      icon: "success",
                      
                      }).then(function(result){
                         if(result.value){
                             window.location = "productos";
                         }
                      });
                      </script>';
            }


            }else{
                
                echo'<script>
                          swal({
                          title: "El producto no debe tener campos vacios o incluir caracteres especiales",
                          showConfirmButtonText: true,
                          confirmButtonText: "cerrar",
                          icon: "error",
                          
                          }).then(function(result){
                             if(result.value){
                                 window.location = "productos";
                             }
                          });
                          </script>';
            }
        }

    }
    
}