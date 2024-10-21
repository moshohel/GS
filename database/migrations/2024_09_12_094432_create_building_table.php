<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number_of_floor');
            $table->string('road')->nullable();
            $table->string('area')->nullable();
            $table->string('type')->nullable();
            $table->string('holding')->nullable();
            $table->integer('gs_authority_id')->unsigned()->foreign()->index()->references('id')->on('users');
            $table->integer('manager_id')->unsigned()->foreign()->index()->references('id')->on('users');
            $table->string('address')->nullable();
            $table->string('special_rate_radio')->nullable()->default('no');
            $table->integer('special_rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
