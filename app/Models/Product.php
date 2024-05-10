<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'product_image',
        'slug',
        'sub_category_id',
        'category_id',
        'description',
        'price',
        'status'
    ];

    public function productSubCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductSubCategory::class, 'sub_category_id', 'id');
    }

    public function productCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }
//    public function rentedItem(): BelongsTo
//    {
//        return $this->belongsTo(rentedItem::class);
//    }

    public function rentedItem()
    {
        return $this->hasMany(RentedItem::class, 'product_id', 'id');
    }
    public function productOwner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
