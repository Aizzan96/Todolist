<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; /**connect to model  */
use App\Models\Todolist;
use Illuminate\Support\Facades\DB; //need to import to for DB query and paginate
use Carbon\Carbon;//carbon date
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        // $todolists =Todolist::all();
        // $todolist = $todolists ->first;
        // $todolists =Todolist::limit(10);
        // dd($users);
        $todolists =Todolist::get();
        // dd($todolists); //just for trying

        // foreach ($todolists as $x =>$todolist) {
        //     echo $todolist ->user->name . '<br>'; // user is public function in Todolist.php showing the relationship
        // } dd(); //but this is lazy loading
        $todolists = Todolist::with('user') ->OrderBy('id','desc')->paginate(20);// ->paginate(20)->get()

        return view('todolist.home', compact('todolists'));
    }

    public function create(){


        return view('todolist.create');


    }

     public function store(Request $request){
        $request ->validate ([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'bail|required|date',

        ],[
            'due_date.required' => 'Sila masukkan tarikh akhir',
            'due_date.date' => 'Sila semak jenis data',
        ]);
        $loggedUser=Auth::user();

        $todolist = new Todolist();
        $todolist->title = $request->title;
        $todolist->description = $request->description;
        $todolist->user_id = $loggedUser->id;
        $todolist->due_date = $request->due_date;
        $todolist->created_at = Carbon::now();
        $todolist->updated_by = Auth::user()->id;
        $todolist->save();

        // return view('todolist.create');
        return redirect()->route('todolist.home');


    }

    public function edit ($id) {


        $todolist =Todolist::find ($id);
        // dd($todolist);
        $users = User::all();


        return view ('todolist.edit', compact ('todolist','users'));
    }



    public function update(Request $request)
    {
       $loggedUser=Auth::user();
        $todolist =Todolist::find($request -> todolistId);// find todolist by its ID
        $todolist->title = $request->title;
        $todolist->description = $request->description;
        $todolist->user_id = $request->author;
        $todolist->due_date = $request->due_date;
        $todolist->updated_at = Carbon::now();
        $todolist->updated_by = Auth::user()->id;
        $todolist->save();

        // $validatedData = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'due_date' => 'required|date',
        //     'user_id' => 'required|exists:users,id',
        // ], [
        //     'due_date.required' => 'Sila masukkan tarikh akhir',
        //     'due_date.date' => 'Sila semak jenis data',
        //     'user_id.required' => 'Sila pilih pengguna',
        //     'user_id.exists' => 'Pengguna yang dipilih tidak sah',
        // ]);

        // $todolist = Todolist::findOrFail($id);

        // $todolist->update($validatedData);

        // dd($validatedData);
    //        $validatedData = $request->validate([
    //     'title' => 'required',
    //     'description' => 'required',
    //     'due_date' => 'required|date',
    //     'user_name' => 'required', // Modified field: user_name instead of user_id
    // ], [
    //     'due_date.required' => 'Sila masukkan tarikh akhir',
    //     'due_date.date' => 'Sila semak jenis data',
    //     'user_name.required' => 'Sila pilih pengguna',
    // ]);

    // // Find the user by name
    // $user = User::where('name', $validatedData['user_name'])->first();

    // if (!$user) {
    //     return back()->withErrors(['user_name' => 'Pengguna yang dipilih tidak sah']);
    // }

    // // Update the Todolist model
    // $todolist = Todolist::findOrFail($id);
    // $todolist->title = $validatedData['title'];
    // $todolist->description = $validatedData['description'];
    // $todolist->due_date = $validatedData['due_date'];
    // $todolist->user_id = $user->id; // Update user_id with the user's ID
    // $todolist->save();

    //     return redirect()->route('todolist.home')->with('success', 'Todolist updated successfully');

    return redirect() ->route('todolist.home');
    }

     public function delete($id)
{
    $todolist = Todolist::findOrFail($id);
    $todolist->delete();

    return redirect()->route('todolist.home');
}
}
