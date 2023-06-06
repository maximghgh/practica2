<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'user_id',
        'avtor_id',
        'name_book',
        'text'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}

