@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Authors')

@section('content_header')
    <div class="d-flex">
        <div>
            <h1 class="m-0 text-dark">Authors</h1>
            <small>
                <a href="{{ route('api.authors.index') }}" target="_blank">{{ route('api.authors.index') }}</a>
            </small>
        </div>
        <a href="{{ route('authors.create') }}" class="ml-auto">
            <x-adminlte-button label="Nuevo" theme="success" icon="fas fa-plus"/>
        </a>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @php
                        $heads = ['#', 'name', 'books', ''];
                    @endphp

                    <x-adminlte-datatable class="table table-sm" :heads="$heads" id="authors">
                        @foreach ($authors as $author)
                            <tr>
                                <td class="text-xs" width="20px">{{ $author->id }}</td>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->books_count }}</td>
                                <td width="50px">
                                    <a title="Editar" href="{{ route('authors.edit', $author) }}" class="btn btn-sm btn-warning py-0 px-1"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>

                </div>
            </div>
        </div>
    </div>
@stop
