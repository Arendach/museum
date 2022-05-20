<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeoplesTable extends Migration
{
    public function up(): void
    {
        Schema::create('peoples', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('name_ru', 255)->nullable();
            $table->string('name_en', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peoples');
    }
}
