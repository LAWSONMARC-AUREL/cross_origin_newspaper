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

        Schema::dropIfExists('comments');

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('content', 255);

            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');

            $table->unsignedBigInteger('article_id')->nullable();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade'); // Ajouter la clé étrangère
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
