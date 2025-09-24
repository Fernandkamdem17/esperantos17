<?php

namespace Modules\Shipments\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Actors\Models\Actor;

// use Modules\Shipments\Database\Factories\ShipmentFactory;

class Shipment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'tracking_number',
        'shipment_date',
        'delivery_address',
        'recipient',
        'package_count',
        'total_weight',
        'total_volume',
        'shipping_fee',
        'package_value',
        'description',
        'status',
        'slug'
    ];

    // protected static function newFactory(): ShipmentFactory
    // {
    //     // return ShipmentFactory::new();
    // }

    public function attributions()
    {
        return $this->belongsToMany(Actor::class)
            ->withPivot('attributions', 'attribution_date', 'actor_id', 'shipment_id')
            ->withTimestamps();
    }
}
