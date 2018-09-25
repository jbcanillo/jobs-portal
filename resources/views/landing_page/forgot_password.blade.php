@extends('layout/general_container')
@section('content2')
<section id="sign_up" class="signup section">      
    <div class="container">
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3 wow fadeInDown transparent_block" data-wow-delay="0.3s">
                <div class="col-sm-12 col-md-12">
                    <div class="block">
                        <center>
                            <i class="tf-ion-email" style="font-size:50px"></i>
                            <h1>Reset Password</h1>
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
                            <form action="{{ url('forgot_password') }}" method="post" id="form">
                                {{ csrf_field() }}
                                <div class="input-field">
                                    <input type="text" class="form-control" placeholder="Email" name="email">
                                </div>
                                <button class="btn btn-send" type="submit">Send</button>
                            </form>
                            <a href='/login' class='pull-left' style="font-weight:bold;color:#FFF">< Back</a>
                    </div>
                </div>
        </div>
        </div>
    </div>
</section>
@endsection