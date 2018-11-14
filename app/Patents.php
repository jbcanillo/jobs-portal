<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patents extends Model
{
    //
    use \Aginev\ActivityLog\Traits\ObservableModel;
    protected $table = 'applicant_patents';
}
