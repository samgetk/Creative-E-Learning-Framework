<?php

namespace CEF;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
