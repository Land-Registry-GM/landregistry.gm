<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Dispute extends Model
{
    use LogsActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Dispute model has been {$eventName}");
    }
}