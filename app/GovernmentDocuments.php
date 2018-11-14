<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GovernmentDocuments extends Model
{
    //
    use \Aginev\ActivityLog\Traits\ObservableModel;
    protected $table = 'applicant_government_documents';
}
