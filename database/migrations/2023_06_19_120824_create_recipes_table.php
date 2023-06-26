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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('cost');
            $table->integer('amount');
            $table->integer('energy');
            $table->integer('time');
            $table->text('ingredients');
            $table->string('category');
            $table->string('sub_category');
            $table->integer('category_id');
            $table->boolean('is_splendid')->nullable()->default(false);
            $table->string('splendid_ingredient')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
