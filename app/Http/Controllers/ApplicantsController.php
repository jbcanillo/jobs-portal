<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use File;
use Datatables;
use App\Applicant;
use App\DesiredJobs;
use App\WorkExperience;
use App\EducationBackground;
use App\Skills;
use App\Certifications;
use App\SocialMedia;
use App\MilitaryService;
use App\Awards;
use App\Organizations;
use App\Patents;
use App\Publications;
use App\LanguageSpoken;
use App\GovernmentDocuments;
use App\VideoIntro;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/applicants/listview');
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
        $jobs = DB::table('requests')
                    ->select('requests.job_title')
                    ->groupBy('job_title')
                    ->get();
        return view('admin/applicants/form',compact('users','jobs'));
    }

    private function validation($inputs,$id=NULL){
        $rules =[
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'lastname' => 'required|string',
            'gender' => 'required|string',
            'birthdate' => 'required|date',
            'highest_educational_attainment' => 'required|string',
            'years_of_experience' => 'required|integer',
            'contact' => 'required|string',
            'resume_public' => 'required',
            'user_id' => 'required|integer|unique:applicants,user_id,'.$id,
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
            $applicant = new \App\Applicant;
            $applicant->firstname = ucwords(strip_tags($request->get('firstname')));
            $applicant->middlename = ucwords(strip_tags($request->get('middlename')));
            $applicant->lastname = ucwords(strip_tags($request->get('lastname')));
            $applicant->nickname = ucwords(strip_tags($request->get('nickname')));
            $applicant->gender = ucwords(strip_tags($request->get('gender')));
            $applicant->birthdate = ucwords(strip_tags($request->get('birthdate')));
            $applicant->highest_educational_attainment = ucwords(strip_tags($request->get('highest_educational_attainment')));
            $applicant->years_of_experience = strip_tags($request->get('years_of_experience'));
            $applicant->contact_number = strip_tags($request->get('contact'));
            $this->validate($request, ['picture.*' => 'mimes:jpg,jpeg,png','file' => 'max:10240']); 
            if($request->hasFile('picture')){
                //$path = $request->file('picture')->store('upload/applicant_pictures');
                $path = 'upload/applicant_pictures/'.$request->file('picture')->hashName();
                Storage::disk('public_uploads')->put('/applicant_pictures/', $request->file('picture'));
                $applicant->picture = $path;
            }
            $this->validate($request, ['resume_file.*' => 'mimes:doc,pdf,docx,jpg,jpeg,zip','file' => 'max:10240']);
            if( $request->hasFile('resume_file')){
                //$path = $request->file('resume_file')->store('public/resumes');
                $path = 'upload/applicant_resumes/'.$request->file('resume_file')->hashName();
                Storage::disk('public_uploads')->put('/applicant_resumes/', $request->file('resume_file'));
                $applicant->resume_filepath = $path;
            }
            $applicant->resume_public = $request->get('resume_public');
            $applicant->user_id = $request->get('user_id');
            $applicant->status = $request->get('status');
            $applicant->created_at = strtotime(date('Y-m-d H:m:s'));
            $applicant->save();
            $last_saved_id = $applicant->id;

            if(isset($request->desired_jobs_title)){
                foreach ($request->desired_jobs_title as $key => $row){
                    $details = new \App\DesiredJobs();
                    $details->applicant_id = $last_saved_id;
                    $details->title = $request->desired_jobs_title[$key];
                    $details->type = $request->desired_jobs_type[$key];
                    $details->salary = $request->desired_jobs_salary[$key];
                    $details->relocation = $request->desired_jobs_relocation[$key];
                    $details->status = $request->desired_jobs_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }
            
            if(isset($request->work_experience_job_title)){
                foreach ($request->work_experience_job_title as $key => $row){
                    $details = new \App\WorkExperience();
                    $details->applicant_id = $last_saved_id;
                    $details->job_title = $request->work_experience_job_title[$key];
                    $details->company = $request->work_experience_company[$key];
                    $details->country = $request->work_experience_country[$key];
                    $details->city = $request->work_experience_city[$key];
                    $details->start = $request->work_experience_start[$key];
                    $details->end = $request->work_experience_end[$key];
                    $details->description = $request->work_experience_description[$key];
                    $details->status = $request->work_experience_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            } 

            if(isset($request->education_background_degree)){
                foreach ($request->education_background_degree as $key => $row){
                    $details = new \App\EducationBackground();
                    $details->applicant_id = $last_saved_id;
                    $details->degree = $request->education_background_degree[$key];
                    $details->school = $request->education_background_school[$key];
                    $details->field_of_study = $request->education_background_field_of_study[$key];
                    $details->country = $request->education_background_country[$key];
                    $details->city = $request->education_background_city[$key];
                    $details->start = $request->education_background_start[$key];
                    $details->end = $request->education_background_end[$key];
                    $details->status = $request->education_background_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            if(isset($request->skill)){
                foreach ($request->skill as $key => $row){
                    $details = new \App\Skills();
                    $details->applicant_id = $last_saved_id;
                    $details->skill = $request->skill[$key];
                    $details->years = $request->skills_years[$key];
                    $details->status = $request->skills_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            if(isset($request->certifications_title)){
                foreach ($request->certifications_title as $key => $row){
                    $details = new \App\Certifications();
                    $details->applicant_id = $last_saved_id;
                    $details->title = $request->certifications_title[$key];
                    $details->start = $request->certifications_start[$key];
                    $details->end = $request->certifications_end[$key];
                    $details->description = $request->certifications_description[$key];
                    $details->status = $request->certifications_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            if(isset($request->social_media)){
                foreach ($request->social_media as $key => $row){
                    $details = new \App\SocialMedia();
                    $details->applicant_id = $last_saved_id;
                    $details->media = $request->social_media[$key];
                    $details->link = $request->social_media_link[$key];
                    $details->status = $request->social_media_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            if(isset($request->military_service_country)){
                foreach ($request->military_service_country as $key => $row){
                    $details = new \App\MilitaryService();
                    $details->applicant_id = $last_saved_id;
                    $details->country = $request->military_service_country[$key];
                    $details->branch = $request->military_service_branch[$key];
                    $details->rank = $request->military_service_rank[$key];
                    $details->start = $request->military_service_start[$key];
                    $details->end = $request->military_service_end[$key];
                    $details->description = $request->military_service_description[$key];
                    $details->status = $request->military_service_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            if(isset($request->awards_title)){
                foreach ($request->awards_title as $key => $row){
                    $details = new \App\Awards();
                    $details->applicant_id = $last_saved_id;
                    $details->title = $request->awards_title[$key];
                    $details->date_awarded = $request->awards_date_awarded[$key];
                    $details->description = $request->awards_description[$key];
                    $details->status = $request->awards_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            if(isset($request->organizations_title)){
                foreach ($request->organizations_title as $key => $row){
                    $details = new \App\Organizations();
                    $details->applicant_id = $last_saved_id;
                    $details->title = $request->organizations_title[$key];
                    $details->start = $request->organizations_start[$key];
                    $details->end = $request->organizations_end[$key];
                    $details->description = $request->organizations_description[$key];
                    $details->status = $request->organizations_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            if(isset($request->patents_title)){
                foreach ($request->patents_title as $key => $row){
                    $details = new \App\Patents();
                    $details->applicant_id = $last_saved_id;
                    $details->title = $request->patents_title[$key];
                    $details->patent_number = $request->patent_number[$key];
                    $details->url = $request->patents_url[$key];
                    $details->date_published = $request->patents_date_published[$key];
                    $details->description = $request->patents_description[$key];
                    $details->status = $request->patents_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            if(isset($request->publications_title)){
                foreach ($request->publications_title as $key => $row){
                    $details = new \App\Publications();
                    $details->applicant_id = $last_saved_id;
                    $details->title = $request->publications_title[$key];
                    $details->url = $request->publications_url[$key];
                    $details->date_published = $request->publications_date_published[$key];
                    $details->description = $request->publications_description[$key];
                    $details->status = $request->publications_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            if(isset($request->language_spoken)){
                foreach ($request->language_spoken as $key => $row){
                    $details = new \App\LanguageSpoken();
                    $details->applicant_id = $last_saved_id;
                    $details->language = $request->language_spoken[$key];
                    $details->fluency = $request->language_spoken_fluency[$key];
                    $details->status = $request->language_spoken_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            if(isset($request->government_documents_type)){
                foreach ($request->government_documents_type as $key => $row){
                    $details = new \App\GovernmentDocuments();
                    $details->applicant_id = $last_saved_id;
                    $details->document_type = $request->government_documents_type[$key];
                    $this->validate($request, ['government_documents_file.*' => 'mimes:doc,pdf,docx,jpg,jpeg,zip','file' => 'max:50000']); 
                    if($request->hasFile('government_documents_file')){
                        //$file_upload = $request->file('government_documents_file')[$key];
                        //$path = $file_upload->store('public/government_documents');
                        $path = 'upload/applicant_government_docs/'.$request->file('government_documents_file')[$key]->hashName();
                        Storage::disk('public_uploads')->put('/applicant_government_docs/', $request->file('government_documents_file')[$key]);
                        $details->document_file = $path;
                    }
                    $details->status = $request->government_documents_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            if(isset($request->upload_video_file)){
                foreach ($request->upload_video_file_status as $key => $row){
                    $details = new \App\VideoIntro();
                    $details->applicant_id = $last_saved_id;
                    $this->validate($request, ['upload_video_file.*' => 'mimes:mp4,avi,mov','file' => 'max:50000']); 
                    if($request->hasFile('upload_video_file')){
                        //$file_upload = $request->file('upload_video_file')[$key];
                        //$path = $file_upload->store('public/video_intro');
                        $path = 'upload/applicant_video_intro/'.$request->file('upload_video_file')[$key]->hashName();
                        Storage::disk('public_uploads')->put('/applicant_video_intro/', $request->file('upload_video_file')[$key]);
                        $details->video_file = $path;
                    }
                    $details->status = $request->upload_video_file_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            
            return redirect('applicants')->with('success', 'New applicant data has been added.');
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
            return Datatables::of(Applicant::query())->make(true);
        }else{
            $applicant= \App\Applicant::find($id);
            $desired_jobs_details = \App\DesiredJobs::where('applicant_id',$id)->where('status','Active')->get();
            $work_experience_details = \App\WorkExperience::where('applicant_id',$id)->where('status','Active')->get();
            $education_background_details = \App\EducationBackground::where('applicant_id',$id)->where('status','Active')->get();
            $skills_details = \App\Skills::where('applicant_id',$id)->where('status','Active')->get();
            $certifications_details = \App\Certifications::where('applicant_id',$id)->where('status','Active')->get();
            $social_media_details = \App\SocialMedia::where('applicant_id',$id)->where('status','Active')->get();
            $military_service_details = \App\MilitaryService::where('applicant_id',$id)->where('status','Active')->get();
            $awards_details = \App\Awards::where('applicant_id',$id)->where('status','Active')->get();
            $organizations_details = \App\Organizations::where('applicant_id',$id)->where('status','Active')->get();
            $patents_details = \App\Patents::where('applicant_id',$id)->where('status','Active')->get();
            $publications_details = \App\Publications::where('applicant_id',$id)->where('status','Active')->get();
            $language_details = \App\LanguageSpoken::where('applicant_id',$id)->where('status','Active')->get();
            $government_documents_details = \App\GovernmentDocuments::where('applicant_id',$id)->where('status','Active')->get();
            $video_intro_details = \App\VideoIntro::where('applicant_id',$id)->where('status','Active')->get();
            //return $applicant->toJson(JSON_PRETTY_PRINT);
            return view('admin/applicants/view',compact('applicant','desired_jobs_details','work_experience_details','education_background_details','skills_details','certifications_details','social_media_details','military_service_details','awards_details','organizations_details','patents_details','publications_details','language_details','government_documents_details','video_intro_details'));
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
        $applicant = \App\Applicant::find($id);
        $users= \App\User::all();
        $jobs = DB::table('requests')
                ->select('requests.job_title')
                ->groupBy('job_title')
                ->get();

        $desired_jobs_details = \App\DesiredJobs::where('applicant_id',$id)->get();
        $work_experience_details = \App\WorkExperience::where('applicant_id',$id)->get();
        $education_background_details = \App\EducationBackground::where('applicant_id',$id)->get();
        $skills_details = \App\Skills::where('applicant_id',$id)->get();
        $certifications_details = \App\Certifications::where('applicant_id',$id)->get();
        $social_media_details = \App\SocialMedia::where('applicant_id',$id)->get();
        $military_service_details = \App\MilitaryService::where('applicant_id',$id)->get();
        $awards_details = \App\Awards::where('applicant_id',$id)->get();
        $organizations_details = \App\Organizations::where('applicant_id',$id)->get();
        $patents_details = \App\Patents::where('applicant_id',$id)->get();
        $publications_details = \App\Publications::where('applicant_id',$id)->get();
        $language_spoken_details = \App\LanguageSpoken::where('applicant_id',$id)->get();
        $government_documents_details = \App\GovernmentDocuments::where('applicant_id',$id)->get();
        $upload_video_details = \App\VideoIntro::where('applicant_id',$id)->get();

        return view('admin/applicants/form',compact('applicant',
                                                    'users',
                                                    'jobs',
                                                    'desired_jobs_details',
                                                    'work_experience_details',
                                                    'education_background_details',
                                                    'skills_details',
                                                    'certifications_details',
                                                    'social_media_details',
                                                    'military_service_details',
                                                    'awards_details',
                                                    'organizations_details',
                                                    'patents_details',
                                                    'publications_details',
                                                    'language_spoken_details',
                                                    'government_documents_details',
                                                    'upload_video_details'));
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
            $applicant = \App\Applicant::find($id);
            $applicant->firstname = ucwords(strip_tags($request->get('firstname')));
            $applicant->middlename = ucwords(strip_tags($request->get('middlename')));
            $applicant->lastname = ucwords(strip_tags($request->get('lastname')));
            $applicant->nickname = ucwords(strip_tags($request->get('nickname')));
            $applicant->gender = ucwords(strip_tags($request->get('gender')));
            $applicant->birthdate = ucwords(strip_tags($request->get('birthdate')));
            $applicant->highest_educational_attainment = ucwords(strip_tags($request->get('highest_educational_attainment')));
            $applicant->years_of_experience = strip_tags($request->get('years_of_experience'));
            $applicant->contact_number = strip_tags($request->get('contact'));
            $this->validate($request, ['picture.*' => 'mimes:jpg,jpeg,png','file' => 'max:10240']); 
            if($request->hasFile('picture')){
                //Storage::delete($applicant->picture);
                //$path = $request->file('picture')->store('upload/applicant_pictures');
                File::delete('storage'.substr($applicant->picture,6));
                $path = 'upload/applicant_pictures/'.$request->file('picture')->hashName();
                Storage::disk('public_uploads')->put('/applicant_pictures/', $request->file('picture'));
                $applicant->picture = $path;
            }
            $this->validate($request, ['resume_file.*' => 'mimes:doc,pdf,docx,jpg,jpeg,zip','file' => 'max:10240']); 
            if( $request->hasFile('resume_file')){
                //Storage::delete($applicant->resume_filepath);
                //$path = $request->file('resume_file')->store('public/resumes');
                File::delete('storage'.substr($applicant->resume_filepath,6));
                $path = 'upload/applicant_resumes/'.$request->file('resume_file')->hashName();
                Storage::disk('public_uploads')->put('/applicant_resumes/', $request->file('resume_file'));
                $applicant->resume_filepath = $path;
            }
            $applicant->resume_public = $request->get('resume_public');
            $applicant->user_id = $request->get('user_id');
            $applicant->status = $request->get('status');
            $applicant->updated_at = strtotime(date('Y-m-d H:m:s'));
            $applicant->save();

            $deleted = \App\DesiredJobs::where('applicant_id',$id)->delete();
            if(isset($request->desired_jobs_title)){
                foreach ($request->desired_jobs_title as $key => $row){
                    $details = new \App\DesiredJobs();
                    $details->applicant_id = $id;
                    $details->title = $request->desired_jobs_title[$key];
                    $details->type = $request->desired_jobs_type[$key];
                    $details->salary = $request->desired_jobs_salary[$key];
                    $details->relocation = $request->desired_jobs_relocation[$key];
                    $details->status = $request->desired_jobs_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }          

            $deleted = \App\WorkExperience::where('applicant_id',$id)->delete();
            if(isset($request->work_experience_job_title)){
                foreach ($request->work_experience_job_title as $key => $row){
                    $details = new \App\WorkExperience();
                    $details->applicant_id = $id;
                    $details->job_title = $request->work_experience_job_title[$key];
                    $details->company = $request->work_experience_company[$key];
                    $details->country = $request->work_experience_country[$key];
                    $details->city = $request->work_experience_city[$key];
                    $details->start = $request->work_experience_start[$key];
                    $details->end = $request->work_experience_end[$key];
                    $details->description = $request->work_experience_description[$key];
                    $details->status = $request->work_experience_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            $deleted = \App\EducationBackground::where('applicant_id',$id)->delete();
            if(isset($request->education_background_degree)){
                foreach ($request->education_background_degree as $key => $row){
                    $details = new \App\EducationBackground();
                    $details->applicant_id = $id;
                    $details->degree = $request->education_background_degree[$key];
                    $details->school = $request->education_background_school[$key];
                    $details->field_of_study = $request->education_background_field_of_study[$key];
                    $details->country = $request->education_background_country[$key];
                    $details->city = $request->education_background_city[$key];
                    $details->start = $request->education_background_start[$key];
                    $details->end = $request->education_background_end[$key];
                    $details->status = $request->education_background_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            } 

            $deleted = \App\Skills::where('applicant_id',$id)->delete();
            if(isset($request->skill)){
                foreach ($request->skill as $key => $row){
                    $details = new \App\Skills();
                    $details->applicant_id = $id;
                    $details->skill = $request->skill[$key];
                    $details->years = $request->skills_years[$key];
                    $details->status = $request->skills_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            $deleted = \App\Certifications::where('applicant_id',$id)->delete();
            if(isset($request->certifications_title)){
                foreach ($request->certifications_title as $key => $row){
                    $details = new \App\Certifications();
                    $details->applicant_id = $id;
                    $details->title = $request->certifications_title[$key];
                    $details->start = $request->certifications_start[$key];
                    $details->end = $request->certifications_end[$key];
                    $details->description = $request->certifications_description[$key];
                    $details->status = $request->certifications_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            $deleted = \App\SocialMedia::where('applicant_id',$id)->delete();
            if(isset($request->social_media)){
                foreach ($request->social_media as $key => $row){
                    $details = new \App\SocialMedia();
                    $details->applicant_id = $id;
                    $details->media = $request->social_media[$key];
                    $details->link = $request->social_media_link[$key];
                    $details->status = $request->social_media_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            $deleted = \App\MilitaryService::where('applicant_id',$id)->delete();
            if(isset($request->military_service_country)){
                foreach ($request->military_service_country as $key => $row){
                    $details = new \App\MilitaryService();
                    $details->applicant_id = $id;
                    $details->country = $request->military_service_country[$key];
                    $details->branch = $request->military_service_branch[$key];
                    $details->rank = $request->military_service_rank[$key];
                    $details->start = $request->military_service_start[$key];
                    $details->end = $request->military_service_end[$key];
                    $details->description = $request->military_service_description[$key];
                    $details->status = $request->military_service_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            $deleted = \App\Awards::where('applicant_id',$id)->delete();
            if(isset($request->awards_title)){
                foreach ($request->awards_title as $key => $row){
                    $details = new \App\Awards();
                    $details->applicant_id = $id;
                    $details->title = $request->awards_title[$key];
                    $details->date_awarded = $request->awards_date_awarded[$key];
                    $details->description = $request->awards_description[$key];
                    $details->status = $request->awards_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            $deleted = \App\Organizations::where('applicant_id',$id)->delete();
            if(isset($request->organizations_title)){
                foreach ($request->organizations_title as $key => $row){
                    $details = new \App\Organizations();
                    $details->applicant_id = $id;
                    $details->title = $request->organizations_title[$key];
                    $details->start = $request->organizations_start[$key];
                    $details->end = $request->organizations_end[$key];
                    $details->description = $request->organizations_description[$key];
                    $details->status = $request->organizations_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            $deleted = \App\Patents::where('applicant_id',$id)->delete();
            if(isset($request->patents_title)){
                foreach ($request->patents_title as $key => $row){
                    $details = new \App\Patents();
                    $details->applicant_id = $id;
                    $details->title = $request->patents_title[$key];
                    $details->patent_number = $request->patent_number[$key];
                    $details->url = $request->patents_url[$key];
                    $details->date_published = $request->patents_date_published[$key];
                    $details->description = $request->patents_description[$key];
                    $details->status = $request->patents_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            $deleted = \App\Publications::where('applicant_id',$id)->delete();
            if(isset($request->publications_title)){
                foreach ($request->publications_title as $key => $row){
                    $details = new \App\Publications();
                    $details->applicant_id = $id;
                    $details->title = $request->publications_title[$key];
                    $details->url = $request->publications_url[$key];
                    $details->date_published = $request->publications_date_published[$key];
                    $details->description = $request->publications_description[$key];
                    $details->status = $request->publications_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            $deleted = \App\LanguageSpoken::where('applicant_id',$id)->delete();
            if(isset($request->language_spoken)){
                foreach ($request->language_spoken as $key => $row){
                    $details = new \App\LanguageSpoken();
                    $details->applicant_id = $id;
                    $details->language = $request->language_spoken[$key];
                    $details->fluency = $request->language_spoken_fluency[$key];
                    $details->status = $request->language_spoken_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            $deleted = \App\GovernmentDocuments::where('applicant_id',$id)->delete();
            if(isset($request->government_documents_type)){
                foreach ($request->government_documents_type as $key => $row){
                    $details = new \App\GovernmentDocuments();
                    $details->applicant_id = $id;
                    $details->document_type = $request->government_documents_type[$key];
                    $this->validate($request, ['government_documents_file.*' => 'mimes:doc,pdf,docx,jpg,jpeg,zip','file' => 'max:50000']); 
                    if(isset($request->file('government_documents_file')[$key])){
                        if(isset($request->government_documents_file_temp[$key])){
                            //unlink(storage_path('app/'.$request->government_documents_file_temp[$key]));
                            File::delete('storage'.substr($request->government_documents_file_temp[$key],6));
                        }
                        //$file_upload = $request->file('government_documents_file')[$key];
                        //$path = $file_upload->store('public/government_documents');
                        $path = 'upload/applicant_government_docs/'.$request->file('government_documents_file')[$key]->hashName();
                        Storage::disk('public_uploads')->put('/applicant_government_docs/', $request->file('government_documents_file')[$key]);
                        $details->document_file = $path;
                    }else{
                        if(isset($request->government_documents_file_temp[$key])){
                            $details->document_file = $request->government_documents_file_temp[$key];
                        }else{
                            $details->document_file = null;
                        }
                    }
                    $details->status = $request->government_documents_status[$key];
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }

            $deleted = \App\VideoIntro::where('applicant_id',$id)->delete();
            if(isset($request->upload_video_file_status)){
                foreach ($request->upload_video_file_status as $key => $row){
                    $details = new \App\VideoIntro();
                    $details->applicant_id = $id;
                    $details->status = $request->upload_video_file_status[$key];
                    $this->validate($request, ['upload_video_file.*' => 'mimes:mp4,avi,mov','file' => 'max:50000']);
                    if(isset($request->file('upload_video_file')[$key])){
                        if(isset($request->upload_video_file_temp[$key])){
                            //unlink(storage_path('app/'.$request->upload_video_file_temp[$key]));
                            File::delete('storage'.substr($request->upload_video_file_temp[$key],6));
                        }
                        //$file_upload = $request->file('upload_video_file')[$key];
                        //$path = $file_upload->store('public/video_intro');
                        $path = 'upload/applicant_video_intro/'.$request->file('upload_video_file')[$key]->hashName();
                        Storage::disk('public_uploads')->put('/applicant_video_intro/', $request->file('upload_video_file')[$key]);
                        $details->video_file = $path;
                    }else{
                        if(isset($request->upload_video_file_temp[$key])){
                            $details->video_file = $request->upload_video_file_temp[$key];
                        }else{
                            $details->video_file = null;
                        }
                    }
                    $details->created_at = strtotime(date('Y-m-d H:m:s'));
                    $details->save();
                }
            }
            
            return redirect('applicants')->with('success', 'Applicant ID'.$id.' has been updated.');
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
        $applicant = \App\Applicant::find($id);
        File::delete('storage'.substr($applicant->picture,6));
        File::delete('storage'.substr($applicant->resume_filepath,6));
        $gov_docs = \App\GovernmentDocuments::where('applicant_id',$id)->get();
        foreach($gov_docs as $doc){
            File::delete('storage'.substr($doc->document_file,6));
        }
        $vid_intro = \App\VideoIntro::where('applicant_id',$id)->get();
        foreach($vid_intro as $vid){
            File::delete('storage'.substr($vid->video_file,6));
        }
        $applicant->delete();
        \App\DesiredJobs::where('applicant_id',$id)->delete();
        \App\WorkExperience::where('applicant_id',$id)->delete();
        \App\EducationBackground::where('applicant_id',$id)->delete();
        \App\Skills::where('applicant_id',$id)->delete();
        \App\Certifications::where('applicant_id',$id)->delete();
        \App\SocialMedia::where('applicant_id',$id)->delete();
        \App\MilitaryService::where('applicant_id',$id)->delete();
        \App\Awards::where('applicant_id',$id)->delete();
        \App\Organizations::where('applicant_id',$id)->delete();
        \App\Patents::where('applicant_id',$id)->delete();
        \App\Publications::where('applicant_id',$id)->delete();
        \App\LanguageSpoken::where('applicant_id',$id)->delete();
        \App\GovernmentDocuments::where('applicant_id',$id)->delete();
        \App\VideoIntro::where('applicant_id',$id)->delete();
        
        return redirect('applicants')->with('success','Applicant ID'.$id.' has been deleted.');
    }
}
