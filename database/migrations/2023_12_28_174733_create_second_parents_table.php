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
        Schema::create('second_parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('email');
            $table->string('first_name',50)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('phone_number',20)->nullable();
            $table->string('zipcode',10)->nullable();
            $table->string('post',50)->nullable();
            $table->string('address',100)->nullable();
            $table->string('city',50)->nullable();
            $table->string('commune',50)->nullable();
            $table->string('county',50)->nullable();
            $table->string('voivodeship',20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('second_parents');
    }
};
