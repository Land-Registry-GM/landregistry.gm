<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'owner_name',
        'owner_id_type',
        'owner_id_number',
        'dob',
        'phone',
        'email',
        'address',
    ];

    protected $casts = [
        'dob' => 'date',
    ];

    // Relationships
    // public function property()
    // {
    //     return $this->belongsTo(Property::class);
    // }

    public function ownershipHistory()
    {
        return $this->hasMany(OwnershipHistory::class);
    }

    public function boughtTransactions()
    {
        return $this->hasMany(Transaction::class, 'buyer_id');
    }

    public function soldTransactions()
    {
        return $this->hasMany(Transaction::class, 'seller_id');
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_owner') // Explicit table name
                    ->withPivot(['acquisition_date', 'is_current_owner'])
                    ->withTimestamps();
    }
}