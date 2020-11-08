<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;
use Illuminate\Support\Str;

class Otp extends Model
{
    use UsesUuid;

    protected $fillable = [
        'otp','user_id','valid_until'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
