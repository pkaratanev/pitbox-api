<?php

use App\Enum\AppointmentStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->longText('request_description');
            $table->longText('work_description')->nullable();
            $table->dateTime('start_datetime');
            $table->enum('status', array_column(AppointmentStatusEnum::cases(), 'value'));
            $table->timestamps();

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('appointments');
    }
};
