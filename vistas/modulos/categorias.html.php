
<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Administrar Categorias
        </h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar cayegorias</li>
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
                        <th>Categorias</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Equipos Electromecanicos</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Equipos hidraulicos</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Refacciones</td>
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

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <!--Cabeza del modal-->
                <div class="modal-header" style="background: #3c8dbc; color: aliceblue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar categoria</h4>
                </div>
                <!--Cuerpo del modal-->
                <div class="modal-body">
                    <div class="box-body">
                        <!-- Ingresar Nombre --->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingreasar categoria" required>
                                
                            </div>
                        </div>
                    </div>
                    <!--PIE del modal-->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Guardar categoria</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>