<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_member extends Model
{
    protected $table = 'group_member';
    public $timestamps = false;

    public function memberToGroup()
    {
        return $this->belongsTo(group::class, 'group_id', 'id');
    }
}
