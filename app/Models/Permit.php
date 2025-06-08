<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Permit extends Model
{
    use LogsActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Permit model has been {$eventName}");
    }
}