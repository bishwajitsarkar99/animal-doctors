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
    <title>Forget Password</title>
</head>
<header class="bg sticky-top">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" id="topBar_tigger">
        <p class="navbar-brand ps-3 admin_panel text-shadow" style="float: right;">
            <span class="logo-skeleton"><img class="mt-1 company_logo" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt=""></span>
            <span class="heading-skeleton">{{setting('company_name')}}</span>
        </p>
        <p class="address media-address skeleton">{{setting('company_address')}}</p>
        <p class="d-none d-md-inline-block form-inline ms-auto me-3 me-md-0 my-0 my-md-0">
            <a class="menu_btn" href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" data-bs-toggle="tooltip"  data-bs-placement="left" title="Menu" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <span class="menu_icon menus-skeleton"><img class="menu_icon" src="{{asset('backend_asset/main_asset/img/menu.png')}}" alt=""></span>
            </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h6 class="head_auth" id="offcanvasRightLabel">Auth-Menu</h6>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-toggle="tooltip"  data-bs-placement="left" title="Close" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'></button>
                </div>
                <div class="offcanvas-body">
                    <div class="modal fade" id="loader_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
                                <div class="modal-body" id="loader_modalBody"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="group__button">
                        <a type="submit" href="/" class="btn btn-sm" id="logn_page">
                            <span class="btn-text logn_page"> User-Login</span>
                        </a>
                    </div>
                    <div class="side_canvas_animation" hidden>
                        <img src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                    </div>
                </div>
            </div>
        </p>
    </nav>
</header>

