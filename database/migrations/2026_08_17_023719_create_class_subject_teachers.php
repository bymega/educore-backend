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
        Schema::create('class_subject_teachers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('class_subject_id')->constrained('class_subjects')->restrictOnDelete();
            $table->foreignId('teacher_id')->constrained('teachers')->restrictOnDelete();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_primary')->default(false);
            $table->timestamps();
            $table->unique(
                ['class_subject_id', 'teacher_id', 'start_date'],
                'class_subject_teacher_start_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_subject_teachers');
    }
};
