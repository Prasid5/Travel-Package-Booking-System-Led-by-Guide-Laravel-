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
        Schema::create('trip_detail', function (Blueprint $table) {
            $table->id();
            $table->string('place');
            $table->text('activities');
            $table->enum('travel_class',["Premium Class","Economy Class"]);
            $table->decimal('base_price',10,2);
            $table->decimal('commission_rate',10,2);
            $table->integer('travelling_days');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_list');
    }
};
