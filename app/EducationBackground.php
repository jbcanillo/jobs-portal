<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationBackground extends Model
{
    //
    use \Aginev\ActivityLog\Traits\ObservableModel;
    protected $table = 'applicant_education_background';
}
