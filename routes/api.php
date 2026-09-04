<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\ClassSubjectTeacherController;
use App\Http\Controllers\ClassSubjectTeacherControlller;
use App\Http\Controllers\EducationLevelController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GradeLevelController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentGradeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:login');


Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/life', [AuthController::class, 'lifetimeToken']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->middleware('permission:users.view');
        Route::post('/', [UserController::class, 'store'])->middleware('permission:users.create');
        Route::put('/{uuid}', [UserController::class, 'update'])->middleware('permission:users.update');
        Route::delete('/{uuid}', [UserController::class, 'delete'])->middleware('permission:users.delete');
        Route::put('/{uuid}/restore', [UserController::class, 'restore'])->middleware('permission:users.restore');
    });

    Route::prefix('teachers')->group(function () {
        Route::get('/', [TeacherController::class, 'index'])->middleware('permission:teachers.view');
        Route::post('/', [TeacherController::class, 'store'])->middleware('permission:teachers.create');
        Route::put('/{uuid}', [TeacherController::class, 'update'])->middleware('permission:teachers.update');
        Route::delete('/{uuid}', [TeacherController::class, 'delete'])->middleware('permission:teachers.delete');
        Route::put('/{uuid}/restore', [TeacherController::class, 'restore'])->middleware('permission:teachers.restore');
    });

    Route::prefix('students')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->middleware('permission:students.view');
        Route::post('/', [StudentController::class, 'store'])->middleware('permission:students.create');
        Route::put('/{uuid}', [StudentController::class, 'update'])->middleware('permission:students.update');
        Route::delete('/{uuid}', [StudentController::class, 'delete'])->middleware('permission:students.delete');
        Route::put('/{uuid}/restore', [StudentController::class, 'restore'])->middleware('permission:students.restore');
    });

    Route::prefix('guardians')->group(function () {
        Route::get('/', [GuardianController::class, 'index'])->middleware('permission:guardians.view');
        Route::put('/{uuid}', [GuardianController::class, 'update'])->middleware('permission:guardians.update');
        Route::delete('/{uuid}', [GuardianController::class, 'delete'])->middleware('permission:guardians.delete');
        Route::put('/{uuid}/restore', [GuardianController::class, 'restore'])->middleware('permission:guardians.restore');
    });

    Route::prefix('school-years')->group(function () {
        Route::get('/', [SchoolYearController::class, 'index'])->middleware('permission:schoolyears.view');
        Route::post('/', [SchoolYearController::class, 'store'])->middleware('permission:schoolyears.create');
        Route::put('/{uuid}', [SchoolYearController::class, 'update'])->middleware('permission:schoolyears.update');
        Route::delete('/{uuid}', [SchoolYearController::class, 'delete'])->middleware('permission:schoolyears.delete');
        Route::put('/{uuid}/restore', [SchoolYearController::class, 'restore'])->middleware('permission:schoolyears.restore');
    });

    Route::prefix('terms')->group(function () {
        Route::get('/', [TermController::class, 'index'])->middleware('permission:terms.view');
        Route::post('/', [TermController::class, 'store'])->middleware('permission:terms.create');
        Route::put('/{uuid}', [TermController::class, 'update'])->middleware('permission:terms.update');
        Route::delete('/{uuid}', [TermController::class, 'delete'])->middleware('permission:terms.delete');
        Route::put('/{uuid}/restore', [TermController::class, 'restore'])->middleware('permission:terms.restore');
    });

    Route::prefix('education-levels')->group(function () {
        Route::get('/', [EducationLevelController::class, 'index'])->middleware('permission:education-levels.view');
    });

    Route::prefix('grade-levels')->group(function () {
        Route::get('/', [GradeLevelController::class, 'index'])->middleware('permission:grade-levels.view');
    });

    Route::prefix('subjects')->group(function () {
        Route::get('/', [SubjectController::class, 'index'])->middleware('permission:subjects.view');
        Route::post('/', [SubjectController::class, 'store'])->middleware('permission:subjects.create');
        Route::put('/{uuid}', [SubjectController::class, 'update'])->middleware('permission:subjects.update');
    });

    Route::prefix('school-classes')->group(function () {
        Route::get('/', [SchoolClassController::class, 'index'])->middleware('permission:school-classes.view');
        Route::post('/', [SchoolClassController::class, 'store'])->middleware('permission:school-classes.create');
        Route::put('/{uuid}', [SchoolClassController::class, 'update'])->middleware('permission:school-classes.update');
        Route::delete('/{uuid}', [SchoolClassController::class, 'delete'])->middleware('permission:school-classes.delete');
        Route::put('/{uuid}/restore', [SchoolClassController::class, 'restore'])->middleware('permission:school-classes.restore');
    });

    Route::prefix('school-classes/{classUuid}/subjects')->group(function () {
        Route::get('/', [ClassSubjectController::class, 'index'])->middleware('permission:classes-subjects.view');
        Route::post('/', [ClassSubjectController::class, 'store'])->middleware('permission:classes-subjects.create');
        Route::put('/{uuid}', [ClassSubjectController::class, 'update'])->middleware('permission:classes-subjects.update');
        Route::delete('/{uuid}', [ClassSubjectController::class, 'delete'])->middleware('permission:classes-subjects.delete');
        Route::put('/{uuid}/restore', [ClassSubjectController::class, 'restore'])->middleware('permission:classes-subjects.restore');
    });

    Route::prefix('class-subjects/{classSubjectUuid}/teachers')->group(function () {
        Route::get('/', [ClassSubjectTeacherController::class, 'index'])->middleware('permission:subject-teachers.view');
        Route::post('/', [ClassSubjectTeacherController::class, 'store'])->middleware('permission:subject-teachers.create');
        Route::put('/{uuid}', [ClassSubjectTeacherController::class, 'update'])->middleware('permission:subject-teachers.update');
        Route::delete('/{uuid}', [ClassSubjectTeacherController::class, 'delete'])->middleware('permission:subject-teachers.delete');
        Route::put('/{uuid}/restore', [ClassSubjectTeacherController::class, 'restore'])->middleware('permission:subject-teachers.restore');
    });

    Route::prefix('enrollments')->group(function () {
        Route::get('/', [EnrollmentController::class, 'index'])->middleware('permission:enrollments.view');
        Route::post('/', [EnrollmentController::class, 'store'])->middleware('permission:enrollments.create');
        Route::put('/{uuid}', [EnrollmentController::class, 'update'])->middleware('permission:enrollments.update');
        Route::delete('/{uuid}', [EnrollmentController::class, 'delete'])->middleware('permission:enrollments.delete');
        Route::put('/{uuid}/restore', [EnrollmentController::class, 'restore'])->middleware('permission:enrollments.restore');
    });

    Route::prefix('assessments')->group(function () {
        Route::get('/', [AssessmentController::class, 'index'])->middleware('permission:assessments.view');
        Route::post('/', [AssessmentController::class, 'store'])->middleware('permission:assessments.create');
        Route::put('/{uuid}', [AssessmentController::class, 'update'])->middleware('permission:assessments.update');
        Route::delete('/{uuid}', [AssessmentController::class, 'delete'])->middleware('permission:assessments.delete');
        Route::put('/{uuid}/restore', [AssessmentController::class, 'restore'])->middleware('permission:assessments.restore');
    });

    Route::prefix('student-grades')->group(function () {
        Route::get('/', [StudentGradeController::class, 'index'])->middleware('permission:student-grades.view');
        Route::post('/', [StudentGradeController::class, 'store'])->middleware('permission:student-grades.create');
        Route::put('/{uuid}', [StudentGradeController::class, 'update'])->middleware('permission:student-grades.update');
        Route::delete('/{uuid}', [StudentGradeController::class, 'delete'])->middleware('permission:student-grades.delete');
        Route::put('/{uuid}/restore', [StudentGradeController::class, 'restore'])->middleware('permission:student-grades.restore');
    });
});
