<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\EtudiantsController;
use App\Http\Controllers\ProfsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\mesCoursController;


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/enroll', function () {
    return view('enroll');
})->name('enroll');

Route::get('/', function () {
    return view('homePage');
})->name('homePage');



// ---------------------- Etudiants ----------------------
Route::get('/etudiants', [EtudiantsController::class,'index'])->name('etudiants.index');
Route::get('/etudiants/create', [EtudiantsController::class,'create'])
    ->middleware(['auth', 'role:admin,etudiant'])
    ->name('etudiants.create');
Route::post('/etudiants', [EtudiantsController::class,'store'])->name('etudiants.store');
Route::get('/etudiant/{id}', [EtudiantsController::class,'destroy'])->name('etudiants.destroy');
Route::get('/etudiant/{id}/edit', [EtudiantsController::class,'edit'])->name('etudiants.edit');
Route::post('/etudiant/{id}', [EtudiantsController::class,'update'])->name('etudiants.update');
Route::get('/etudiant/{id}/details', [EtudiantsController::class,'details'])->name('etudiants.details');

// ---------------------- Cours ----------------------
Route::get('/cours', [CoursController::class,'index'])->name('cours.index');
Route::get('/cours/create', [CoursController::class,'create'])->name('cours.create');
Route::post('/cours', [CoursController::class,'store'])->name('cours.store');
Route::get('/cour/{id}', [CoursController::class,'destroy'])->name('cours.destroy');
Route::get('/cour/{id}/edit', [CoursController::class,'edit'])->name('cours.edit');
Route::post('/cour/{id}', [CoursController::class,'update'])->name('cours.update');
Route::get('/cour/{id}/details', [CoursController::class,'details'])->name('cours.details');

// ---------------------- Profs ----------------------
Route::get('/professeurs', [ProfsController::class,'index'])->name('profs.index');
Route::get('/professeurs/create', [ProfsController::class, 'create'])
    ->middleware(['auth', 'role:admin'])
    ->name('profs.create');

Route::post('/professeurs', [ProfsController::class,'store'])->name('profs.store');
Route::get('/professeur/{id}', [ProfsController::class,'destroy'])->name('profs.destroy');
Route::get('/professeur/{id}/edit', [ProfsController::class,'edit'])->name('profs.edit');
Route::post('/professeur/{id}', [ProfsController::class,'update'])->name('profs.update');
Route::get('/professeur/{id}/details', [ProfsController::class,'details'])->name('profs.details');

// ---------------------- Dashboards ----------------------
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:professeur'])->group(function () {
    Route::get('/professeur/dashboard', [ProfsController::class, 'index'])->name('professeur.dashboard');
});

Route::middleware(['auth', 'role:etudiant'])->group(function () {
    Route::get('/etudiant/dashboard', [EtudiantsController::class, 'index'])->name('etudiant.dashboard');
});

// ---------------------- Auth ----------------------
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// معالجة تسجيل الدخول (POST)
Route::post('/login', [LoginController::class, 'login']);

// صفحة التسجيل (عرض الفورم)
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// معالجة التسجيل (POST)
Route::post('/register', [RegisterController::class, 'register']);




// تسجيل الخروج
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('homePage');
})->name('logout');


//////////////////
Route::get('/mes-cours', [mesCoursController::class, 'index'])
    ->middleware(['auth', 'role:professeur'])
    ->name('cours.index');

// صفحات عامة