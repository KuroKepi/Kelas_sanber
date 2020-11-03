<?php


namespace App\Traits;
use Illuminate\Support\Str;

trait UuidTrait{

    protected static function bootUuidTrait() {
            parent::boot();
            static::creating(function ($model) {
                if ( ! $model->getKey()) {
                    $model->{$model->getKeyName()} = (string) Str::uuid();
                }
            });
        }
}


?>
