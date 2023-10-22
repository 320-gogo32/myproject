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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name', 100);
            $table->integer('price');
            $table->tinyInteger('type');
            $table->string('origin', 100)->nullable();
            $table->tinyInteger('level')->nullable();
            $table->tinyInteger('rating');
            $table->integer('stock');
            $table->string('detail', 500);
            $table->text('img')->nullable();
            $table->string('comment', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
