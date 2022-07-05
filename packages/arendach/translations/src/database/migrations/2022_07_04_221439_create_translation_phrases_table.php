<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationPhrasesTable extends Migration
{
    public function up()
    {
        Schema::create('translation_phrases', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('phrase');
            $table->string('hash', 32)->unique();
            $table->boolean('is_generating')->default(true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('translation_phrases');
    }
}
