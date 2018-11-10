<?php
$applicant_name="";
foreach($applicant_names as $row){

    $birthdate = new DateTime($row->birthdate);
    $now = new DateTime();
    $interval = $now->diff($birthdate);
    $applicant_age = $interval->y;

    $applicant_name .= '<option value="'.$row->id.'">'.$row->lastname.', '.$row->firstname.' '.$row->middlename.' ( '.$row->gender.', '.$applicant_age.' years old )</option>';
}

$applicant = '<div class="row item-row-applicant command-row-applicant card-body">
                        <div class="col-md-11 col-sm-12 col-xs-12">
                            <label>Applicant Name</label>
                            <select id="applicant_id[]" name="applicant_id[]" class="form-control applicant" required>
                                <option value=""></option>
                                '.$applicant_name.'
                            </select>
                            <a class="btn btn-warning btn-sm" onclick="" href="#" style="color:white;left:700px;bottom:43px"><i class="material-icons">search</i></a>
                        </div>
                        
                        <div class="col-md-1 col-sm-12 col-xs-12">
                            <label></label>
                            <a class="btn-remove-row-applicant btn btn-danger btn-sm" style="color:white"> x </a>
                        </div>
                        
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <label>Remarks</label>
                            <input type="text" id="remarks[]" name="remarks[]" class="form-control" row="5" required>
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12">
                            <label>Status</label>
                            <select id="applicant_status[]" name="applicant_status[]" class="form-control" required>
                                <option value=""></option>
                                <option value="For Interview">For Interview</option>
                                <option value="For Assestment">For Assestment</option>
                                <option value="Processing Requirements">Processing Requirements</option>
                                <option value="Hired">Hired</option>
                            </select>
                        </div>
                    </div>';

$applicant_append = trim(preg_replace('/\s+/',' ', $applicant));
$applicant='';

