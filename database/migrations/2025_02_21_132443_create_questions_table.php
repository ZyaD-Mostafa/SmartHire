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
            $table->unsignedBigInteger('exam_id');
            $table->text('question_text');
            $table->enum('question_type', ['mcq', 'true_false']);
            $table->unsignedInteger('points')->default(1);

            // في حالة MCQ، نخزن 4 خيارات
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('option4')->nullable();

            // الإجابة الصحيحة: يمكن تخزين رقم الخيار أو قيمة منطقية في حالة True/False
            $table->string('correct_answer');
            $table->timestamps();

            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
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
