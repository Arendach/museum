<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponsTable extends Migration
{
    public function up(): void
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('title_ru', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_ru')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('slug', 255)->unique();
            $table->string('date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('weapons');
    }
}
