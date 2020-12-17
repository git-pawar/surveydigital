<?php

namespace App\Http\Controllers;

use App\Models\BoothData;
use App\Models\EROData;
use App\Models\SurveyData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    /**Surveyor agent Dashboard */
    function surveyorAgentIndex(Request $request)
    {
        try {
            return view('Login.serveyorAgentLogin');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    function serveyorAgentLogin(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [

                'mobile' => ['required', 'digits:10'],
                'password' => ['required'],

            ]);
            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }
            $mobile = $request->mobile;
            $password = $request->password;
            $user = User::where('mobile', $mobile)->first();
            if ($user) {
                if (Hash::check($password, $user->password)) {
                    Auth::loginUsingId($user->id, 1);
                    return redirect()->route('dashboard');
                } else {
                    return back()->with('error', 'Credential not correct')->withInput();
                }
            } else {
                return back()->with('error', 'No user found with mobile ' . $mobile)->withInput();
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'No user found with mobile ' . $mobile)->withInput();
            // return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    function surveyorAgentDashboard(Request $request)
    {
        try {
            $user = Auth::user();
            if ($user->type == 'surveyor') {

                return view('Dashboard.surveyor');
            } elseif ($user->type == 'agent') {
                return view('Dashboard.boothAgent');
            } elseif ($user->type == 'parshad') {
                return view('Dashboard.parshad');
            } else {
                return 'You are not authorized';
            }
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    function surveyImageGet(Request $request)
    {
        try {
            $user = Auth::user();
            $s_no = $request->s_no;
            $ward = $request->ward;
            $part = $request->part;

            $imageData = EROData::where(['s_no' => $s_no, 'ward_id' => $ward, 'part_id' => $part])->first();
            $existData = SurveyData::where(['surveyor_id' => $user->id, 's_no' => $s_no, 'ward_id' => $ward, 'part_id' => $part])->first();
            $voterCount = [];
            if ($existData) {
                $voterCount = SurveyData::where(['retative_to' => $existData->id, 'surveyor_id' => $user->id,])->get();
            }
            if ($imageData) {
                return ['success' => true, 'url' => $imageData->url, 'imageData' => $imageData, 'existData' => $existData, 'voterCount' => $voterCount];
            } else {
                return ['success' => false, 'message' => 'No image found regarding this serial no'];
            }
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    function insertData(Request $request)
    {
        try {
            $user = User::find(Auth::id());
            if ($user->type == 'surveyor') {
                return view('Data.surveyData', compact('user'));
            } elseif ($user->type == 'agent') {
                return view('Data.boothData', compact('user'));
            } else {
                return redirect()->route('login')->with('error', 'Sorry you are not authorized');
            }
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    function shortSurvey(Request $request)
    {
        try {
            $user = User::find(Auth::id());
            $ward_id = $user->parshads->wards->id;
            $part_id = $user->part_id;
            if ($user->type == 'surveyor') {
                $eroDataWithoutC = EROData::where(['ward_id' => $ward_id, 'part_id' => $part_id])->orderBy('s_no', 'asc')->get();
                return view('Data.shortSurvey', compact('user', 'eroDataWithoutC', 'ward_id', 'part_id'));
            } else {
                return redirect()->route('login')->with('error', 'Sorry you are not authorized');
            }
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    function surveyStoreData(Request $request)
    {
        // return $request->all();
        DB::beginTransaction();
        try {
            $validation = Validator::make($request->all(), [
                'mobile' => ['nullable', 'digits:10'],
                // 'cast' => ['required'],
                'ward_id' => ['required'],
                'part_id' => ['required'],
                // 'category' => ['required'],
                's_no' => ['required'],
                // 'house_no' => ['required'],
                // 'name' => ['required'],
                // 'voter_count' => ['required'],
                'red_green_blue' => ['required']
            ]);

            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }
            $input = $request->all();
            $user = Auth::user();
            $input['parshad_id'] = $user->parshad_id;
            $input['surveyor_id'] = $user->id;
            $eroData = EROData::where(['part_id' => $request->part_id, 'ward_id' => $request->ward_id, 's_no' => $request->s_no])->first();
            $mainData = SurveyData::where(['parshad_id' => $user->parshad_id, 'part_id' => $request->part_id, 'ward_id' => $request->ward_id, 's_no' => $request->s_no])->first();
            if (!$mainData) {
                $mainData = new SurveyData();
            }
            $mainData->mobile = $request->mobile;
            $mainData->cast = $request->cast;
            $mainData->ward_no = $request->ward_id;
            $mainData->part_no = $request->part_id;
            $mainData->ward_id = $request->ward_id;
            $mainData->part_id = $request->part_id;
            $mainData->category = $request->category;
            $mainData->s_no = $request->s_no;
            $mainData->house_no = $request->house_no;
            $mainData->name = $request->name;
            $mainData->remark = $request->remark;
            $mainData->parshad_id = $user->parshad_id;
            $mainData->surveyor_id = $user->id;
            $mainData->ero_id = $eroData->id ?? null;
            $mainData->voter_count = $request->voter_count ?? null;
            $mainData->red_green_blue = $request->red_green_blue;
            $mainData->save();
            if (isset($request->otherSno) && count($request->otherSno)) {
                foreach ($request->otherSno as $index => $item) {
                    if ($request->otherSno[$index] && $request->otherMobile[$index]) {
                        $eroData1 = EROData::where(['part_id' => $request->part_id, 'ward_id' => $request->ward_id, 's_no' => $request->otherSno[$index]])->first();
                        $otherData = SurveyData::where(['parshad_id' => $user->parshad_id, 'part_id' => $request->part_id, 'ward_id' => $request->ward_id, 's_no' => $request->otherSno[$index]])->first();
                        if (!$otherData) {
                            $otherData = new SurveyData();
                        }
                        $otherData->mobile = $request->otherMobile[$index];
                        $otherData->cast = $request->cast;
                        $otherData->ward_no = $request->ward_id;
                        $otherData->part_no = $request->part_id;
                        $otherData->ward_id = $request->ward_id;
                        $otherData->part_id = $request->part_id;
                        $otherData->category = $request->category;
                        $otherData->s_no = $request->otherSno[$index];
                        $otherData->house_no = $request->house_no;
                        $otherData->retative_to = $mainData->id;
                        $otherData->parshad_id = $user->parshad_id;
                        $otherData->surveyor_id = $user->id;
                        $otherData->ero_id = $eroData1->id ?? null;
                        $mainData->voter_count = $request->voter_count ?? 0;
                        $otherData->red_green_blue = $request->red_green_blue;
                        $otherData->save();
                    }
                }
            }
            DB::commit();
            return back()->with('success', 'Survey saved successfully');
        } catch (\Exception $exception) {
            DB::rollback();
            // return back()->with('error', $exception->getMessage())->withInput();
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    function surveyStoreShortData(Request $request)
    {
        // return $request->all();
        DB::beginTransaction();
        try {
            $validation = Validator::make($request->all(), [
                // 'mobile' => ['required', 'digits:10'],
                // 'cast' => ['required'],
                'ward_id' => ['required'],
                'part_id' => ['required'],
                'category' => ['required'],
                's_no' => ['required'],
                // 'house_no' => ['required'],
                // 'name' => ['required'],
                // 'voter_count' => ['required'],
                'color' => ['required']
            ]);

            if ($validation->fails()) {
                return ['sucsess' => false, 'validation' => false, 'message' => 'Validation error', 'error' => $validation->errors()];
                // back()->withErrors($validation)->withInput();
            }
            $input = $request->all();
            $user = Auth::user();
            $input['parshad_id'] = $user->parshad_id;
            $input['surveyor_id'] = $user->id;
            $eroData = EROData::where(['part_id' => $request->part_id, 'ward_id' => $request->ward_id, 's_no' => $request->s_no])->first();
            $mainData = SurveyData::where(['parshad_id' => $user->parshad_id, 'part_id' => $request->part_id, 'ward_id' => $request->ward_id, 's_no' => $request->s_no])->first();
            if (!$mainData) {
                $mainData = new SurveyData();
            }
            $mainData->type = 'short';
            $mainData->part_no = $request->part_id;
            $mainData->ward_id = $request->ward_id;
            $mainData->part_id = $request->part_id;
            $mainData->category = $request->category;
            $mainData->s_no = $request->s_no;
            // $mainData->house_no = $request->house_no;
            // $mainData->name = $request->name;
            // $mainData->remark = $request->remark;
            $mainData->parshad_id = $user->parshad_id;
            $mainData->surveyor_id = $user->id;
            $mainData->ero_id = $eroData->id ?? null;
            // $mainData->voter_count = $request->voter_count ?? null;
            $mainData->red_green_blue = $request->color;
            $mainData->save();
            DB::commit();

            return ['success' => true, 'message' => 'Survey saved successfully'];
        } catch (\Exception $exception) {
            DB::rollback();
            // return back()->with('error', $exception->getMessage())->withInput();
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }

    function boothStoreData(Request $request)
    {
        try {
            // return $request->all();
            $validation = Validator::make($request->all(), [
                'ward_id' => ['required'],
                'part_id' => ['required'],
                's_no' => ['required'],
            ]);

            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }
            $user = Auth::user();
            $if_exist = BoothData::where(['agent_id' => $user->id, 'ward_id' => $request->ward_id, 'part_id' => $request->part_id, 's_no' => $request->s_no])->first();
            if ($if_exist) {
                return back()->with('error', 'Booth data allready exist.')->withInput();
            }
            $input = $request->all();

            $input['parshad_id'] = $user->parshad_id;
            $input['agent_id'] = $user->id;
            BoothData::create($input);
            return back()->with('success', 'Booth data saved successfully');
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Logout Admin Parshad */
    function logout(Request $request)
    {
        try {
            Auth::logout();
            $url = route('login');
            return ['success' => true, 'url' => $url];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
            // return back()->with('error', 'Something went wrong');
        }
    }
    function shortSurveyStor(Request $request)
    {
        try {
            $user = Auth::user();
            $parshad_id = $user->parshad_id;
        } catch (\Exception $exception) {
            return $exception;
        }
    }
    function updateColor(Request $request)
    {
        try {
            // return $request->all();
            $user = Auth::user();
            $ward_id = intval($request->ward_id);
            $part_id = intval($request->part_id);
            $s_no = intval($request->s_no);
            $color = $request->color;
            $surveyData = SurveyData::where(['parshad_id' => $user->id, 'part_id' => $part_id, 'ward_id' => $ward_id, 's_no' => $s_no])->first();
            $surveyData->red_green_blue = $color;
            $surveyData->save();
            return ['success' => true, 'message' => 'Color updated'];
        } catch (\Exception $exception) {
            // return $exception;
            return ['success' => false, 'message' => $exception->getMessage()];
        }
    }
}
