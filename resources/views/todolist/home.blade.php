@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('todolist.create') }}" class="btn btn-info"> New Todolist </a>
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>



                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todolists as $key => $todolist)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $todolist->title }}</td>
                                        <td style="text-align:justify">{{ $todolist->description }}</td>
                                        <td>{{ $todolist->user->name }}</td>
                                        <td>
                                            <a href="{{ route('todolist.edit', $todolist->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>

                                            <form action="{{ route('todolist.delete', ['id' => $todolist->id]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            {{-- <form action="{{ route('todolist.delete', ['id' => $todolist->id]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form> --}}

                                    </tr>
                                @endforeach
                                </tr>
                            </tbody>

                        </table>{{-- Table end --}}
                        {{-- {{ __('You are logged in!') }} --}}

                        {{ $todolists->links() }} {{-- link to homecontroller paginator thing --}}
                        {{-- you are going to have a ugly issue so you have to go here
                            https://laravel.com/docs/10.x/pagination and
                            search for #Using Bootstrap you have to add in AppServiceProvider.php --}}

                        {{-- @foreach ($todolists as $key => $todolist)
                            <div class="card">
                                <div class="card-title">
                                    {{ $todolist->title }}
                                </div>
                                <div class="card-body">
                                    {{ $todolist->description }} <br>
                                    <small>Created by:{{ $todolist->user->name }}</small>
                                </div>
                            </div>
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
