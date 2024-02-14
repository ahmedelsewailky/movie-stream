<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'slug',
        'Category',
        'User',
        'quality',
        'language',
        'year',
        'types',
        'duration',
        'poster',
        'story',
        'views',
        'size',
    ];
}
