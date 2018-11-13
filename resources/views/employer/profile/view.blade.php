@extends('layout/employer_container')
@section('content')
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title"><i class="material-icons">account_circle</i> Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @if (\Session::has('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>{{ \Session::get('success') }}</strong>
                            </div><br />
                        @endif
                        @if ($employer_details->status=='Inactive')
                            <div class="alert alert-danger alert-block">
                                <center><i class="material-icons" style="color:white">warning</i> <strong> You're account is still inactive. Kindly complete your information to activate your account.</strong></center>
                            </div><br />
                        @endif 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <br><br><br><br><br><br>
                        <div class="card card-profile" style="background-color: lavender;">
                            <div class="card-avatar">
                                <?php if(isset($employer_details->picture)){ ?>
                                    <center><img src="{{ URL::asset('storage'.substr($employer_details->picture,6)) }}" width="200px" height="200px"></center>
                                <?php }else{ ?>   
                                    <center><img src="{{ asset('img/no_pic.png') }}" width='200px' height='200px'></center>
                                <?php } ?>  
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $employer_details->company_name }}</h4>
                                <label>About Us</label>
                                <p class="card-description">
                                    {{ $employer_details->about_me }}
                                </p>
                                <?php
                                    if($employer_details->status=='Active'){
                                        echo ' <a href="" class="btn btn-success btn-round">Active</a>';
                                    }else{
                                        echo ' <a href="" class="btn btn-danger btn-round">Inactive</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div style="overflow-x:auto">
                            <table class="mdl-data-table mdl-js-data-table mdl-data-table-default-non-numeric" cellspacing="0" style="width:100%; text-align:left;">
                                <tr>
                                    <td><b><h5>Employer Information</h5><b></td>
                                    <td style="text-align:right"><a href="/employer/profile/0/edit" class="btn btn-sm btn-warning"><i class="material-icons">edit</i></a></td>
                                </tr>
                                <tr>
                                    <td><b>Nickname:</b></td><td>{{ $employer_details->nickname }}</td>
                                </tr>
                                <tr>
                                    <td><b>Firstname:</b></td><td>{{ $employer_details->firstname }}</td>
                                </tr>
                                <tr>
                                    <td><b>Middle:</b></td><td>{{ $employer_details->middlename }}</td>
                                </tr>
                                <tr>
                                    <td><b>Lastname:</b></td><td>{{ $employer_details->lastname }}</td>
                                </tr>
                                <tr>
                                    <td><b>Alias:</b></td><td>{{ $employer_details->nickname }}</td>
                                </tr>
                                <tr>
                                    <td><b>Email Address:</b></td><td>{{ $user_details->email }}</td>
                                </tr>
                                <tr>
                                    <td><b>Company Name:</b></td><td>{{ $employer_details->company_name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Company Address:</b></td><td>{{ $employer_details->company_address }}</td>
                                </tr>
                                <tr>
                                    <td><b>Company Size:</b></td><td>{{ $employer_details->company_size }}</td>
                                </tr>
                                <tr>
                                    <td><b>Contact Person:</b></td><td>{{ $employer_details->contact_person }}</td>
                                </tr>
                                <tr>
                                    <td><b>Contact Number:</b></td><td>{{ $employer_details->contact_number }}</td>
                                </tr>
                                <tr>
                                    <td><b>How did you know us?</b></td><td>{{ $employer_details->how }}</td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection