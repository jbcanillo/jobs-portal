<?php
if(isset($request)){
    $applicant = "";
    $employer_id = $request->employer_id;
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
}
?>
@extends('layout/applicant_container')
@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-info ">
        <h4 class="card-title"><i class="material-icons">update</i> My Job Application
        <?php 
            if($request_assignments[0]->application_status == "Cancelled" || $request_assignments[0]->application_status== "Rejected"){
                $color = "btn btn-danger btn-round";
            }elseif($request_assignments[0]->application_status == "Hired" || $request_assignments[0]->application_status== "Processing Requirements"){
                $color = "btn btn-success btn-round";
            }else{
                $color = "btn btn-default btn-round";
            }
        ?>
        <span class="pull-right"><a class="{{ $color }}">Status: {{ $request_assignments[0]->application_status }}</a></span>
        <p class="card-category">Remarks: {{ $request_assignments[0]->remarks }}</p>
        </h4>
        
        </div>
        <div class="card-body">
              <div class="row">
                <div class='col-md-12 col-lg-6'>
                  <label for="Title">Job Title:</label>
                  <input type="text" class="form-control" name="job_title" value="{{ $job_title }}" readonly>
                </div>
                <div class='col-md-12 col-lg-5'>  
                    <label for="Company">Company/Employer:</label>
                    <input type="text" class="form-control" name="company" value="{{ $company }}" readonly>
                </div>
                <div class='col-md-12 col-lg-1'>  
                    <label for="Company">&nbsp</label>
                    <center><a class='btn btn-warning btn-sm' onclick='viewRecord("/employers/show/",{{ $employer_id }});' href='#' style='color:white;'><i class='material-icons'>visibility</i></a></center>
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
                    <label for="Years">Years of Work Experience:</label>
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
        </div>
    </div>
@endsection