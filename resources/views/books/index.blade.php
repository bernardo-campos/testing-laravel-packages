@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Books')

@section('content_header')
    <div class="d-flex">
        <div>
            <h1 class="m-0 text-dark">Books</h1>
            <small>
                <a href="{{ route('api.books.index') }}" target="_blank">{{ route('api.books.index') }}</a>
            </small>
        </div>
        <a href="{{ route('books.create') }}" class="ml-auto">
            <x-adminlte-button label="Create" theme="success" icon="fas fa-plus"/>
        </a>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @php
                        $heads = ['#', 'year', 'name', 'author', ''];
                    @endphp

                    <x-adminlte-datatable class="table table-sm" :heads="$heads" id="books">
                        @foreach ($books as $book)
                            <tr>
                                <td class="text-xs" width="20px">{{ $book->id }}</td>
                                <td>{{ $book->year }}</td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->author->name }}</td>
                                <td width="50px" class="d-flex">
                                    <a title="Editar" href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning py-0 px-1"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('books.destroy', $book) }}" method="post" class="d-flex" onSubmit="return confirm('¿Remove book &laquo;{{ $book->name }}&raquo;?');">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger ml-1 py-0 px-1" title="Delete">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>

                </div>
            </div>
        </div>
    </div>
@stop
