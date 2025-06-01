<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    protected $fillable = [
        'property_id',
        'dispute_type',
        'complainant',
        'respondent',
        'case_number',
        'court_name',
        'status',
        'resolution'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}