<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'post';
    public $timestamps = false;

    public function photos()
    {
        return $this->hasMany(photo::class);
    }
}
