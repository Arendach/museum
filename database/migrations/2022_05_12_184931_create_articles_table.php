<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255)->unique();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_popular')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->string('title', 256);
            $table->string('title_ru', 256)->nullable();
            $table->string('title_en', 256)->nullable();
            $table->text('short_description')->nullable();
            $table->text('short_description_ru')->nullable();
            $table->text('short_description_en')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_ru')->nullable();
            $table->longText('description_en')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
}
