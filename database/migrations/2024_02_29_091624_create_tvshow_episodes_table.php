<?php

use App\Models\User;
use App\Models\Tvshow;
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
        Schema::create('tvshow_episodes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tvshow::class);
            $table->foreignIdFor(User::class);
            $table->unsignedSmallInteger('episode');
            $table->string('watch_link');
            $table->json('links');
            $table->unsignedTinyInteger('quality');
            $table->string('views')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tvshow_episodes');
    }
};
