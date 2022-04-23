<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class HomepageController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $jobs = Job::orderBy('updated_at', 'desc')->get();

        return view('index', compact('categories', 'jobs'));
    }
}
