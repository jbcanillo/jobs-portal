<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\User;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->role=="Administrator"){
            return view('admin/users/listview');
        }else{
            return back();
        }
    }
  
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/users/form');
    }

    private function validation($inputs,$id=NULL){
        $rules =[
            'username' => 'required|string|max:40|unique:users,name,'.$id,
            'email' => 'required|string|email|max:40|unique:users,email,'.$id,
            'role' => 'required|string',
            'status' => 'required|string'
        ];
        if($inputs->isMethod('post')){
           $rules['password']='sometimes|required|min:8|max:20';
           $rules['confirm_password']='sometimes|required|same:password';
        }
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
        $validationError = $this->validation($request);
        if(!$validationError){
            $user = new \App\User;
            $user->name = strtolower(strip_tags($request->get('username')));
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $user->role = $request->get('role');
            $user->status = $request->get('status');
            $user->created_at = strtotime(date('Y-m-d H:m:s'));
            $user->save();
            return redirect('users')->with('success', 'New user account has been added.');
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
        if(!is_numeric($id)){
            return Datatables::of(User::query())->make(true);
        }else{
            $user= \App\User::find($id);
            return $user->toJson(JSON_PRETTY_PRINT);
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
        $user = \App\User::find($id);
        return view('admin/users/form',compact('user'));
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
        $validationError = $this->validation($request,$id);
        if(!$validationError){
            $user= \App\User::find($id);
            $user->name = strtolower($request->get('username'));
            $user->email = $request->get('email');
            if($request->get('password')!=""){
                $user->password = bcrypt($request->get('password'));
            }
            $user->activation_code = md5($user->name);
            $user->role = $request->get('role');
            $user->status = $request->get('status');
            $user->updated_at = strtotime(date('Y-m-d H:m:s'));
            $user->save();
            return redirect('users')->with('success', 'User account ID'.$id.' has been updated.');
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
        $user = \App\User::find($id);
        $user->delete();
        return redirect('users')->with('success','User Account ID'.$id.' has been deleted.');
    }
}
