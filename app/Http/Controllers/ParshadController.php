<?php

namespace App\Http\Controllers;

use App\Models\PartNo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ParshadController extends Controller
{
    //Serveyor
    function surveyorCreate(Request $request)
    {
        try {
            $user = Auth::user();
            $ward_id  = $user->ward_id;
            $part_no = PartNo::where('ward_id', $ward_id)->orderBy('part_no', 'asc')->get();
            return view('Create.createSurveyUser', compact('part_no', 'ward_id'));
        } catch (\Exception $exception) {
            return back()->with('error', 'Something went wrong');
        }
    }
    function surveyorStore(Request $request)
    {
        try {
            // return $request->all();
            $validation = Validator::make($request->all(), [

                'name' => ['required'],
                'mobile' => ['required', 'digits:10'],
                's_no_to' => ['required'],
                's_no_from' => ['required'],
                'section_id' => ['required'],
                'part_id' => ['required'],
                'password' => ['required'],

            ]);
            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }
            $input = $request->all();
            $ifExistMobile = User::where('mobile', $input['mobile'])->where('id', '!=', $input['id'])->whereNull('deleted_at')->first();
            // $ifExistEmail = User::where('email', $input['email'])->where('id', '!=', $input['id'])->whereNull('deleted_at')->first();
            if ($ifExistMobile) {
                return back()->with('error', 'Mobile number allready exist')->withInput();
            }
            $input['password'] = Hash::make($request->password);
            $input['password2'] = $request->password;
            $input['part_id'] = explode(",", $request->part_id)[1];
            if ($input['id']) {
                User::find($input['id'])->update($input);
                return redirect()->route('parshad.list.surveyor')->with('success', 'Update successfully');
            } else {
                $input['parshad_id'] = Auth::id();
                $input['type'] = 'surveyor';
                User::create($input);
                return back()->with('success', 'Saved successfully');
            }
        } catch (\Exception $exception) {
            // return $exception->getMessage();
            return back()->with('error', 'Something went wrong')->withInput();
        }
    }
    /**List surveyor */
    function surveyorList(Request $request)
    {
        try {
            $id = Auth::id();
            $surveyor = User::where(['parshad_id' => $id, 'type' => 'surveyor'])->whereNull('deleted_at')->orderBy('part_id', 'asc')->paginate(25);
            return view('List.surveyor', compact('surveyor'));
        } catch (\Exception $exception) {
            return back()->with('error', 'Somethinge went wrong');
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Edit surveyor */
    function surveyorEdit(Request $request, $id)
    {
        try {

            $editSurveyor = User::find(base64_decode($id));
            return view('Edit.surveyor', compact('editSurveyor'));
        } catch (\Exception $exception) {
            return back()->with('error', 'Somethinge went wrong');
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Delete surveyor */
    function surveyorDelete(Request $request, $id)
    {
        try {
            User::find(base64_decode($id))->delete();
            // User::find(base64_decode($id))->update(['deleted_at' => Carbon::now()]);
            return ['success' => true, 'message' => "Deleted successfully"];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }

    //Booth agent
    function boothAgentCreate(Request $request)
    {
        try {
            $user = Auth::user();
            $ward_id  = $user->ward_id;
            $part_no = PartNo::where('ward_id', $ward_id)->orderBy('part_no', 'asc')->get();
            return view('Create.polingBoothAgent', compact('part_no'));
        } catch (\Exception $exception) {
            return back()->with('error', 'Something went wrong');
        }
    }
    function boothAgentStore(Request $request)
    {
        try {
            // return $request->all();
            $validation = Validator::make($request->all(), [

                'name' => ['required'],
                'mobile' => ['required', 'digits:10'],
                'part_id' => ['required'],
                'polling_id' => ['required'],

            ]);
            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }
            $input = $request->all();
            $ifExistMobile = User::where('mobile', $input['mobile'])->where('id', '!=', $input['id'])->whereNull('deleted_at')->first();
            // $ifExistEmail = User::where('email', $input['email'])->where('id', '!=', $input['id'])->whereNull('deleted_at')->first();
            if ($ifExistMobile) {
                return back()->with('error', 'Mobile number allready exist')->withInput();
            }
            $part_id = explode(",", $request->part_id)[0];
            $part_no = explode(",", $request->part_id)[1];
            $input['part_id'] = $part_id;
            if (!$request->password) {
                $input['password'] = Hash::make('123456789');
                $input['password2'] = '123456789';
            } else {
                $input['password'] = Hash::make($request->password);
                $input['password2'] = $request->password;
            }
            if ($input['id']) {
                User::find($input['id'])->update($input);
                return redirect()->route('parshad.list.booth.agent')->with('success', 'Update successfully');
            } else {

                $input['parshad_id'] = Auth::id();
                $input['type'] = 'agent';
                // return $input;
                User::create($input);
                return back()->with('success', 'Saved successfully');
            }
        } catch (\Exception $exception) {
            // return $exception->getMessage();
            return back()->with('error', 'Something went wrong')->withInput();
        }
    }
    /**List boothAgent */
    function boothAgentList(Request $request)
    {
        try {
            $id = Auth::id();
            $boothAgent = User::where(['parshad_id' => $id, 'type' => 'agent'])->whereNull('deleted_at')->orderBy('id', 'desc')->paginate(25);
            return view('List.polingBoothAgent', compact('boothAgent'));
        } catch (\Exception $exception) {
            return back()->with('error', 'Something went wrong');
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Edit boothAgent */
    function boothAgentEdit(Request $request, $id)
    {
        try {
            $user = Auth::user();
            $ward_id  = $user->ward_id;
            $part_no = PartNo::where('ward_id', $ward_id)->orderBy('part_no', 'asc')->get();
            $editBoothAgent = User::find(base64_decode($id));
            return view('Edit.boothAgent', compact('editBoothAgent', 'part_no'));
        } catch (\Exception $exception) {
            // return back()->with('error', 'Something went wrong');
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Delete boothAgent */
    function boothAgentDelete(Request $request, $id)
    {
        try {
            // User::find(base64_decode($id))->update(['deleted_at' => Carbon::now()]);
            User::find(base64_decode($id))->delete();
            return ['success' => true, 'message' => "Deleted successfully"];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
}