<body class="register_background-color">
    <div class="modal fade" id="loaderRegisterForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
                <div class="modal-body" id="loaderRegisterModal_body">
                    <div class="loader-register">
                        <img src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="hero-image">
        <div class="hero-text heading reg_hidden company-name-classic">
            <h1 class="company" style="font-size:25px;color:darkblue;text-align:left">
                <span class="skeleton">{{setting('forgot_page_sub_title')}}</span>
            </h1>
        </div>
    </div>

    <div class="container bg" style="margin-top: 62px;">
        <div class="row">
            <div class="col-md-12 mb-5" style="margin-top:px">
                <h4 class="heading_register text-shadow font_size" style="text-align: center;">
                    <span class="skeleton head-animaion">{{setting('forgot_page_title')}}</span>
                </h4>
                <div class="">
                    <form action="{{ route('password.reset') }}" method="POST">
                        @csrf
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
                                                    @if(request()->input('token'))
                                                    <div class="mb-4">
                                                        <h5 class="skeleton lb_text">Change Password?</h5>
                                                        <p class="panel-skeleton lb_text panel mb-2">Change your register email password.</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label skeleton">Email</label>
                                                        <input type="email" id="email" style="border: 1px solid #f1f1f1;" class="form-control form-control-sm" name="email" placeholder="Enter Your Email" required="" value="{{request()->input('email')}}" readonly="" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label skeleton">Password</label>
                                                        <input type="email" id="email" style="border: 1px solid #f1f1f1;" class="form-control form-control-sm" name="email" placeholder="Enter Your Email" required="">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label skeleton">Conform Password</label>
                                                        <input type="email" id="email" style="border: 1px solid #f1f1f1;" class="form-control form-control-sm" name="email" placeholder="Enter Your Email" required="">
                                                    </div>
                                                    <div class="mb-3 d-grid">
                                                        <button type="submit" class="btn btn-primary">
                                                            Change Password
                                                        </button>
                                                    </div>
                                                    @else
                                                    <div class="mb-4">
                                                        <h5 class="skeleton lb_text">Forgot Password?</h5>
                                                        <p class="panel-skeleton lb_text panel mb-2">Enter your registered email ID to reset the password.</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label skeleton lb_text">Email :</label>
                                                        <input type="email" id="email" style="border: 1px solid lightgray;" class="" name="email" placeholder="&#xf0e0; Enter Email Address" required="" autocomplete="off" autofocus />
                                                        <span class="email-input2-skeleton"></span>
                                                    </div>
                                                    <div class="mb-3 d-grid">
                                                        <button type="submit" class="btn btn-sm btn-primary forget_button register_btn">
                                                            Reset Password
                                                        </button>
                                                    </div>
                                                    <div class="mb-2 d-grid">
                                                        <span class="panel-skeleton reset_text panel media-panel">Don't have an account?</span>
                                                        <span class="mt-3">
                                                            <a class="btn btn-sm btn-primary forget_button ps-2 pe-2 pb-1" href="/">sign in</a>
                                                        </span>
                                                    </div>
                                                    @endif
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
        function headingSkeleton(){
            const  allSkeleton = document.querySelectorAll('.heading-skeleton')
        
            allSkeleton.forEach(item=>{
                item.classList.remove('heading-skeleton')
            });
        }
        function panelSkeleton(){
            const  allSkeleton = document.querySelectorAll('.panel-skeleton')
        
            allSkeleton.forEach(item=>{
                item.classList.remove('panel-skeleton')
            });
        }
        function logo(){
            const  allSkeleton = document.querySelectorAll('.logo-skeleton')
        
            allSkeleton.forEach(item=>{
                item.classList.remove('logo-skeleton')
            });
        }
        function fetchData(){
            const  allSkeleton = document.querySelectorAll('.skeleton')
        
            allSkeleton.forEach(item=>{
                item.classList.remove('skeleton')
            });
        }
        function inputSkeleton(){
            const  allSkeleton = document.querySelectorAll('.input-skeleton')
        
            allSkeleton.forEach(item=>{
                item.classList.remove('input-skeleton')
            });
        }
        function inputEamilSkeleton(){
            const  allSkeleton = document.querySelectorAll('.input-email-skeleton')
        
            allSkeleton.forEach(item=>{
                item.classList.remove('input-email-skeleton')
            });
        }
        function capSkeleton(){
            const  allSkeleton = document.querySelectorAll('.cap-skeleton')
        
            allSkeleton.forEach(item=>{
                item.classList.remove('cap-skeleton')
            });
        }
        function fileSkeleton(){
            const  allSkeleton = document.querySelectorAll('.file-skeleton')
        
            allSkeleton.forEach(item=>{
                item.classList.remove('file-skeleton')
            });
        }
        function imageSkeleton(){
            const  allSkeleton = document.querySelectorAll('.menus-skeleton')
        
            allSkeleton.forEach(item=>{
                item.classList.remove('menus-skeleton')
            });
        }
        function miniSkeleton(){
            const  allSkeleton = document.querySelectorAll('.mini-skeleton')
        
            allSkeleton.forEach(item=>{
                item.classList.remove('mini-skeleton')
            });
        }
        function emailInputSkeleton(){
            const  allSkeleton = document.querySelectorAll('.email-input2-skeleton')
        
            allSkeleton.forEach(item=>{
                item.classList.remove('email-input2-skeleton')
            });
        }
        setTimeout(() => {
            headingSkeleton();
            logo();
            fetchData();
            panelSkeleton();
            inputSkeleton();
            inputEamilSkeleton();
            capSkeleton();
            fileSkeleton();
            imageSkeleton();
            //miniSkeleton();
            emailInputSkeleton();
        }, 2000);
        
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        $(document).ready(function(){
            $("#registerAnimation").addClass('loginForm');
        });
    </script>
    <script>
        window.addEventListener('load', function() {
            const loader = document.querySelector(".loader-register");
            const loaderModal = new bootstrap.Modal(document.getElementById('loaderRegisterForm'));

            loaderModal.show();
            loader.className += " log_close";
            setTimeout(function() {
                loaderModal.hide();
            }, 2000);
        });
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.menu_btn', function(e){
                e.preventDefault();
                $("#loader_modal").modal('show');
                $(".side_canvas_animation").removeAttr('hidden');
                $(".head_auth").addClass('auth-skeleton');
                $(".btn-close").addClass('auth-skeleton');
                $(".logn_page").addClass('auth-skeleton');

                setTimeout(() => {
                    $("#loader_modal").modal('hide');
                    $(".side_canvas_animation").attr('hidden', true);
                    $(".head_auth").removeClass('auth-skeleton');
                    $(".btn-close").removeClass('auth-skeleton');
                    $(".logn_page").removeClass('auth-skeleton');
                }, 2000);
            });
        });
    </script>
</body>

</html>