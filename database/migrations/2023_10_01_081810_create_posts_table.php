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
            $table->string('title')->nullable();
            $table->string('title_slug')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->text('content')->nullable();
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->onDelete('cascade');
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('key_words')->nullable();
            $table->string('image',255)->nullable(); 
            $table->string('video',255)->nullable(); 
            $table->integer('status')->default(0);
            $table->integer('popular')->default(0);  
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
