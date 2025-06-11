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
        Schema::create('exam_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_id')->nullable();  // Make job_id nullable
            $table->unsignedBigInteger('exam_id')->nullable();
            $table->text('feedback')->nullable();
            $table->tinyInteger('rating')->nullable()->default(0); // مثلاً تقييم من 1 إلى 5
            $table->timestamps();

            // تعريف العلاقات الخارجية
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_feedbacks');
    }
};
