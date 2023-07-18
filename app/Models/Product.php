<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'details',
        'vendors_id',
        'description',
        'product',
        'image',
        'price',
        'category_id',
        /*'slug',*/
    ];

    public function categorHas(): BelongsTo {
        return $this->belongsTo(Category::class,'category_id','id','product');
    }

    public function vendorHas(): BelongsTo {
        return $this->belongsTo(Vendors::class,'vendors_id','id','vendorHasManyProducts');
    }

}
