<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MilitaryService extends Model
{
    //
    use \Aginev\ActivityLog\Traits\ObservableModel;
    protected $table = 'applicant_military_service';
}
