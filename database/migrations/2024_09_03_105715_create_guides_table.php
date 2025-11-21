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
        Schema::create('guides', function (Blueprint $table) {
            $table->id('guide_id');
            $table->integer('license_no')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('address');
            $table->string('guiding_location');
            $table->date('dob');
            $table->date('work_experience');
            $table->string('known_languages');
            $table->string('phone_no')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender',['Male','Female','Others']);
            $table->string('photo');
            $table->string('document');
            $table->text('bio')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};
