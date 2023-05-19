@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Application form</div>
            <div class="card-body">
                <form action="{{ route('applicants.store') }}" method='POST'>
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                placeholder="Please enter name">
                        </div>
                        <div class="col-md-6">
                            <label for="">IC no.</label>
                            <input class="form-control" type="text" name="ic" value="{{ old('ic') }}"
                                placeholder="Please enter ic">
                        </div>
                        <div class="col-md-6">
                            <label for="">DOB</label>
                            <input class="form-control" type="date" name="dob" value="{{ old('dob') }}"
                                placeholder="Please enter dob">
                        </div>
                        <div class="col-md-6">
                            <label for="">Age</label>
                            <input class="form-control" type="int" name="age" value="{{ old('age') }}"
                                placeholder="Please enter age">
                        </div>
                        <div class="col-md-6">
                            <label for="">Address</label>
                            <textarea class="form-control" type="text" name="address" value={{ old('address') }}
                                placeholder="Plese enter address"></textarea>
                        </div>
                        <button class="btn btn-info mt-4" type="submit">submit</button>

                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
