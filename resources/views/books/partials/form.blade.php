<form class="form-horizontal" action="{{ $action }}" method="POST">
    @csrf
    @isset ($put)
        @method('PUT')
    @endisset
    <div class="card">
        <div class="card-body">

            {{-- year / name / author --}}
            <div class="row">

                <x-adminlte-input
                    value="{{ old('year', $book->year) }}"
                    id="year"
                    name="year"
                    type="text"
                    placeholder="Year"
                    label="Year"
                    fgroup-class="col-12"
                />

                <x-adminlte-input
                    value="{{ old('name', $book->name) }}"
                    id="name"
                    name="name"
                    type="text"
                    placeholder="Name"
                    label="Name"
                    fgroup-class="col-12"
                />

                <x-adminlte-select
                    id="author_id"
                    name="author_id"
                    label="Author"
                    fgroup-class="col-12"
                    >
                    @foreach ($authors as $author)
                        <option
                            value="{{ $author->id }}"
                            @selected(old('author_id', $book->author_id) == $author->id)
                        >{{ $author->name }}</option>
                    @endforeach
                </x-adminlte-select>

            </div>
            <!--/.row-->

        </div>
        <!--/.card-body-->

        <div class="card-footer d-flex">
            <x-adminlte-button class="ml-auto"
                label="Save"
                theme="primary"
                icon="fas fa-save"
                type="submit"
            />
        </div>

    </div>
</form>