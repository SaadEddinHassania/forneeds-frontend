<?php

namespace App\Models;

use App\Models\Traits\Targetable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\CitizenProp;
class Age extends Model
{
 use Targetable ,CitizenProp;


}
