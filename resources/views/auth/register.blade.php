@extends('Layouts.userLayout')

@section('content')
<body class="d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
        <div class="container container-tight py-4" style="width: 100%; max-width: 800px;">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark">
                    <img src="./static/logo.svg" height="36" alt="">
                </a>
            </div>

            <form class="card card-md" action="{{ route('register') }}" method="POST" autocomplete="off" novalidate style="width: 100%; max-width: 750px; min-height: 450px;">
                @csrf
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Create new account</h4>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold ml-2">{{ __('First Name') }}</label>
                            <input id="first_name" type="text"
                                   class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                   value="{{ old('first_name') }}" required autocomplete="first_name"
                                   placeholder="Enter First Name" autofocus>
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold ml-2">{{ __('Last Name') }}</label>
                            <input id="last_name" type="text"
                                   class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                   value="{{ old('last_name') }}" required autocomplete="last_name"
                                   placeholder="Enter Last Name">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">{{ __('Email Address') }}</label>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">{{ __('Mobile Number') }}</label>
                            <input id="mobile" type="tel"
                                   class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                   value="{{ old('mobile') }}" required autocomplete="mobile"
                                   placeholder="Enter Mobile Number">
                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password" placeholder="Enter Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" />
                            <span class="form-check-label">Agree to the <a href="./terms-of-service.html"
                                    tabindex="-1">terms and policy</a>.</span>
                        </label>
                    </div>
                    <div class="form-footer d-flex align-items-center justify-content-center">
                        <button type="submit" class="btn btn-primary w-25">{{ __('Register') }}</button>
                    </div>
                </div>
            </form>

            <div class="text-center text-muted mt-3">
                Already have an account?
                <a href="./login" tabindex="-1">Sign in</a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js?1684106062" defer></script>
    <script src="./dist/js/demo.min.js?1684106062" defer></script>
</body>
@endsection
