<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Property extends Model
{
    use SoftDeletes, LogsActivity;

    protected $table = 'properties';

    protected $fillable = [
        'parcel_id',
        'street',
        'city',
        'state',
        'postal_code',
        'ownership_type',
        'centroid_lat',
        'centroid_lng',
        'boundary_coordinates',
        'area',
        'land_use_type',
        'zoning',
        'survey_plan_number',
        'boundary_description'
    ];

    protected $casts = [
        'boundary_coordinates' => 'array',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn(string $eventName) => "Property model has been {$eventName}");
    }

    // Relationships
    // public function owners()
    // {
    //     return $this->hasMany(Owner::class);
    // }

    public function legalEncumbrances()
    {
        return $this->hasMany(LegalEncumbrance::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function taxRecords()
    {
        return $this->hasMany(TaxRecord::class);
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    public function permits()
    {
        return $this->hasMany(Permit::class);
    }

    public function disputes()
    {
        return $this->hasMany(Dispute::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function currentOwner()
    {
        return $this->hasOne(Owner::class)->where('is_current_owner', true);
    }

    public function owners()
    {
        return $this->belongsToMany(Owner::class, 'property_owner') // Explicit table name
                    ->withPivot(['acquisition_date', 'is_current_owner'])
                    ->withTimestamps();
    }
}