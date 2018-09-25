@extends('layout/general_container')
@section('content2')
<section id="change_password" class="change_password section">      
    <div class="container">
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3 wow fadeInDown transparent_block" data-wow-delay="0.3s">
                <div class="col-sm-12 col-md-12">
                    <div class="block">
                        <center>
                            <i class="tf-ion-key" style="font-size:50px"></i>
                            <h1>Change Password</h1>
                        </center>
                        <br>
                    </div>
                    
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group ">
                            <form action="{{ url('change_password') }}" method="post" id="form">
                                {{ csrf_field() }}
                                <div class="input-field">
                                    <input type="hidden" name="token" value="{{ $data }}">
                                    @if($reset_password==true)
                                       <!-- <div class="input-field">
                                            <input type="password" class="form-control" placeholder="Old Password" name="old_password">
                                        </div>-->
                                        <div class="alert alert-info alert-block">
                                            Note: Changing password will force you to logout. You may need to login again.
                                        </div>
                                    @endif
                                    <div class="input-field">
                                        <input type="password" class="form-control" placeholder="New Password" name="new_password">
                                    </div>
                                    <div class="input-field">
                                        <input type="password" class="form-control" placeholder="Confirm New Password" name="confirm_new_password">
                                    </div>    
                                </div>
                                <button class="btn btn-send" type="submit">Save</button>
                            </form>
                    </div>
                </div>
        </div>
        </div>
    </div>
</section>
@endsection