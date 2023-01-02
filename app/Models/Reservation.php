<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $dates = [
        'start_at',
    ];

    protected $fillable = [
        'num_of_users',
        'user_id',
        'shop_id',
        'start_at'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public static function getReserveList($shop_id)
    {
        $query = self::query();
        $query->where('shop_id', '=', "$shop_id");
        $reservelist = $query->get();
        return $reservelist;
    }

}
