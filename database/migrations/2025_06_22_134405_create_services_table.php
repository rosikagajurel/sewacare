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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('details')->nullable();
            $table->float('base_price');
            $table->date('requested_date');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();

            //  Add foreign key columns
            $table->unsignedBigInteger('patients_id');
            $table->unsignedBigInteger('caregivers_id');

            // 🔗 Define foreign keys
            $table->foreign('patients_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('caregivers_id')->references('id')->on('caregivers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
