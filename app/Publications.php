<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publications extends Model
{
    //
    use \Aginev\ActivityLog\Traits\ObservableModel;
    protected $table = 'applicant_publications';
}
