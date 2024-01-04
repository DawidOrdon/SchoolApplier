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
            $table->string('first_name',50);
            $table->string('second_name',50);
            $table->string('last_name',100);
            $table->string('pesel',11);
            $table->date('birth_date');
            $table->string('school_number',10);
            $table->string('school_city',50);
            $table->string('school_commune',50);
            $table->string('school_voivodeship',20);
            $table->string('phone_number',20);
            $table->string('email');
            $table->string('zipcode',10);
            $table->string('post',50);
            $table->string('address',100);
            $table->string('city',50);
            $table->string('commune',50);
            $table->string('county',50);
            $table->string('voivodeship',20);
            $table->unsignedSmallInteger('exam_pl')->nullable();
            $table->unsignedSmallInteger('exam_fl')->nullable();
            $table->unsignedSmallInteger('exam_mat')->nullable();
            $table->string('exam_photo',20)->nullable();
            $table->string('certificate_photo1',20)->nullable();
            $table->string('certificate_photo2',20)->nullable();
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
