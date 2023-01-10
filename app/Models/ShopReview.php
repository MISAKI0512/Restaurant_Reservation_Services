<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopReview extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'shop_id',
        'user_id',
        'star',
        'comment'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public static function getReviewList($shop_id)
    {
        $query = self::query();
        $query->where('shop_id', '=', "$shop_id");
        $reviewList = $query->get();
        return $reviewList;
    }
}
