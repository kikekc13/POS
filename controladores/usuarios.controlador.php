<?php

class ControladorUsuarios
{
    /* --------      Ingreso usuarios  -------------*/
    
    static public function ctrIngresoUsuario()
    {
        
        if (isset($_POST["ingUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {
                
                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                
                $tabla = "usuarios";
                $item = "usuario";
                $valor = $_POST["ingUsuario"];
                
                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
                
                if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {
                    if ($respuesta["estado"] == 1) {
                    
                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["usuario"] = $respuesta["usuario"];
                    $_SESSION["foto"] = $respuesta["foto"];
                    $_SESSION["perfil"] = $respuesta["perfil"];
    
                        /* --------      REGISTRAR ULTIMO LOGIN  -------------*/
                        
                    date_default_timezone_set('America/Tijuana');
                    
                    $fecha = date('Y-m-d');
                    $hora = date('H:i:s');
                    
                    $fechaActual = $fecha .' '.$hora;
                    
                    $item1 = "ultimo_login";
                    $valor1 = $fechaActual;
                    
                    $item2 = "id";
                    $valor2 = $respuesta["id"];
                    
                    $ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
                    
                    if($ultimoLogin == "ok"){
                        echo '<script>
                        window.location = "inicio";
                        
                        </script>';
                    }
    
                    
                    }else{
                        echo '<br><div class="alert alert-danger text-center">El usuario se encuentra inactivo</div>';
                    }
                    }else {
                    echo '<br><div class="alert alert-danger text-center">Error al ingresar, vuelva a intentarlo</div>';
                }
            }
            
        }
    }
    
    /* --------      crear usuario  -------------*/
    
    static public function ctrCrearUsuario()
    {
        if (isset($_POST["nuevoUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {
                
                /* --------      VALIDAR IMAGEN enviada al servidor  -------------*/
                $ruta = "";
                
                if (isset($_FILES["nuevaFoto"]["tmp_name"])) {
                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    
                    /* --------      CREAR DIRECTORIO PARA GUARDAR FOTO USUARIO  -------------*/
                    
                    $directorio = "vistas/img/usuarios/" . $_POST["nuevoUsuario"];
                    
                    mkdir($directorio, 0755);
                    
                    /* --------     APLICAR FUNCIONES DE PHP DE ACUERDO AL TIPO DE IMAGEN  -------------*/
                    
                    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
                        
                        /* --------      Guardar imagen en el folder  -------------*/
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                        
                    }
                    
                    if ($_FILES["nuevaFoto"]["type"] == "image/png") {
                        
                        /* --------      Guardar imagen en el folder  -------------*/
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                        
                    }
                    
                }
                
                
                $tabla = "usuarios";
                $encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                
                $datos = array("nombre" => $_POST["nuevoNombre"],
                    "usuario" => $_POST["nuevoUsuario"],
                    "password" => $encriptar,
                    "perfil" => $_POST["nuevoPerfil"],
                    "foto" => $ruta);
                
                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
                
                if ($respuesta == "ok") {
                    echo '<script>
                          swal({
                          title: "El usuario se ha guardado correctamente!",
                          showConfirmButtonText: "true",
                          confirmButtonText: "cerrar",
                          icon: "success",
                          
                          }).then(function(result){
                             if(result.value){
                                 window.location = "usuarios";
                             }
                          });
                          </script>';
                }
            } else {
                echo '<script>
                          swal({
                          icon: "error",
                          title: "El campo usuario no puede incluir caracteres especiales!",
                          showConfirmButtonText: "true",
                          confirmButtonText: "cerrar",
                          
                          }).then(function(result){
                             if(result.value){
                                 window.location = "usuarios";
                             }
                          });
                          </script>';
            }
        }
    }
    
    /* --------      MOSTRAR usuarios  -------------*/
    static public function ctrMostrarUsuarios($item, $valor)
    {
        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }
    
    /* --------      EDITAR usuario  -------------*/
    
    static public function ctrEditarUsuario()
    {
        if (isset($_POST["editarUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÚ ]+$/', $_POST["editarNombre"])) {
                /* --------      VALIDAR IMAGEN  -------------*/
                
                    $ruta = $_POST["fotoActual"];
        
                    if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {
                        list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);
                        $nuevoAncho = 500;
                        $nuevoAlto = 500;
            
                        /* --------      CREAR DIRECTORIO PARA GUARDAR FOTO USUARIO  -------------*/
            
                        $directorio = "vistas/img/usuarios/" . $_POST["editarUsuario"];
                        /* --------      PRIMERO PREGUNTAR SI HAY FOTO GUARDADA EN DB  -------------*/
                        if(!empty($_POST["fotoActual"])){
                            unlink($_POST["fotoActual"]);
                        }else{
                            mkdir($directorio, 0755);
                        }
                        
                      
                        /* --------     APLICAR FUNCIONES DE PHP DE ACUERDO AL TIPO DE IMAGEN  -------------*/
            
                        if ($_FILES["editarFoto"]["type"] == "image/jpeg") {
                
                            /* --------      Guardar imagen en el folder  -------------*/
                            $aleatorio = mt_rand(100, 999);
                            $ruta = "vistas/img/usuarios/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".jpg";
                            $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $ruta);
                
                        }
            
                        if ($_FILES["editarFoto"]["type"] == "image/png") {
                
                            /* --------      Guardar imagen en el folder  -------------*/
                            $aleatorio = mt_rand(100, 999);
                            $ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";
                            $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta);
                
                        }
            
                    }
    
                $tabla = "usuarios";
                    if($_POST["editarPassword"] != "") {
                        if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {
                            $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        
                        }else{
                            echo '<script>
                          swal({
                          icon: "error",
                          title: "El campo usuario no puede incluir caracteres especiales!",
                          showConfirmButtonText: "true",
                          confirmButtonText: "cerrar",
                          
                          }).then(function(result){
                             if(result.value){
                                 window.location = "usuarios";
                             }
                          });
                          </script>';
                        }
                    }else{
                        $encriptar = $_POST["passwordActual"];
                    }
                    $datos = array("nombre" => $_POST["editarNombre"],
                                    "usuario" => $_POST["editarUsuario"],
                                    "password" => $encriptar,
                                    "perfil" => $_POST["editarPerfil"],
                                    "foto" => $ruta);
                    
                    $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);
                if ($respuesta == "ok") {
                    echo '<script>
                          swal({
                          title: "El usuario se ha actualizado correctamente!",
                          showConfirmButtonText: "true",
                          confirmButtonText: "cerrar",
                          icon: "success",
                          
                          }).then(function(result){
                             if(result.value){
                                 window.location = "usuarios";
                             }
                          });
                          </script>';
                }
            }else {
                echo '<script>
                          swal({
                          icon: "error",
                          title: "El campo nombre no puede incluir caracteres especiales!",
                          showConfirmButtonText: "true",
                          confirmButtonText: "cerrar",
                          
                          }).then(function(result){
                             if(result.value){
                                 window.location = "usuarios";
                             }
                          });
                          </script>';
    
            }
        }
    }
    /* --------      BORRAR USUARIO  -------------*/
    
    static public function ctrBorrarUsuario(){
        if(isset($_GET["idUsuario"])){
            $tabla = "usuarios";
            $datos = $_GET["idUsuario"];
            
            if($_GET["fotoUsuario"] != ""){
                unlink($_GET["fotoUsuario"]);
                rmdir('vistas/img/usuarios/'.$_GET["usuario"]);
            }
            $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                          swal({
                          title: "El usuario se ha borrado correctamente!",
                          showConfirmButtonText: "true",
                          confirmButtonText: "cerrar",
                          icon: "success",
                          closeOnConfirm: false,
                          }).then((result) => {
                             if(result.value){
                                 window.location = "usuarios";
                             }
                          });
                </script>';
            }
        }
    }
    
}