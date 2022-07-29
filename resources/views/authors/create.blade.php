@extends('adminlte::page')

@section('title', 'Create Author')

@section('content_header')
    <h1 class="m-0 text-dark">Create Author</h1>
@stop

@section('content')

    @include('authors.partials.form', [
        'action' => route('authors.store'),
        'author' => new \App\Models\Author(),
    ])

@stop
