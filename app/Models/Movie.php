<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'types' => 'array',
        'links' => 'array',
        'actors' => 'array',
    ];

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function($movie) {
            return $movie->slug = self::slug_translator($movie->title);
        });
    }

    /**
     * Store movie title with arabic slug
     *
     * @param \App\Models\Movie $string
     * @param string $separator
     * @return string
     */
    private static function slug_translator($string, $separator = '-') {
        if (is_null($string)) {
            return '';
        }
        $string = trim($string);
        $string = mb_strtolower($string, "UTF-8");;
        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);
        $string = preg_replace("/[\s-]+/", " ", $string);
        $string = preg_replace("/[\s_]/", $separator, $string);
        return $string;
    }

    /**
     * HanRetrieve the actor's avatar from the storage folder
     * if actor image avatar is available, or return the NULL value in the other case
     *
     * @return mixed<string|null>
     */
    public function get_movie_poster()
    {
        if ($this->poster) {
            return asset('storage') . '/' . $this->poster;
        }
        return null;
    }
}
