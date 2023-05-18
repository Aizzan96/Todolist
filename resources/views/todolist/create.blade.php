@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('todolist.store') }}" method="POST">
            {{-- route to submit --}}
            @csrf
            <div class="card">

                <div class="card-header">Create new todolist</div>
                <div class="card-body">
                    <div class="col-md-6">
                        <label>Title:</label>
                        <input class="form-control" type="text" id="title" name="title" value={{ old('title') }}>
                        @error('title')
                            <small class='text-danger'>Sila masukkan title</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="due_data">Due date:</label>
                        <input class="form-control" type="date" id="due_date" name="due_date"
                            value={{ old('due_date') }}>
                        @error('due_date')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label>Description:</label>
                        <textarea class="form-control" type="text" name="description" value={{ old('description') }}></textarea>
                        @error('description')
                            <small class='text-danger'>Sila masukkan deskripsi</small>
                        @enderror

                        {{-- <label>Description:</label>
                    <input class="form control" type="textarea" id="description" name="description"
                        value={{ old('description') }}>
                    @error('description')
                        <small class='text-danger'>Sila masukkan deskripsi</small>
                    @enderror --}}

                        {{-- PENIPU --}}
                    </div>
                    <input type="submit" value="Submit">

                </div>
            </div>
        </form>
    </div>
@endsection
