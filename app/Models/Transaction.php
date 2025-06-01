<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'property_id',
        'transaction_type',
        'buyer_id',
        'seller_id',
        'amount',
        'transaction_date',
        'deed_number',
        'tax_paid',
        'recorded_by'
    ];

    protected $casts = [
        'transaction_date' => 'datetime:Y-m-d',
        'tax_paid' => 'boolean',
        'amount' => 'decimal:2'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function buyer()
    {
        return $this->belongsTo(Owner::class, 'buyer_id');
    }

    public function seller()
    {
        return $this->belongsTo(Owner::class, 'seller_id');
    }
}