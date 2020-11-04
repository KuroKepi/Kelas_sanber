<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
       'id_users', 'name', 'password', 'email',
    ];
    protected $primaryKey = 'id_users';

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

    public function otp()
    {
        return $this->hasOne('App\Otp');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function verif()
    {
        if($this->email_verified_at != null )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function status()
    {
        if($this->id_role =='5e35fc81-77db-49b3-8a98-d1e0d5986bea')
        {
            return true;
        }
        else
        {
            false;
        }
    }

}
