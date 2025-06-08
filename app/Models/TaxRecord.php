<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class TaxRecord extends Model
{
    use LogsActivity;

    protected $fillable = [
        'property_id',
        'assessed_value',
        'tax_year',
        'tax_due',
        'tax_paid',
        'last_payment_date'
    ];

    protected $casts = [
        'tax_year' => 'integer',
        'assessed_value' => 'decimal:2',
        'tax_due' => 'decimal:2',
        'tax_paid' => 'boolean',
        'last_payment_date' => 'datetime:Y-m-d'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function exemptions()
    {
        return $this->hasMany(TaxExemption::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "TaxRecord model has been {$eventName}");
    }
}