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
        Schema::create('final_results', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('enrollment_id')->constrained('enrollments')->restrictOnDelete();
            $table->foreignId('class_subject_id')->constrained('class_subjects')->restrictOnDelete();
            $table->foreignId('school_year_id')->constrained('school_years')->restrictOnDelete();
            $table->decimal('annual_average', 4, 2);
            $table->decimal('final_exam_score', 4, 2)->nullable();
            $table->decimal('final_average', 4, 2);
            $table->enum('status', ['approved', 'final_exam', 'failed']);
            $table->text('observation')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(
                ['enrollment_id', 'class_subject_id', 'school_year_id'],
                'final_results_enrollment_subject_year_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_results');
    }
};
