<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ReportController;

Route::get('/', function () { 
    return redirect()->route('students.index'); 
}); 
  
Route::resource('students', StudentController::class);

Route::get('/schedules', [ScheduleController::class, 'index']);

Route::resource('schedules', ScheduleController::class);

Route::get('/reports', [ReportController::class, 'index'])
    ->name('reports.index');