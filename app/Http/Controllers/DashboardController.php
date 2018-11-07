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
        $inactiveRequests = $this->getJobRequests('Inactive');
        $activeRequests = $this->getJobRequests('Active');
        $inactiveApplicants = $this->getApplicants('Inactive');
        $activeApplicants = $this->getApplicants('Active');
        $inactiveEmployers = $this->getEmployers('Inactive');
        $activeEmployers = $this->getEmployers('Active');
        return view('admin/dashboard',compact('online_users','active_users','inactive_users','open_requests','processing_requests','closed_requests','inactiveApplicants','activeApplicants','inactiveEmployers','activeEmployers'));
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
        if($param=='Active'){
            $result =  DB::table('requests')
                    ->where('status','=','Active')
                    ->count();
        }elseif($param=='Inactive'){
            $result =  DB::table('requests')
                    ->where('status','=','Inactive')
                    ->count();
        }
        return $result;
    }
    public function getApplicants($param){
        if($param=='Active'){
            $result =  DB::table('applicants')
                    ->where('status','=','Active')
                    ->count();
        }elseif($param=='Inactive'){
            $result =  DB::table('applicants')
                    ->where('status','=','Inactive')
                    ->count();
        }
        return $result;
    }
    public function getEmployers($param){
        if($param=='Active'){
            $result =  DB::table('employers')
                    ->where('status','=','Active')
                    ->count();
        }elseif($param=='Inactive'){
            $result =  DB::table('employers')
                    ->where('status','=','Inactive')
                    ->count();
        }
        return $result;
    }

}
