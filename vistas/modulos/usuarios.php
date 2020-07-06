
<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Administrar usuarios
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar usuarios</li>
        </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
        
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
              <button class="btn btn-info" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar usuario</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped tablas">
                    <thead>
                    <tr>
                        <th style="width:10px;">#</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Foto</th>
                        <th>Perfil</th>
                        <th>Estado</th>
                        <th>Ultimo login</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $item = null;
                    $valor = null;
                    
                    $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                    
                    foreach ($usuarios as $key => $value){
                        echo ' <tr>
                        <td class="text-bold">'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["usuario"].'</td>';
                        if($value["foto"] != ""){
                            echo '<td><img src="'.$value["foto"].'" alt="" class="img-thumbnail" width="40px"></td>';
                        }else{
                            echo '<td><img src="vistas/img/usuarios/default/anonymous.png" alt="" class="img-thumbnail" width="40px"></td>';
                        }
                        
                        echo '<td>'.$value["perfil"].'</td>';
                        if($value["estado"] != 0){
                            echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activo</button></td>';
                        }else{
                            echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Inactivo</button></td>';
                        }
                        
                        
                        echo '<td>'.$value["ultimo_login"].'</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                                
                                <button class="btn btn-danger btnEliminarUsuario" usuario="'.$value["usuario"].'" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>';
                    }
                    
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--===================================
         MODAL AGREGAR USUARIO
====================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <!--===================================
                            CABEZA MODAL
                 ====================================-->
                <div class="modal-header" style="background: #3c8dbc; color: aliceblue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar usuario</h4>
                </div>

                <!--===================================
                            CUERPO DEL MODAL
                ====================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA Ingresar Nombre --->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingreasar nombre" required>

                            </div>
                        </div>
                        <!-- ENTRADA SET Usuario --->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" placeholder="Ingreasar usuario" required>

                            </div>
                        </div>
                        <!-- ENTRADA SET Contraseña --->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingreasar contraseña" required>

                            </div>
                        </div>
                        <!-- ENTRADA SELECIONAR PERFIL --->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="nuevoPerfil" id="">
                                    <option value="">Seleccionar perfil</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Especial">Especial</option>
                                    <option value="Vendedor">Vendedor</option>
                                </select>
                            </div>
                        </div>
                        <!-- SUBIR foto --->
                        <div class="form-group">
                            <div class="panel">Subir foto</div>
                            <input type="file" class="nuevaFoto" name="nuevaFoto">
                            <p class="help-block">Maximo 2 MB</p>
                            <img src="vistas/img/usuarios/default/anonymous.png" alt="" class="img-thumbnail previsualizar" width="100px">
                        </div>
                    </div>
                </div>
                <!-- MODAL FOOTER --->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Guardar usuario</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Salir</button>
                </div>
                <?php
                $crearUsuario = new ControladorUsuarios();
                $crearUsuario -> ctrCrearUsuario();
                
                ?>
            </form>
        </div>
    </div>
</div>
<?php
/*
$borrarUsuario = new ControladorUsuarios();
$borrarUsuario -> ctrBorrarUsuario();
*/
?>
<!--===================================
         MODAL EDITAR USUARIO
====================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <!--===================================
                            CABEZA MODAL
                 ====================================-->
                <div class="modal-header" style="background: #3c8dbc; color: aliceblue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar usuario</h4>
                </div>

                <!--===================================
                            CUERPO DEL MODAL
                ====================================-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA Ingresar Nombre --->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

                            </div>
                        </div>
                        <!-- ENTRADA SET Usuario --->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

                            </div>
                        </div>
                        <!-- ENTRADA SET Contraseña --->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Cambiar contraseña">
                                <input type="hidden" id="passwordActual" name="passwordActual">
                            </div>
                        </div>
                        <!-- ENTRADA SELECIONAR PERFIL --->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control input-lg" name="editarPerfil">
                                    <option value="" id="editarPerfil"></option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Especial">Especial</option>
                                    <option value="Vendedor">Vendedor</option>
                                </select>
                            </div>
                        </div>
                        <!-- SUBIR foto --->
                        <div class="form-group">
                            <div class="panel">Subir foto</div>
                            <input type="file" class="nuevaFoto" name="editarFoto">
                            <p class="help-block">Maximo 2 MB</p>
                            <img src="vistas/img/usuarios/default/anonymous.png" alt="" class="img-thumbnail previsualizar" width="100px">
                            <input type="hidden" name="fotoActual" id="fotoActual">
                        </div>
                    </div>
                </div>
                <!-- MODAL FOOTER --->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Guardar cambios</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Salir</button>
                </div>
                <?php
                
                $editarUsuario = new ControladorUsuarios();
                $editarUsuario -> ctrEditarUsuario();
                
                ?>
                
            </form>
        </div>
    </div>
</div>
<?php

$borrarUsuario = new ControladorUsuarios();
$borrarUsuario -> ctrBorrarUsuario();

?>