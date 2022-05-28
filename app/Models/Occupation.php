<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $ip
 * @property $user_agent
 */
class Occupation extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'user_agent',
    ];
}
