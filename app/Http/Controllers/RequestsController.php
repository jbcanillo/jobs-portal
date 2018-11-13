<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Datatables,Auth;
use App\Requests;
use App\Employer;
use App\Applicant;
use DB;

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
            return redirect('requests')->with('success', 'New Job Request has been added.');
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
                return redirect('requests')->with('success', 'Job Request ID'.$id.' has been updated.');
            }
        }elseif(isset($request->applicant_id) || count($request->applicant_id)==0){
            $request_data = \App\Requests::find($id);
            $deleted = \App\RequestAssignments::where('request_id',$id)->delete();
            $flag_hired = false;
            foreach ($request->applicant_id as $key => $row){
                $assign = new \App\RequestAssignments();
                $assign->request_id = $id;
                $assign->applicant_id = $request->applicant_id[$key];
                $assign->employer_id = $request_data->employer_id;
                $assign->remarks = $request->remarks[$key];
                $assign->status = $request->applicant_status[$key];
                $assign->created_at = strtotime(date('Y-m-d H:m:s'));
                $assign->save();
                if($request->applicant_status[$key]=='Hired'){
                    $flag_hired = true;
                }else{
                    $flag_hired = false;
                }
            }
            if(count($request->applicant_id)>0){
                $requests = \App\Requests::find($id);
                $requests->status = 'Processing';
                $requests->updated_at = strtotime(date('Y-m-d H:m:s'));
                $requests->save();
            }else{
                $requests = \App\Requests::find($id);
                $requests->status = 'Open';
                $requests->updated_at = strtotime(date('Y-m-d H:m:s'));
                $requests->save();
            }
            if($flag_hired){
                $requests = \App\Requests::find($id);
                $requests->status = 'Closed';
                $requests->updated_at = strtotime(date('Y-m-d H:m:s'));
                $requests->save();
            }else{
                $requests = \App\Requests::find($id);
                $requests->status = 'Processing';
                $requests->updated_at = strtotime(date('Y-m-d H:m:s'));
                $requests->save();
            }
            return redirect('requests')->with('success', 'Job Request ID'.$id.' has been processed.');
        }  
    }

    /**
     * Show the form for processing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function process($id){

        $current_route_name = 'requests';

        $request = \App\Requests::find($id);

        /*$request_assignments = DB::table('request_assignments')
                            ->join('applicants','applicants.id','=','request_assignments.applicant_id')
                            ->join('applicant_education_background','applicant_education_background.applicant_id','=','request_assignments.applicant_id')
                            ->join('applicant_work_experience','applicant_work_experience.applicant_id','=','request_assignments.applicant_id')
                            ->join('applicant_desired_jobs','applicant_desired_jobs.applicant_id','=','request_assignments.applicant_id')
                            ->select('request_assignments.*','applicants.lastname','applicants.middlename','applicants.firstname','applicants.gender','applicants.birthdate','applicant_desired_jobs.type','applicant_desired_jobs.salary','applicant_desired_jobs.relocation', DB::raw('MAX(applicant_education_background.degree) as degree'),DB::raw('MAX(applicant_work_experience.start) as work_experience_start'),DB::raw('MAX(applicant_work_experience.end) as work_experience_end'))
                            ->where('request_assignments.request_id','=',$id)
                            ->where('applicant_desired_jobs.title','like','%'. $request->job_title .'%')
                            ->groupBy('applicant_id')
                            ->get();*/

        $request_assignments = DB::table('request_assignments')
                            ->join('applicants','applicants.id','=','request_assignments.applicant_id')
                            ->where('request_assignments.request_id','=',$id)
                            ->select('request_assignments.*','applicants.lastname','applicants.middlename','applicants.firstname','applicants.gender','applicants.birthdate','applicants.years_of_experience')
                            ->get();

        $applicant_names = DB::table('applicant_desired_jobs')
                            ->join('applicants','applicants.id','=','applicant_desired_jobs.applicant_id')
                            ->select('applicants.id','applicants.lastname','applicants.middlename','applicants.firstname','applicants.gender','applicants.birthdate','applicants.years_of_experience')
                            ->where('applicant_desired_jobs.title','like','%'. $request->job_title .'%')
                            ->where('applicants.status','=','Active')
                            ->where('applicant_desired_jobs.status','=','Active')
                            ->get();

        return view('admin/requests/process',compact('request','request_assignments','applicant_names','current_route_name'));
    }

    /**
     * Show the form for processing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getApplicantDetails($id){
       $applicant_details =  DB::table('applicants')
                            ->join('applicant_education_background','applicant_education_background.applicant_id','=','applicants.id')
                            ->join('applicant_work_experience','applicant_work_experience.applicant_id','=','applicants.id')
                            ->join('applicant_desired_jobs','applicant_desired_jobs.applicant_id','=','applicants.id')
                            ->select('applicants.id','applicants.lastname','applicants.middlename','applicants.firstname','applicants.gender','applicants.birthdate','applicant_desired_jobs.type','applicant_desired_jobs.salary','applicant_desired_jobs.relocation',DB::raw('MAX(applicant_education_background.degree) as degree'),DB::raw('MAX(applicant_work_experience.start) as work_experience_start'),DB::raw('MAX(applicant_work_experience.end) as work_experience_end'))
                            ->where('applicants.id','=',$id)
                            ->get();
        
        return response()->json($applicant_details);
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
        \App\RequestAssignments::where('request_id',$id)->delete();
        return redirect('requests')->with('success','Request ID'.$id.' has been deleted.');
    }
    
}
