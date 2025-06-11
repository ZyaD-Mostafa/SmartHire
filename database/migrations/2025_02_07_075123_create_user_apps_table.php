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
        Schema::create('user_apps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('sec_phone')->nullable();
            $table->string('national_id');
            $table->text('address');
            $table->date('dob')->nullable();
            $table->integer('grad_year');
            $table->string('university');
            $table->string('degree');
            $table->string('cv_path')->nullable(); // Store the uploaded CV file path
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');


            // $table->foreignId('user_id')->constrained('users', 'custom_user_id_column')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_apps');
    }
};
