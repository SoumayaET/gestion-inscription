@extends('layouts.app')

@section('contenu')
<style>
    body {
        background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .register-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .register-card .card-header {
        background: transparent;
        border-bottom: none;
        font-size: 22px;
        font-weight: 600;
        text-align: center;
        padding-top: 25px;
    }

    .form-control {
        border-radius: 8px;
        padding: 10px;
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
</style>

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="col-md-6">
            <div class="card register-card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body px-4 pb-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name"
                                   value="{{ old('name') }}"
                                   required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password"
                                   required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password"
                                   class="form-control"
                                   name="password_confirmation"
                                   required autocomplete="new-password">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
