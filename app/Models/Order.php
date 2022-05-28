<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Заявки на ремонт
 * @package App\Models
 * @property string $name
 * @property string $phone
 * @property string $description
 * @property int $type_technic_id
 * @property int $mark_id
 * @property int $category_id
 * @property int $status_id
 * @property int $user_id
 * @property string $photo
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phoneform',
        'phone',
        'description',
        'type_technic_id',
        'mark_id',
        'category_id',
        'status_id',
        'photo',
    ];

    protected $perPage = 10;

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id')->first();
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->first();
    }

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->first();
    }
}
