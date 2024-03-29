<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function likes()
    {
        return $this->hasmany(Like::class);
    }

    public function shops()
    {
        return $this->hasmany(Shop::class);
    }


    public function reservation()
    {
        return $this->hasmany(Reservation::class);
    }

    public function shop_user()
    {
        return $this->belongsToMany(Shop::class, 'likes', 'user_id', 'shop_id');
    }

    public function ShopReview()
    {
        return $this->hasmany(ShopReview::class);
    }

    public function is_like($id)
    {
        $this->likes()->where('shop_id',$id)->exists();
    }
}