<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
});

require __DIR__ . '/auth.php';

use App\Http\Controllers\QuizController;

Route::get('/quiz', [QuizController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('quiz');

use App\Http\Controllers\ExamController;
use App\Http\Controllers\AhoController;

Route::get('/exam', [ExamController::class, 'show'])->name('exam.show');

Route::middleware(['auth', 'verified'])->prefix('aho')->name('aho.')->group(function () {
    Route::get('/', [AhoController::class, 'index'])->name('index');
    Route::post('/start', [AhoController::class, 'start'])->name('start');
    Route::get('/quiz/{part}', [AhoController::class, 'quiz'])->name('quiz');
    Route::post('/quiz/{part}', [AhoController::class, 'store'])->name('store');
    Route::get('/intermediate', [AhoController::class, 'intermediate'])->name('intermediate');
    Route::get('/loading', [AhoController::class, 'loading'])->name('loading');
    Route::get('/result', [AhoController::class, 'result'])->name('result');
});

