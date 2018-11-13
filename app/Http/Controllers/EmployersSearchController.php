<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmployersSearchController extends Controller
{
    //
    public function index(){
        return view('/employer/search/applicants');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }

    /**
     * Filter the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $applicants = DB::table('applicants')
                    ->join('applicant_desired_jobs','applicants.id','=','applicant_desired_jobs.applicant_id')
                    ->when($request->get('gender'), function($query1) use($request) {
                        if($request->get('gender')!="Any"){
                            $query1->where('applicants.gender', '=', $request->get('gender'));
                        }
                    })
                    ->when($request->get('education_level'), function($query2) use($request) { 
                        $query2->where('applicants.highest_educational_attainment', '=', $request->get('education_level'));
                    })
                    ->when($request->get('age'), function($query2) use($request) {
                        $year = (date('Y') - $request->get('age'));
                        $query2->whereYear('applicants.birthdate','<=',$year);
                    })
                    ->when($request->get('years_of_experience'), function($query3) use($request) { 
                        $query3->where('applicants.years_of_experience', '>=', $request->get('years_of_experience'));
                    })
                    ->when($request->get('relocation'), function($query4) use($request) { 
                        $query4->where('applicant_desired_jobs.relocation', '=', $request->get('relocation'));
                    })
                    ->when($request->get('type'), function($query5) use($request) { 
                        $query5->where('applicant_desired_jobs.type', '=', $request->get('type'));
                    })
                    ->groupBy('applicant_id')
                    ->get();
        return view('/employer/search/applicants',compact('applicants'));
    }

}
