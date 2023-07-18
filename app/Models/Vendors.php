<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Vendors extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'Shop_name',
        'address',
        'telephone',
        'kra_pin',
        'business_permit_number',
    ];

    public function productHas(): HasMany {
        return $this->hasMany(Product::class,'id','vendors_id');
    }

    public function UserHas(): HasMany{
        return $this->hasMany(Vendors::class,'users_id','id');
    }
}

