<?php
if(!isset($request)){
    $method = "Add Request";
    $button = "Submit";
}else{
    $title = $request->title;
    $company = $request->company;
    $location = $request->location;
    $description = $request->description;
    $type = $request->type;
    $status = $request->status;
    $created_at = $request->created_at;
    $updated_at = $request->updated_at;
    $status = $request->status;
    $method = "Edit Request";
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
                  <label for="Title">Title:</label>
                  <input type="text" class="form-control" name="title" value="{{ (isset($request))? $title : old('title') }}">
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Company">Company:</label>
                    <!--<input type="text" class="form-control" name="company" value="{{ (isset($request))? $company : old('company') }}">-->
                    <select class="form-control" name="company">
                        <option value=''></option>
                        <?php echo $company_options;?>
                    </select>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Lastname">Location:</label>
                    <input type="text" class="form-control" name="location" value="{{ (isset($request))? $location : old('location') }}">
                </div>
               
                <div class='col-md-12 col-lg-6'>  
                    <label for="Type">Type:</label>
                    <select class="form-control" name="type">
                    <option value="" selected></option>
                    <?php if(!isset($request)){ ?>
                        <option value="Job Request" {{ (old('type') == 'Job Request') ? 'selected' : '' }}>Job Request</option>
                        <option value="Applicant Request" {{ (old('type') == 'Applicant Request') ? 'selected' : '' }}>Applicant Request</option>
                    <?php }else{ ?>
                        <option value="Job Request" {{ ($type == 'Job Request') ? 'selected' : '' }}>Job Request</option>
                        <option value="Applicant Request" {{ ($type == 'Applicant Request') ? 'selected' : '' }}>Applicant Request</option>
                    <?php }?>
                    </select>
                </div>
                <div class='col-md-12 col-lg-12'>  
                    <label for="Description">Description:</label>
                    <!--<input type="text" class="form-control" name="description" value="{{ (isset($request))? $description : old('description') }}">-->
                    <textarea class="form-control" name="description" rows="10">{{ (isset($request))? $description : old('description') }}</textarea>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Status">Status:</label>
                    <select class="form-control" name="status">
                      <option value="" selected></option>
                      <?php if(!isset($request)){ ?>
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