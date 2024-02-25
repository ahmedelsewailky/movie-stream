<?php

use App\Models\User;
use App\Models\Series;
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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Series::class);
            $table->foreignIdFor(User::class);
            $table->unsignedSmallInteger('episode');
            $table->string('watch_link');
            $table->text('links');
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
        Schema::dropIfExists('episodes');
    }
};
