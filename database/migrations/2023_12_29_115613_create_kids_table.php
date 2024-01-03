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
        Schema::create('kids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('s_parent')->references('id')->on('second_parents');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('last_name');
            $table->string('pesel');
            $table->date('birth_date');
            $table->string('school_number');
            $table->string('school_city');
            $table->string('school_commune');
            $table->string('school_voivodeship');
            $table->string('phone_number');
            $table->string('email');
            $table->string('zipcode');
            $table->string('post');
            $table->string('address');
            $table->string('city');
            $table->string('commune');
            $table->string('county');
            $table->string('voivodeship');
            $table->unsignedSmallInteger('exam_pl')->nullable();
            $table->unsignedSmallInteger('exam_fl')->nullable();
            $table->unsignedSmallInteger('exam_mat')->nullable();
            $table->string('exam_photo')->nullable();
            $table->string('certificate_photo1')->nullable();
            $table->string('certificate_photo2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kids');
    }
};
