<?php
namespace App\Traits;
use Ramsey\Uuid\Uuid;

trait Uuids {
    protected static function bootUuids() {
        static::creating(function ($model) {
            $Uuid=$model->uuidColumns;
            foreach ($model->uuidColumns as $values) {
                $model->uuidColumns= Uuid::uuid1()->toString();
            }
            // if (!$model->event_uuid) {
            //     $model->event_uuid = Uuid::uuid1()->toString();
            //  }
        });
    }
    
    
}
