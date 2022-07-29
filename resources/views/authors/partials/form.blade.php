<form class="form-horizontal" action="{{ $action }}" method="POST">
    @csrf
    @isset ($put)
        @method('PUT')
    @endisset
    <div class="card">
        <div class="card-body">

            {{-- name --}}
            <div class="row">
                <x-adminlte-input
                    value="{{ old('name', $author->name) }}"
                    id="name"
                    name="name"
                    type="text"
                    placeholder="Nombre"
                    label="Nombre"
                    fgroup-class="col-12"
                />
            </div>
            <!--/.row-->

        </div>
        <!--/.card-body-->

        <div class="card-footer d-flex">
            <x-adminlte-button class="ml-auto"
                label="Guardar"
                theme="primary"
                icon="fas fa-save"
                type="submit"
            />
        </div>

    </div>
</form>