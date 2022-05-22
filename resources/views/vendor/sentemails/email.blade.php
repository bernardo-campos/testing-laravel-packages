<div class="card">
    <div class="card-body p-0">
        <div class="mailbox-read-info">
            <div class="d-flex justify-content-between">
                <h5>{{ $email->subject }}</h5>
                <span class="mb-0">#{{ $email->id }}</span>
            </div>
            <h6 class="text-sm">
                From: {{ $email->from }} <br>
                <span class="mailbox-read-time float-right">
                    {{ date('F jS Y H:i A', strtotime($email->created_at)) }}
                </span>
                {{ __('To') }}: {{ $email->to }}<br>
                @if ($email->cc !=''){{ __('CC') }}: {{ $email->cc }}<br>@endif
                @if ($email->bcc !=''){{ __('BCC') }}: {{ $email->bcc }}<br>@endif
            </h6>
        </div>

        <div class="mailbox-read-message p-0">
            <iframe src="{{ url(config('sentemails.routepath')."/body/$email->id")}}" width="100%" height="750px" style="border:0px;"></iframe>
        </div>

    </div>
</div>

{{-- <div class="relative shadow-md">
    <div class="flex items-center justify-between px-5 py-3 bg-white">
        <h3 class="text-xl text-gray-900 truncate"></h3>
        <div class="ml-4 flex-shrink-0">

        </div>
    </div>
</div> --}}
{{--
<div class="p-3 flex-1 overflow-y-auto">

    <article class="px-10 pt-6 pb-8 bg-white rounded-lg shadow">
        <div class="flex items-center justify-between">
            <p class="text-lg font-semibold">
                <span class="text-gray-900 text-sm">
                    <br>

                </span>
            </p>
            <div class="flex items-center">
                <span class="text-xs text-gray-600"></span>
            </div>
        </div>
        <div class="mt-6 text-gray-800 text-sm border-t-2">
            <iframe src="{{ url(config('sentemails.routepath')."/body/$email->id")}}" width="100%" height="600px"></iframe>
        </div>
    </article>

</div> --}}