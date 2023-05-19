@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <h5>Job Applicants</h5>
            <a class="btn btn.primary btn-sm" href={{route('application.create')}}>Add</a>

            @if ($applicants->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">IC</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Age</th>
                            <th scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach() --}}
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            @else
                <p class="text-secondary">No Application yet </p>
            @endif
        </div>
    </div>
@endsection
