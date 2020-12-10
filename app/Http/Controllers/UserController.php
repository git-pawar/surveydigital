<?php

namespace App\Http\Controllers;

use App\Models\BoothData;
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
            // return back()->with('error', 'No user found with mobile ' . $mobile)->withInput();
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
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
    function surveyStoreData(Request $request)
    {
        DB::beginTransaction();
        try {
            $validation = Validator::make($request->all(), [
                'mobile' => ['required', 'digits:10'],
                'cast' => ['required'],
                'ward_no' => ['required'],
                'part_no' => ['required'],
                'category' => ['required'],
                's_no' => ['required'],
                'house_no' => ['required'],
                'name' => ['required'],
                'voter_count' => ['required'],
                'red_green_blue' => ['required']
            ]);

            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }
            $input = $request->all();
            $user = Auth::user();
            $input['parshad_id'] = $user->parshad_id;
            $input['surveyor_id'] = $user->id;
            $mainData = SurveyData::where(['part_id' => $request->part_no, 'ward_id' => $request->ward_no, 's_no' => $request->s_no])->first();
            $mainData->mobile = $request->mobile;
            $mainData->cast = $request->cast;
            $mainData->ward_no = $request->ward_no;
            $mainData->part_no = $request->part_no;
            $mainData->category = $request->category;
            $mainData->s_no = $request->s_no;
            $mainData->house_no = $request->house_no;
            $mainData->name = $request->name;
            $mainData->retative_to = $mainData->id;
            $mainData->parshad_id = $user->parshad_id;
            $mainData->surveyor_id = $user->id;
            $mainData->red_green_blue = $request->red_green_blue;
            $mainData->save();
            if (count($request->otherName)) {
                foreach ($request->otherName as $index => $item) {
                    if ($request->otherSno[$index] && $request->otherMobile[$index]) {
                        $otherData = SurveyData::where(['part_id' => $request->part_no, 'ward_id' => $request->ward_no, 's_no' => $request->otherSno[$index]])->first();
                        $otherData->mobile = $request->otherMobile[$index];
                        $otherData->cast = $request->cast;
                        $otherData->ward_no = $request->ward_no;
                        $otherData->part_no = $request->part_no;
                        $otherData->category = $request->category;
                        $otherData->s_no = $request->otherSno[$index];
                        $otherData->house_no = $request->house_no;
                        $otherData->retative_to = $mainData->id;
                        $otherData->parshad_id = $user->parshad_id;
                        $otherData->surveyor_id = $user->id;
                        $otherData->red_green_blue = $request->red_green_blue;
                        $otherData->save();
                    }
                }
            }
            DB::commit();
            return back()->with('success', 'Survey saved successfully');
        } catch (\Exception $exception) {
            DB::rollback();
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
            return redirect()->route('login')->with('success', 'You have successfully loged out');
        } catch (\Exception $exception) {
            // return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
            return back()->with('error', 'Something went wrong');
        }
    }
}
