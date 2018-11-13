@extends('layout/employer_container')
@section('content')
<div class="card">
    <div class="card-header card-header-tabs card-header-info  ">
        <h4 class="card-title"><i class="material-icons">search</i> Search Applicants</h4>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <form method="post" action="{{ action('EmployersSearchController@store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="row">
                    <div class='col-md-12 col-lg-4'>  
                        <label for="Gender">Gender:</label>
                        <select class="form-control" name="gender">
                            <option value="" selected></option>
                            <option value="Any" {{ (old('gender') == 'Any') ? 'selected' : '' }}>Any</option>
                            <option value="Male" {{ (old('gender') == 'Male') ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ (old('gender') == 'Female') ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class='col-md-12 col-lg-4'>  
                        <label for="Education">Education Level:</label>
                        <select class="form-control" name="education_level">
                            <option value="" selected></option>
                            <option value="Gradeschool" {{ (old('education_level') == "Gradeschool") ? 'selected' : '' }}>Gradeschool</option>
                            <option value="Highschool" {{ (old('education_level') == "Highschool" ) ? 'selected' : '' }}>Highschool</option>
                            <option value="Vocational" {{ (old('education_level') == "Vocational") ? 'selected' : '' }}>Vocational</option>
                            <option value="College" {{ (old('education_level') == "College") ? 'selected' : '' }}>College</option>
                            <option value="Masteral" {{ (old('education_level') == "Masteral") ? 'selected' : '' }}>Masteral</option>
                            <option value="Doctoral" {{ (old('education_level') == "Doctoral") ? 'selected' : '' }}>Doctoral</option>
                        </select>
                    </div>
                    <div class='col-md-12 col-lg-4'>  
                        <label for="Age">Minimum Age:</label>
                        <input type="number" class="form-control" name="age" value="{{ old('age') }}">
                    </div>
                    <div class='col-md-12 col-lg-4'>  
                        <label for="Years">Minimum Years of Work Experience:</label>
                        <input type="number" class="form-control" name="years_of_experience" value="{{ old('years_of_experience') }}">
                    </div>
                    <div class='col-md-12 col-lg-4'>  
                        <label for="Relocation">Ok for Relocation:</label>
                        <select class="form-control" name="relocation">
                            <option value="" selected></option>
                            <option value="Yes" {{ (old('relocation') == 'Yes') ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ (old('relocation') == 'No') ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <div class='col-md-12 col-lg-4'>  
                        <label for="Type">Type:</label>
                        <select class="form-control" name="type">
                            <option value="" selected></option>
                            <option value="Full-time" {{ (old('type') == 'Full-time') ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ (old('type') == 'Part-time') ? 'selected' : '' }}>Part-time</option>
                            <option value="Temporary" {{ (old('type') == 'Temporary') ? 'selected' : '' }}>Temporary</option>
                            <option value="Newly Graduated" {{ (old('type') == 'Newly Graduated') ? 'selected' : '' }}>Newly Graduated</option>
                            <option value="Internship" {{ (old('type') == 'Internship') ? 'selected' : '' }}>Internship</option>
                            <option value="Contractual" {{ (old('type') == 'Contractual') ? 'selected' : '' }}>Contractual</option>
                            <option value="Commision" {{ (old('type') == 'Commision') ? 'selected' : '' }}>Commision</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 col-lg-12">
                        <span class="pull-right">
                            <a href="{{url('employer/search')}}" class="btn btn-md btn-danger">Clear</a>
                        </span>
                        <span class="pull-right">
                            <button type="submit" class="btn btn-md btn-success">Filter</button>
                        </span>
                    </div>
                </div>
        </form>
        <hr>
        @if(isset($applicants))
            <div class="row">
                @foreach($applicants as $applicant)
                    <div class="col-md-4">
                        <br> 
                        <div class="card card-profile" style="background-color: lavender;">
                                <div class="card-avatar">
                                    @if(isset($applicant->picture))
                                        <img src="{{ URL::asset('storage'.substr( $applicant->picture,6)) }}" width="200px" height="200px">
                                    @else
                                        <img src="{{ asset('img/no_pic.png') }}" width='200px' height='200px'>
                                    @endif
                                </div>
                                <div class="card-body">
                                <h4 class="card-title">{{ $applicant->lastname .", ". $applicant->firstname ." ". $applicant->middlename }}</h4>
                                    <p class="card-description">
                                        {{ $applicant->gender . "-" . " years old"}}
                                    </p>
                                    <a class='btn btn-info btn-round' onclick='viewRecord("/applicants/show/",{{ $applicant->applicant_id }});' href='#' style='color:white;'>View</a>
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection