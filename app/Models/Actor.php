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
        'name', 'country', 'avatar', 'created_at', 'updated_at'
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
     * Get the count of actor movies
     *
     * @param Actor $actor
     */
    public function getActorMovies(Actor $actor)
    {
        return DB::table('movie_actor')->where('actor_id', $actor->id);
    }

    /**
     * Get the count of actor series
     *
     * @param Actor $actor
     */
    public function getActorSeries(Actor $actor)
    {
        return DB::table('series_actor')->where('actor_id', $actor->id);
    }

}
