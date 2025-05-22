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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');   
            $table->text('content');
            $table->timestamps();
        });
         Schema::create('nurses', function (Blueprint $table) {
            $table->foreignId('id')->constrained('users')->onDelete('cascade');
            $table->string('qualification');
            $table->integer('experience_years');
            $table->text('bio');
            $table->timestamps();
        });
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->text('service_description');
            $table->timestamps();
        });
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('nurse_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->enum('booking_type', ['instant', 'long_term', 'caregiver']);
            $table->enum('status', ['pending', 'ongoing', 'completed', 'cacelled']);
            $table->dateTime('scheduled_time');
            $table->timestamps();
        });

        // Schema::create()
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
