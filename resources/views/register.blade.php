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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('backend_asset') }}/support_asset/auth/css/auth-main.css">
        <link rel="stylesheet" href="{{ asset('backend_asset') }}/support_asset/auth/css/doctor-login.css">
        <link rel="stylesheet" href="{{ asset('backend_asset') }}/support_asset/auth/css/register.css">
        <link rel="icon" type="shortcut icon" href="{{asset('backend_asset')}}/main_asset/img/com-black-favicon.png">
        <title>User Register</title>
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
            <div class="hero-text heading reg_hidden">
                <h1 class="company_heading" style="font-size:50px;color:darkblue;text-align:left">
                    <span class="skeleton"><i class="fa-solid fa-stethoscope fa-beat-fade"></i></span>
                    <span class="skeleton">{{setting('company_name')}}</span>
                </h1>
                <p class="address skeleton ps-2">{{setting('company_address')}}</p>
            </div>
        </div>

        <div class="container bg" style="margin-top: 62px;">
            <div class="row">
                <div class="col-md-12 mb-5" style="margin-top:px">
                    <h4 class="heading_admin_login text-shadow  ps-5" style="text-align: center;">
                        <span class="skeleton">{{setting('register_page_title')}}</span>
                    </h4>
                    <div class="card card-form-control">
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                @if(Session::get('fail'))
                                <div class="alert alert-danger error_message">
                                    {{Session::get('fail')}}
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label class="lable_password skeleton" for="name">Name :</label>
                                            <input class="mt-3 register filed_src" type="text" name="name" placeholder="&#xf007; Enter name" value="{{old('name')}}" autofocus>
                                            <span><i class="search-icon fa fa-spinner fa-spin search-hidden"></i></span>
                                            <span class="text-danger name_message">@error('name')
                                                <i class="fa-regular fa-hand-point-right fa-beat" style="color: #003ea8;"></i>
                                                {{$message}}@enderror
                                            </span><br>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label class="lable_password skeleton" for="contract_number">Contract-Number :</label>
                                            <input class="mt-3 contract" type="text" name="contract_number" placeholder="&#xf10b; Enter contract number" value="{{old('contract_number')}}">
                                            <i class="contract-icon fa fa-spinner fa-spin contract-hidden"></i>
                                            <span class="text-danger contact_message">@error('contract_number')
                                                <i class="fa-regular fa-hand-point-right fa-beat" style="color: #003ea8;"></i>
                                                {{$message}}@enderror
                                            </span><br>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label class="label_email skeleton" for="email">Email :</label>
                                            <input class="mt-3 reg_email" type="text" name="email" placeholder="&#xf0e0; Enter Email Address" value="{{old('email')}}">
                                            <i class="email-icon fa fa-spinner fa-spin email-hidden"></i>
                                            <span class="text-danger email_message">@error('email')
                                                <i class="fa-regular fa-hand-point-right fa-beat" style="color: #003ea8;"></i>
                                                {{$message}}@enderror
                                            </span><br>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label class="lable_password skeleton" for="password">Password :</label>
                                            <input class="password" type="password" name="password" placeholder="&#xf13e; Enter Password" value="{{old('password')}}">
                                            <i class="password-icon fa fa-spinner fa-spin password-hidden"></i>
                                            <span class="text-danger input_message">@error('password')
                                                <i class="fa-regular fa-hand-point-right fa-beat" style="color: #003ea8;"></i>
                                                {{$message}}@enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label class="lable_password skeleton" for="password">Confirm-Password :</label>
                                            <input class="confirm confrim-password" type="password" name="password_confirmation" placeholder="&#xf13e; Enter Password">
                                            <i class="confrim-password-icon fa fa-spinner fa-spin confrim-password-hidden"></i>
                                            <span class="text-danger contact_message">@error('password')
                                                <i class="fa-regular fa-hand-point-right fa-beat" style="color: #003ea8;"></i>
                                                {{$message}}@enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <span class="image_size" style="text-transform: uppercase;">150 x 150 (px)</span>
                                            <div class="img-area" id="registerAnimation">
                                                <span class="skeleton"><img class="register_img" id="output" src="{{asset('backend_asset')}}/main_asset/img/undraw_profile.svg" alt="Image 500X500"></span>
                                            </div>
                                            <input accept="image/*" type='file' id="imgInput" class="image mt-2" name="image" onchange="loadFile(event)">
                                            <span class="text-danger photo_message">@error('image')
                                                <i class="fa-regular fa-hand-point-right fa-beat" style="color: #003ea8;"></i>
                                                {{$message}}@enderror
                                            </span><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2 offset-md-10">
                                        <div class="form-group ms-4">
                                            <button type="submit" class="btn btn-sm btn-primary login_button button_margin register_btn" id="reg_submit">
                                                <i class="register-icon fa fa-spinner fa-spin register-hidden"></i>
                                                <span class="btn-text">Register</span>
                                            </button>
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
        <script>
            $(document).ready(function(){
                $("#registerAnimation").addClass('loginForm');
            });
        </script>
    </body>

</html>