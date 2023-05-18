@extends('layouts.app')

@section('content')
    <form method="GET" action="{{ route('todolist.home') }}">
        <button type="submit">Back</button>
    </form> {{-- back button --}}
    <form action="{{ route('todolist.update') }}" method="POST">
        {{-- route to submit --}}
        @csrf
        <input type="hidden" name="todolistId" value="{{ $todolist->id }}">{{-- passing the ID --}}
        <label>Title:</label>
        <input type="text" id="title" name="title" value="{{ $todolist->title }}"><br><br>
        @error('title')
            <small class='text-danger'>Sila masukkan title</small>
        @enderror

        <label>Description:</label>
        <textarea name="description">{{ $todolist->description }}</textarea>
        @error('description')
            <small class='text-danger'>Sila masukkan deskripsi</small>
        @enderror
        <br>
        <br>

        <label for="due_data">Due date:</label>
        <input type="date" id="due_date" name="due_date" value="{{ $todolist->due_date }}">
        @error('due_date')
            <small class='text-danger'>{{ $message }}</small>
        @enderror
        <br><br>

        <label>Author</label>
        <select class="form-control" id="selectUser" name="author">
            <option value="">---Please choose user---</option>
            @foreach ($users as $key => $user)
                <option value="{{ $user->id }}"{{ $user->id == $todolist->user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>




        <input type="submit" value="Submit">
    </form>
@endsection
