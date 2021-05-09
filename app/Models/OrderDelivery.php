<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OrderDelivery
 *
 * @package App\Models
 */
class OrderDelivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'delivery_type_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function type()
    {
        return $this->belongsTo(DeliveryType::class, 'delivery_type_id', 'id');
    }
}
