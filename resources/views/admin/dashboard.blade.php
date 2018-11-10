@extends('layout/admin_container')
@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-info  ">
        <h4 class="card-title"><i class="material-icons">dashboard</i> Dashboard</h4>
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card card-stats" style="background-color:gainsboro">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">account_circle</i>
                                </div>
                                    <p class="card-category">No. of Users Online</p>
                            <h3 class="card-title">{{ $online_users }}/{{ $active_users + $inactive_users }}</h3>
                                </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">warning</i>
                                    No. of Unactivated User Accounts: {{ $inactive_users }} 
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card card-stats" style="background-color:gainsboro">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">assignment_ind</i>
                                </div>
                                    <p class="card-category">Applicants</p>
                                    <span class="pulls-right">
                                    <a class="btn btn-success btn-round btn-m">Active: {{ $active_applicants }}</a>
                                    <a class="btn btn-danger btn-round btn-m">Inactive: {{ $inactive_applicants }}</a>
                                </span>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    Total Applicants: {{ $active_applicants + $inactive_applicants }} 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card card-stats" style="background-color:gainsboro">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">people</i>
                                    </div>
                                        <p class="card-category">Employers</p>
                                        <span class="pulls-right">
                                            <a class="btn btn-success btn-round btn-m">Active: {{ $active_employers }}</a>
                                            <a class="btn btn-danger btn-round btn-m">Inactive: {{ $inactive_employers }}</a>
                                        </span>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        Total Employers: {{ $active_employers + $inactive_employers }} 
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card card-stats" style="background-color:gainsboro">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">assignment</i>
                                </div>
                                    <p class="card-category">Job Requests</p>
                                    <span class="pulls-right">
                                        <a class="btn btn-danger btn-round btn-m">Open: {{ $open_requests }}</a>
                                        <a class="btn btn-warning btn-round btn-m">Processing: {{ $processing_requests }}</a>
                                        <a class="btn btn-success btn-round btn-m">Closed: {{ $closed_requests }}</a>
                                    </span>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    Total Job Requests: {{ $open_requests + $processing_requests + $closed_requests }} 
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection