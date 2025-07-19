<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ews_records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('medic_number');
            $table->integer('score_1');
            $table->integer('score_2');
            $table->integer('score_3');
            $table->integer('score_4');
            $table->integer('score_5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ews_records');
    }
};
