<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('starts', function (Blueprint $table) {
            $table->id();
            $table->string('start_title');
            $table->string('start_subtitle')->unique();
            $table->string('start_color')->nullable();
            $table->enum('start_state', [1, 2])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('starts');
    }
};
