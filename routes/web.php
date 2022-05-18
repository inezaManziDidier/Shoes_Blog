<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;
use App\Mail\JobApplicationConfirmation;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/jobs', [JobsController::class, 'index'])->name('jobs.listing');

Route::post('/jobs/search', [JobsController::class, 'search'])->name('jobs.search');

Route::get('/jobs/{job}', [JobsController::class, 'show'])->name('jobs.show');

Route::get('/jobs/{job}/apply', [JobsController::class, 'showApplicationForm'])->name('jobs.application-form')->middleware('auth');

Route::post('/jobs/{job}/apply', [JobsController::class, 'apply'])->name('jobs.apply')->middleware('auth');


Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth','admin']);
Route::get('/admin/applicants', [DashboardController::class, 'applicants'])->name('admin.applicants')->middleware(['auth','admin']);
Route::get('/admin/jobs', [DashboardController::class, 'jobs'])->name('admin.jobs')->middleware(['auth','admin']);
Route::get('/admin/companies', [DashboardController::class, 'companies'])->name('admin.companies')->middleware(['auth','admin']);
Route::get('/admin/job_applications', [DashboardController::class, 'job_applications'])->name('admin.job_applications')->middleware(['auth','admin']);
Route::get('/admin/users', [DashboardController::class, 'users'])->name('admin.users')->middleware(['auth','admin']);

Route::group(['middleware' => ['auth:employer']], function () {
    Route::get('employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
    Route::get('employer/create-job', [EmployerController::class, 'createJob'])->name('employer.create-job');
    Route::post('employer/create-job', [EmployerController::class, 'store'])->name('employer.store-job');
    Route::post('employer/create-company', [EmployerController::class, 'createCompany'])->name('employer.create-company');
});

require __DIR__ . '/auth.php';
