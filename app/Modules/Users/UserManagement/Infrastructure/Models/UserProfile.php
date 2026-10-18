<?php

namespace App\Modules\Users\UserManagement\Infrastructure\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['address_id','first_name','last_name','avatar','bio','job_title'])]
class UserProfile extends Model
{
    //
}
