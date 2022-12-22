<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        'genre_id'
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

    public function reservations()
    {
        return $this->hasmany(Reservation::class);
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
}
