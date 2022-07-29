@extends('adminlte::page')

@section('title', '419 | La página ha expirado')

@section(auth()->check() ? 'content' : 'body')
    <div class="lockscreen-wrapper mt-0 pt-5" style="max-width: unset;">

        <div class="error-page mt-0 pt-5">
            <h2 class="headline text-danger">419</h2>
            <div class="error-content">
                <h3>La página ha expirado</h3>
                <p class="text-center text-md-left">
                    Recarga la página
                    <br>
                    o <a href=".">ve al Inicio</a>
                </p>
            </div>
        </div>

    </div>
@stop
