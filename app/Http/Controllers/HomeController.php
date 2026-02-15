<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        return match ($user->role) {
            'admin' => view('admin.dashboard'),
            'professeur' => view('professeur.dashboard'),
            'etudiant' => view('etudiant.dashboard'),
            default => view('home'),
        };
    }
}