<?php
if(!isset($user)){
    $method = "Add User";
    $button = "Submit";
}else{
    $username = $user->name;
    $email = $user->email;
    $role = $user->role;
    $status = $user->status;
    $method = "Edit User";
    $button = "Update";
}
?>
@extends('layout/admin_container')
@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-info  ">
        <h4 class="card-title"><i class="material-icons">person</i> {{ $method }}</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </div>
            @endif
            <?php if(!isset($user)){ ?>
                <form method="post" action="{{ action('UsersController@store') }}" enctype="multipart/form-data">
            <?php }else{ ?>
                <form method="post" action="{{ action('UsersController@update',$user->id) }}">
                <input name="_method" type="hidden" value="PATCH">
            <?php } ?>
                {{ csrf_field() }}
              <div class="row">
                <div class='col-md-12 col-lg-6'>  
                  <label for="Username">Username:</label>
                  <input type="text" class="form-control" name="username" value="{{ (isset($user))? $username : old('username') }}">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ (isset($user))? $email :old('email') }}">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Password">Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="ConfirmPassword">Confirm Password:</label>
                    <input type="password" class="form-control" name="confirm_password">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Role">Role:</label>
                    <select class="form-control" name="role">
                        <option value="" selected></option>
                        <?php if(!isset($user)){ ?>
                            <option value="Administrator" {{ (old('role') == 'Administrator') ? 'selected' : '' }}>Administrator</option>
                            <option value="User" {{ (old('role') == 'User') ? 'selected' : '' }}>User</option>
                            <option value="Employer" {{ (old('role') == 'Employer') ? 'selected' : '' }}>Employer</option>
                            <option value="Job Seeker" {{ (old('role') == 'Job Seeker') ? 'selected' : '' }}>Job Seeker</option>
                        <?php }else{ ?>
                            <option value="Administrator" {{ ($role == 'Administrator') ? 'selected' : '' }}>Administrator</option>
                            <option value="User" {{ ($role == 'User') ? 'selected' : '' }}>User</option>
                            <option value="Employer" {{ ($role == 'Employer') ? 'selected' : '' }}>Employer</option>
                            <option value="Job Seeker" {{ ($role == 'Job Seeker') ? 'selected' : '' }}>Job Seeker</option>
                        <?php }?>
                    </select>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Status">Status:</label>
                    <select class="form-control" name="status">
                      <option value="" selected></option>
                      <?php if(!isset($user)){ ?>
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
@endsection