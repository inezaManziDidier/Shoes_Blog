<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;

Route::get('/test', function () {
    return view('test');
});
Route::post('/test', function (Request $request) {
    // $request->validate([
    //     'cv' => 'required|file|mimes:jpg,png,pdf',
    // ]);
    $cvname = $request->file('cv')->getClientOriginalName();
    $path = $request->file('cv')->move('files', $cvname);
    $data = (new TesseractOCR(public_path('files/' . $cvname)))
        ->executable('C:\Program Files\Tesseract-OCR\tesseract.exe')
        ->run();
        
        // $data = urlencode($data);
        // $data = str_replace("%0A",'%20',$data);
        // $data = str_replace("%0A",'',$data);
        // $data = str_replace("+",'%20',$data);
        // $data = str_replace("%20%20",'%20',$data);
        echo($data);
        // dd('http://localhost:9000/api/jobportal/document/' . $data);
    // $client = new \GuzzleHttp\Client();
    // $req = $client->get('http://localhost:9000/api/jobportal/document/' . $data);
    // $response = json_decode($req->getBody());
    // // if (isset($response) && !empty($response)) {}
    // echo ($response->message);
});

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/jobs', [JobsController::class, 'index'])->name('jobs.listing');

Route::post('/jobs/search', [JobsController::class, 'search'])->name('jobs.search');

Route::get('/jobs/{job}', [JobsController::class, 'show'])->name('jobs.show');

Route::get('/jobs/{job}/apply', [JobsController::class, 'showApplicationForm'])->name('jobs.application-form');

Route::post('/jobs/{job}/apply', [JobsController::class, 'apply'])->name('jobs.apply');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::group(['middleware' => ['auth:employer']], function () {
    Route::get('employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
    Route::get('employer/create-job', [EmployerController::class, 'createJob'])->name('employer.create-job');
    Route::post('employer/create-job', [EmployerController::class, 'store'])->name('employer.store-job');
    Route::post('employer/create-company', [EmployerController::class, 'createCompany'])->name('employer.create-company');
});

require __DIR__ . '/auth.php';
