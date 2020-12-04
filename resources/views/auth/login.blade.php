<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login - ArchitectUI HTML Bootstrap 4 Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{asset("./main.css")}}" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="d-none d-lg-block col-lg-4">
                        <div class="slider-light">
                            <div class="slick-slider">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('assets/images/originals/citydark.jpg');"></div>
                                        <div class="slider-content">
                                            <h3>Complex, but lightweight</h3>
                                            <p>We've included a lot of components that cover almost all use cases for any type of application.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <div class="app-logo"></div>
                            <h4 class="mb-0">
                                <span class="d-block">Welcome back,</span>
                                <span>Please sign in to your account.</span>
                            </h4>
                            <h6 class="mt-3">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a></h6>
                            <div class="divider row"></div>
                            <div>

                                @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                                <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus placeholder="Email here..."/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-grou">
                                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                                <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Password here..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative form-check">
                                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                                <label for="remember_me" class="form-check-label">
                                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
                                    </div>
                                    <div class="divider row"></div>

                                    <div class="d-flex align-items-center">
                                        <div class="ml-auto">
                                            @if (Route::has('password.request'))
                                            <a class="btn-lg btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a> @endif

                                            <x-jet-button class="btn btn-primary btn-lg">
                                                {{ __('Login') }}
                                            </x-jet-button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset("./assets/scripts/main.js")}}"></script>
</body>

</html>
