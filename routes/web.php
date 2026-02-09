<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantsController;

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
 Route::get('/coursesPage', function () {
     return view('courses');
 })->name('courses');
Route::get('/etudiants', function () {
     return view('etudiants');
 })->name('etudians.index');

 Route::get('/instructorPage', function () {
     return view('instructor');
 })->name('instructor');
 Route::get('/instructor-profilePage', function () {
     return view('instructor-profile');
 })->name('instructor-profile');
 Route::get('/starter-pagePage', function () {
     return view('starter-page');
 })->name('starter');
 Route::get('/termsPage', function () {
     return view('terms');
 });

 Route::get('/pricingPage', function () {
     return view('pricing');
 })->name('pricing');
 Route::get('/enrollPage', function () {
     return view('enroll');
 })->name('enroll');


 // pour inscription 
 
 Route::get('/etudiants', [EtudiantsController::class,'index'])->name('etudians.index');
 Route::get('/create_etudiants', [EtudiantsController::class,'create'])->name('etudians.create');
 Route::post('/store_etudiants', [EtudiantsController::class,'store'])->name('etudians.store');
 Route::get('/delete_etudiants', [EtudiantsController::class,'delete'])->name('etudians.delete');
 Route::post('/edit', [EtudiantsController::class,'edit'])->name('etudians.edit');
 Route::post('/edit', [EtudiantsController::class,'edit'])->name('etudians.edit');