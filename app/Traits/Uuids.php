<?php

namespace BAKD\Traits;

use Webpatser\Uuid\Uuid;

trait Uuids
{
    /**
     * Boot function from Laravel.
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Uuid::generate()->string;
        });
    }
}