<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'title',
        'artist',
        'genre_id',
        'release_date',
        'image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function scopeSearch($query, $search = null){

        $query->where(function($query2) use ($search){
            if($search) {
                $query2->where('title', 'like', "%$search%");
                $query2->orWhere('artist', 'like', "%$search%");
                $query2->orWhere('release_date', 'like', "%$search%");

                $query2->orWhereHas('genre', function($query3) use ($search){
                    $query3->where('name', 'like', "%$search%");

                });

            }
        });

        return $query;
    }
}
