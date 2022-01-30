<html lang="en">
<head>
    <title>Login</title>
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
                                    <h3 class="mb-4">Login</h3>
                                </div>
                            </div>
                            <form action="{{ route('login') }}" method="POST" class="signin-form">
                                @csrf
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
                                    </div> <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="show">
                                                <input type="checkbox" id="show_password" onclick="password_show_hide()">
                                                <label for="show_password"> Show Password </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="show">
                                                <a href="{{ route('register') }}" class="register justify-content-end">
                                                    Register Here
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control submit" style="color: white; ">Login</button>
                                </div>
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
