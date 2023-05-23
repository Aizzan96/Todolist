@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Application form</div>
            <div class="card-body">
                <form action="{{ route('applicants.store') }}" method='POST' enctype="multipart/form-data">
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

                        <div class="col-md-10">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Certificate Name</th>
                                        <th>Sijil</th>
                                        <th>Edit</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>

                                        <td><input type="text" name="category0" value="SPM" class="hidden-input">
                                        </td>
                                        <td><input type="text" name="academic_name0" value="Sijil Pelajaran Malaysia"
                                                class="hidden-input">
                                        </td>
                                        <td><input type="file" name="fileupload0" accept=".pdf, .doc, .docx">
                                        </td>


                                    </tr>
                                    <tr>

                                        <td><input type="text" name="category1" value="STPM" class="hidden-input">
                                        </td>
                                        <td><input type="text" name="academic_name1"
                                                value="Sijil Tinggi Pelajaran Malaysia" class="hidden-input">
                                        </td>
                                        <td><input type="file" name="fileupload1" accept=".pdf, .doc, .docx">
                                        </td>


                                    </tr>
                                    <tr>

                                        <td><input type="text" name="category2" value="DIPLOMA" class="hidden-input">
                                        </td>
                                        <td><input type="text" name="academic_name2" value="Diploma Sains Komputer"
                                                class="hidden-input">
                                        </td>
                                        <td><input type="file" name="fileupload2" accept=".pdf, .doc, .docx">
                                        </td>


                                    </tr>



                                </tbody>
                            </table>

                        </div>
                        <button class="btn btn-info mt-4" type="submit">submit</button>

                    </div>



                </form>
            </div>
        </div>
    </div>
@endsection
