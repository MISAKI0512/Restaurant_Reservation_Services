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

    protected $fillable = [
        'num_of_users',
        'start_at',
        'user_id',
        'shop_id'
    ];

    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
