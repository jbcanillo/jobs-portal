<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageSpoken extends Model
{
    //
    use \Aginev\ActivityLog\Traits\ObservableModel;
    protected $table = 'applicant_language_spoken';
}
