<?php
if(!isset($employer)){
    $method = "Add Employer";
    $button = "Submit";
}else{
    $firstname = $employer->firstname;
    $middlename = $employer->middlename;
    $lastname = $employer->lastname;
    $nickname = $employer->nickname;
    $company_name = $employer->company_name;
    $company_size = $employer->company_size;
    $contact_person = $employer->contact_person;
    $contact_number = $employer->contact_number;
    $how = $employer->how;
    $user_id = $employer->user_id;
    $status = $employer->status;
    $created_at = $employer->created_at;
    $updated_at = $employer->updated_at;
    $method = "Edit Employer";
    $button = "Update";
}
?>
@extends('layout/admin_container')
@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-info  ">
        <h4 class="card-title"><i class="material-icons">people</i> {{ $method }}</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </div>
            @endif
            <?php if(!isset($employer)){ ?>
                <form method="post" action="{{ action('EmployersController@store') }}" enctype="multipart/form-data">
            <?php }else{ ?>
                <form method="post" action="{{ action('EmployersController@update',$employer->id) }}" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
            <?php } ?>
                {{ csrf_field() }}
              <div class="row">
                <div class='col-md-12 col-lg-6'>
                  <label for="Firstname">Firstname:</label>
                  <input type="text" class="form-control" name="firstname" value="{{ (isset($employer))? $firstname : old('firstname') }}" required>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Middlename">Middlename:</label>
                    <input type="text" class="form-control" name="middlename" value="{{ (isset($employer))? $middlename : old('middlename') }}" required>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Lastname">Lastname:</label>
                    <input type="text" class="form-control" name="lastname" value="{{ (isset($employer))? $lastname : old('lastname') }}" required>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Nickname">Nickname:</label>
                    <input type="text" class="form-control" name="nickname" value="{{ (isset($employer))? $nickname : old('nickname') }}" required>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Company">Company/Employer Name:</label>
                    <input type="text" class="form-control" name="company_name" value="{{ (isset($employer))? $company_name : old('company_name') }}" required>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Company Size">Company Size:</label>
                    <input type="number" class="form-control" name="company_size" value="{{ (isset($employer))? $company_size : old('company_size') }}" required>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Contact">Contact Person(s):</label>
                    <input type="text" class="form-control" name="contact_person" value="{{ (isset($employer))? $contact_person : old('contact_person') }}" required>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Contact">Contact Number/s:</label>
                    <input type="text" class="form-control" name="contact_number" value="{{ (isset($employer))? $contact_number : old('contact_number') }}" required>
                </div>
               
                <div class='col-md-12 col-lg-6'>  
                    <label for="Username">Link to User ID:</label>
                    <select class="form-control" name="user_id" required>
                        <option value="" selected></option>
                        @foreach ($users as $user)
                            @if($user->role=='Employer')
                                @if(!isset($employer))
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @else
                                    <option value="{{ $user->id }}" {{ ($user_id == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Status">Status:</label>
                    <select class="form-control" name="status" required>
                      <option value="" selected></option>
                      <?php if(!isset($employer)){ ?>
                        <option value="Active" {{ (old('status') == 'Active') ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ (old('status') == 'Inactive') ? 'selected' : '' }}>Inactive</option>
                      <?php }else{ ?>
                        <option value="Active" {{ ($status == 'Active') ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ ($status == 'Inactive') ? 'selected' : '' }}>Inactive</option>
                      <?php }?>
                    </select>
                </div>
                <div class='col-md-12 col-lg-12'>  
                    <label for="How">How did you know about us?</label>
                    <input type="text" class="form-control" name="how" value="{{ (isset($employer))? $how : old('how') }}">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-8 col-lg-12">
                  <span class="pull-right">
                      <a href="{{url('employers')}}" class="btn btn-md btn-danger">Cancel</a>
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