<?php

namespace Modules\Customers\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\Customers\Database\Factories\CustomerFactory;

class Customer extends Model
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
        'coordonnates_gps',
        'account_balance',
        'credit_limit',
        'slug'
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }


    // protected static function newFactory(): CustomerFactory
    // {
    //     // return CustomerFactory::new();
    // }
}
