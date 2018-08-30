<?php
if(!isset($applicant)){
    $method = "Add Applicant";
    $button = "Submit";
}else{
    $firstname = $applicant->firstname;
    $middlename = $applicant->middlename;
    $lastname = $applicant->lastname;
    $nickname = $applicant->nickname;
    $email = $applicant->email;
    $profile_picture = $applicant->profile_picture;
    $resume_file = $applicant->resume_file;
    $resume_public = $applicant->resume_public;
    $status = $applicant->status;
    $created_at = $applicant->created_at;
    $updated_at = $applicant->updated_at;
    $method = "Edit Applicant";
    $button = "Update";
}
?>
@extends('layout/admin_container')
@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-info  ">
        <h4 class="card-title"><i class="material-icons">assignment_ind</i> {{ $method }}</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </div>
            @endif
            <?php if(!isset($applicant)){ ?>
                <form method="post" action="{{ action('ApplicantsController@store') }}" enctype="multipart/form-data">
            <?php }else{ ?>
                <form method="post" action="{{ action('ApplicantsController@update',$applicant->id) }}">
                <input name="_method" type="hidden" value="PATCH">
            <?php } ?>
                {{ csrf_field() }}
              <div class="row">
                <div class='col-md-12 col-lg-6'>  
                    <label for="Profile_Picture">Profile Picture:</label>
                    <input type="file" class="form-control" name="profile_picture">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ (isset($applicant))? $email :old('email') }}">
                </div>
                <div class='col-md-12 col-lg-6'>
                  <label for="Firstname">Firstname:</label>
                  <input type="text" class="form-control" name="firstname" value="{{ (isset($applicant))? $firstname : old('firstname') }}">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Middlename">Middlename:</label>
                    <input type="text" class="form-control" name="middlename" value="{{ (isset($applicant))? $middlename : old('middlename') }}">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Lastname">Lastname:</label>
                    <input type="text" class="form-control" name="lastname" value="{{ (isset($applicant))? $lastname : old('lastname') }}">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Nickname">Nickname:</label>
                    <input type="text" class="form-control" name="nickname" value="{{ (isset($applicant))? $nickname : old('nickname') }}">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Resume">Resume:</label>
                    <input type="file" class="form-control" name="resume_file">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Resume_Public">Resume viewable in public?</label>
                    <select class="form-control" name="resume_public">
                        <option value="" selected></option>
                        <?php if(!isset($applicant)){ ?>
                            <option value="1" {{ (old('resume_public') == '1') ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ (old('resume_public') == '0') ? 'selected' : '' }}>No</option>
                        <?php }else{ ?>
                            <option value="1" {{ ($resume_public == '1') ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ ($resume_public == '0') ? 'selected' : '' }}>No</option>
                        <?php }?>
                    </select>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Username">Link to Username:</label>
                    <select class="form-control" name="username">
                        <option value="" selected></option>
                    </select>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Status">Status:</label>
                    <select class="form-control" name="status">
                      <option value="" selected></option>
                      <?php if(!isset($applicant)){ ?>
                        <option value="Active" {{ (old('status') == 'Active') ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ (old('status') == 'Inactive') ? 'selected' : '' }}>Inactive</option>
                      <?php }else{ ?>
                        <option value="Active" {{ ($status == 'Active') ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ ($status == 'Inactive') ? 'selected' : '' }}>Inactive</option>
                      <?php }?>
                    </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-8 col-lg-12">
                  <span class="pull-right">
                      <a href="{{url('users')}}" class="btn btn-md btn-danger">Cancel</a>
                  </span>
                  <span class="pull-right">
                    <button type="submit" class="btn btn-md btn-success">{{ $button }}</button>
                  </span>
                </div>
              </div>
          </form>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-info">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title"><b>1</b></span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#desired_job" data-toggle="tab">
                                <i class="material-icons">find_in_page</i> Desired Job
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#work_experieance" data-toggle="tab">
                                <i class="material-icons">code</i> Work Experience
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#education_background" data-toggle="tab">
                                <i class="material-icons">cloud</i> Education Backgorund
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#skills" data-toggle="tab">
                                <i class="material-icons">cloud</i> Skills
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-info">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title"><b>2</b></span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="#certifications" data-toggle="tab">
                                <i class="material-icons">cloud</i> Certifications/Licenses
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#social_media" data-toggle="tab">
                                <i class="material-icons">cloud</i> Social Media Links
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#military_service" data-toggle="tab">
                                <i class="material-icons">cloud</i> Military Service
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#awards" data-toggle="tab">
                                <i class="material-icons">cloud</i> Awards
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-info">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title"><b>3</b></span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="#organizations" data-toggle="tab">
                                <i class="material-icons">cloud</i> Group/Organizations
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#patents" data-toggle="tab">
                                <i class="material-icons">cloud</i> Patents
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#publications" data-toggle="tab">
                                <i class="material-icons">cloud</i> Publications
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#language" data-toggle="tab">
                                <i class="material-icons">cloud</i> Language Spoken
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-info">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title"><b>4</b></span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="#government_documents" data-toggle="tab">
                                <i class="material-icons">cloud</i> Government Documents
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#video_upload" data-toggle="tab">
                                <i class="material-icons">cloud</i> Video Upload of Self-Introduction
                                <div class="ripple-container"></div>
                                </a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection