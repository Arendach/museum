<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryIdToPeoplesTable extends Migration
{
    public function up(): void
    {
        Schema::table('peoples', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable();

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('peoples', function (Blueprint $table) {
            $table->dropColumn('country_id');
        });
    }
}
