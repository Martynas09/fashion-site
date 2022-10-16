<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $table = 'service';
    public $timestamps = false;

    public function photos()
    {
        return $this->hasMany(photo::class);
    }
}
