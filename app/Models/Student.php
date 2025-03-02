<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'belt_id'
    ];

    public function belt()
    {
        return $this->belongsTo(Belt::class);
    }
}
