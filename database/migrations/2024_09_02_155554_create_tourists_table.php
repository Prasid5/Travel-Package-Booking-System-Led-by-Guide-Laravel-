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
        Schema::create('tourists', function (Blueprint $table) {
            $table->id('tourist_id'); // UnsignedBigInteger by default
            $table->string('fullname')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('country');
            $table->enum('gender', ['Male', 'Female', 'Others']);
            $table->date('dob');
            $table->string('phone_no')->unique();
            $table->char('otp',6)->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourists');
    }
};
