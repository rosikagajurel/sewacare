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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');

            $table->dateTime('date_time')->nullable();
            $table->enum('status', ['pending', 'accepted', 'completed', 'cancelled']);
            $table->text('location');
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('duration_type', ['one-time', 'weekly', 'monthly'])->default('one-time');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');


            $table->foreignId('patients_id')->constrained()->onDelete('cascade');
            $table->foreignId('caregivers_id')->constrained()->onDelete('cascade');
            $table->foreignId('services_id')->constrained()->onDelete('cascade');

    });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
