<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\Applicant;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $time = Carbon::now();
        $applications = JobApplication::all();
        $success = JobApplication::where('successfull',true)->get();
        $failed = JobApplication::where('successfull',false)->get();
        return view('admin.index', compact('time','applications','success','failed'));
    }

    public function applicants()
    {
        $time = Carbon::now();
        $applicants = Applicant::all();
        return view('admin.applicants',compact('time','applicants'));
    }

    public function jobs()
    {
        $time = Carbon::now();
        $jobs = Job::all();
        return view('admin.jobs',compact('time','jobs'));
    }

    public function companies()
    {
        $time = Carbon::now();
        $companies = Employer::all();
        return view('admin.companies',compact('time','companies'));
    }

    public function job_applications()
    {
        $time = Carbon::now();
        $job_applications = JobApplication::all();
        return view('admin.job_applications',compact('time','job_applications'));
    }

    public function users()
    {
        $time = Carbon::now();
        $users = User::all();
        return view('admin.users',compact('time','users'));
    }
}
