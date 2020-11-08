<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;
use Illuminate\Support\Str;

class Role extends Model
{
    use UsesUuid;
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany('App\User');
    }

}
