<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();

            // Link to users table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Personal info
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('blood_group', max:5)->nullable();
            $table->string('contact_number')->nullable();
            $table->string('address', max:255)->nullable();
            $table->string('city', max:100)->nullable();
            $table->string('state', max:100)->nullable();
            $table->string('postal_code', max:20)->nullable();

            // Emergency & identification
            $table->string('emergency_contact_name', max:255)->nullable();
            $table->string('emergency_contact_number', max:20)->nullable();
            $table->string('insurance_provider', max:255)->nullable();
            $table->string('insurance_number', max:50)->nullable();

            // Health information
            $table->text('medical_history')->nullable();
            $table->text('prescriptions')->nullable();
            $table->text('health_condition')->nullable();
            $table->text('allergies')->nullable();
            $table->text('disabilities')->nullable();

            // System/Platform-specific
            $table->boolean('verified_status')->default(false);
            $table->decimal('rating', 3, 2)->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
