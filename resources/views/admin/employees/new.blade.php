<div class="modal fade" id="new_employee" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Nuevo Empleado</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-employee" name="form_employee" novalidate>
                    <div class="form-group alert alert-danger" id="container-errors" style="display: none;">
                        <ul id="list-errors">

                        </ul>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Nombre:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Apellido:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="last_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Telefono:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Dirección:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Foto:</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="image_profile">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Correo:</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Contraseña:</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Confimar Contraseña:</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="saveEmployee()">Guardar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->