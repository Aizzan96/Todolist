@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <h5>Job Applicants</h5>
            <a class="btn btn.primary btn-sm" href={{ route('applicants.create') }}>Add</a>

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
                        @foreach ($applicants as $key => $applicant)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $applicant->name }}</td>
                                <td>{{ $applicant->name }}</td>
                                <td>{{ $applicant->name }}</td>
                                <td>{{ $applicant->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-secondary">No Application yet </p>
            @endif
        </div>
    </div>
@endsection
