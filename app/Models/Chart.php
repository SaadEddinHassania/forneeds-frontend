<?php

namespace App\Models;

use App\Models\Users\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    public function service_provider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }
}
