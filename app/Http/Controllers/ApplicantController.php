<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Academic;
use App\Http\Requests\StoreApplicantRequest;
use App\Http\Requests\UpdateApplicantRequest;
use Illuminate\Support\Facades\DB; //need to import to for DB query and paginate
use Carbon\Carbon;//carbon date
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $academics = Academic::all();
        $applicants = Applicant::all();
        $applicants =Applicant::get();
        $applicants = Applicant::with('academics')->get();

        return view('applicants.index',compact('applicants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applicants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApplicantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

      {




        $request ->validate ([
            'name' => 'required',
            'ic' => 'required',
            'dob' => 'bail|required|date',
            'age' => 'required',
            'address' => 'required',

        ],[
            // 'due_date.required' => 'Sila masukkan tarikh akhir',
            // 'due_date.date' => 'Sila semak jenis data',
        ]);
        // $loggedUser=Auth::user();

        $applicant = new Applicant();
        $applicant->name = $request->name;
        $applicant->ic = $request->ic;
        $applicant->dob = $request->dob;
        $applicant->age = $request->age;
        $applicant->address = $request->address;
        $applicant->created_at = Carbon::now();
        $applicant->save();

        $academic = new Academic();
        $academic->applicant_id = $applicant->id;
        $academic->created_at = Carbon::now();

        $index = 0;
        $fileuploads = [];
        $categoryKey = 'category';
        $academicNameKey = 'academic_name';
        $fileuploadKey = 'fileupload';

        while ($request->hasFile($fileuploadKey . $index)) {
            $fileuploads[] = [
            'category' => $request->input($categoryKey . $index),
            'academic_name' => $request->input($academicNameKey . $index),
            'fileupload' => $request->file($fileuploadKey . $index)
            ];
            $index++;
        }



        foreach ($fileuploads as $fileupload) {
            $category = $fileupload['category'];
            $academicName = $fileupload['academic_name'];
            $file = $fileupload['fileupload'];
            $column = $request->name;
            $applicantId = $applicant->id;

            if ($file) {
                $extension = $file->getClientOriginalExtension();
                $filename = $column . "_" . $academicName . "_" . $applicantId . "." . $extension;
                $path = $file->storeAs('academic_files', $filename, 'public');

                $academicClone = clone $academic;
                $academicClone->category = $category;
                $academicClone->name = $academicName;
                $academicClone->path = $path;
                $academicClone->fileupload = $filename;
                $academicClone->save();
                }
        }



    // Create the academic record
//     $academic = new Academic();
//     $academic->applicant_id = $applicant->id;
//     $academic->category = $request ->category;
//     $academic->name = $request->academic_name;


//    if ($request->hasFile('fileupload')) {
//     $file = $request->file('fileupload');
//     $academicName = $request->input('academic_name'); // Assuming you have the academic_name value
//     $applicantId = $applicant->id; // Assuming you have the applicant_id value

//     $column = $request->name; // Replace 'column_name' with the actual column name
//     $extension = $file->getClientOriginalExtension();

//     $filename = $column . "_" . $academicName . "_" . $applicantId . "." . $extension;

//     $path = $file->storeAs('academic_files', $filename, 'public');
//     $academic->path = $path;
//     $academic->fileupload = $filename;


//     // Perform any other operations
// }
//     $academic->created_at = Carbon::now();
//     $academic->save();


        return redirect()->route('applicants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $applicant =Applicant::wit('academics')->where('id',$id)->get()->first();
        // return view('applicants.edit',compact('applicant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApplicantRequest  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApplicantRequest $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
   public function delete($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();

        return redirect()->route('applicants.index');
    }
}
