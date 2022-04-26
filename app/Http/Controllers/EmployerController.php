<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::all();
        return view('employers.create-job', compact('categories'));
    }
}
