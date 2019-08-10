
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
              <button class="btn btn-info" data-toggle="modal" data-target="#modalAgregarCategoria">Agregar categoria</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped tablas dt-responsive">
                    <thead>
                    <tr>
                        <th style="10px">#</th>
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
                    <tr>
                        <td>1</td>
                        <td>Administrador</td>
                        <td>admin</td>
                        <td><img src="vistas/img/usuarios/default/anonymous.png" alt="" class="img-thumbnail" width="40px"></td>
                        <td>Administrador</td>
                        <td><button class="btn btn-success btn-xs">Activo</button></td>
                        <td>2019-04-18 19:05:32</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Administrador</td>
                        <td>admin</td>
                        <td><img src="vistas/img/usuarios/default/anonymous.png" alt="" class="img-thumbnail" width="40px"></td>
                        <td>Administrador</td>
                        <td><button class="btn btn-success btn-xs">Activo</button></td>
                        <td>2019-04-18 19:05:32</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Administrador</td>
                        <td>admin</td>
                        <td><img src="vistas/img/usuarios/default/anonymous.png" alt="" class="img-thumbnail" width="40px"></td>
                        <td>Administrador</td>
                        <td><button class="btn btn-danger btn-xs">Inactivo</button></td>
                        <td>2019-04-18 19:05:32</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
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

<!----------------------MODAL--------------->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: aliceblue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar categoria</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <!-- Ingresar Nombre --->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingreasar nombre" required>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Ingresar Usuario --->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingreasar usuario" required>
    
                        </div>
                    </div>
                    <!-- Ingresar Contraseña --->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingreasar contraseña" required>
    
                        </div>
                    </div>
                    <!-- Ingresar SELECIONAR PERFIL --->
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
                    <!-- Ingresar foto --->
                    <div class="form-group">
                        <div class="panel">Subir foto</div>
                        <input type="file" id="nuevaFoto" name="nuevaFoto">
                        <p class="help-block">Maximo 20 MB</p>
                        <img src="vistas/img/usuarios/default/anonymous.png" alt="" class="img-thumbnail" width="100px">
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Guardar usuario</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>