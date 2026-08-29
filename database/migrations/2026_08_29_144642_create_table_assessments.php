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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('class_subject_id')->constrained('class_subjects')->restrictOnDelete();
            $table->foreignId('term_id')->constrained('terms')->restrictOnDelete();
            $table->string('name', 255);
            $table->date('assessment_date');
            $table->decimal('maximum_score', 4, 2);
            $table->decimal('weight', 4, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
