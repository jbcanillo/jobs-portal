<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use File;
use App\Employer;

class EmployersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/employers/listview');
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
        return view('admin/employers/form',compact('users'));
    }

    private function validation($inputs,$id=NULL){
        $rules =[
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'lastname' => 'required|string',
            'company_name' => 'required|string'.$id,
            'company_size' => 'required|integer',
            'contact_person' => 'required|string',
            'contact_number' => 'required|string',
            'user_id' => 'required|integer|unique:employers,user_id,'.$id,
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
            $employer = new \App\Employer;
            $employer->firstname = ucwords(strip_tags($request->get('firstname')));
            $employer->middlename = ucwords(strip_tags($request->get('middlename')));
            $employer->lastname = ucwords(strip_tags($request->get('lastname')));
            $employer->nickname = ucwords(strip_tags($request->get('nickname')));
            $employer->company_name = ucwords(strip_tags($request->get('company_name')));
            $employer->company_size = $request->get('company_size');
            $employer->contact_person = ucwords(strip_tags($request->get('contact_person')));
            $employer->contact_number = strip_tags($request->get('contact_number'));
            $employer->how = ucwords(strip_tags($request->get('how')));
            $employer->user_id = $request->get('user_id');
            $employer->status = $request->get('status');
            $employer->created_at = strtotime(date('Y-m-d H:m:s'));
            $employer->save();
            return redirect('employers')->with('success', 'New employer data has been added.');
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
            return Datatables::of(Employer::query())->make(true);
        }else{
            $employer= \App\Employer::find($id);
            return $employer->toJson(JSON_PRETTY_PRINT);
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
        $employer = \App\Employer::find($id);
        $users= \App\User::all();
        return view('admin/employers/form',compact('employer','users'));
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
            $employer = \App\Employer::find($id);
            $employer->firstname = ucwords(strip_tags($request->get('firstname')));
            $employer->middlename = ucwords(strip_tags($request->get('middlename')));
            $employer->lastname = ucwords(strip_tags($request->get('lastname')));
            $employer->nickname = ucwords(strip_tags($request->get('nickname')));
            $employer->company_name = ucwords(strip_tags($request->get('company_name')));
            $employer->company_size = $request->get('company_size');
            $employer->contact_person = ucwords(strip_tags($request->get('contact_person')));
            $employer->contact_number = strip_tags($request->get('contact_number'));
            $employer->how = ucwords(strip_tags($request->get('how')));
            $employer->user_id = $request->get('user_id');
            $employer->status = $request->get('status');
            $employer->created_at = strtotime(date('Y-m-d H:m:s'));
            $employer->save();
            return redirect('employers')->with('success', 'Employer ID'.$id.' has been updated.');
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
        $employer = \App\Employer::find($id);
        File::delete('storage'.substr($employer->picture,6));
        $employer->delete();
        return redirect('employers')->with('success','Employer ID'.$id.' has been deleted.');
    }
}
