<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    public function up():void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255)->unique();
            $table->string('title', 255);
            $table->string('title_ru', 255);
            $table->string('title_en', 255);
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('tags');
    }
}
