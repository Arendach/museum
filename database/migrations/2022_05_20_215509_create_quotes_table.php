<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('title_ru')->nullable();
            $table->text('title_en')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->unsignedBigInteger('people_id');

            $table->foreign('people_id')
                ->references('id')
                ->on('peoples')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
}
