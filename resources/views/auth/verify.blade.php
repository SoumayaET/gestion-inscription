@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .verify-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .verify-card .card-header {
        background: transparent;
        border-bottom: none;
        font-size: 22px;
        font-weight: 600;
        text-align: center;
        padding-top: 25px;
    }

    .btn-primary {
        background: #667eea;
        border: none;
        border-radius: 8px;
        padding: 8px 25px;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background: #5a67d8;
    }

    .btn-link {
        text-decoration: none;
        color: #667eea;
        font-weight: 500;
    }

    .btn-link:hover {
        color: #5a67d8;
    }
</style>

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="col-md-6">
            <div class="card verify-card">
                <div class="card-header">
                    {{ __('Verify Your Email Address') }}
                </div>

                <div class="card-body text-center px-4 pb-4">

                    @if (session('resent'))
                        <div class="alert alert-success">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p class="mb-3">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                    </p>

                    <p>
                        {{ __('If you did not receive the email') }},
                    </p>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            {{ __('Click here to request another') }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
