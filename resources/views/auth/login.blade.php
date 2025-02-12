@extends('Layouts.userLayout')

@section('content')

    <body class=" d-flex flex-column">
        <script src="./dist/js/demo-theme.min.js?1684106062"></script>
        <div class="page page-center">
            <div class="container container-tight py-4 " style="width:32% ;">
                <div class="text-center mb-4">
                    <a href="." class="navbar-brand navbar-brand-autodark">
                        {{-- <img src="./static/logo.svg" height="36"
                            alt=""> --}}
                    </a>
                </div>
                <div class="login-card">
                    <div class="card-body">
                        <h2 class="h4 text-center mb-4">Login to your account</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST" autocomplete="off" novalidate>
                            @csrf
                            <div class="mb-3">
                                {{-- <label class="form-label">Email address</label> --}}
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>

                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="your@email.com"
                                    autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                            <div class="mb-2">
                                <label for="password" class="form-label ">{{ __('Password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Your password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- </div> --}}
                            </div>

                            <div class="mb-2">
                                <label class="form-check" for="remember">
                                    {{ __('Remember Me') }}
                                    <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }} />
                                    <span class="form-check-label">On This Device</span>
                                </label>
                            </div>
                            <div class="form-footer mb-2">
                                <button type="submit" class="btn btn-primary w-100"> {{ __('Login') }}</button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link mb-4" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                    {{-- <div class="hr-text">or</div> --}}
                    <div class="d-flex align-items-center justify-content-center hr-text">or</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><a href="#" class="btn w-100">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                                    </svg>
                                    Login with Github
                                </a></div>
                            <div class="col"><a href="#" class="btn w-100">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-twitter" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" />
                                    </svg>
                                    Login with Twitter
                                </a></div>
                        </div>
                    </div>
                </div>
                <div class="text-center text-muted mt-3">
                    Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
                </div>
            </div>
        </div>
        <!-- Libs JS -->
        <!-- Tabler Core -->
        <script src="./dist/js/tabler.min.js?1684106062" defer></script>
        <script src="./dist/js/demo.min.js?1684106062" defer></script>
    </body>
@endsection
