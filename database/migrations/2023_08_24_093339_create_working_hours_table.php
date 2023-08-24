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
        Schema::create('working_hours', function (Blueprint $table) {
            $table->id();
            $table->time('sunday_open');
            $table->time('sunday_close');
            $table->time('monday_open');
            $table->time('monday_close');
            $table->time('tuesday_open');
            $table->time('tuesday_close');
            $table->time('wednesday_open');
            $table->time('wednesday_close');
            $table->time('thursday_open');
            $table->time('thursday_close');
            $table->time('friday_open');
            $table->time('friday_close');
            $table->time('saturday_open');
            $table->time('saturday_close');

            $table->unsignedBigInteger('garage_id');
            $table->foreign('garage_id')
                ->references('id')
                ->on('garages')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_hours');
    }
};
