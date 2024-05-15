<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'renter_id',
        'rentee_id',
        'product_id',
        'message',
        'renting_date',
        'returning_date',
        'rented_metadata',
        'status'
    ];

    protected $casts = [
        'rented_metadata' => 'array',
        'renting_date' => 'date',
        'returning_date' => 'date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'rentee_id', 'id');
    }



}
