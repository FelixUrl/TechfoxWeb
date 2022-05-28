<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'products',
        'status_id',
        'payment_id',
        'price',
        'card',
    ];
    protected $perPage = 10;

    protected $casts = [
        'products' => 'array',
        'card' => 'array',
    ];
    public function Product(){
        return $this->hasOne(Product::class, 'id' , 'product_id')->get();
    }
    public function StatusProduct(){
        return $this->hasOne(StatusesProduct::class, 'id', 'status_id')->get();
    }
    public function Payment(){
        return $this->hasOne(Payment::class, 'id', 'payment_id')->get();
    }
}
