<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $table = 'photo';
    public $timestamps = false;

    public function photoToPost()
    {
        return $this->belongsTo(post::class, 'post_id', 'id');
    }
    public function photoToService()
    {
        return $this->belongsTo(service::class, 'service_id', 'id');
    }
    public function photoToActivity()
    {
        return $this->belongsTo(group_activity::class, 'group_activity_id', 'id');
    }


}
