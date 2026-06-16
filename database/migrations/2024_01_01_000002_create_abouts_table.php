<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('bio');
            $table->string('profile_image')->nullable();
            $table->unsignedInteger('years_of_experience')->default(0);
            $table->string('location')->nullable();
            $table->string('availability_status')->default('available');
            $table->boolean('active')->default(false);
            $table->string('resume_pdf')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