if(isset($request)){
    $applicant = "";
    $job_title = $request->job_title;
    $company = $request->company;
    $location = $request->location;
    $years_of_experience = $request->years_of_experience;
    $education_level = $request->education_level;
    $age = $request->age;
    $gender = $request->gender;
    $type = $request->type;
    $minimum_salary = $request->minimum_salary;
    $maximum_salary = $request->maximum_salary;
    $language = $request->language;
    $license = $request->license;
    $number_of_applicants = $request->number_of_applicants;
    $description = $request->description;
    $status = $request->status;
    $created_at = $request->created_at;
    $updated_at = $request->updated_at;
    $status = $request->status;

    if(isset($request_assignments)){
        foreach($request_assignments as $row){

            $birthdate = new DateTime($row->birthdate);
            $now = new DateTime();
            $interval = $now->diff($birthdate);
            $applicant_age = $interval->y;

            $applicant .= '<div class="row item-row-applicant command-row-applicant card-body">
                            <div class="col-md-11 col-sm-12 col-xs-12">
                            <label>Applicant Name</label>
                                <select id="applicant_id[]" name="applicant_id[]" class="form-control applicant" required>
                                    <option value="'.$row->applicant_id.'" selected>'.$row->lastname.', '.$row->firstname.' '.$row->middlename.' ( '.$row->gender.', '.$applicant_age.' years old )</option>
                                    '.$applicant_name.'
                                </select>
                                <a class="btn btn-warning btn-sm" onclick="viewRecord(\'/applicants/show/\','.$row->applicant_id.');" href="#" style="color:white;left:700px;bottom:43px"><i class="material-icons">search</i></a>
                            </div>
                           
                            <div class="col-md-1 col-sm-12 col-xs-12">
                                <label></label>
                                <a class="btn-remove-row-applicant btn btn-danger btn-sm" style="color:white">x</a>
                            </div>
                           
                            <div class="col-md-10 col-sm-12 col-xs-12">
                                <label>Remarks</label>
                                <input type="text" id="remarks[]" name="remarks[]" class="form-control" row="5" value="'.$row->remarks.'" required>
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12">
                                <label>Status</label>
                                <select id="applicant_status[]" name="applicant_status[]" class="form-control" required>
                                    <option value="'.$row->status.'">'.$row->status.'</option>
                                    <option value="For Interview">For Interview</option>
                                    <option value="For Assestment">For Assestment</option>
                                    <option value="Processing Requirements">Processing Requirements</option>
                                    <option value="Hired">Hired</option>
                                </select>
                            </div>
                        
                        </div>';
        }
    }
}
?>
@extends('layout/admin_container')
@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-info ">
        <h4 class="card-title"><i class="material-icons">search</i> Process Job Request</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </div>
            @endif
            <form method="post" action="{{ action('RequestsController@update',$request->id) }}" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}
              <div class="row">
                <div class='col-md-12 col-lg-6'>
                  <label for="Title">Job Title:</label>
                  <input type="text" class="form-control" name="job_title" value="{{ $job_title }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Company">Company/Employer:</label>
                    <input type="text" class="form-control" name="company" value="{{ $company }}" readonly>
                </div>
                <div class='col-md-12 col-lg-12'>  
                    <label for="Description">Description:</label>
                    <textarea class="form-control" name="description" rows="20" readonly>{{ $description }}</textarea>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Location">Location:</label>
                    <input type="text" class="form-control" name="location" value="{{ $location }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Years">Years of Experience:</label>
                    <input type="number" class="form-control" name="years_of_experience" value="{{ $years_of_experience }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Education">Education Level:</label>
                    <input type="text" class="form-control" name="education_level" value="{{ $education_level }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Age">Minimum Age:</label>
                    <input type="number" class="form-control" name="age" value="{{ $age }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Gender">Gender:</label>
                    <input type="text" class="form-control" name="gender" value="{{ $gender }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Language">Language:</label>
                    <input type="text" class="form-control" name="language" value="{{ $language }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="License">License(s):</label>
                    <input type="text" class="form-control" name="license" value="{{ $license }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="number_applicants">Required no. of applicants to hire:</label>
                    <input type="number" class="form-control" name="number_of_applicants" value="{{ $number_of_applicants }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Minimum">Minimum Salary:</label>
                    <input type="number" class="form-control" name="minimum_salary" value="{{ $minimum_salary }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Maximum">Maximum Salary:</label>
                    <input type="number" class="form-control" name="maximum_salary" value="{{ $maximum_salary }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Type">Type:</label>
                    <input type="text" class="form-control" name="type" value="{{ $type }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Status">Status:</label>
                    <input type="text" class="form-control" name="status" value="{{ $status }}" readonly>
                </div>
              </div>
              <hr>
              <div class="panel-body">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-info">
                            <h5 class="card-title"><i class="material-icons">assignment_ind</i> Set Applicants</h5>
                        </div>
                        <div class="card-body">
                            <div class='col-md-12 col-lg-12'>
                                <a id="btn_add_row_applicant" class="btn btn-success btn-sm" href="#">+</a>								
                                <a id="btn_remove_row_applicant" class="btn btn-danger btn-sm" href="#">-</a>
                                <div class='panel-body item-row-container-applicant'>
                                    <?php echo $applicant;?>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              <div class="row">
                <div class="form-group col-md-8 col-lg-12">
                  <span class="pull-right">
                      <a href="{{url('requests')}}" class="btn btn-md btn-danger">Cancel</a>
                  </span>
                  <span class="pull-right">
                    <button type="submit" class="btn btn-md btn-success">Submit</button>
                  </span>
                </div>
              </div>
          </form>
        </div>
    </div>
    <script text='text/javascript'>
        $('#btn_remove_row_applicant').click(function(){
            $('.item-row-applicant:last').remove();
        });
        $(document).on('click','.btn-remove-row-applicant', function() {
            $(this).parent().parent().remove();
        });
        $('#btn_add_row_applicant').click(function(){
            $('.item-row-container-applicant').append('<?php echo $applicant_append; ?>');
        });
        

        $(document).on('change', ".applicant", checkApplicants);
        function checkApplicants(){

            var idx = $(this).val();
            $(this).next().attr("onclick","viewRecord(\'/applicants/show/\',"+idx+")")
            
             /*$('.applicant').on('change', function(){
                var idx = $(this).val();
                
                $.ajax({
                    type:"GET",
                    url:'/requests/getApplicantDetails/'+idx,
                    success:function(data){
                        $('.applicant',this).next().val( "xx" );
                        console.log(data[0].gender);
                    },
                    error:function(){
                        bootbox.alert({
                            message: "There was an error occurred. Try again later.",
                            size: 'small'
                        });
                    }	
                });
            });*/

            var tralse = true;
            var selectRound_arr = []; // for contestant name
            $('.applicant').each(function(k, v) {
                var getVal = $(v).val();
                if (getVal && $.trim(selectRound_arr.indexOf(getVal)) != -1) {
                    tralse = false;
                    bootbox.alert({
                        message: "You already added this applicant!",
                        size: 'small'
                    });
                    $(v).val("");
                    return false;
                }else{
                    selectRound_arr.push($(v).val());
                }
            });
            if (!tralse) {
                return false;
            }  
        }
    </script>
@endsection