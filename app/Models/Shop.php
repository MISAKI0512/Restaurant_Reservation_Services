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
        'image_url',
        'area_id',
        'genre_id',
        'user_id',
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

    public function ShopReview()
    {
        return $this->hasmany(ShopReview::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function doSearch($select_area, $select_genre, $input_text)
    {
        $query = self::query();
        if (!($select_area=="All area")) {
            $query->where('area_id', '=', "$select_area");
        }
        if (!($select_genre=="All genre")){
            $query->where('genre_id', '=', "$select_genre");
        }
        if (!($input_text=="null")) {
            $query->where('name', 'like binary', "%{$input_text}%");
        }
        $results = $query->get();
        return $results;
    }

    function isSelectedArea($area_id)
    {
        return $this->area_id == $area_id ? 'selected' : '';
    }

    function isSelectedGenre($genre_id)
    {
        return $this->genre_id == $genre_id ? 'selected' : '';
    }

    public function Courses()
    {
        return $this->belongsto(Course::class);
    }

}
