<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beverages Admin | Login</title>

    <!-- Bootstrap -->
    <link href="{{ asset('adminAssets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('adminAssets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('adminAssets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('adminAssets/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('adminAssets/build/css/custom.min.css') }}" rel="stylesheet">
</head>
<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form  method="POST" action="{{ route('loginAdmin') }}">
                        @csrf
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="user_name" required />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password" required />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">Log in</button>
                            <a class="reset_pass" href="{{ route('password.request') }}">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="{{ route('register') }}" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-graduation-cap"></i> Beverages Admin</h1>
                                <p>©2016 All Rights Reserved. Beverages Admin is a Bootstrap 4 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="{{ asset('adminAssets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('adminAssets/vendors/nprogress/nprogress.js') }}"></script>
</body>
</html>
