<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
         Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // default primary key
            $table->dateTime('date_time')->nullable();
            $table->enum('status', ['pending', 'accepted', 'completed', 'cancelled'])->default('pending');
            $table->text('location');
            $table->decimal('price', 10, 2)->nullable();
            $table->enum('duration_type', ['one-time', 'weekly', 'monthly'])->default('one-time');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');

            // Foreign keys
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('caregiver_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
