<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Where to redirect users after sending reset link or login after reset.
     *
     * @return string
     */
    protected function redirectTo()
    {
        $user = Auth::user();

        if (!$user) {
            return '/login';
        }

        return match ($user->role) {
            'admin' => '/admin/dashboard',
            'professeur' => '/professeur/dashboard',
            'etudiant' => '/etudiant/dashboard',
            default => '/home',
        };
    }
}