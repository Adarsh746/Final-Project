<?php

namespace App\Http\Controllers\Admin;


use \Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Subject;
use App\Qualification;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subject = DB::table('qualifications')
            ->leftjoin('subjects', 'subjects.quali_id', '=', 'qualifications.quali_id')
            ->select('subjects.subject_id', 'subjects.subject_name', 'qualifications.qualification_name')
            ->where('subjects.status', '=', 0)
            ->where('qualifications.status', '=', 0)
            ->get();

        // $subject =Subject::select('subject_id','subject_name','quali_id')->get();

        return view('admin.view_subject', compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qualification = Qualification::select('quali_id', 'qualification_name')->get();

        return view('admin.add_subject', compact('qualification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'subject_name' => 'required',
            'quali_id' => 'required',

        ]);

        $subject = new Subject();
        $subject->quali_id = $request->quali_id;
        $subject->subject_name = $request->subject_name;

        $subject->save();

        // return view('table');
        return redirect()->route('admin.subject.index')->with('success', 'Registration Success');
    }

    /**s
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = DB::table('qualifications')
            ->leftjoin('subjects', 'subjects.quali_id', '=', 'qualifications.quali_id')
            ->select('subjects.subject_id', 'subjects.subject_name', 'qualifications.qualification_name')
            ->where('subjects.subject_id', '=', $id)
            ->where('subjects.status', '=', 0)
            ->where('qualifications.status', '=', 0)
            ->first();

        $qualification = Qualification::select('quali_id', 'qualification_name')
            ->where('qualifications.status', '=', 0)
            ->get();

        return view('admin.edit_subject', compact('qualification', 'subject'));

        // $subject =Subject::select('subject_id','subject_name','quali_id')->get();


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request, $id)
    {
            $this->validate($request, [
            'subject_name' => 'required',
            'quali_id' => 'required',

        ]);

        $subject = Subject::find($id);
        $subject->quali_id = $request->quali_id;
        $subject->subject_name = $request->subject_name;

        $subject->save();

        // return view('table');
        return redirect()->route('admin.subject.index')->with('success','Updated');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matri = Subject::where('subject_id', $id)->first();
        $matri->status = 1;
        $matri->save();


        return redirect()->route('admin.subject.index')->with('success','deleted');
    }
}
