<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use App\Employer;
use App\User;
use Auth,DB;

class EmployersProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employer_details = \App\Employer::where('user_id','=',Auth::user()->id)->firstOrFail();
        $user_details = \App\User::find($employer_details->user_id);
        return view('employer/profile/view',compact('employer_details','user_details'));
    }

    private function validation($inputs,$id,$emp_id=NULL){
        $rules =[
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|unique:users,email,'.$id,
            'company_name' => 'required|string|unique:employers,company_name,'.$emp_id,
            'company_address' => 'required|string',
            'company_size' => 'required|integer',
            'contact_person' => 'required|string',
            'contact_number' => 'required|string'
        ];
        return $this->validate($inputs, $rules);
    }

    /**
     * Display the specified resource.
     *
    * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        //
        $employer_details = \App\Employer::where('user_id','=',Auth::user()->id)->firstOrFail();
        $user_details = \App\User::find($employer_details->user_id);
        return view('employer/profile/edit',compact('employer_details','user_details'));
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
        $employer = \App\Employer::where('user_id','=',$id)->firstOrFail();
        $validationError = $this->validation($request,$id,$employer->id);
        if(!$validationError){
            $this->validate($request, ['picture.*' => 'mimes:jpg,jpeg,png','file' => 'max:10240']); 
            if($request->hasFile('picture')){
                //Storage::delete($employer->picture);
                //$path = $request->file('picture')->store('public/employer_pictures');
                File::delete('storage'.substr($employer->picture,6));
                $path = 'upload/employer_pictures/'.$request->file('picture')->hashName();
                Storage::disk('public_uploads')->put('/employer_pictures/', $request->file('picture'));
                $employer->picture = $path;
            }
            $employer->firstname = ucwords(strip_tags($request->get('firstname')));
            $employer->middlename = ucwords(strip_tags($request->get('middlename')));
            $employer->lastname = ucwords(strip_tags($request->get('lastname')));
            $employer->nickname = ucwords(strip_tags($request->get('nickname')));
            $employer->company_name = ucwords(strip_tags($request->get('company_name')));
            $employer->company_address = ucwords(strip_tags($request->get('company_address')));
            $employer->company_size = $request->get('company_size');
            $employer->contact_person = ucwords(strip_tags($request->get('contact_person')));
            $employer->contact_number = strip_tags($request->get('contact_number'));
            $employer->about_me = $request->get('about_me');
            $employer->how = ucwords(strip_tags($request->get('how')));
            $employer->status = "Active";
            $employer->updated_at = strtotime(date('Y-m-d H:m:s'));
            $employer->save();
            $user =  \App\User::find($employer->user_id);
            $user->email = strip_tags($request->get('email'));
            $user->save();
            return redirect('employer/profile')->with('success', 'Your profile has been updated.');
        }
    }

}
