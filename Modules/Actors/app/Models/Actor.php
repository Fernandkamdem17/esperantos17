<?php

namespace Modules\Actors\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Shipments\Models\Shipment;

// use Modules\Actors\Database\Factories\ActorFactory;

class Actor extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'name',
        'surname',
        'email',
        'phone',
        'fonction',
        'slug'
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function attributions()
    {
        return $this->belongsToMany(Shipment::class)
            ->withPivot('attributions', 'attribution_date', 'actor_id', 'shipment_id')
            ->withTimestamps();
    }

    // protected static function newFactory(): ActorFactory
    // {
    //     // return ActorFactory::new();
    // }
}
