@section('scripts')
    <script src="{{asset('admin/employees.js')}}"></script>
@endsection

@extends('layouts.admin')
@section('content')
    <div class="ibox">
        <div class="ibox-title">
            <h2>Empleados</h2>
        </div>
        <div class="ibox-content">
            <button class="btn btn-primary" id="btn-new">Nuevo</button>
            <hr>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->last_name}}</td>
                        <td>{{$employee->user->email}}</td>
                        <td>
                            <a href="#" onclick="deleteEmployee({{$employee->id}})" class="btn btn-warning">
                                <small>Eliminar</small>
                            </a>
                            <a href="#" onclick="edit({{$employee->id}})" class="btn btn-primary">
                                <small>Editar</small>
                            </a>
                            <a href="#" onclick="show({{$employee->id}})" class="btn btn-primary">
                                <small>Ver</small>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            Mostrando {{$employees_pagination->perPage()}}
            de {{$employees_pagination->total()}}{!! $employees_pagination->render() !!}
            <br>
        </div>
    </div>
@endsection

@include('admin.employees.new')
@include('admin.employees.show')
@include('admin.employees.edit')