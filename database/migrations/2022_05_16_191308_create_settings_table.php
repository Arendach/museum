<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->enum('type', ['string', 'integer', 'boolean', 'json', 'picture', 'video', 'file'])
                ->default('string');
            $table->longText('content')->nullable();
            $table->longText('content_ru')->nullable();
            $table->longText('content_en')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
}
