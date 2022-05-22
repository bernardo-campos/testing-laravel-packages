@extends('adminlte::page')

@section('title', __('Sent Emails'))

@section('content_header')
    <div class="d-flex">
        <div>
            <h1 class="m-0 text-dark">{{ __('Sent Emails') }}</h1>
        </div>
    </div>
@stop

@section('content')
    <form action="" class="row">
        <x-adminlte-input
            class="form-control-sm"
            value="{{ request('date') }}"
            id="date"
            name="date"
            type="date"
            label="{{ __('date') }}"
            fgroup-class="col-12 col-sm-6 col-md-2 text-sm"
        />

        <x-adminlte-input
            class="form-control-sm"
            value="{{ request('from') }}"
            id="from"
            name="from"
            type="text"
            label="{{ __('from') }}"
            fgroup-class="col-12 col-sm-6 col-md-2 text-sm"
        />

        <x-adminlte-input
            class="form-control-sm"
            value="{{ request('to') }}"
            id="to"
            name="to"
            type="text"
            label="{{ __('to') }}"
            fgroup-class="col-12 col-sm-6 col-md-2 text-sm"
        />

        <x-adminlte-input
            class="form-control-sm"
            value="{{ request('subject') }}"
            id="subject"
            name="subject"
            type="text"
            label="{{ __('subject') }}"
            fgroup-class="col-12 col-sm-6 col-md-3 text-sm"
        />

        <div class="col-12 col-md-3 d-flex mb-4">
            <div class="align-self-end">
                <button type="submit" class="btn btn-xs btn-primary ml-auto">Search Emails</button>
                <button type="reset" class="btn btn-xs btn-link">Reset</button>
                {{-- <a href="{{ url(config('sentemails.routepath')) }}" class="">Reset</a> --}}
            </div>
        </div>
    </form>

<div class="row">

    <div class="col-12 col-md-3">
        <div class="card">
            <div class="card-header text-sm py-2">
                <i class="fas fa-envelope"></i>
                Email list
            </div>
            <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                    @foreach($emails as $email)
                        @php
                            $parts = explode('<', $email->from);
                            if (isset($parts[1])) {
                                $from = $parts[0];
                            } else {
                                $from = $parts[0];
                            }
                        @endphp

                        <li class="nav-item w-100">
                            <a href="javascript:void(0)" class="nav-link d-flex flex-column emailitem" data-id="{{ $email->id }}">
                                <div class="d-flex justify-content-between">
                                    <span class="d-block text-primary text-sm">#{{ $email->id }}</span>
                                    <span class="d-block text-xs text-right">{{ $email->created_at->diffForHumans() }}</span>
                                </div>
                                {{-- <span>{{ $from }}</span> --}}
                                <span class="d-block text-dark text-sm">{{ $email->to }}</span>
                                <p class="text-xs text-gray mb-0">{{ $email->subject }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="card-footer px-1 text-sm">
                {{ $emails->links() }}
            </div>

        </div>


    </div>

    <div class="col-12 col-md-9">
        <div id='emailcontent'></div>
    </div>

</div>



@if ($emails->count() == 0)
    <div class="m-10 x-5">
        <h2 class="text-2xl">{{ config('sentemails.noEmailsMessage') }}</h2>
    </div>
@endif


@stop

@push('js')
    <script>
    const emailcontent = document.getElementById('emailcontent');
    const element = document.querySelectorAll('.emailitem');

    //load specific email when clicked
    element.forEach(function(el){
        el.addEventListener('click', function ($event) {
            load(el.dataset.id);
        });
    });

    //load first email if no emails have been clicked
    load(element[0].dataset.id);

    //load data
    function load(id) {
        fetch('{{ url(config('sentemails.routepath').'/email') }}/'+id)
        .then(function(response) {
            return response.text();
        }).then(function(string) {
            emailcontent.innerHTML = string;
        });
    }
    </script>
@endpush

@push('css')
<style type="text/css">
    ul.pagination {
        flex-wrap: wrap;
    }
</style>
@endpush