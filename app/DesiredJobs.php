<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesiredJobs extends Model
{
    //
    use \Aginev\ActivityLog\Traits\ObservableModel;
    protected $table = 'applicant_desired_jobs';
}
