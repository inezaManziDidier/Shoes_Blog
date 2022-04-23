<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $time = Carbon::now();
        return view('admin.index', compact('time'));
    }
}
