<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizations extends Model
{
    //
    use \Aginev\ActivityLog\Traits\ObservableModel;
    protected $table = 'applicant_organizations';
}
