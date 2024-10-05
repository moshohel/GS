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
        Schema::create('floors', function (Blueprint $table) {
            $table->id();
            $table->integer('floor_number');
            $table->enum('floor_type', ['Commercial', 'Residential']);
            $table->integer('number_of_flats')->default(1);
            $table->enum('status', ['active', 'inactive', 'under_construction']);
            $table->integer('building_id')->unsigned()->foreign()->index()->references('id')->on('buildings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('floors');
    }
};
