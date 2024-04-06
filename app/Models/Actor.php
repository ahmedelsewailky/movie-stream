<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name', 'slug', 'country', 'avatar', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function($actor) {
            return $actor->slug = str($actor->name)->slug();
        });
    }

    /**
     * HanRetrieve the actor's avatar from the storage folder
     * if actor image avatar is available, or return the NULL value in the other case
     *
     * @return mixed<string|null>
     */
    public function get_image_avatar()
    {
        if ($this->avatar) {
            return asset('storage') . '/' . $this->avatar;
        }
        return null;
    }

    /**
     * Get actor movies
     *
     */
    public function get_actor_movies()
    {
        return DB::table('movie_actor')->where('actor_id', $this->id)
            ->join('movies', 'movies.id', '=', 'movie_actor.movie_id')->get();
    }

    /**
     * Get actor series
     *
     */
    public function get_actor_series()
    {
        return DB::table('series_actor')->where('actor_id', $this->id)
            ->join('series', 'series.id', '=', 'series_actor.series_id')->get();
    }

}
