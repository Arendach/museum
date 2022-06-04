<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTagsTitleColumns extends Migration
{
    public function up(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->string('title_ru', 255)->nullable()->change();
            $table->string('title_en', 255)->nullable()->change();
        });
    }

    public function down(): void
    {

    }
}
