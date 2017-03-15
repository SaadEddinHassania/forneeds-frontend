<?php

namespace App\Models;

use App\Models\Users\Citizen;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Targetable;
use App\Models\Traits\CitizenProp;

class MaritalStatus extends Model
{
    use Targetable,CitizenProp;

}
