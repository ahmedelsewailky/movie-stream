<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name', 'slug', 'parent_id', 'created_at', 'updated_at'
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
     * Define a one-to-many relationship with movies table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Movie::class);
    }

    /**
     * Define a one-to-many relationship with series table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function series(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Series::class);
    }
}
