<?php

$applicant = '<div class="row item-row-applicant command-row-applicant card-body">
                        <div class="col-md-4 col-sm-2 col-xs-12">
                            <label>Name</label>
                            <input type="text" id="applicant[]" name="applicant[]" class="form-control" required>
                        </div>
                        <div class="col-md-5 col-sm-2 col-xs-12">
                            <label>Remarks</label>
                            <input type="text" id="remarks[]" name="remarks[]" class="form-control" required>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <label>Status</label>
                            <select id="status[]" name="status[]" class="form-control" required>
                                <option value=""></option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-12">
                        <label></label>
                        <a class="btn-remove-row-applicant btn btn-danger btn-sm" style="color:white">x</a>
                        </div>
                    </div>';

$applicant_append = trim(preg_replace('/\s+/',' ', $applicant));
$applicant='';

if(isset($request)){
    $title = $request->title;
    $company = $request->company;
    $location = $request->location;
    $description = $request->description;
    $type = $request->type;
    $status = $request->status;
    $created_at = $request->created_at;
    $updated_at = $request->updated_at;
    $status = $request->status;
}
?>
@extends('layout/admin_container')
@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-info ">
        <h4 class="card-title"><i class="material-icons">search</i> Process Request</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </div>
            @endif
            <form method="post" action="{{ url('requests/set/'.$request->id) }}" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}
              <div class="row">
                <div class='col-md-12 col-lg-6'>
                  <label for="Applicant Name">Applicant Name:</label>
                  <input type="text" class="form-control" name="title" value="{{ $title }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Company">Company:</label>
                    <input type="text" class="form-control" name="company" value="{{ $company }}" readonly>
                </div>
                <div class='col-md-12 col-lg-6'>  
                    <label for="Location">Location:</label>
                    <input type="text" class="form-control" name="location" value="{{ $location }}" readonly>
                </div>
               
                <div class='col-md-12 col-lg-6'>  
                    <label for="Type">Type:</label>
                    <input type="text" class="form-control" name="type" value="{{ $type }}" readonly>
                </div>
                <div class='col-md-12 col-lg-12'>  
                    <label for="Description">Description:</label>
                    <textarea class="form-control" name="description" rows="10" readonly>{{ $description }}</textarea>
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
                    <button type="submit" class="btn btn-md btn-success">Save</button>
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
    </script>
@endsection