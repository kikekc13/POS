
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Administrar productos
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar productos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-info" data-toggle="modal" data-target="#modalAgregarproducto">Agregar producto</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped tablas dt-responsive">
                    <thead>
                    <tr>
                        <th style="10px">#</th>
                        <th>Imagen</th>
                        <th>Codigo</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Stock</th>
                        <th>Precio de compra</th>
                        <th>Precio de venta</th>
                        <th>Agregado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                        <td>0001</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                        <td>Lorem ipsum</td>
                        <td>20</td>
                        <td>5.00</td>
                        <td>10.00</td>
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
                        <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                        <td>0001</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                        <td>Lorem ipsum</td>
                        <td>20</td>
                        <td>5.00</td>
                        <td>10.00</td>
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
                        <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                        <td>0001</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                        <td>Lorem ipsum</td>
                        <td>20</td>
                        <td>5.00</td>
                        <td>10.00</td>
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

<!----------------------  MODAL AGREGAR PRODUCTO   --------------->

<div id="modalAgregarproducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: aliceblue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar producto</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        
                        <!-- Ingresar Codigo --->
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar codigo" required>

                            </div>
                        </div>
                    </div>
                    <!-- Ingresar descripcion --->
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                            <input type="text" class="form-control input-lg" name="nuevoDescripcion" placeholder="Ingresar descripcion" required>

                        </div>
                    </div>
                    
                    
                    <!--             SELECIONAR CATEGORIA          --->
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                            <select class="form-control input-lg" name="nuevaCategoria" id="">
                                <option value="">Seleccionar categoria</option>
                                <option value="Taladros">Taladros</option>
                                <option value="Partes">Partes</option>
                                <option value="Equipos">Equipos</option>
                            </select>

                        </div>
                    </div>

                    <!-- INGRESAR STOCK --->

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-check"></i></span>
                            <input type="text" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Ingresar cantidad" required>

                        </div>
                    </div>

                    <!-- INGRESAR PRECIO DE COMPRA   --->

                    <div class="form-group row">
                        <div class="col-xs-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoPrecioCompra" min="0" placeholder="Precio de compra" required>
    
                            </div>
                        </div>
                    <!-- INGRESAR PRECIO DE VENTA   --->
                        <div class="col-xs-6">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoPrecioVenta" min="0" placeholder="Precio de venta" required>
                            </div>
                            <br>
                            <!-- checkbox para porcentaje-->
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" class="minimal porcentaje" checked>
                                            Porcentaje
                                        </label>
                                    </div>
                                </div>
                            <!--        Entrada de porcentaje    -->
                            
                            <div class="col-xs-6" style="padding: 0">
                                <div class="input-group">
                                    <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Ingresar foto --->
                    
                    <div class="form-group">
                        <div class="panel">Subir imagen</div>
                        <input type="file" id="nuevaImagen" name="nuevaImagen">
                        <p class="help-block">Maximo 2 MB</p>
                        <img src="vistas/img/productos/default/anonymous.png" alt="" class="img-thumbnail" width="100px">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Guardar producto</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Salir</button>
                    </div>
            </form>
        </div>
    </div>
</div>