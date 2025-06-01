<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'property_id',
        'surveyor_name',
        'survey_date',
        'map_image_url'
    ];

    protected $casts = [
        'survey_date' => 'datetime:Y-m-d'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function boundaryMarkers()
    {
        return $this->hasMany(BoundaryMarker::class);
    }
}