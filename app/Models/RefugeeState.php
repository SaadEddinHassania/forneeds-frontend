<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Targetable;
use App\Models\Traits\CitizenProp;

class RefugeeState extends Model
{
    use Targetable,CitizenProp;
}
