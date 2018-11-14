<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Awards extends Model
{
    //
    use \Aginev\ActivityLog\Traits\ObservableModel;
    protected $table = 'applicant_awards';
}
