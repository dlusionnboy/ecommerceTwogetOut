<?php 

namespace App\Traits;

use illuminate\Support\str;

trait UuidTrait
{
    protected static function boot(){
        parent::boot();
        static::creating(function($model){
            $model->incrementing = false;
            $model->keyType = 'string';
            $model->{$model->getKeyName()}= Str::orderedUuid()->__toString();
        });
    }

    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }
}