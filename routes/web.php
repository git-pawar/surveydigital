<?php

use App\Http\Controllers\MasterController;
use App\Http\Controllers\ParshadController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('create-admin', [MasterController::class, 'createAdmin'])->name('create.admin');
Route::get('get-city', [MasterController::class, 'getCity'])->name('getCity');
Route::get('get-nn', [MasterController::class, 'getNN'])->name('getNN');
Route::get('get-ward', [MasterController::class, 'getWard'])->name('getWard');
Route::get('get-section', [MasterController::class, 'getSection'])->name('getSection');
Route::get('get-section-data', [MasterController::class, 'getSectionData'])->name('getSectionData');
Route::get('get-polling', [MasterController::class, 'getPolling'])->name('getPolling');
Route::get('get-part', [MasterController::class, 'getPart'])->name('getPart');
Route::post('admin/login', [MasterController::class, 'adminLogin'])->name('admin.login.process');

Route::group(['middleware' => 'auth.admin'], function () {
    Route::get('login', [MasterController::class, 'indexLoginAdminParshad'])->name('admin.login');
    Route::get('admin/dashboard', [MasterController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('admin/create-parshad', [MasterController::class, 'createParshad'])->name('admin.create.parshad');
    Route::get('admin/create-warduser', [MasterController::class, 'createWardUser'])->name('admin.create.ward.user');
    Route::post('admin/store-parshad', [MasterController::class, 'storeParshad'])->name('admin.create.parshad.process');
    Route::post('admin/store-warduser', [MasterController::class, 'storeWardUser'])->name('admin.create.ward.user.process');
    Route::get('admin/list-parshad', [MasterController::class, 'parshadList'])->name('admin.list.parshad');
    Route::get('admin/list-warduser', [MasterController::class, 'wardUserList'])->name('admin.list.warduser');
    Route::get('admin/edit-warduser/{id}', [MasterController::class, 'wardUserEdit'])->name('admin.edit.warduser');
    Route::get('admin/edit-parshad/{id}', [MasterController::class, 'parshadEdit'])->name('admin.edit.parshad');
    Route::get('admin/image/upload', [MasterController::class, 'uploadImageIndex'])->name('admin.image.upload.index');
    Route::post('admin/image/upload', [MasterController::class, 'uploadImage'])->name('admin.image.upload');
    Route::post('admin/delete-parshad/{id}', [MasterController::class, 'parshadDelete'])->name('admin.delete.parshad');
    Route::post('admin/delete-warduser/{id}', [MasterController::class, 'wardUserDelete'])->name('admin.delete.warduser');
    Route::get('admin/logout', [MasterController::class, 'adminLogout'])->name('admin.logout');
});

Route::post('login', [UserController::class, 'serveyorAgentLogin'])->name('login.process');
Route::group(['middleware' => 'auth.user'], function () {
    Route::get('/', [UserController::class, 'surveyorAgentIndex'])->name('login');
    // Route::get('login', [MasterController::class, 'serveyorAgentIndex'])->name('login');

    /**parshad surveyor */
    Route::get('parshad/create-surveyor', [ParshadController::class, 'surveyorCreate'])->name('parshad.create.surveyor');
    Route::post('parshad/store-surveyor', [ParshadController::class, 'surveyorStore'])->name('parshad.store.surveyor');
    Route::get('parshad/list-surveyor', [ParshadController::class, 'surveyorList'])->name('parshad.list.surveyor');
    Route::get('parshad/edit-surveyor/{id}', [ParshadController::class, 'surveyorEdit'])->name('parshad.edit.surveyor');
    Route::post('parshad/delete-surveyor/{id}', [ParshadController::class, 'surveyorDelete'])->name('parshad.delete.surveyor');
    /**parshad agent */
    Route::get('parshad/create-agent', [ParshadController::class, 'boothAgentCreate'])->name('parshad.create.booth.agent');
    Route::post('parshad/store-agent', [ParshadController::class, 'boothAgentStore'])->name('parshad.store.booth.agent');
    Route::get('parshad/list-agent', [ParshadController::class, 'boothAgentList'])->name('parshad.list.booth.agent');
    Route::get('parshad/edit-agent/{id}', [ParshadController::class, 'boothAgentEdit'])->name('parshad.edit.booth.agent');
    Route::post('parshad/delete-agent/{id}', [ParshadController::class, 'boothAgentDelete'])->name('parshad.delete.booth.agent');

    Route::get('dashboard', [UserController::class, 'surveyorAgentDashboard'])->name('dashboard');
    Route::get('survey-image', [UserController::class, 'surveyImageGet'])->name('survey.image.get');
    Route::get('survey-data', [UserController::class, 'insertData'])->name('surveyor.store.data');
    Route::get('short-survey', [UserController::class, 'shortSurvey'])->name('surveyor.short.survey');
    Route::post('survey-data-store', [UserController::class, 'surveyStoreData'])->name('survey.data.store');
    Route::get('survey-short-data-store', [UserController::class, 'surveyStoreShortData'])->name('survey.data.short.store');
    Route::get('booth-data', [UserController::class, 'insertData'])->name('agent.store.data');
    Route::post('booth-data-store', [UserController::class, 'boothStoreData'])->name('agent.data.store');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    // report
    Route::get('report-polingbooth', [ReportController::class, 'reportIndex'])->name('report.polingbooth');
    Route::get('report-survey', [ReportController::class, 'reportSurvey'])->name('report.survey');
    Route::get('report/{type}', [ReportController::class, 'reportpartview'])->name('report.typewise');
    Route::get('report/namewise', [ReportController::class, 'reportnameview'])->name('report.report.namewise');
    Route::get('report/voter/list', [ReportController::class, 'reportvoterlist'])->name('report.voterlist');
    Route::get('parshad/update/color', [UserController::class, 'updateColor'])->name('parshad.update.color');
    Route::get('report/voterlist/done', [ReportController::class, 'reportvoterlistdone'])->name('report.voterlist.done');
    Route::get('report/voterlist/pending', [ReportController::class, 'reportvoterlistpending'])->name('report.voterlist.pending');
    Route::get('report/voterlist/all', [ReportController::class, 'reportvoterlistall'])->name('report.voterlist.all');
    Route::get('report/partwise/list', [ReportController::class, 'reportpartwiselist'])->name('report.partwise.list');
});
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

//Clear config cache:
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});
// Clear view cache:
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});
Route::get('/storage-link', function () {
    $exitCode = Artisan::call('storage:link');
    return 'Storage linked';
});
