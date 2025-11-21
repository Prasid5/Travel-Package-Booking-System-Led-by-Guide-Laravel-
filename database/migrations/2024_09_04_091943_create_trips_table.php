<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('trips', function (Blueprint $table) {
        $table->id('trip_id'); // Primary key with auto_increment
        $table->unsignedBigInteger('tourist_id')->nullable(); // Foreign key to tourist table
        $table->unsignedBigInteger('guide_id')->nullable(); // Foreign key to guide table
        $table->string('place');
        $table->string('travel_class');
        $table->integer('no_of_people');
        $table->date('travel_date');
        $table->integer('travelling_days');
        $table->decimal('price', 10, 2);
        $table->decimal('commission_amt', 10, 2);
        $table->enum('status',['0','1','2']);
        $table->timestamps();
    
        // Adding foreign key constraints
        $table->foreign('tourist_id')->references('tourist_id')->on('tourists')->onDelete('set null');
        $table->foreign('guide_id')->references('guide_id')->on('guides')->onDelete('set null');
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('trips');
    }

};
