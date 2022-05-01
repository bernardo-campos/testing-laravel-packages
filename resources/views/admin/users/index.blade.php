@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Listado de Usuarios')

@section('content_header')
    <div class="d-flex">
        <div>
            <h1 class="m-0 text-dark">Listado de Usuarios</h1>
            <small></small>
        </div>
        <a href="#" class="ml-auto">
            <x-adminlte-button disabled label="Nuevo" theme="success" icon="fas fa-plus"/>
        </a>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @php
                        $heads = ['#', 'name', 'email', 'roles', ''];
                    @endphp

                    <x-adminlte-datatable class="table table-sm" id="table1" :heads="$heads">
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-xs" width="20px">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                                <td width="50px">
                                    <a title="Editar" href="#" class="btn btn-sm btn-warning py-0 px-1 disabled"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
@endpush