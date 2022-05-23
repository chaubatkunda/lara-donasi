<?php

namespace App\Services;

use Illuminate\Support\Str;

trait HashUuid
{
    protected static function bootHashUuid()
    {
        // parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    // public $incrementing = false;
    // protected $keyType = 'string';
    public function getKeyType()
    {
        return 'string';
    }
    public function getIncrementing()
    {
        return false;
    }
    public function getRouteKeyName()
    {
        return 'id';
    }
}
