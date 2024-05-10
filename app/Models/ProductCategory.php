<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        //'parent_id',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function productSubCategory(): HasMany
    {
        return $this->hasMany(ProductSubCategory::class,  'category_id', 'id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

}
