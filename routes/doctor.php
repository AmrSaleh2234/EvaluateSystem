<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Actors\DoctorController;
//admin make this actions
Route::middleware(['Admin'])->group(function (){
    Route::get('doctor/all',[DoctorController::class,'allDoctors'])->name('doctor.all');
    Route::get('doctor/delete/{user}',[DoctorController::class,'destroy'])->name('doctor.delete');


});


Route::middleware(['AdminAndDoctor'])->group(function (){
    Route::get("proctoring/{quiz}/{user}",[\App\Http\Controllers\WindowLog::class,'detalisForStudent'])->name("proctoring.details");
    Route::get("proctoring-window-event/{quiz}/{user}",[\App\Http\Controllers\WindowLog::class,'windowEvent'])->name("proctoring.window");
    Route::get("proctoring-total/{quiz}/{user}",[\App\Http\Controllers\WindowLog::class,'totaLogs'])->name("proctoring.total");
    Route::get("proctoring-person/{quiz}/{user}",[\App\Http\Controllers\WindowLog::class,'personStatus'])->name("proctoring.person");
    Route::get("proctoring-mobile/{quiz}/{user}",[\App\Http\Controllers\WindowLog::class,'mobileDetect'])->name("proctoring.mobile");
    Route::get("proctoring-voice/{quiz}/{user}",[\App\Http\Controllers\WindowLog::class,'voice'])->name("proctoring.voice");
});
Route::resource('doctor', 'Actors\DoctorController');
