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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("bookJudul");
            $table->string("bookPenulis");
            $table->string("bookPenerbit");
            $table->string("bookDeskripsi");
            $table->string("bookImageCover");
            $table->unsignedBigInteger("kategori_id");
            $table->foreign("kategori_id")->references("id")->on("kategori");
            $table->string("bookStok");
            $table->string("bookActivate");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
