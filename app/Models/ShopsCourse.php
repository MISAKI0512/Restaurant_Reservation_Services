<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopsCourse extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


}

