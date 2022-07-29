@extends('adminlte::page')

@section('title', '403 | Acceso denegado')

@section(auth()->check() ? 'content' : 'body')
    <div class="lockscreen-wrapper mt-0 pt-5" style="max-width: unset;">

        <div class="error-page mt-0 pt-5">
            <h2 class="headline text-danger">403</h2>
            <div class="error-content">
                <h3>Acceso denegado 💂‍</h3>
                <p class="text-center text-md-left">
                    @auth('web')
                    Sabemos quien eres, pero
                    <br>
                    @endauth
                    No tienes permiso de andar por aquí...
                </p>
            </div>
        </div>

    </div>
@stop
