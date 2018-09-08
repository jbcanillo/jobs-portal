<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Datatables;
use App\Applicant;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/applicants/listview');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users= \App\User::all();
        return view('admin/applicants/form',compact('users'));
    }

    private function validation($inputs,$id=NULL){
        $rules =[
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'lastname' => 'required|string',
            'nickname' => 'required|string',
            'contact' => 'required|string',
            'resume_public' => 'required',
            'user_id' => 'required|integer|unique:applicants,user_id,'.$id,
            'status' => 'required|string',
        ];
        return $this->validate($inputs, $rules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validationError = $this->validation($request);
        if(!$validationError){
            $applicant = new \App\Applicant;
            $applicant->firstname = ucwords(strip_tags($request->get('firstname')));
            $applicant->middlename = ucwords(strip_tags($request->get('middlename')));
            $applicant->lastname = ucwords(strip_tags($request->get('lastname')));
            $applicant->nickname = ucwords(strip_tags($request->get('nickname')));
            $applicant->contact_number = strip_tags($request->get('contact'));
            if( $request->hasFile('resume_file')){
                $path = $request->file('resume_file')->store('resumes');
                $applicant->resume_filepath = $path;
            }
            $applicant->resume_public = $request->get('resume_public');
            $applicant->user_id = $request->get('user_id');
            $applicant->status = $request->get('status');
            $applicant->created_at = strtotime(date('Y-m-d H:m:s'));
            $applicant->save();
            return redirect('applicants')->with('success', 'New applicant data has been added.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(!is_numeric($id)){
            return Datatables::of(Applicant::query())->make(true);
        }else{
            $applicant= \App\Applicant::find($id);
            return $applicant->toJson(JSON_PRETTY_PRINT);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $applicant = \App\Applicant::find($id);
        $users= \App\User::all();
        return view('admin/applicants/form',compact('applicant','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validationError = $this->validation($request,$id);
        if(!$validationError){
            $applicant = \App\Applicant::find($id);
            $applicant->firstname = ucwords(strip_tags($request->get('firstname')));
            $applicant->middlename = ucwords(strip_tags($request->get('middlename')));
            $applicant->lastname = ucwords(strip_tags($request->get('lastname')));
            $applicant->nickname = ucwords(strip_tags($request->get('nickname')));
            $applicant->contact_number = strip_tags($request->get('contact'));
            if( $request->hasFile('resume_file')){
                Storage::delete($applicant->resume_filepath);
                $path = $request->file('resume_file')->store('resumes');
                $applicant->resume_filepath = $path;
            }
            $applicant->resume_public = $request->get('resume_public');
            $applicant->user_id = $request->get('user_id');
            $applicant->status = $request->get('status');
            $applicant->updated_at = strtotime(date('Y-m-d H:m:s'));
            $applicant->save();
            return redirect('applicants')->with('success', 'Applicant ID'.$id.' has been updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $applicant = \App\Applicant::find($id);
        Storage::delete($applicant->resume_filepath);
        $applicant->delete();
        return redirect('applicants')->with('success','Applicant ID'.$id.' has been deleted.');
    }
}
