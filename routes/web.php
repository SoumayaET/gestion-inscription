<?php

use App\Http\Controllers\CoursController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantsController;
use App\Http\Controllers\ProfsController;

// Route::get('/', function () {
//     return view('welcome');
// });
 Route::get('/', function () {
     return view('home');
 })->name('home');
 Route::get('/aboutPage', function () {
     return view('about');
 })->name('about');
 Route::get('/404Page', function () {
     return view('404');
 })->name('404');
 Route::get('/contactPage', function () {
     return view('contact');
 })->name('contact');
 Route::get('/cours', function () {
     return view('cours');
 })->name('cours.index');
Route::get('/etudiants', function () {
     return view('etudiants');
 })->name('etudians.index');

 Route::get('/profs', function () {
     return view('profs');
 })->name('profs.index');
//  Route::get('/instructor-profilePage', function () {
//      return view('instructor-profile');
//  })->name('instructor-profile');
//  Route::get('/starter-pagePage', function () {
//      return view('starter-page');
//  })->name('starter');
//  Route::get('/termsPage', function () {
//      return view('terms');
//  });

//  Route::get('/pricingPage', function () {
//      return view('pricing');
//  })->name('pricing');
 Route::get('/enrollPage', function () {
     return view('enroll');
 })->name('enroll');


 // pour inscription - Etudiatn
 
 Route::get('/etudiants', [EtudiantsController::class,'index'])->name('etudians.index');
 Route::get('/create_etudiants', [EtudiantsController::class,'create'])->name('etudians.create');
 Route::post('/store_etudiants', [EtudiantsController::class,'store'])->name('etudians.store');
 Route::get('/delete_etudiants', [EtudiantsController::class,'delete'])->name('etudians.delete');
 Route::post('/edit', [EtudiantsController::class,'edit'])->name('etudians.edit');
 Route::post('/edit', [EtudiantsController::class,'edit'])->name('etudians.edit');

  // pour Cours
 
 Route::get('/cours', [CoursController::class,'index'])->name('cours.index');
 Route::get('/create_cours', [CoursController::class,'create'])->name('cours.create');
 Route::post('/store_cours', [CoursController::class,'store'])->name('cours.store');
 Route::get('/delete_cours', [CoursController::class,'delete'])->name('cours.delete');
 Route::post('/edit', [CoursController::class,'edit'])->name('cours.edit');
 Route::post('/edit', [CoursController::class,'edit'])->name('cours.edit');

   // pour Profs
 
 Route::get('/profs', [ProfsController::class,'index'])->name('profs.index');
 Route::get('/create_profs', [ProfsController::class,'create'])->name('profs.create');
 Route::post('/store_profs', [ProfsController::class,'store'])->name('profs.store');
 Route::get('/delete_profs', [ProfsController::class,'delete'])->name('profs.delete');
 Route::post('/edit', [ProfsController::class,'edit'])->name('profs.edit');
 Route::post('/edit', [ProfsController::class,'edit'])->name('profs.edit');

 