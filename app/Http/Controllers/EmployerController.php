<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use App\Models\JobRequirement;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * redirect admin after login
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('employer-dashboard');
    }

    public function createJob()
    {
        $companies = auth()->guard('employer')->user()->employers;
        $categories = Category::all();
        return view('employers.create-job', compact('categories', 'companies'));
    }

    public function store()
    {
        $company = Employer::where('company', request('company'))->first();
        $category = Category::where('name', request('category'))->first();
        // create job
        $job = Job::create([
            'category_id' => $category->id,
            'employer_id' => $company->id,
            'title' => request('jobTitle'),
            'description' => request('description'),
            'positions' => request('positions'),
            'deadline' => request('deadline')
        ]);

        // create job requirement
        JobRequirement::create([
            'job_id' => $job->id,
            'experience' => request('experience'),
            'education_level' => request('education'),
            'contract_type' => request('contract_type'),
            'skills' => explode(PHP_EOL, request('skills'))
        ]);

        return back()->with('message', 'successfully created job');
    }
}
