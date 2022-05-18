<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\JobApplication;
use PDF;

class ReportsController extends Controller
{

    public function index()
    {
        $time = Carbon::now();
        $current_applications = JobApplication::select('*')
                                            ->whereMonth('created_at', Carbon::now()->month)
                                            ->get();
        $current1_applications = JobApplication::select('*')
                                            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
                                            ->get();
        $current2_applications = JobApplication::select('*')
                                            ->whereMonth('created_at', Carbon::now()->subMonths(2)->month)
                                            ->get();
        $previous_month = Carbon::now()->subMonth()->format('F');
        $previous_month2 = Carbon::now()->subMonths(2)->format('F');
        $year = Carbon::now()->year;
        return view('reports.index',compact('time','current_applications','current1_applications','current2_applications','previous_month','previous_month2','year'));
    }

    public function report_pdf()
    {
        if (request('month') == 'current') {
            $month = Carbon::now()->format('F');
            $applications = JobApplication::select('*')
                                            ->whereMonth('created_at', Carbon::now()->month)
                                            ->get();
        }elseif (request('month') == 'current-1') {
            $month = Carbon::now()->subMonth()->format('F');
            $applications = JobApplication::select('*')
                                            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
                                            ->get();
        }elseif (request('month') == 'current-2') {
            $month = Carbon::now()->subMonths(2)->format('F');
            $applications = JobApplication::select('*')
                                            ->whereMonth('created_at', Carbon::now()->subMonths(2)->month)
                                            ->get();
        }
        $year = Carbon::now()->year;
        $pdf = PDF::loadView('reports.applications-list', compact('applications','month','year'))->setPaper('A4', 'portrait');

        return $pdf->download('applications_report_' . $month . '_' . $year . '.pdf');
    }
}
