@extends('layout/applicant_container')
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
                        @if ($applicant_details->status=='Inactive')
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
                                <?php if(isset($applicant_details->picture)){ ?>
                                    <center><img src="{{ URL::asset('storage'.substr($applicant_details->picture,6)) }}" width="200px" height="200px"></center>
                                <?php }else{ ?>   
                                    <center><img src="{{ asset('img/no_pic.png') }}" width='200px' height='200px'></center>
                                <?php } ?>  
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $applicant_details->lastname .', '. $applicant_details->firstname .' '. $applicant_details->middlename}}</h4>
                                <p class="card-description">
                                    <?php
                                        $birthdate = new DateTime($applicant_details->birthdate);
                                        $now = new DateTime();
                                        $interval = $now->diff($birthdate);
                                        $applicant_age = $interval->y;    
                                        echo $applicant_details->gender. " - ".$applicant_age . " years old";
                                    ?>
                                </p>
                                <?php
                                    if($applicant_details->status=='Active'){
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
                                    <td><b><h5>Applicant Information</h5><b></td>
                                    <td style="text-align:right"><a href="#" onclick='viewRecord("/applicants/show/",{{ $applicant_details->id }});' class="btn btn-sm btn-primary"><i class="material-icons">visibility</i><a href="/applicant/profile/0/edit" class="btn btn-sm btn-warning"><i class="material-icons">edit</i></a></td>
                                </tr>
                                <tr>
                                    <td><b>Firstname:</b></td><td>{{ $applicant_details->firstname }}</td>
                                </tr>
                                <tr>
                                    <td><b>Middle:</b></td><td>{{ $applicant_details->middlename }}</td>
                                </tr>
                                <tr>
                                    <td><b>Lastname:</b></td><td>{{ $applicant_details->lastname }}</td>
                                </tr>
                                <tr>
                                    <td><b>Nickname:</b></td><td>{{ $applicant_details->nickname }}</td>
                                </tr>
                                <tr>
                                    <td><b>Email Address:</b></td><td>{{ $user_details->email }}</td>
                                </tr>
                                <tr>
                                    <td><b>Gender:</b></td><td>{{ $applicant_details->gender }}</td>
                                </tr>
                                <tr>
                                    <td><b>Birth Date:</b></td><td>{{ $applicant_details->birthdate }}</td>
                                </tr>
                                <tr>
                                    <td><b>Years of Work Experience:</b></td><td>{{ $applicant_details->years_of_experience }}</td>
                                </tr>
                                <tr>
                                    <td><b>Highest Educational Attainment:</b></td><td>{{ $applicant_details->highest_educational_attainment }}</td>
                                </tr>
                                <tr>
                                    <td><b>Contact Number:</b></td><td>{{ $applicant_details->contact_number }}</td>
                                </tr>
                                <tr>
                                    <td><b>Resume is viewable in public?</b></td><td>{{ ($applicant_details->resume_public==1)?"Yes":"No" }}</td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection