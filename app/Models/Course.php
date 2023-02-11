<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name',
        'price',
        'shop_id',
    ];

    public function shop()
    {
        return $this->hasmany(Shop::class);
    }

    public function reservations()
    {
        return $this->hasmany(Reservation::class);
    }
}
