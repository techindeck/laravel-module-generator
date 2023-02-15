<?php

namespace Techindeck\LaravelModuleGenerator\Contracts;

use Illuminate\Support\Str;


trait ModelUUIDTrait
{
    public static function bootModelUUIDTrait(){
        if(!app()->runningInConsole()){
            static::creating(function($model) {
                $model->uuid = Str::uuid();
            });
        }
    }
}
