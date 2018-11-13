<?php
if(!isset($request)){
    $method = "Add Job Request";
    $button = "Submit";
}else{
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
    $method = "Edit Job Request";
    $button = "Update";
}
$company_options = "";
if(isset($employers)){
    foreach($employers as $e){
        if(isset($request)){
            $selected = ($e->company_name==$request->company)? 'selected' : '';
        }else{
            $selected = '';
        }
        $company_options .= "<option value='".$e->company_name."' ".$selected.">".$e->company_name."</option>";
    }
}

?>
@extends('layout/admin_container')
@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-info  ">
        <h4 class="card-title"><i class="material-icons">assignment</i> {{ $method }}</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </div>
            @endif
            <?php if(!isset($request)){ ?>
                <form method="post" action="{{ action('RequestsController@store') }}" enctype="multipart/form-data">
            <?php }else{ ?>
                <form method="post" action="{{ action('RequestsController@update',$request->id) }}" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
            <?php } ?>
                {{ csrf_field() }}
              <div class="row">
                <div class='col-md-12 col-lg-6'>
                  <label for="Title">Job Title:</label>
                  <input type="text" class="form-control" name="job_title" value="{{ (isset($request))? $job_title : old('job_title') }}" required>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Company">Company:</label>
                    <select class="form-control" name="company" required>
                        <option value=''></option>
                        <?php echo $company_options;?>
                    </select>
                </div>
                <div class='col-md-12 col-lg-12'>  
                    <label for="Description">Job Description:</label>
                    <textarea class="form-control" name="description" rows="20" required>{{ (isset($request))? $description : old('description') }}</textarea>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Location">Location:</label>
                    <input type="text" class="form-control" name="location" value="{{ (isset($request))? $location : old('location') }}" required>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Years">Years of Work Experience:</label>
                    <input type="number" class="form-control" name="years_of_experience" value="{{ (isset($request))? $years_of_experience : old('years_of_experience') }}" required>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Education">Education Level:</label>
                    <select class="form-control" name="education_level" required>
                        <option value="" selected></option>
                        <?php if(!isset($request)){ ?>
                            <option value="Gradeschool" {{ (old('education_level') == "Gradeschool") ? 'selected' : '' }}>Gradeschool</option>
                            <option value="Highschool" {{ (old('education_level') == "Highschool" ) ? 'selected' : '' }}>Highschool</option>
                            <option value="Vocational" {{ (old('education_level') == "Vocational") ? 'selected' : '' }}>Vocational</option>
                            <option value="College" {{ (old('education_level') == "College") ? 'selected' : '' }}>College</option>
                            <option value="Masteral" {{ (old('education_level') == "Masteral") ? 'selected' : '' }}>Masteral</option>
                            <option value="Doctoral" {{ (old('education_level') == "Doctoral") ? 'selected' : '' }}>Doctoral</option>
                        <?php }else{ ?>
                            <option value="Gradeschool" {{ ($education_level == "Gradeschool") ? 'selected' : '' }}>Gradeschool</option>
                            <option value="Highschool" {{ ($education_level == "Highschool" ) ? 'selected' : '' }}>Highschool</option>
                            <option value="Vocational" {{ ($education_level == "Vocational") ? 'selected' : '' }}>Vocational</option>
                            <option value="College" {{ ($education_level == "College") ? 'selected' : '' }}>College</option>
                            <option value="Masteral" {{ ($education_level == "Masteral") ? 'selected' : '' }}>Masteral</option>
                            <option value="Doctoral" {{ ($education_level == "Doctoral") ? 'selected' : '' }}>Doctoral</option>
                        <?php }?>
                    </select>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Age">Minimum Age:</label>
                    <input type="number" class="form-control" name="age" value="{{ (isset($request))? $age : old('age') }}" required>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Gender">Gender:</label>
                    <select class="form-control" name="gender" required>
                    <option value="" selected></option>
                    <?php if(!isset($request)){ ?>
                        <option value="Any" {{ (old('gender') == 'Any') ? 'selected' : '' }}>Any</option>
                        <option value="Male" {{ (old('gender') == 'Male') ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ (old('gender') == 'Female') ? 'selected' : '' }}>Female</option>
                    <?php }else{ ?>
                        <option value="Any" {{ ($gender == 'Any') ? 'selected' : '' }}>Any</option>
                        <option value="Male" {{ ($gender == 'Male') ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ ($gender == 'Female') ? 'selected' : '' }}>Female</option>
                    <?php }?>
                    </select>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Language">Language(s):</label>
                    <input type="text" class="form-control" name="language" value="{{ (isset($request))? $language : old('language') }}" required>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="License">License(s):</label>
                    <input type="text" class="form-control" name="license" value="{{ (isset($request))? $license : old('license') }}">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="number_applicants">Required no. of applicants to hire:</label>
                    <input type="number" class="form-control" name="number_of_applicants" value="{{ (isset($request))? $number_of_applicants : old('number_of_applicants') }}" required>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Minimum">Minimum Salary:</label>
                    <input type="number" class="form-control" name="minimum_salary" value="{{ (isset($request))? $minimum_salary : old('minimum_salary') }}">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Maximum">Maximum Salary:</label>
                    <input type="number" class="form-control" name="maximum_salary" value="{{ (isset($request))? $maximum_salary : old('maximum_salary') }}">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Type">Type:</label>
                    <select class="form-control" name="type" required>
                    <option value="" selected></option>
                    <?php if(!isset($request)){ ?>
                        <option value="Full-time" {{ (old('type') == 'Full-time') ? 'selected' : '' }}>Full-time</option>
                        <option value="Part-time" {{ (old('type') == 'Part-time') ? 'selected' : '' }}>Part-time</option>
                        <option value="Temporary" {{ (old('type') == 'Temporary') ? 'selected' : '' }}>Temporary</option>
                        <option value="Newly Graduated" {{ (old('type') == 'Newly Graduated') ? 'selected' : '' }}>Newly Graduated</option>
                        <option value="Internship" {{ (old('type') == 'Internship') ? 'selected' : '' }}>Internship</option>
                        <option value="Contractual" {{ (old('type') == 'Contractual') ? 'selected' : '' }}>Contractual</option>
                        <option value="Commision" {{ (old('type') == 'Commision') ? 'selected' : '' }}>Commision</option>
                    <?php }else{ ?>
                        <option value="Full-time" {{ ($type == 'Full-time') ? 'selected' : '' }}>Full-time</option>
                        <option value="Part-time" {{ ($type == 'Part-time') ? 'selected' : '' }}>Part-time</option>
                        <option value="Temporary" {{ ($type == 'Temporary') ? 'selected' : '' }}>Temporary</option>
                        <option value="Newly Graduated" {{ ($type == 'Newly Graduated') ? 'selected' : '' }}>Newly Graduated</option>
                        <option value="Internship" {{ ($type == 'Internship') ? 'selected' : '' }}>Internship</option>
                        <option value="Contractual" {{ ($type == 'Contractual') ? 'selected' : '' }}>Contractual</option>
                        <option value="Commision" {{ ($type == 'Commision') ? 'selected' : '' }}>Commision</option>
                    <?php }?>
                    </select>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Status">Status:</label>
                    <select class="form-control" name="status" required>
                      <option value="" selected></option>
                      <?php if(!isset($request)){ ?>
                        <option value="Open" {{ (old('status') == 'Open') ? 'selected' : '' }}>Open</option>
                        <option value="Processing" {{ (old('status') == 'Processing') ? 'selected' : '' }}>Processing</option>
                        <option value="Closed" {{ (old('status') == 'Closed') ? 'selected' : '' }}>Closed</option>
                      <?php }else{ ?>
                        <option value="Open" {{ ($status == 'Open') ? 'selected' : '' }}>Open</option>
                        <option value="Processing" {{ ($status == 'Processing') ? 'selected' : '' }}>Processing</option>
                        <option value="Closed" {{ ($status == 'Closed') ? 'selected' : '' }}>Closed</option>
                      <?php }?>
                    </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-8 col-lg-12">
                  <span class="pull-right">
                      <a href="{{url('requests')}}" class="btn btn-md btn-danger">Cancel</a>
                  </span>
                  <span class="pull-right">
                    <button type="submit" class="btn btn-md btn-success">{{ $button }}</button>
                  </span>
                </div>
              </div>
          </form>
        </div>
    </div>
@endsection