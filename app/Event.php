<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;
class Event extends Model
{
    use UsesUuid;
    use SoftDeletes;
    protected $table = 'event_spaces';
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'space_uuid';
    protected $casts = ['opening_hours' => 'array'];

    protected $fillable = ['space_uuid', 'space_name','space_short_name','space_mood',
                           'max_capacity','space_image_url','space_icon_url','is_vip_space',
                           'opening_hours','event_id','tags'
                        ];

                        
}
