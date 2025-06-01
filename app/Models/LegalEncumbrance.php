<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalEncumbrance extends Model
{
    protected $fillable = [
        'property_id',
        'encumbrance_type',
        'description',
        'institution',
        'amount',
        'start_date',
        'end_date',
        'is_active'
    ];

    protected $casts = [
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
        'is_active' => 'boolean',
        'amount' => 'decimal:2'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}