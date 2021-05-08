<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OrderStatus
 *
 * @package App\Models
 */
class OrderStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
}
