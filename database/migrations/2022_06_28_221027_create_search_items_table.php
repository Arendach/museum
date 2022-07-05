<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchItemsTable extends Migration
{
    public function up(): void
    {
        Schema::create('search_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 255);
            $table->string('title_ru', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->string('keywords', 255)->nullable();
            $table->string('keywords_ru', 255)->nullable();
            $table->string('keywords_en', 255)->nullable();
            $table->morphs('model');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('search_items');
    }
}
