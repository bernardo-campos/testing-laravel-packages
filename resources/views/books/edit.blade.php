@extends('adminlte::page')

@section('title', 'Edit Book')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Book: {{ $book->name }}</h1>
@stop

@section('content')

    @include('books.partials.form', [
        'action' => route('books.update', $book),
        'book' => $book,
        'put' => true,
    ])

@stop
