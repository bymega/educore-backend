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
        Schema::create('term_results', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('enrollment_id')->constrained('enrollments')->restrictOnDelete();
            $table->foreignId('class_subject_id')->constrained('class_subjects')->restrictOnDelete();
            $table->foreignId('term_id')->constrained('terms')->restrictOnDelete();
            $table->decimal('average', 4, 2);
            $table->decimal('recovery_score', 4, 2)->nullable();
            $table->decimal('final_term_average', 4, 2);
            $table->enum('status', ['approved', 'recovery', 'failed']);
            $table->text('observation')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['enrollment_id', 'class_subject_id', 'term_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('term_results');
    }
};
