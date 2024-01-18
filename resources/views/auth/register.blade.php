@extends('layouts.guest')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="page page-center">
        <div class="container container-normal py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg">
                    <div class="container container-tight py-4">
                        <div class="text-center mb-4">
                            <a href="." class="navbar-brand navbar-brand-autodark">
                                <img src="./static/logo.svg" width="110" height="32" alt="Tabler"
                                    class="navbar-brand-image">
                            </a>
                        </div>
                        <form class="card card-md" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <h2 class="card-title text-center mb-4">Create new account</h2>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Name') }}</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="{{ __('Name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Email address') }}</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="{{ __('Email Address') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Password') }}</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="{{ __('Password') }}">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Repeat Password') }}</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                                        placeholder="{{ __('Repeat Password') }}">
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary w-100">Create new account</button>
                                </div>
                            </div>
                        </form>
                        <div class="text-center text-secondary mt-3">
                            Already have account? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg d-none d-lg-block">
                    <img src="{{ asset('dist/static/illustrations/undraw_terms_re_6ak4.svg') }}" height="300"
                        class="d-block mx-auto" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
