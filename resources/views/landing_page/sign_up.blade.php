@extends('layout/general_container')
@section('content2')
<section id="sign_up" class="signup section">      
        <div class="container">
                <div class="row">
                        <div class="form-group transparent_block wow fadeInDown">
                            <div class="col-sm-12 col-md-12">
                                <center>
                                    <i class="tf-pencil2" style="font-size:50px"></i>
                                    <h1>Sign-Up Form</h1>
                                </center>
                                <br> 
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif
                                @if (\Session::has('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>	
                                        <strong>{{ \Session::get('success') }}</strong>
                                    </div>
                                @endif 
                            </div>
                            <form action="{{ action('SignUpController@store') }}" method="post" id="contact-form" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-sm-6 col-md-6">
                                    <label>Firstname</label>
                                    <input type="text" class="form-control" placeholder="" name="firstname" value="{{ old('firstname') }}">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Middlename</label>
                                    <input type="text" class="form-control" placeholder="" name="middlename" value="{{ old('middlename') }}">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Lastname</label>
                                    <input type="text" class="form-control" placeholder="" name="lastname" value="{{ old('lastname') }}">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Nickname</label>
                                    <input type="text" class="form-control" placeholder="" name="nickname" value="{{ old('nickname') }}">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Contact No.</label>
                                    <input type="text" class="form-control" placeholder="" name="contact_number" value="{{ old('contact_number') }}">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Register As</label>
                                    <select class="form-control" name="role">
                                        <option value="">Select</option>
                                        <option value="Applicant" {{ (old('role') == 'Applicant') ? 'selected' : '' }}>Applicant</option>
                                        <option value="Employer" {{ (old('role') == 'Employer') ? 'selected' : '' }}>Employer</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="" name="username" value="{{ old('username') }}">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="" name="password">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="" name="confirm_password">
                                </div>
                                <center>
                                    <button class="btn btn-send" type="submit" role="button">Submit</button>
                                    <br> <br><h5>Already registered? <a href="/login">Log-in here</a></h5>
                                </center>
                            </form>
                        </div>
                    </div>
            </div>
</section>
@endsection