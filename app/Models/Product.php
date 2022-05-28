<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'photo',
        'weight',
        'price',
        'category_id',
        'mark_id',
        'type_technic_id'
    ];
    protected $perPage = 10;

    /**
     * @return Model|HasOne|object|null
     */
    public function CategoryProduct()
    {
        return $this->hasOne(CategoriesProducts::class, 'id', 'category_id')->first();
    }

    /**
     * @return Model|HasOne|object|null
     */
    public function mark_id()
    {
        return $this->hasOne(Mark::class, 'id', 'mark_id')->first();
    }

    /**
     * @return Model|HasOne|object|null
     */
    public function type_technic()
    {
        return $this->hasOne(TypeTechnic::class, 'id', 'type_technic_id')->first();
    }

    public function mark()
    {
        return $this->belongsTo(Mark::class);
    }

    public static function getCategoryById($id)
    {
        return Category::where('id', $id)->get();
    }

}
