<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Applicant;
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
        $applicants = Applicant::all();
        $applicants =Applicant::get();

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

        $applicantId = $applicant ->id;

        // $academic = new Academic();
        // $academic->category = $request->name;
        // $academic->name = $request->name;
        // $academic->applicant_id = $applicantId;
        // $academic->created_at = Carbon::now();
        // $academic->save();


        // // return view('todolist.create');
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
    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();

        return redirect()->route('applicants.index');

    }
}
