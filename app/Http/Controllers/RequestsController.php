<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Datatables,Auth;
use App\Requests;
use App\Employer;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/requests/listview');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employers= \App\Employer::where('status', 'active')->get();
        return view('admin/requests/form',compact('employers'));
    }

    private function validation($inputs,$id=NULL){
        $rules =[
            'title' => 'required|string',
            'company' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'type' => 'required|string',
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
            $requests = new \App\Requests;
            $company = ucwords(strip_tags($request->get('company')));
            $employer = \App\Employer::where('company_name','=',$company)->firstOrFail();
            $requests->employer_id = $employer->id;
            $requests->title = ucwords(strip_tags($request->get('title')));
            $requests->company = $company;
            $requests->description = ucwords(strip_tags($request->get('description')));
            $requests->location = ucwords(strip_tags($request->get('location')));
            $requests->type = $request->get('type');
            $requests->status = $request->get('status');
            $requests->created_at = strtotime(date('Y-m-d H:m:s'));
            $requests->save();
            return redirect('requests')->with('success', 'New request has been added.');
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
            return Datatables::of(Requests::query())->make(true);
        }else{
            $requests= \App\Requests::find($id);
            return $requests->toJson(JSON_PRETTY_PRINT);
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
        $request = \App\Requests::find($id);
        $employers= \App\Employer::where('status', 'active')->get();
        return view('admin/requests/form',compact('request','employers'));
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
        $validationError = $this->validation($request);
        if(!$validationError){
            $requests = \App\Requests::find($id);
            $company = ucwords(strip_tags($request->get('company')));
            $employer = \App\Employer::where('company_name','=',$company)->firstOrFail();
            $requests->employer_id = $employer->id;
            $requests->title = ucwords(strip_tags($request->get('title')));
            $requests->company = $company;
            $requests->description = ucwords(strip_tags($request->get('description')));
            $requests->location = ucwords(strip_tags($request->get('location')));
            $requests->type = $request->get('type');
            $requests->status = $request->get('status');
            $requests->updated_at = strtotime(date('Y-m-d H:m:s'));
            $requests->save();
            return redirect('requests')->with('success', 'Request ID'.$id.' has been updated.');
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
        $requests = \App\Requests::find($id);
        $requests->delete();
        return redirect('requests')->with('success','Request ID'.$id.' has been deleted.');
    }
}
