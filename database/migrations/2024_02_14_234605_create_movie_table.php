<?php

use App\Models\{Category, User, Actor, Movie};
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(User::class);
            $table->unsignedTinyInteger('quality');
            $table->string('language');
            $table->unsignedInteger('year');
            $table->json('types');
            $table->string('poster')->nullable();
            $table->text('story');
            $table->json('links');
            $table->string('watch_link');
            $table->string('dubbed_status')->nullable();
            $table->unsignedInteger('views')->default(0);
            $table->timestamps();
        });

        Schema::create('movie_actor', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Movie::class);
            $table->foreignIdFor(Actor::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
        Schema::dropIfExists('movie_actor');
    }
};
