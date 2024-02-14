<?php

use App\Models\{Category, User};
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
            $table->unsignedTinyInteger('year');
            $table->string('types');
            $table->unsignedTinyInteger('duration');
            $table->string('poster');
            $table->text('story');
            $table->unsignedInteger('views')->default(0);
            $table->unsignedTinyInteger('size');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
