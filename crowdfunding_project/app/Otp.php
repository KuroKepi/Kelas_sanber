<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
// use App\Traits\UuidTrait;

class Otp extends Model
{
    // use UuidTrait;

    protected $fillable = [
        'id_users', 'code_otp', 'email_users',
     ];
     protected $primaryKey = 'id_otp';
    //  protected $table      = 'otps';

     public function getIncrementing()
     {
         return false;
     }

     public function getKeyType()
     {
         return 'string';
     }

     protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            if ( ! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
