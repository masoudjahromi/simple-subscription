<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserSubscription
 *
 * @package App\Models
 */
class UserSubscription extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'subscription_id',
        'start_date',
        'next_order_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'is_active' => 'boolean',
        'next_order_date' => 'datetime',
    ];

    protected $appends = [
        'is_active',
    ];

    protected $hidden = [
        'id',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            $now = Carbon::now();
            $query->start_date = $now;
            $query->next_order_date = $now->addDays();
        });
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }

    public function getIsActiveAttribute(): bool
    {
        return Carbon::create($this->attributes['next_order_date'])->greaterThanOrEqualTo(Carbon::now());
    }
}
