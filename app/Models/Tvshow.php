<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tvshow extends Model
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
        'links' => 'array',
    ];

    /**
     * The relation with episodes table
     * one of series has many of episodes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function episodes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TvshowEpisode::class);
    }

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function($tvshow) {
            return $tvshow->slug = self::slug_translator($tvshow->title);
        });
    }

    /**
     * Store tvshow title with arabic slug
     *
     * @param \App\Models\Tvshow $string
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
    public function get_poster()
    {
        if ($this->poster) {
            return asset('storage') . '/' . $this->poster;
        }
        return null;
    }
}
