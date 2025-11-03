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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('id_soal', 6)->unique();
            $table->text('question_text');
            $table->integer('id_option_a');
            $table->string('option_a');
            $table->integer('id_option_b');
            $table->string('option_b');
            $table->integer('id_option_c');
            $table->string('option_c');
            $table->enum('category', ['A', 'B', 'C']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
