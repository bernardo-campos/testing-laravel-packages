@extends('adminlte::page')

@section('title', 'Create Book')

@section('content_header')
    <h1 class="m-0 text-dark">Create Book</h1>
@stop

@section('content')

    @include('books.partials.form', [
        'action' => route('books.store'),
        'book' => new \App\Models\Book(),
    ])

@stop
