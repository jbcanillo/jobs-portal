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
                            </div>
                            <form action="{{ url('signup/register') }}" method="post" id="contact-form">
                                {{ csrf_field() }}
                                <div class="col-sm-6 col-md-6">
                                    <label>Firstname</label>
                                    <input type="text" class="form-control" placeholder="required" name="firstname">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Middlename</label>
                                    <input type="text" class="form-control" placeholder="required" name="middlename">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Lastname</label>
                                    <input type="text" class="form-control" placeholder="required" name="lastname">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Nickname</label>
                                    <input type="text" class="form-control" placeholder="required" name="nickname">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="required" name="email">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Contact No.</label>
                                    <input type="text" class="form-control" placeholder="required" name="contact">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Register As</label>
                                    <select class="form-control" placeholder="required" name="type">
                                        <option value="">Select</option>
                                        <option value="applicant">Applicant</option>
                                        <option value="employer">Employer</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="required" name="username">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="required" name="password">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="required" name="confirm_password">
                                </div>
                                <center><button class="btn btn-send" type="submit" role="button">Submit</button></center>
                            </form>
                        </div>
                    </div>
            </div>
</section>
@endsection