<?php

namespace CEF;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','unique_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function project()
    {
        return $this->hasMany(Project::Class);
    } 

    public function recent()
    {
        return $this->hasMany(Recent::Class);
    }

    public function content()
    {
        return $this->hasMany(Content::Class);
    }

    public function menu()
    {
        return $this->hasMany(Recent::Class);
    }
}
