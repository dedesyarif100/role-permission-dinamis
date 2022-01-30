{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}


<html lang="en">
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <style>
        #show_password {
            cursor: pointer;
        }
        .register:hover {
            text-decoration: underline;
        }
        .register {
            float: right;
        }
    </style>
</head>
<body style="">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="d-md-flex">
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Register</h3>
                                </div>
                            </div>
                            <form action="{{ route('register') }}" method="POST" class="signin-form">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" required="">
                                    <span class="text-danger error-text email_error"></span>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" required="">
                                    <span class="text-danger error-text email_error"></span>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <div class="input-group-append">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">
                                        <span class="text-danger error-text password_error"></span>
                                    </div>
                                    {{-- <div class="show">
                                        <input type="checkbox" id="show_password" onclick="password_show_hide()">
                                        <label for="show_password"> Show Password </label>
                                    </div> --}}
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="password">Confirm Password</label>
                                    <div class="input-group-append">
                                        <input type="password" name="password_confirmation" class="form-control" id="password" placeholder="Confirm Password" required="">
                                        <span class="text-danger error-text password_confirmation_error"></span>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="show">
                                                <input type="checkbox" id="show_password" onclick="password_show_hide()">
                                                <label for="show_password"> Show Password </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="show">
                                                Already a user?
                                                <a href="{{ route('login') }}" class="register justify-content-end">
                                                    Login
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control submit" style="color: white; ">Register</button>
                                </div>
                                {{-- <div class="form-group">
                                    <a class="form-control btn btn-success text-red-200 btn-sm" href="{{ ssoHostUrl() }}">Login with SSO</a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<script>
    function password_show_hide() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
