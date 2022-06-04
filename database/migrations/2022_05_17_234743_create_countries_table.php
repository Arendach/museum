<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('title_ru', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->longText('description');
            $table->longText('description_ru')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('code', 5)->unique();
            $table->string('slug', 255)->unique();
            if (config('app.env') === 'testing'){
                $table->string('status', 255)->default('neutral');
            } else {
                $table->set('status', ['friend', 'enemy', 'neutral']);
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
}
