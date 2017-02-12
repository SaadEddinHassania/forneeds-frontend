<?php

namespace App\Models;

use App\Models\Users\Citizen;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Targetable;

class MaritalStatus extends Model
{
    use Targetable;

    public function citizens()
    {
        return $this->hasMany(Citizen::class);
    }
}
