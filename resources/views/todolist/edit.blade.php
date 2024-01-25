@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="GET" action="{{ route('todolist.home') }}">
            <button type="submit">Back</button>
        </form> {{-- back button --}}
        <div class="card">
            <form action="{{ route('todolist.update') }}" method="POST">
                <div class="card-header">Edit Todolist</div>

                {{-- route to submit --}}
                @csrf
                <div class="card-body">
                    <input type="hidden" name="todolistId" value="{{ $todolist->id }}">
                    {{-- passing the ID --}}

                    <div class="col-md-6">
                        <label>Title:</label>
                        <input class="form-control" type="text" id="title" name="title"
                            value="{{ $todolist->title }}">
                        @error('title')
                            <small class='text-danger'>Sila masukkan title</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Description:</label>
                        <textarea name="description">{{ $todolist->description }}</textarea>
                        @error('description')
                            <small class='text-danger'>Sila masukkan deskripsi</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="due_date">Due date:</label>
                        <input type="date" id="due_date" name="due_date" value="{{ $todolist->due_date }}">
                        @error('due_date')
                            <small class='text-danger'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Author</label>
                        <select class="form-control" id="selectUser" name="author">
                            <option value="">---Please choose user---</option>
                            @foreach ($users as $key => $user)
                                <option value="{{ $user->id }}"
                                    {{ $user->id == $todolist->user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Status</label>
                        <select class="form-control" id="selectStatus" name="status">
                            <option value="pending" {{ $todolist->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ $todolist->status == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                        </select>
                    </div>

                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection
