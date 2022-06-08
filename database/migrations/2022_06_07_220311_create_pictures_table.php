<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
    public function up(): void
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->string('path', 255);
            $table->string('alt', 255)->nullable();
            $table->string('path_optimized', 255)->nullable();
            $table->unsignedBigInteger('model_id');
            $table->string('model_type', 255);
            $table->boolean('is_main')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pictures');
    }
}
