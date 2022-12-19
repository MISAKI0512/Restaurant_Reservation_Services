<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name',
        'description',
        'image_url'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function likes()
    {
        return $this->hasmany(Like::class);
    }

    public function reservation()
    {
        return $this->hasmany(Reservation::class);
    }
}
