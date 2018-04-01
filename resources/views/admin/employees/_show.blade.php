<form class="form-horizontal" novalidate>
    <div class="form-group">
        <label class="col-md-4 control-label">Nombre:</label>
        <label class="control-label text-left">{{$employee->name}}</label>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Apellido:</label>
        <label class="control-label text-left">{{$employee->last_name}}</label>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Telefono:</label>
        <label class="control-label text-left">{{$employee->phone}}</label>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Dirección:</label>
        <label class=" control-label text-left">{{$employee->address}}</label>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Foto:</label>
        <label class="control-label text-left">{{$employee->address}}</label>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Correo:</label>
        <label class="control-label text-left">{{$employee->user->email}}</label>
    </div>

</form>