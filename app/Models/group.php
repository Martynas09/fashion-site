<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    protected $table = 'group';
    public $timestamps = false;

    public function groupToActivity()
    {
        return $this->belongsTo(group_activity::class, 'group_activity_id', 'id');
    }
    public function groupToMember()
    {
        return $this->hasMany(group_member::class);
    }

}
