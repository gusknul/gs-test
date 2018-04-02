<form class="form-horizontal" id="form-edit-employee" name="form_edit_employee" novalidate>
    <div class="form-group alert alert-danger" id="container-edit-errors" style="display: none;">
        <ul id="list-edit-errors">
        </ul>
    </div>
    <input type="hidden" id="employee-id" value="{{$employee->id}}">
    <div class="form-group">
        <label class="col-md-4 control-label">Nombre:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="name" value="{{$employee->name}}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Apellido:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Telefono:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="phone" value="{{$employee->phone}}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Dirección:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" name="address" value="{{$employee->address}}">
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
            <input type="email" class="form-control" name="email" value="{{$employee->user->email}}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-12 control-label"><input type="checkbox" name="change_password" id="change-password">¿Desea cambiar la contraseña?</label>
    </div>

    <div class="form-group change_password" style="display: none">
        <label class="col-md-4 control-label">Contraseña:</label>
        <div class="col-md-8">
            <input type="password" id="password_update" class="form-control" name="password">
        </div>
    </div>

    <div class="form-group change_password" style="display: none">
        <label class="col-md-4 control-label">Confimar Contraseña:</label>
        <div class="col-md-8">
            <input type="password" id="password_confirmation_update" class="form-control" name="password_confirmation">
        </div>
    </div>
</form>