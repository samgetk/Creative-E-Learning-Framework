<?php

namespace CEF;

use Illuminate\Database\Eloquent\Model;

class Recent extends Model
{
    protected $fillable=[
        'action', 'status', 'user_id', 'unique_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::Class);
    } 
}
