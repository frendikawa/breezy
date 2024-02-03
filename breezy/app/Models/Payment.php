<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'cart_id',
        'total',
        'proof',
        'status',
        'address'
    ];

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Get the user that owns the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get all of the detailPayment for the Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailPayments(): HasMany
    {
        return $this->hasMany(DetailPayment::class);
    }
}
