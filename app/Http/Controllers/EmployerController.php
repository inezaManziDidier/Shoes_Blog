<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use App\Models\JobRequirement;

class EmployerController extends Controller
{
    
    public function dashboard()
    {
        $companies = auth()->guard('employer')->user()->employers;
        return view('employer-dashboard', compact('companies'));
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

    public function createCompany()
    {

        $name = request()->file('logo')->getClientOriginalName();
        $path = request()->file('logo')->move('img', $name);

        // $save = new Photo;
        $employer = Employer::create([
            'employer_user_id' => auth()->guard('employer')->user()->id,
            'company' => request('companyName'),
            'location' => request('location'),
            'email' => request('email'),
            'description' => request('description'),
            'logo' => $name
        ]);

        return back()->with('message', 'successfully created company.');
    }

    public function show(Employer $employer)
    {
        $jobs = $employer->jobs;
        return view('employers.show',compact('jobs','employer'));
    }

    public function showApplicants(Job $job)
    {
        $applicants = $job->applicants;
        $employer = $job->employer;
        return view('employers.applicants',compact('applicants','employer','job'));
    }
}
