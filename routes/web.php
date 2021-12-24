<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});

Auth::routes([
    'register' => false, 
    'reset' => false, 
    'verify' => false, 
  ]);

  

  Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('project', App\Http\Controllers\ProjectController::class);
    
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/login');
    });
  });



  Route::middleware(['auth','isProjectManager'])->group(function () {
      Route::resource('staff', App\Http\Controllers\StaffController::class);
        Route::resource('project-leader', App\Http\Controllers\ProjectLeaderController::class);
  });

  
    Route::middleware(['auth', 'isProjectLeader'])->group(function () {
        Route::resource('team-member', App\Http\Controllers\TeamMemberController::class);

    });

