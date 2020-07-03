<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $table = 'event_user_data';
    protected $fillable = ['event_id','user_id','is_presenter','is_moderator','state'];
}
