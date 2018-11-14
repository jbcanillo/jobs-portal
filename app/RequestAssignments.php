<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestAssignments extends Model
{
    //
    use \Aginev\ActivityLog\Traits\ObservableModel;
    protected $table = 'request_assignments';
}
