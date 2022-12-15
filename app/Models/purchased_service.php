<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchased_service extends Model
{
    protected $table = 'purchased_service';
    public $timestamps = false;

    public function purchasedService()
    {
        return $this->belongsTo(service::class, 'service_id', 'id');
    }
}
