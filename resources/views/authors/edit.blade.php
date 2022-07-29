@extends('adminlte::page')

@section('title', 'Edit Author')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Author: {{ $author->name }}</h1>
@stop

@section('content')

    @include('authors.partials.form', [
        'action' => route('authors.update', $author),
        'author' => $author,
        'put' => true,
    ])

@stop
