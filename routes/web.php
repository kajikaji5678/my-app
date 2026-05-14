<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListUp;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UpdateSalary;
use App\Http\Controllers\WorkTimeController;
use Illuminate\Support\Facades\Route;

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
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/working', [AdminController::class, 'working']);
    Route::get('/admin/salary_total', [AdminController::class, 'monthlySalaryTotal']);

    // 申請リスト一覧
    Route::get('/admin/request', function () {
        return view('/admin/request');
    });

    // 給与変更の承認
    Route::get('/admin/salaryList', [AdminController::class, 'salaryList']);
    Route::post('/admin/salary/{salaryRequest}/approve', [AdminController::class, 'approve']);
    Route::post('/admin/salary/{Request}/reject', [AdminController::class, 'reject']);
});

require __DIR__.'/auth.php';
