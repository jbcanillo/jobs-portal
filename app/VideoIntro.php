<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoIntro extends Model
{
    //
    use \Aginev\ActivityLog\Traits\ObservableModel;
    protected $table = 'applicant_video_intro';
}
