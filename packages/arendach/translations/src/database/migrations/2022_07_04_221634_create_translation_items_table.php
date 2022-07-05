<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationItemsTable extends Migration
{
    public function up()
    {
        Schema::create('translation_items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->longText('content');
            $table->string('lang', 32);
            $table->bigInteger('translation_phrase_id')->unsigned();

            $table->foreign('translation_phrase_id')
                ->references('id')
                ->on('translation_phrases')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('translation_items');
    }
}
