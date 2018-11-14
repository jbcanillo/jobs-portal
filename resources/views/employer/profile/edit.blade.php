@extends('layout/employer_container')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title"><i class="material-icons">edit</i> Edit Profile</h4>
                <p class="card-category">Please complete your profile to keep your account activated.</p>
            </div>
            <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                  @endif
                <form method="post" action="{{ action('EmployersProfileController@update',Auth::user()->id) }}" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label>Picture/Company Logo</label>
                        <input type="text" class="form-control" name="picture_def" value="{{ $employer_details->picture }}" readonly>
                        <input type="file" class="form-control" id="picture" name="picture" accept=".jpeg,.jpg,.png" >
                    </div>
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label >Email address</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $user_details->email }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label >First Name</label>
                            <input type="text" id="firstname" name="firstname" class="form-control" value="{{ $employer_details->firstname }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label >Middle Name</label>
                            <input type="text" id="middlename" name="middlename" class="form-control" value="{{ $employer_details->middlename }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label >Last Name</label>
                            <input type="text" id="lastname" name="lastname" class="form-control" value="{{ $employer_details->lastname }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label >Nick Name</label>
                            <input type="text" id="nickname" name="nickname" class="form-control" value="{{ $employer_details->nickname }}">
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label >Company Name</label>
                            <input type="text" id="company_name" name="company_name" class="form-control" value="{{ $employer_details->company_name }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label >Address</label>
                            <input type="text" id="company_address" name="company_address" class="form-control" value="{{ $employer_details->company_address }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label >Company Size</label>
                            <input type="number" id="company_size" name="company_size" class="form-control" value="{{ $employer_details->company_size }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label >Contact Person(s)</label>
                            <input type="text" id="contact_person" name="contact_person" class="form-control" value="{{ $employer_details->contact_person }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                            <label >Contact Number</label>
                            <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{ $employer_details->contact_number }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>About our company</label>
                            <textarea id="about_me" name="about_me" class="form-control" rows="5">{{ $employer_details->about_me }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label>How did you know us? (Also please leave a comment on how was our service.)</label>
                            <input type="text" id="how" name="how" class="form-control" value="{{ $employer_details->how }}" required>
                        </div>
                    </div>
                </div>
                <span class='pull-right'>
                    <button type="submit" class="btn btn-md btn-success">UPDATE</button>
                    <a href="{{url('/employer/profile')}}" class="btn btn-md btn-danger">Cancel</a>
                </span>
                <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection