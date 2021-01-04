<?php

namespace App\Http\Controllers;

use App\Models\BoothData;
use App\Models\PartNo;
use App\Models\EROData;
use App\Models\SurveyData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ReportController extends Controller
{
    public function reportIndex(Request $request)
    {
        try {
            $mainTitle = 'Report';
            return view('Report.dashboard', compact('mainTitle'));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function reportSurvey(Request $request)
    {
        try {
            $mainTitle = 'Report';
            return view('Report.surveyDataReport', compact('mainTitle'));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function surveyorReport(Request $request)
    {
        try {
            $mainTitle = 'Report';
            // return $request->all();

            $user = Auth::user();
            $part = $user->part_nos->part_no;
            $part = $user->parshads->wards->ward_no;
            $filterBy = $request->filterBy ?? 'all';
            // $inputSearch = $request->inputSearch ?? '';
            // $categorySearch = $request->categorySearch ?? '';
            // $colorSearch = $request->colorSearch ?? '';
            $surveyDataAll = [];
            $surveyDataDone = [];
            $surveyDataPending = [];
            if ($filterBy == 'all') {
                $surveyDataAll = EROData::where(['ward_id' => $user->parshads->ward_id, 'part_id' => $user->part_id])->orderBy('s_no', 'asc')->get();
            } elseif ($filterBy == 'done') {
                $surveyDataDone = SurveyData::where(['parshad_id' => $user->parshad_id, 'surveyor_id' => $user->id, 'ward_id' => $user->parshads->ward_id, 'part_id' => $user->part_id])->orderBy('s_no', 'asc')->get();
            } elseif ($filterBy == 'pending') {
                $doneId = SurveyData::where(['parshad_id' => $user->parshad_id, 'surveyor_id' => $user->id, 'ward_id' => $user->parshads->ward_id, 'part_id' => $user->part_id])->pluck('ero_id');
                $surveyDataPending = EROData::where(['ward_id' => $user->parshads->ward_id, 'part_id' => $user->part_id])->whereNotIn('id', $doneId)->orderBy('s_no', 'asc')->get();
            }
            return view('Report.surveyor', compact('surveyDataAll', 'surveyDataDone', 'surveyDataPending', 'user', 'filterBy', 'mainTitle'));
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return back()->with('error', $exception->getMessage());
        }
    }
    public function reportpartview(Request $request, $type)
    {
        try {
            // return $request->all();

            $user = Auth::user();
            $searchq = $request->searchq ?? '';
            $filterBy = $request->filterBy ?? '';
            $partno = $request->partno ?? '';
            $parts = $user->wards->part_nos;
            $inputSearch = $request->inputSearch ?? '';
            $categorySearch = $request->categorySearch ?? '';
            $colorSearch = $request->colorSearch ?? '';
            $surveyData = SurveyData::where(['parshad_id' => $user->id])
                ->when($type == 'partwise' && request('partno'), function ($q) {
                    return $q->where('part_id', request('partno'));
                })
                ->when($filterBy == 'Name' && request('inputSearch'), function ($q) {
                    return $q->where('name', 'like', '%' . request('inputSearch') . '%');
                })
                ->when($filterBy == 'House' && request('inputSearch'), function ($q) {
                    return $q->where('house_no', 'like', '%' . request('inputSearch') . '%');
                })
                ->when($filterBy == 'Mobile' && request('inputSearch'), function ($q) {
                    return $q->where('mobile', 'like', '%' . request('inputSearch') . '%');
                })
                ->when($filterBy == 'Category' && request('categorySearch'), function ($q) {
                    return $q->where('category', request('categorySearch'));
                })
                ->when($filterBy == 'Color' && request('colorSearch'), function ($q) {
                    return $q->where('red_green_blue', request('searchq'));
                })
                ->orderBy('part_id', 'asc')->get();
            return view('Report.' . $type, compact('surveyData', 'user', 'parts', 'searchq', 'filterBy', 'partno', 'inputSearch', 'categorySearch', 'colorSearch'));
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
    public function boothvoterlist(Request $request)
    {
        try {
            // return $request->all();
            $user = Auth::user();
            $parts = $user->wards->part_nos;
            $part_id = $request->part_id ?? $parts[0]->id ?? '';
            $ward_no = $user->wards->ward_no;
            $mainTitle = 'Booth Report W-' . str_pad($ward_no, 2, 0, STR_PAD_LEFT);
            $filterBy = $request->filterBy ?? 'all';
            // $inputSearch = $request->inputSearch ?? '';
            // $categorySearch = $request->categorySearch ?? '';
            // $colorSearch = $request->colorSearch ?? '';
            $boothDataAll = [];
            $boothDataDone = [];
            $boothDataPending = [];

            if ($filterBy == 'all') {
                $boothDataAll = EROData::where(['ward_id' => $user->ward_id, 'part_id' => $part_id])->orderBy('s_no', 'asc')->get();
            } elseif ($filterBy == 'done') {
                $boothDataDone = SurveyData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $part_id, 'attend_booth' => 1])->orderBy('s_no', 'asc')->get();
            } elseif ($filterBy == 'pending') {
                $doneId = SurveyData::where(['parshad_id' => $user->id, 'ward_id' => $user->ward_id, 'part_id' => $part_id, 'attend_booth' => 1])->whereNotNull('ero_id')->pluck('ero_id');
                $boothDataPending = EROData::where(['ward_id' => $user->ward_id, 'part_id' => $part_id])->whereNotIn('id', $doneId)->orderBy('s_no', 'asc')->get();
            }
            return view('Report.pollingBooth', compact('boothDataAll', 'boothDataDone', 'boothDataPending', 'filterBy', 'mainTitle', 'user', 'part_id', 'parts'));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function analysisReport(Request $request)
    {
        try {
            $user = Auth::user();
            $ward_no = $user->wards->ward_no;
            $mainTitle = 'Analysis Report W-' . str_pad($ward_no, 2, 0, STR_PAD_LEFT);
            $partData = PartNo::where('ward_id', $ward_no)->orderBy('part_no', 'asc')->get();
            return view('Report.analysis', compact('partData', 'user', 'mainTitle'));
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
     public function printPDF()
    {
       // This  $data array will be passed to our PDF blade
       $data = [
          'title' => 'First PDF for Medium',
          'heading' => 'Hello from 99Points.info',
          'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."
            ];

        $pdf = PDF::loadView('Report.pdf_view', $data);
        return $pdf->download('medium.pdf');
    }
}
