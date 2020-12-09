<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\State;
use App\Models\City;
use App\Models\NN;
use App\Models\NNNType;
use App\Models\Polling;
use App\Models\Section;
use App\Models\User;
use App\Models\Ward;
use App\Models\PartNo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Image;
use thiagoalessio\TesseractOCR\TesseractOCR;

class MasterController extends Controller
{
    function createAdmin(Request $request)
    {
        try {
            $ifExist = Admin::where('mobile', '1234567890')->first();
            if ($ifExist) {
                return ['success' => false, 'message' => 'Already exist'];
            }
            $admin = new Admin();
            $admin->type = 'admin';
            $admin->name = 'Admin';
            $admin->mobile = '1234567890';
            $admin->password = '123';
            $admin->save();
            return ['success' => true, 'message' => 'admin created'];
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    //Admin Parshad
    /** Login */
    function indexLoginAdminParshad(Request $request)
    {
        try {
            return view('Login.login');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    /**Login Process */
    function adminLogin(Request $request)
    {
        try {
            $credentials = $request->only('mobile', 'password');
            if (Auth::guard('admin')->attempt($credentials, 1)) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with('error', 'Wrong Mobile no or Password');
            }
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Admin Parshad Dashboard */
    function adminDashboard(Request $request)
    {
        try {
            $user = Auth::guard('admin')->user();
            if ($user->type == 'admin') {
                return view('Dashboard.admin');
            } else {
                return view('Dashboard.parshad');
            }
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Create parshad */
    function createParshad(Request $request)
    {
        try {
            $state = State::orderBy('state_name', 'asc')->get();
            $nnn_type = NNNType::orderBy('name', 'asc')->get();
            return view('Create.parshadRegister', compact('state', 'nnn_type'));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    /**Store parshad */
    function storeParshad(Request $request)
    {
        try {

            $validation = Validator::make($request->all(), [

                'name' => ['required'],
                'mobile' => ['required', 'digits:10'],
                // 'email' => ['', 'email'],
                'city' => ['required'],
                'nnn_id' => ['required'],
                'nn_id' => ['required'],
                'ward_id' => ['required'],

            ]);
            if ($validation->fails()) {
                return back()->withErrors($validation)->withInput();
            }
            $input = $request->all();
            $ifExistMobile = User::where('mobile', $input['mobile'])->where('id', '!=', $input['id'])->whereNull('deleted_at')->first();
            $ifExistEmail = User::where('email', $input['email'])->where('id', '!=', $input['id'])->whereNull('deleted_at')->first();
            if ($ifExistMobile) {
                return back()->with('error', 'Mobile number allready exist')->withInput();
            }
            if ($ifExistEmail) {
                return back()->with('error', 'Email already exist')->withInput();
            }
            $input['type'] = 'parshad';
            if ($input['id']) {
                User::find($input['id'])->update($input);
                return redirect()->route('admin.list.parshad')->with('success', 'Update successfully');
            } else {
                $input['password'] = '123456789';
                User::create($input);
                return back()->with('success', 'Saved successfully');
            }

            return view('parshadRegister', compact('state'));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    /**List parshad */
    function parshadList(Request $request)
    {
        try {
            $parshad = User::where(['type' => 'parshad'])->whereNull('deleted_at')->orderBy('id', 'desc')->get();
            return view('List.parshad', compact('parshad'));
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Edit parshad */
    function parshadEdit(Request $request, $id)
    {
        try {
            $state = State::orderBy('state_name', 'asc')->get();
            $editParshad = User::find(base64_decode($id));
            return view('Edit.parshad', compact('editParshad', 'state'));
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Delete parshad */
    function parshadDelete(Request $request, $id)
    {
        try {
            User::find(base64_decode($id))->update(['deleted_at' => Carbon::now()]);
            return ['success' => true, 'message' => "Deleted successfully"];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Get City */
    function getCity(Request $request)
    {
        try {
            $state_id = $request->state_id;
            $oldCity = $request->oldCity;
            $cities = City::where('state_id', $state_id)->orderBy('city_name', 'asc')->get();
            $view = view('Component.cities', compact('cities', 'oldCity'))->render();
            return ['success' => true, 'view' => $view];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Get NN */
    function getNN(Request $request)
    {
        try {
            $id = $request->id;
            $id2 = $request->id2;
            $oldId = $request->oldId;
            $nn = NN::where(['nnn_id' => $id, 'city_id' => $id2])->orderBy('name', 'asc')->get();
            $view = view('Component.nn', compact('nn', 'oldId'))->render();
            return ['success' => true, 'view' => $view];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Get Ward */
    function getWard(Request $request)
    {
        try {
            $id = $request->id;
            $oldId = $request->oldId;
            $ward = Ward::where('nn_id', $id)->orderBy('ward_no', 'asc')->get();
            $view = view('Component.ward', compact('ward', 'oldId'))->render();
            return ['success' => true, 'view' => $view];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Get Section */
    function getSection(Request $request)
    {
        try {
            $id = $request->id;
            $oldId = $request->oldId;
            $sections = Section::where('part_id', $id)->orderBy('section_no', 'asc')->get();
            $view = view('Component.sections', compact('sections', 'oldId'))->render();
            return ['success' => true, 'view' => $view];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Get part */
    function getPart(Request $request)
    {
        try {
            $id = $request->id;
            $oldId = $request->oldId;
            $part_nos = PartNo::where('ward_id', $id)->orderBy('part_no', 'asc')->get();
            $view = view('Component.part_nos', compact('part_nos', 'oldId'))->render();
            return ['success' => true, 'view' => $view];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Get Section data */
    function getSectionData(Request $request)
    {
        try {
            $id = $request->id;
            $oldId = $request->oldId;
            $totalAllotted = 0;
            $sectionData = Section::find($id);
            $allotted = User::where('section_id', $id)->get();
            if (count($allotted)) {
                foreach ($allotted as $key => $value) {
                    $currentCount = $value->s_no_to - $value->s_no_from + 1;
                    $totalAllotted = $totalAllotted + $currentCount;
                }
            }
            return ['success' => true, 'data' => $sectionData, 'totalAllotted' => $totalAllotted];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    function uploadImageIndex(Request $request)
    {
        try {
            $state = State::orderBy('state_name', 'asc')->get();
            $nnn_type = NNNType::orderBy('name', 'asc')->get();
            return view('uploadImages', compact('state', 'nnn_type'));
        } catch (\Exception $exception) {
        }
    }
    function uploadImage(Request $request)
    {
        // return $request->all();

        $originalImage = $request->file('image');
        $brackPoints = explode(",", $request->breakPoints);
        $s_no = 0;
        $originalPath = 'images/';
        $cropPath = 'crop/';
        $cropBlogPath = 'cropBlogs/';
        if (!file_exists($originalPath)) {
            mkdir($originalPath, 666, true);
        }
        if (!file_exists($cropPath)) {
            mkdir($cropPath, 666, true);
        }
        if (!file_exists($cropBlogPath)) {
            mkdir($cropBlogPath, 666, true);
        }
        foreach ($originalImage as $index1 => $list) {

            $mainCropImage1 = Image::make($originalImage[$index1]);
            $mainCropImage1->crop(1127, 1512, 59, 142);
            $pathOrg = $originalPath . time() . $originalImage[$index1]->getClientOriginalName();
            $mainCropImage1->save($pathOrg);
            $data = file_get_contents($pathOrg);
            $initWidth = 377;
            $initHeight = 149;
            $initX = 0;
            $initY = 0;
            $rows = 1;
            $blockNo = 1;
            $blank = true;
            for ($i = 1; $i <= 30; $i++) {
                if ($blank) {
                    $s_no = $s_no + 1;
                    $mainCropImage = Image::make($data);
                    $mainCropImage->crop($initWidth, $initHeight, $initX, $initY);
                    // $type = $request->file('image')->getClientOriginalExtension();
                    // $data = file_get_contents($mainCropImage->dirname . '/' . $mainCropImage->basename);

                    // $paath = $cropBlogPath . time() . '_' . $i . $originalImage[$index1]->getClientOriginalName();
                    // $mainCropImage->save($paath);
                    // $response2 = (new TesseractOCR($paath))
                    //     ->lang('hin', 'eng')
                    //     ->executable('C:\Program Files\Tesseract-OCR/tesseract.exe')
                    //     ->run();
                    $response2 = true;
                    if (in_array($s_no, $brackPoints)) {
                        $blank = false;
                    }
                    if ($response2) {
                        $mainCropImage->save($cropPath  . str_pad($s_no, 3, 0, STR_PAD_LEFT) . '.' . $originalImage[$index1]->getClientOriginalExtension());
                        $mod = fmod($i, 3);
                        if ($mod == 0) {
                            $rows = $rows + 1;
                            $blockNo = 1;
                        } else {
                            $blockNo = $blockNo + 1;
                        }
                        if ($rows == 1) {
                            if ($blockNo == 1) {
                                $initX = 0;
                            } else {
                                $initX = $initX + 377;
                            }
                        }
                        if ($rows == 2) {
                            if ($blockNo == 1) {
                                $initX = 0;
                                $initY = $initY + 151;
                            } else {
                                $initX = $initX + 377;
                            }
                        }
                        if ($rows == 3) {
                            if ($blockNo == 1) {
                                $initX = 0;
                                $initY = $initY + 151;
                            } else {
                                $initX = $initX + 377;
                            }
                        }
                        if ($rows == 4) {
                            if ($blockNo == 1) {
                                $initX = 0;
                                $initY = $initY + 151;
                            } else {
                                $initX = $initX + 377;
                            }
                        }
                        if ($rows == 5) {
                            if ($blockNo == 1) {
                                $initX = 0;
                                $initY = $initY + 152;
                            } else {
                                $initX = $initX + 377;
                            }
                        }
                        if ($rows == 6) {
                            if ($blockNo == 1) {
                                $initX = 0;
                                $initY = $initY + 151;
                            } else {
                                $initX = $initX + 377;
                            }
                        }
                        if ($rows == 7) {
                            if ($blockNo == 1) {
                                $initX = 0;
                                $initY = $initY + 151;
                            } else {
                                $initX = $initX + 377;
                            }
                        }
                        if ($rows == 8) {
                            if ($blockNo == 1) {
                                $initX = 0;
                                $initY = $initY + 150;
                            } else {
                                $initX = $initX + 377;
                            }
                        }
                        if ($rows == 9) {
                            if ($blockNo == 1) {
                                $initX = 0;
                                $initY = $initY + 151;
                            } else {
                                $initX = $initX + 377;
                            }
                        }
                        if ($rows == 10) {
                            if ($blockNo == 1) {
                                $initX = 0;
                                $initY = $initY + 150;
                            } else {
                                $initX = $initX + 377;
                            }
                        }
                    }
                }
            }
        }
        return ['success' => true, 'message' => 'Image(s) uploaded'];
        return back()->with('success', 'Saved successfully');
    }


    /**Get Polling booth */
    function getPolling(Request $request)
    {
        try {
            $id = $request->id;
            $oldId = $request->oldId;
            $pollings = Polling::where('part_id', $id)->orderBy('polling_no', 'asc')->get();
            $view = view('Component.pollings', compact('pollings', 'oldId'))->render();
            return ['success' => true, 'view' => $view];
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
    /**Logout Admin Parshad */
    function adminLogout(Request $request)
    {
        try {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->with('success', 'You have successfully loged out');
        } catch (\Exception $exception) {
            return ['success' => false, 'message' => 'Server error', 'exception' => $exception->getMessage()];
        }
    }
}
