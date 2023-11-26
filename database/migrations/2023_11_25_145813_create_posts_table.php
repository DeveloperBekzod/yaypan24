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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
						$table->integer('category_id');
						$table->string('title_uz');
						$table->string('title_ru');
						$table->string('slug_uz')->unique();
						$table->string('slug_ru')->unique();
						$table->text('text_uz');
						$table->text('text_ru');
						$table->string('image')->nullable();
						$table->integer('view')->default(0);
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
        Schema::dropIfExists('posts');
    }
};
