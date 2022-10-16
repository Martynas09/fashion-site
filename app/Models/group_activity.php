<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_activity extends Model
{
    protected $table = 'group_activity';
    public $timestamps = false;

    public function photos()
    {
        return $this->hasMany(photo::class);
    }
}
