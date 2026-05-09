<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('lecturer.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                </div value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="department_id" class="form-label">Department</label>
                <input type="number"class=" form-control @error('department_id') is-invalid @enderror"
                    id="department_id" name="department_id" </div value="{{ old('department_id') }}">
                @error('department_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror


            </div>



            <a class="btn btn-warning" href="{{ route('lecturer.index') }}" role="button">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</x-app>
