<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use App\Models\JobApplication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function apply(Request $request, Job $job)
    {
        // VALIDATE
        $request->validate([
            'firstname' => 'required|max:20',
            'lastname' => 'required|max:20',
            'email' => 'required|email|unique:applicants,email',
            'phone' => 'required|max:10',
            'nationality' => 'required|max:15',
            'gender' => 'required',
            'cvTitle' => 'required|max:20',
            'cv' => 'required|file|mimes:doc,docx,pdf',
            'other-files.*' => 'mimes:doc,docx,pdf',
            'education' => 'required',
            'experience' => 'required',
            'skills' => 'required',
        ]);

        if ($request->hasfile('cv')) {
            $cvname = time() . '_' . $request->file('cv')->getClientOriginalName();
            $cvpath = $request->file('cv')->move('files', $cvname);
        }

        $filepaths = [];
        if ($request->hasfile('other-files')) {
            foreach ($request->file('other-files') as $key => $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $filepath = $file->move('files', $filename);
                $filepaths[] = $filename;
            }
        }

        //save applicant's info
        $skills = explode(PHP_EOL, request('skills'));
        $applicant = Applicant::create([
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'email' => request('email'),
            'phone' => request('phone'),
            'gender' => request('gender'),
            'nationality' => request('nationality'),
            'degree' => request('education'),
            'experience' => request('experience'),
            'cvTitle' => request('cvTitle'),
            'skills' => $skills,
            'cv' => $cvname,
            'other_files' => $filepaths,
        ]);

        //save job_applications info
        $jobApplication = JobApplication::create([
            'job_id' => $job->id,
            'applicant_id' => $applicant->id,
            'application_date' => Carbon::now()->format('y-m-d')
        ]);

        //save applicant-job info
        DB::table('applicant_job')->insert([
            'applicant_id' => $applicant->id,
            'job_id' => $job->id
        ]);

        return back()->with('message', 'application successfully submited');
    }
}
