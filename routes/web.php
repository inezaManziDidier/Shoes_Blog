<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\JobsController;
use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/jobs', [JobsController::class, 'index'])->name('jobs.listing');

Route::post('/jobs/search', [JobsController::class, 'search'])->name('jobs.search');

Route::get('/employers/create-job', [EmployerController::class, 'createJob'])->name('employers.create-job');

Route::get('/jobs/{job}', [JobsController::class, 'show'])->name('jobs.show');

Route::get('/jobs/{job}/apply', [JobsController::class, 'showApplicationForm'])->name('jobs.application-form');

Route::post('/jobs/{job}/apply', [JobsController::class, 'apply'])->name('jobs.apply');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::group(['middleware' => ['auth:employer']], function () {
    Route::get('employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
});

require __DIR__ . '/auth.php';
