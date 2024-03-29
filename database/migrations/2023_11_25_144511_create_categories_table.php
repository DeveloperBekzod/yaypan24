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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_uz')->unique();
            $table->string('name_ru')->unique();
            $table->string('slug_uz')->unique();
            $table->string('slug_ru')->unique();
            $table->string('meta_title_uz')->nullable();
            $table->string('meta_title_ru')->nullable();
            $table->string('meta_description_uz')->nullable();
            $table->string('meta_description_ru')->nullable();
            $table->string('meta_keywords_uz')->nullable();
            $table->string('meta_keywords_ru')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
