<?php

namespace App\Http\Controllers;

use App\Models\EROData;
use App\Models\SurveyData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function reportpartview(Request $request, $type)
    {
        try {
            // return $request->all();

            $user = Auth::user();
            $searchq = $request->searchq ?? '';
            $parts = $user->wards->part_nos;
            $surveyData = SurveyData::where(['parshad_id' => $user->id])
                ->when($type == 'partwise' && request('searchq'), function ($q) {
                    return $q->where('part_id', request('searchq'));
                })
                ->when($type == 'namewise' && request('searchq'), function ($q) {
                    return $q->where('name', 'like', '%' . request('searchq') . '%');
                })
                ->when($type == 'housewise' && request('searchq'), function ($q) {
                    return $q->where('house_no', request('searchq'));
                })
                ->when($type == 'categorywise' && request('searchq'), function ($q) {
                    return $q->where('category', request('searchq'));
                })
                ->when($type == 'colorwise' && request('searchq'), function ($q) {
                    return $q->where('red_green_blue', request('searchq'));
                })
                ->when($type == 'mobilewise' && request('searchq'), function ($q) {
                    return $q->where('mobile', 'like', '%' . request('searchq') . '%');
                })
                ->orderBy('part_id', 'asc')->get();
            return view('Report.' . $type, compact('surveyData', 'user', 'parts', 'searchq'));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function reportvoterlist(Request $request)
    {
        try {
            // return $request->all();
            $user = Auth::user();
            $ward_id = $user->ward_id;
            // $ward_id = 56;
            $part_id = $request->part_id;
            // $part_id = 708;
            $color = $request->color;
            $parts = $user->wards->part_nos;
            $eroDataWithC = [];
            $eroDataWithoutC = [];
            if ($part_id && !$color) {
                $eroDataWithoutC = EROData::where(['ward_id' => $ward_id, 'part_id' => $part_id])->orderBy('s_no', 'asc')->get();
            } else {
                $eroDataWithC = EROData::join('survey_data', 'e_r_o_data.id', '=', 'survey_data.ero_id')
                    ->where(['e_r_o_data.ward_id' => $ward_id, 'e_r_o_data.part_id' => $part_id])
                    ->when(request('color'), function ($q) use ($user) {
                        return $q->where(['parshad_id' => $user->id, 'survey_data.red_green_blue' => request('color')]);
                    })
                    ->select('e_r_o_data.*', 'survey_data.red_green_blue as color')
                    ->orderBy('e_r_o_data.s_no', 'asc')->get();
            }
            return view('Report.voterlist', compact('user', 'eroDataWithC', 'eroDataWithoutC', 'part_id', 'color', 'parts'));
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
