<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Datatables,Auth;
use App\Requests;
use App\Employer;
use App\Applicant;
use DB;

class EmployersRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('employer/requests/listview');
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
        return view('employer/requests/form',compact('employers'));
    }

    private function validation($inputs,$id=NULL){
        $rules =[
            'job_title' => 'required|string',
            'company' => 'required|string',
            'location' => 'required|string',
            'years_of_experience' => 'required|int',
            'education_level' => 'required|string',
            'type' => 'required|string',
            'age' => 'required|int',
            'number_of_applicants' => 'required|int',
            'description' => 'required|string',
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
            $requests->job_title = ucwords(strip_tags($request->get('job_title')));
            $requests->company = $company;
            $requests->location = ucwords(strip_tags($request->get('location')));
            $requests->years_of_experience = ucwords(strip_tags($request->get('years_of_experience')));
            $requests->education_level = ucwords(strip_tags($request->get('education_level')));
            $requests->age = ucwords(strip_tags($request->get('age')));
            $requests->gender = ucwords(strip_tags($request->get('gender')));
            $requests->language = ucwords(strip_tags($request->get('language')));
            $requests->license = ucwords(strip_tags($request->get('license')));
            $requests->number_of_applicants = ucwords(strip_tags($request->get('number_of_applicants')));
            $requests->type = ucwords(strip_tags($request->get('type')));
            $requests->minimum_salary = ucwords(strip_tags($request->get('minimum_salary')));
            $requests->maximum_salary = ucwords(strip_tags($request->get('maximum_salary')));
            $requests->description = ucwords(strip_tags($request->get('description')));
            $requests->status = $request->get('status');
            $requests->created_at = strtotime(date('Y-m-d H:m:s'));
            $requests->save();
            return redirect('employer/requests')->with('success', 'New Job Request has been added.');
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
            $employer = \App\Employer::where('user_id','=',Auth::user()->id)->get();
            $requests = \App\Requests::where('employer_id','=',$employer[0]->id)->get();
            return Datatables::of($requests)->make(true);
        }else{
            $request= \App\Requests::find($id);
            //$request_assignments = \App\RequestAssignments::where('request_id',$id)->get();

            $request_assignments = DB::table('request_assignments')
                            ->join('applicants','applicants.id','=','request_assignments.applicant_id')
                            ->join('applicant_education_background','applicant_education_background.applicant_id','=','request_assignments.applicant_id')
                            ->join('applicant_work_experience','applicant_work_experience.applicant_id','=','request_assignments.applicant_id')
                            ->join('applicant_desired_jobs','applicant_desired_jobs.applicant_id','=','request_assignments.applicant_id')
                            ->select('request_assignments.*','applicants.lastname','applicants.middlename','applicants.firstname','applicants.gender','applicants.birthdate','applicant_desired_jobs.type','applicant_desired_jobs.salary','applicant_desired_jobs.relocation', DB::raw('MAX(applicant_education_background.degree) as degree'),DB::raw('MAX(applicant_work_experience.start) as work_experience_start'),DB::raw('MAX(applicant_work_experience.end) as work_experience_end'))
                            ->where('request_assignments.request_id','=',$id)
                            ->groupBy('applicant_id')
                            ->get();

            return view('employer/requests/view',compact('request','request_assignments'));
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
        if($request->status=='Open'){
            return view('employer/requests/form',compact('request','employers'));
        }else{
            return redirect('employer/requests')->with('error','You cannot edit this job request if the status is no longer "Open".');
        }
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
        if(!isset($request->applicant_id)){
            $validationError = $this->validation($request);
            if(!$validationError){
                $requests = \App\Requests::find($id);
                $company = ucwords(strip_tags($request->get('company')));
                $employer = \App\Employer::where('company_name','=',$company)->firstOrFail();
                $requests->employer_id = $employer->id;
                $requests->job_title = ucwords(strip_tags($request->get('job_title')));
                $requests->company = $company;
                $requests->location = ucwords(strip_tags($request->get('location')));
                $requests->years_of_experience = ucwords(strip_tags($request->get('years_of_experience')));
                $requests->education_level = ucwords(strip_tags($request->get('education_level')));
                $requests->age = ucwords(strip_tags($request->get('age')));
                $requests->gender = ucwords(strip_tags($request->get('gender')));
                $requests->language = ucwords(strip_tags($request->get('language')));
                $requests->license = ucwords(strip_tags($request->get('license')));
                $requests->number_of_applicants = ucwords(strip_tags($request->get('number_of_applicants')));
                $requests->type = ucwords(strip_tags($request->get('type')));
                $requests->minimum_salary = ucwords(strip_tags($request->get('minimum_salary')));
                $requests->maximum_salary = ucwords(strip_tags($request->get('maximum_salary')));
                $requests->description = ucwords(strip_tags($request->get('description')));
                $requests->status = $request->get('status');
                $requests->updated_at = strtotime(date('Y-m-d H:m:s'));
                $requests->save();
                return redirect('employer/requests')->with('success', 'Job Request ID'.$id.' has been updated.');
            }
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
        if($requests->status=='Open'){
            $requests->delete();
            return redirect('employer/requests')->with('success','Request ID'.$id.' has been deleted.');
        }else{
            return redirect('employer/requests')->with('error','You cannot delete this job request if the status is no longer "Open".');
        }
    }
    
}
