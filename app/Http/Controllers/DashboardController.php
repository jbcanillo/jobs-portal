<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
   // use \HighIdeas\UsersOnline\Traits\UsersOnlineTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $online_users = $this->getUsers('Online');
        $active_users = $this->getUsers('Active');
        $inactive_users = $this->getUsers('Inactive');
        $open_requests = $this->getJobRequests('Open');
        $processing_requests = $this->getJobRequests('Processing');
        $closed_requests = $this->getJobRequests('Closed');
        $inactive_applicants = $this->getApplicants('Inactive');
        $active_applicants = $this->getApplicants('Active');
        $inactiv_employers = $this->getEmployers('Inactive');
        $active_employers = $this->getEmployers('Active');
        return view('admin/dashboard',compact('online_users','active_users','inactive_users','open_requests','processing_requests','closed_requests','inactive_applicants','active_applicants','inactive_employers','active_employers'));
        //return view('admin/requests/listview');
    }
    public function getUsers($param){
        if($param=='Online'){
            $result =  DB::table('sessions')
                    ->where('sessions.user_id','<>',null)
                    ->count();
        }elseif($param=='Active'){
            $result =  DB::table('users')
                ->where('status','=','Active')
                ->count();
        }elseif($param=='Inactive'){
            $result =  DB::table('users')
                ->where('status','=','Inactive')
                ->count();
        }
        return $result;
    }
    public function getJobRequests($param){
        if(isset($param)){
            $result =  DB::table('requests')
                    ->where('status','=',$param)
                    ->count();
        }
        return $result;
    }
    public function getApplicants($param){
        if(isset($param)){
            $result =  DB::table('applicants')
                    ->where('status','=',$param)
                    ->count();
        }
        return $result;
    }
    public function getEmployers($param){
        if(isset($param)){
            $result =  DB::table('employers')
                    ->where('status','=',$param)
                    ->count();
        }
        return $result;
    }

}
