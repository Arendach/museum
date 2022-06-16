<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 255);
            $table->string('title_ru', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->string('type', 255)->default('path');
            $table->string('path', 255);
            $table->string('source')->nullable();
            $table->string('source_title')->nullable();
            $table->string('source_title_ru')->nullable();
            $table->string('source_title_en')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
}
