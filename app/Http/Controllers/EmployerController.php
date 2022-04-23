<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class EmployerController extends Controller
{

    public function createJob()
    {
        $categories = Category::all();
        return view('employers.create-job', compact('categories'));
    }
}
