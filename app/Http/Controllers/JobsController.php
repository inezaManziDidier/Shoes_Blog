<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{

    public function index()
    {
        if (request()->category) {
            $categoryName = request()->category;
            $category = Category::where('name', request()->category)->first();
            $jobs = $category->jobs;
            return view('jobs.listing', compact('jobs', 'categoryName'));
        }

        $categoryName = request()->category;
        $jobs = Job::orderBy('updated_at', 'desc')->get();
        return view('jobs.listing', compact('jobs'));
    }

    public function search()
    {
        $employerId = Employer::where('company', request('by_company'))->first()->id;
        $keyword = request('by_keyword');
        if ($keyword) {
            $jobs = Job::where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('employer_id', $employerId)
                ->get();
            return view('jobs.seach-job', compact('jobs', 'keyword'));
        }
        $keyword = request('by_company');
        $jobs = Job::where('employer_id', $employerId)->get();
        return view('jobs.seach-job', compact('jobs', 'keyword'));
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function showApplicationForm(Job $job)
    {
        return view('jobs.apply-job', compact('job'));
    }
}
