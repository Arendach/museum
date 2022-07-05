<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToTagsTable extends Migration
{
    public function up(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->boolean('is_active')->default(false);
            $table->boolean('is_top')->default(false);
            $table->longText('description')->nullable();
            $table->longText('description_ru')->nullable();
            $table->longText('description_en')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropColumn([
                'is_active', 'is_top',
                'description', 'description_ru', 'description_en',
            ]);
        });
    }
}
