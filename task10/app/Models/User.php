<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 
        'password', 
        'first_name',
        'last_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function avtorsOfMine()
    {
        return $this->belongsToMany('App\Models\User', 'avtors', 'user_id', 'avtor_id');
    }

    public function avtorsOf()
    {
        return $this->belongsToMany('App\Models\User', 'avtors', 'avtor_id', 'user_id');
    }

    public function avtors()
    {
        return $this->avtorsOfMine()->wherePivot('accepted', true)->get()->merge( $this->avtorsOf()->wherePivot('accepted', true)->get() );
    }
    public function getName()
    {
        if($this->first_name && $this->last_name)
        {
            return "{$this->first_name} {$this->last_name}";
        }

        if($this->first_name) 
        {
            return $this->first_name;
        }

        return null;

    }

    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->username;
    }

    public function getFirstNameOrUsername()
    {
        return $this->first_name ?: $this->username;
    }
    public function books()
    {
        return $this->hasMany('App\Models\Book', 'user_id');
    }

    
}

