<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.data')->with([
            'students'=> Students::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request)
    {
        $validate =$request->validated();

        $students = new Students;
        $students -> idstudents = $request -> txtid;
        $students -> fullname = $request -> txtfullname;
        $students -> address = $request -> txtaddress;
        $students -> gender = $request -> txtgender;
        $students -> phone = $request -> txtphone;
        $students -> emailaddress = $request -> txtemail;
        $students -> save();

        return redirect('students')->with('msg', 'Add New Student Successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students, $idstudents)
    {
        $data = $students->find($idstudents);
        return view('students.formedit')->with([
            'txtid'=> $idstudents,
            'txtfullname'=> $data->fullname,
            'txtaddress'=> $data->address,
            'txtemail'=> $data->emailaddress,
            'txtgender'=> $data->gender,
            'txtphone'=> $data->phone
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentsRequest $request, Students $students, $idstudents)
    {
        $data = $students->find($idstudents);
        $data -> fullname = $request -> txtfullname;
        $data -> address = $request -> txtaddress;
        $data -> gender = $request -> txtgender;
        $data -> phone = $request -> txtphone;
        $data -> emailaddress = $request -> txtemail;
        $data -> save();

        return redirect('students')->with('msg', 'Student data named '.$data->fullname.' has been updated successfuly' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students,$idstudents)
    {
        $data = $students->find($idstudents);
        $data->delete();
        return redirect('students')->with('msg', 'Student data named '.$data->fullname.' has been deleted successfuly' );
    }
}
