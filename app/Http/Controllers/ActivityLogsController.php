<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ActivityLog;
use Datatables;
use Auth;

class ActivityLogsController extends Controller
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
            return view('admin/activity_logs');
        }else{
            return back();
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
            $logs = \ActivityLog::getActivities()->get();
            return Datatables::of($logs)->make(true);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null)
    {
        //
        if(Auth::user()->role=="Administrator"){
            \ActivityLog::cleanLog(30);
            return redirect('/activity_logs')->with('success','Succesfully cleared logs aged more than 30 days.');
        }else{
            return back();
        }
    }

}
