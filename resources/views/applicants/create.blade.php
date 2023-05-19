@extends('layouts.app')

@section('content')
    <div class="contatiner">
        <h5>Application form</h5>
        <div class="row">
            <form action="{{ route('applicants.store') }}" method='POST'>
                @csrf
                <div class="col-md-8">
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
                        <input type="submit" value="Submit">

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
