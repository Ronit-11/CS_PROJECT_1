<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vendors extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'Shop_name',
        'address',
        'telephone',
        'kra_pin',
        'business_permit_number',
    ];

}

