<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Survey extends Model
{
    use LogsActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Survey model has been {$eventName}");
    }
}