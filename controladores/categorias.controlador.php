<?php
class ControladorCategorias{
    
    /*CREAR CATEGORIAS*/
    static public function ctrCrearCategoria(){
        
        if(isset($_POST["nuevaCategoria"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÚ ]+$/', $_POST["nuevaCategoria"])){
                
                $tabla = "categorias";
                $datos = $_POST["nuevaCategoria"];
                
                $respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);
                
                if($respuesta == "ok"){
                    echo '<script>
                          swal({
                          title: "La categoria guardada correctamente",
                          showConfirmButtonText: "true",
                          confirmButtonText: "cerrar",
                          icon: "success",
                          
                          }).then(function(result){
                             if(result.value){
                                 window.location = "categorias";
                             }
                          });
                          </script>';
                }
            
            }else{
                echo '<script>
                          swal({
                          title: "La categoria no debe ir vacia o incluir caracteres especiales",
                          showConfirmButtonText: true,
                          confirmButtonText: "cerrar",
                          icon: "error",
                          
                          }).then(function(result){
                             if(result.value){
                                 window.location = "categorias";
                             }
                          });
                          </script>';
                }
        }
    }
    /* Mostrar categorias  */
    static public function ctrMostrarCategorias($item, $valor){
        
        $tabla = "categorias";
        
        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
        
        return $respuesta;
    }
    /*               EDITAR CATEGORIAS           */
    static public function ctrEditarCategoria(){
        
        if(isset($_POST["editarCategoria"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÚ ]+$/', $_POST["editarCategoria"])){
                
                $tabla = "categorias";
                $datos = array("categoria"=>$_POST["editarCategoria"],
                                "id"=>$_POST["idCategoria"]);
                
                $respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);
                
                if($respuesta == "ok"){
                    echo '<script>
                          swal({
                          title: "La categoria ha sido actualizada correctamente",
                          showConfirmButtonText: "true",
                          confirmButtonText: "cerrar",
                          icon: "success",
                          
                          }).then(function(result){
                             if(result.value){
                                 window.location = "categorias";
                             }
                          });
                          </script>';
                }
                
            }else{
                echo '<script>
                          swal({
                          title: "La categoria no debe ir vacia o incluir caracteres especiales",
                          showConfirmButtonText: "true",
                          confirmButtonText: "cerrar",
                          icon: "error",
                          
                          }).then(function(result){
                             if(result.value){
                                 window.location = "categorias";
                             }
                          });
                          </script>';
            }
        }
    }
    /*               BORRAR CATEGORIA           */
    
    static public function ctrBorrarCategoria(){
        
        if(isset($_GET["idCategoria"])){
            
            $tabla = "categorias";
            $datos = $_GET["idCategoria"];
            
            $respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);
            
            if($respuesta == "ok"){
                
                echo '<script>
                          swal({
                          title: "La categoria se ha borrado con exito",
                          showConfirmButtonText: true,
                          confirmButtonText: "cerrar",
                          icon: "success",
                          closeOnConfirm: false,
                          }).then((result)=>{
                             if(result.value){
                                 window.location = "categorias";
                             }
                          });
                          </script>';
            }
            
        }
    }
}