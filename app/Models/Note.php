<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'contents',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}