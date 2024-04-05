<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'status',
        //'meta_title',
        //'meta_description',
        //'meta_keywords',
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
