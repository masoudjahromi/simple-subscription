<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Order
 *
 * @package App\Models
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subscription_id',
        'status_id',
        'total',
        'paid_date',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(OrderStatus::class, 'id', 'status_id');
    }
}
