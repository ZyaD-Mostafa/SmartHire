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
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_exam_id');
            $table->unsignedBigInteger('question_id');
            $table->string('chosen_answer')->nullable();
            $table->boolean('is_correct')->default(false); // هل الإجابة صحيحة أم لا
            $table->timestamps();

            $table->foreign('user_exam_id')->references('id')->on('user_exams')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_answers');
    }
};
