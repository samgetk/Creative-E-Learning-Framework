<?php

namespace CEF;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function user()
    {
        return $this->belogsTo(User::Class);
    }
}
