<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    protected $fillable = [
        'property_id',
        'permit_type',
        'permit_number',
        'issue_date',
        'expiry_date',
        'issuing_authority',
        'status'
    ];

    protected $casts = [
        'issue_date' => 'datetime:Y-m-d',
        'expiry_date' => 'datetime:Y-m-d'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}