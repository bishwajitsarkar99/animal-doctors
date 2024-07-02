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

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/support_asset/auth/css/auth-main.css">
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/support_asset/auth/css/doctor-login.css">
    <link rel="icon" type="shortcut icon" href="{{asset('backend_asset')}}/main_asset/img/com-black-favicon.png">
    <title>GST Medicine Login</title>
</head>
<header class="bg sticky-top">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" id="topBar_tigger">
        <p class="navbar-brand ps-3 admin_panel text-shadow" style="float: right;">
            <span class="skeleton media_text1"><img class="mt-1 company_logo" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt=""></span>
            <span class="skeleton media_text2">{{setting('company_name')}}</span>
        </p>
        <p class="navbar-brand ps- admin_panel text-shadow d-none d-md-inline-block form-inline ms-auto me-3 me-md-0 my-0 my-md-0">
            <a class="" href="{{setting('update_social_media_facebook_link')}}">
                <span class="social_icon"><img class="social_icon" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_social_media_facebook')}}" alt=""></span>
            </a>
            <a class="" href="{{setting('update_social_media_messanger_link')}}">
                <span class="social_icon_mess ms-2"><img class="social_icon_mess" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_social_media_messanger')}}" alt=""></span>
            </a>
            <a class="" href="{{setting('update_social_media_whatsapp_link')}}">
                <span class="social_icon_whatsapp"><img class="social_icon_whatsapp" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_social_media_whatsapp')}}" alt=""></span>
            </a>
        </p>
    </nav>
</header>

<body class="background-color">
    <div class="loader-login log_close">
        <img src="{{asset('/image/loader/load-30.gif')}}" alt="Loading...." />
    </div>
    <div class="hero-image">
        <div class="hero-text heading" id="page_head">
            <h1 class="company_heading ms-5 mt-5">
                <!-- <span class="skeleton"><img class="company_logo skeleton" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt=""></span> -->
                <span class="skeleton">{{setting('page_sub_title')}}</span>
            </h1>
            <p class="address skeleton ms-5">{{setting('company_address')}}</p>
        </div>
    </div>

    <h2 class="para mt-5"><span class="nav_head"><span class="lgo ms-3"></span> <span class="lgn ms-3"></span></span></h2>
    <div class="container bg" style="margin-top: 45px;">
        <div class="row">
            <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner skeleton">
                        <div class="carousel-item">
                            <img src="{{asset('image')}}/{{setting('update_slider1')}}" class="d-block w-100" alt="">
                        </div>
                        <div class="carousel-item active">
                            <img src="{{asset('image')}}/{{setting('update_slider2')}}" class="d-block w-100" alt="">
                            <div class="office_address">
                                <h1 class="skeleton">Online E-shop</h1>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('image')}}/{{setting('update_slider3')}}" class="d-block w-100" alt="">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-4 mb-5" style="margin-top:px">
                <h4 class="heading_admin text-shadow skeleton ps-3" style="text-align: center;"><span class="skeleton">{{ setting('login_page_title')}}</span></h4>
                <div class="card card-form-control login_card skeleton">
                    <form id="loginForm" action="{{ route('login') }}" method="POST" autocomplete="off">
                        <div class="col-md-12">
                            @if(Session::get('fail'))
                            <div class="alert alert-danger error_message">
                                {{Session::get('fail')}}
                            </div>
                            @endif

                            @csrf
                            <div class="row">
                                <div class="form-group ms-4">
                                    <label class="label_email skeleton" for="email">Email :</label>
                                    <span class="skeleton"><input class="email_src email ps-1 mt-5" type="text" name="email" placeholder="&#xf0e0; Enter Email Address" value="{{old('email')}}" autofocus></span>
                                    <i class="src_email fa fa-spinner fa-spin src_email-hidden"></i>
                                    <span class="text-danger input_message">@error('email')
                                        <i class="fa-regular fa-hand-point-right fa-beat" style="color: #003ea8;"></i>
                                        {{$message}}@enderror
                                    </span><br>
                                </div>
                                <div class="form-group ms-4">
                                    <label class="lable_password skeleton" for="password">Password :</label>
                                    <span class="skeleton"><input class="password_src password ps-1" type="password" name="password" placeholder="&#xf13e; Enter Password" value="{{old('password')}}"></span>
                                    <i class="src_password fa fa-spinner fa-spin src_password-hidden"></i>
                                    <span class="text-danger input_message">@error('password')
                                        <i class="fa-regular fa-hand-point-right fa-beat" style="color: #003ea8;"></i>
                                        {{$message}}@enderror
                                    </span><br>
                                </div>
                                <div class="col-md-9 offset-md-3">
                                    <div class="form-group ms-3">
                                        <button id="submit" type="submit" class="btn btn-sm btn-primary login_button skeleton">
                                            <i class="loading-icon fa fa-spinner fa-spin hidden"></i>
                                            <span class="btn-text">Login</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if(session('error'))
                <span class="bg-text mb-4" style="text-align: center;">{{session('error')}}</span>
            @endif
        </div>
    </div>

    <!-- Boostrap5 JS Table Filter -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- JQUERY CDN LINK -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="{{asset('backend_asset')}}/support_asset/auth/js/loader.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js" integrity="sha512-16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
            $("#loginForm").addClass('loginForm');
        });
    </script>
    <script>
        gsap.from("#page_head h1",{
            y:100,
            opacity:0,
            delay:0.5,
            duration:0.9,
            stagger:0.2
        })
    </script>
</body>

</html>