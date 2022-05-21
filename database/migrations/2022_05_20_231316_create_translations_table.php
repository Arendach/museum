<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationsTable extends Migration
{
    public function up(): void
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('lang', 255);
            $table->string('content', 255);
            $table->unsignedBigInteger('phrase_id');

            $table->foreign('phrase_id')
                ->references('id')
                ->on('phrases')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
}
