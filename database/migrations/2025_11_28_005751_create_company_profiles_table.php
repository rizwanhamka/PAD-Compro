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
        Schema::create('company_profile', function (Blueprint $table) {
            $table->id();

            // Foreign or reference ID
            $table->unsignedBigInteger('site_id')->nullable();
            $table->string('title')->nullable();
            $table->string('nama')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('about_us')->nullable();

            // Carousel images
            $table->string('carousel_1')->nullable();
            $table->string('carousel_2')->nullable();
            $table->string('carousel_3')->nullable();

            $table->string('youtube')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profile');
    }
};
