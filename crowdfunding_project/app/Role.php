<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Role extends Model
{
       // use UuidTrait;

       protected $fillable = [
        'nama_role'
     ];
     protected $primaryKey = 'id_role';
    //  protected $table      = 'roles';

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
        return $this->hasMany('App\User');
    }
}
