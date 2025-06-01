<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'property_id',
        'document_type',
        'file_url',
        'uploaded_by'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function uploadedBy()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}