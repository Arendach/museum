<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('slug', 255);
            $table->boolean('is_active')->default(true);
            $table->string('title', 255)->nullable();
            $table->string('title_ru', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_ru')->nullable();
            $table->longText('description_en')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
}
