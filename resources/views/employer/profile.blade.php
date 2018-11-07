@extends('layout/employer_container')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header card-header-info">
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-category">Complete your profile</p>
        </div>
        <div class="card-body">
            <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label >Username</label>
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label >Email address</label>
                        <input type="email" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label >First Name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label >Middle Name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label >Last Name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label >Nick Name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label >Company Name</label>
                        <input type="text" class="form-control" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label >Address</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                        <label >Company Size</label>
                        <input type="number" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                        <label >Contact Person</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group bmd-form-group">
                        <label >Contact Number</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>About Me</label>
                        <textarea class="form-control" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Picture</label>
                    <input type="text" class="form-control" name="picture_def" value="{{ (isset($applicant))? $picture : old('picture_def') }}" readonly>
                    <input type="file" class="form-control" id="picture" name="picture" accept=".jpeg,.jpg,.png">
                </div>
            </div>
            <span class='pull-right'><a href="<?php echo "/employers/".Auth::user()->id."/edit"?>" class="btn btn-m btn-success">UPDATE</a></span>
            <div class="clearfix"></div>
            </form>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-profile">
        <div class="card-avatar">
            <a href="#pablo">
            <img class="img" src="../assets/img/faces/marc.jpg">
            </a>
        </div>
        <div class="card-body">
            <h4 class="card-title">Company Name</h4>
            <label>How did you know us?</label>
            <p class="card-description">
                
            </p>
            <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
        </div>
        </div>
    </div>
    </div>
@endsection