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
use thiagoalessio\TesseractOCR\TesseractOCR;

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
                ->orderBy('created_at', 'desc')
                ->get();
            return view('jobs.seach-job', compact('jobs', 'keyword'));
        }
        $keyword = request('by_company');
        $jobs = Job::where('employer_id', $employerId)
            ->orderBy('created_at', 'desc')
            ->get();
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
            'other-files.*' => 'mimes:jpg,jpeg,png',
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

                //CHECK DOCUMENTS AUTHENTICITY
                $data = (new TesseractOCR(public_path('files/'.$filename)))
                ->executable('C:\Program Files\Tesseract-OCR\tesseract.exe')
                ->run();
                $data = urlencode($data);
                $data = str_replace("%0A",'%20',$data);
                $data = str_replace("%0A",'',$data);
                $data = str_replace("+",'%20',$data);
                $data = str_replace("%20%20",'%20',$data);
                // dd('http://localhost:9000/api/jobportal/document/' . $data);
                $client = new \GuzzleHttp\Client();
                $req = $client->get('http://localhost:9000/api/jobportal/document/' . $data);
                $response = json_decode($req->getBody());
                // dd($response);
                if (isset($response) && !empty($response)) {
                    if($response->message == 'doc_not_found'){
                        // SAVE THE INVALID DOCUMENT
                        //save job_applications info
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

                //save job_applications info (success)
                $jobApplication = JobApplication::create([
                    'job_id' => $job->id,
                    'applicant_id' => $applicant->id,
                    'application_date' => Carbon::now()->format('y-m-d'),
                    'successfull' => false
                ]);

                //save applicant-job info
                DB::table('applicant_job')->insert([
                    'applicant_id' => $applicant->id,
                    'job_id' => $job->id
                ]);
                        return back()->with(['invalidDoc' => 'THIS DOCUMENT IS INVALID','filename'=>$filename]);
                    }elseif ($response->message == 'doc_found') {
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

        //save job_applications info (success)
        $jobApplication = JobApplication::create([
            'job_id' => $job->id,
            'applicant_id' => $applicant->id,
            'application_date' => Carbon::now()->format('y-m-d'),
            'successfull' => true
        ]);

        //save applicant-job info
        DB::table('applicant_job')->insert([
            'applicant_id' => $applicant->id,
            'job_id' => $job->id
        ]);

        // SAVE THE VALID DOCUMENT
        return back()->with('message', 'application successfully submited. ALL DOCUMENTS ARE VALID');
                    }
                }
            }
        }
        
    }
}
