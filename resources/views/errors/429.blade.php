@extends('adminlte::page')

@section('title', '429 | Demasiados intentos')

@section(auth()->check() ? 'content' : 'body')
    <div class="lockscreen-wrapper mt-0 pt-5" style="max-width: unset;">

        <div class="error-page mt-0 pt-5">
            <h2 class="headline text-danger">429</h2>
            <div class="error-content">
                <h3>Esperá un poquito ⏳</h3>
                <p class="text-center text-md-left">
                    Lo has intentado demasiadas veces...
                    <br>
                    Aguarda unos instantes antes de volver a intentarlo
                </p>
            </div>
        </div>

    </div>
@stop
