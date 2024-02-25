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
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignIdFor(Category::class);
            $table->unsignedInteger('year');
            $table->string('language');
            $table->json('types');
            $table->string('poster')->nullable();
            $table->text('story');
            $table->string('dubbed_status')->nullable();
            $table->json('actors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series');
    }
};
