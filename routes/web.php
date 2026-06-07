<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListUp;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TaskBoardController;
use App\Http\Controllers\UpdateSalary;
use App\Http\Controllers\WorkTimeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsssignController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/main', [WorkTimeController::class, 'index']);
    Route::post('/main/post', [WorkTimeController::class, 'go']);
    Route::post('/main/end', [WorkTimeController::class, 'end']);
    Route::get('/main/list', [WorkTimeController::class, 'get']);

    // メインページその2
    Route::get('/toDo/main', [MainController::class, 'get']);

    // * お知らせ
    Route::get('/toDo/notification/{id}', [NotificationController::class, 'get'])->name('notification.open');

    //* タスクボード
    Route::get('/toDo/board', [TaskBoardController::class, 'get']);
    Route::get('/toDo/board/act', [TaskBoardController::class, 'act'])->name('board.form');
    Route::post('/toDo/board/add', [TaskBoardController::class, 'add'])->name('board.add');
    Route::post('/toDo/board/status', [TaskBoardController::class, 'update'])->name('board.status');

    // todo アサインボード
    Route::get('/toDo/assign', [AsssignController::class, 'index']);
    Route::post('/toDo/assign/step1', [AsssignController::class, 'step1'])->name('assign.step1');
    Route::post('/toDo/assign/step2', [AsssignController::class, 'step2'])->name('assign.step2');
    Route::post('/toDo/assigin/step3', [AsssignController::class, 'step3'])->name('assign.step3');


    Route::get('/salary', function () {
        return view('salary');
    });
    Route::post('/salary/update', [UpdateSalary::class, 'up']);

    Route::get('/list', function () {
        return view('list');
    });
    Route::post('/list/narrow', [ListUp::class, 'list']);

    // カレンダー
    Route::get('/main/calendar', function () {
        return view('calender');
    });
    Route::get('/main/schedules', [ScheduleController::class, 'get']);
    Route::post('/main/a', [ScheduleController::class, 'register']);

    // タスク管理
    Route::get('/main/toDo', function () {
        return view('toDo.main');
    });
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/working', [AdminController::class, 'working']);
    Route::get('/admin/salary_total', [AdminController::class, 'monthlySalaryTotal']);

    // 申請リスト一覧
    Route::get('/admin/request', function () {
        return view('admin.request');
    });

    // 給与変更の承認
    Route::get('/admin/salaryList', [AdminController::class, 'salaryList']);
    Route::post('/admin/salary/{salaryRequest}/approve', [AdminController::class, 'approve']);
    Route::post('/admin/salary/{Request}/reject', [AdminController::class, 'reject']);

    // ガントチャートテスト
    Route::get('/admin/chartList', [AdminController::class, 'shift']);
    Route::get('/admin/chartList/get', [AdminController::class, 'get']);
    Route::post('/admin/chartList/approved', [AdminController::class, 'shiftApproved']);
});

require __DIR__.'/auth.php';

// テスト
