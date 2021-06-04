<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waifu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'birthdate',
        'origin',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
