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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('password');
            $table->foreignId('kid_id')->references('id')->on('kids');
            $table->foreignId('class_id')->references('id')->on('classes');
            $table->foreignId('status_id')->references('id')->on('app_statuses');
            $table->boolean('unlock');
            $table->integer('priority');
            $table->unsignedDecimal('exam_points');
            $table->unsignedDecimal('certificate_points');
            $table->unsignedDecimal('bonus_points');
            $table->foreignId('language_id')->references('id')->on('languages');
            $table->boolean('info1');
            $table->boolean('info2');
            $table->boolean('info3');
            $table->string('add_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
