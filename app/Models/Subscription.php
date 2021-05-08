<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Subscription
 *
 * @package App\Models
 */
class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'day_iteration',
        'is_active',
    ];

    protected $casts = [
        'day_iteration' => 'integer',
        'is_active' => 'boolean',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
