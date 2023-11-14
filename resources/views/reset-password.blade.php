<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ================ Admin Panel(googleleapis cdn link) Custom Css file ================= -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
    <link href='https://fonts.googleapis.com/css?family=Faster One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Archivo Black' rel='stylesheet'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/support_asset/auth/css/auth-main.css">
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/support_asset/auth/css/doctor-login.css">
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/support_asset/auth/css/register.css">
    <link rel="icon" type="shortcut icon" href="{{asset('backend_asset')}}/main_asset/img/com-black-favicon.png">
    <title>Reset Password</title>
</head>
<header class="bg sticky-top">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" id="topBar_tigger">
        <p class="navbar-brand ps-3 admin_panel text-shadow" style="float: right;">
            <span class="skeleton"><img class="mt-1 company_logo" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt=""></span>
            <span class="skeleton">{{setting('company_name')}}</span>
        </p>
    </nav>
</header>

<body class="register_background-color">
    <div class="loader hidden">
        <img src="{{asset('/image/loader/load-30.gif')}}" alt="Loading...." />
    </div>
    <div class="hero-image">
        <div class="hero-text heading">
            <h1 class="company_heading" style="font-size:50px;color:darkblue;text-align:left">
                <i class="fa-solid fa-stethoscope fa-beat-fade"></i>
                <span class="skeleton">{{setting('company_name')}}</span>
            </h1>
            <p class="address skeleton ps-2">{{setting('company_address')}}</p>
        </div>
    </div>

    <div class="container bg" style="margin-top: 62px;">
        <div class="row">
            <div class="col-md-12 mb-5">
                <h4 class="heading_admin_login text-shadow" style="text-align: center;">
                    <span class="skeleton">{{setting('reset_page_title')}}</span>
                </h4>
                <div class="card card-form-control">
                    <form action="{{ route('password.reset') }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="col-md-12">
                            @error('email')
                            <div class="alert alert-danger error_message">
                                {{ $message }}
                            </div>
                            @enderror

                            <div class="row">
                                <div class="container d-flex flex-column">
                                    <div class="row align-items-center justify-content-center mb-3 mt-3">
                                        <div class="col-12 col-md-8 col-lg-4">
                                            <div class="card forget_card">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <h5 class="skeleton lb_text">Change Password?</h5>
                                                        <p class="skeleton lb_text mb-1">Enter your registered email ID to reset the password
                                                        </p>
                                                    </div>
                                                    <input type="hidden" name="token" value="{{request()->input('token')}}" />
                                                    <div class="mb-2">
                                                        <label for="email" class="form-label skeleton lb_text">Email</label>
                                                        <input type="email" id="email" style="border: 1px solid rgba(0, 0, 0, 0.2);" class="form-control form-control-sm" name="email" placeholder="Enter Your Email" required="" value="{{request()->input('email')}}" readonly="" />
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="email" class="form-label skeleton lb_text">Password</label>
                                                        <input type="password" style="border: 1px solid rgba(0, 0, 0, 0.2);" class="form-control form-control-sm inpt_pass" name="password" placeholder="Enter Password" required="">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="email" class="form-label skeleton lb_text">Conform Password</label>
                                                        <input type="password" style="border: 1px solid rgba(0, 0, 0, 0.2);" class="form-control form-control-sm inpt_pass" name="password_confirmation" placeholder="Enter Confirm Password" required="">
                                                    </div>
                                                    <div class="mb-2 d-grid">
                                                        <button type="submit" class="btn btn-sm btn-primary forget_button register_btn">
                                                            Change Password
                                                        </button>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-12">
                @if(Session::has('success'))
                <p id="success_message" class="background_success" style="color:green;">{{ Session::get('success') }}</p>
                @endif
            </div>
        </div>
    </div>
    @include('auth-js.register-ajax')
    <!-- Boostrap5 JS Table Filter -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- JQUERY CDN LINK -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Sweet Alert CDN LINK -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script src="{{asset('backend_asset')}}/support_asset/auth/js/loader.min.js"></script>
    <script src="{{asset('backend_asset')}}/support_asset/auth/js/img.js"></script>

    <script>
        // skeleton
        function fetchData(){
            const  allSkeleton = document.querySelectorAll('.skeleton')
        
            allSkeleton.forEach(item=>{
                item.classList.remove('skeleton')
            });
        }

        setTimeout(() => {
            fetchData();
        }, 1000);
    </script>
</body>

</html>