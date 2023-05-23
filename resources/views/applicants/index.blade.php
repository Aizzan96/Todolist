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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applicants as $key => $applicant)
                            <tr>

                                <td>{{ $applicant->name }}</td>
                                <td>{{ $applicant->ic }}</td>
                                <td>{{ $applicant->dob }}</td>
                                <td>{{ $applicant->age }}</td>
                                <td>{{ $applicant->address }}</td>
                                {{-- <td>{{ $applicant->academics->first()->fileupload }}</td> --}}
                                <td>
                                    @if ($applicant->academics->isNotEmpty())
                                        {{ $applicant->academics->first()->fileupload }}
                                    @else
                                        No academic record available
                                    @endif
                                </td>
                                <td><a class="btn btn-primary" href="#">Edit</a></td>
                                <td>
                                    <form action="{{ route('applicants.delete', ['id' => $applicant->id]) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this applicant?')">Delete</button>
                                    </form>
                                </td>

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
