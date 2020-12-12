<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reportIndex(Request $request)
    {
        try {
            return view('Report.dashboard');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function reportpartview(Request $request)
    {
        try {
            return view('Report.partwise');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function reportvoterlist(Request $request)
    {
        try {
            return view('Report.voterlist');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function reportvoterlistdone(Request $request)
    {
        try {
            return view('Report.done');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function reportvoterlistpending(Request $request)
    {
        try {
            return view('Report.voterlistpending');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function reportvoterlistall(Request $request)
    {
        try {
            return view('Report.voterlistall');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function reportpartwiselist(Request $request)
    {
        try {
            return view('Report.partwiselist');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

}
