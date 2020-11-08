<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UsesUuid;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function otpCode()
    {
        return $this->hasOne('App\OtpCode');
    }

    public function get_user_role_id()
    {
        $role = \App\Role::where('name','user')->first();
        return $role->id;
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->role_id = $model->get_user_role_id();
        });
    }

    public function isAdmin()
    {
        if($this->role_id === $this->get_user_role_id())
        {
            return false;
        }
        return true;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
