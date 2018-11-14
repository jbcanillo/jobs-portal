<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certifications extends Model
{
    //
    use \Aginev\ActivityLog\Traits\ObservableModel;
    protected $table = 'applicant_certifications';
}
