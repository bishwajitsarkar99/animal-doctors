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
                <span class="logo-skeleton"><img class="mt-1 company_logo" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt=""></span>
                <span class="nav-head-skeleton">{{setting('company_name')}}</span>
            </p>
            <p class="address skeleton">{{setting('company_address')}}</p>
            <!-- <p class="d-none d-md-inline-block form-inline ms-auto me-3 me-md-0 my-0 my-md-0">
                <a class="menu_btn" href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" data-bs-toggle="tooltip"  data-bs-placement="left" title="Menu" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="menu_icon menu-skeleton"><img class="menu_icon" src="{{asset('backend_asset/main_asset/img/menu.png')}}" alt=""></span>
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
                            <a type="submit" href="/forget-password" class="btn btn-sm" id="forg_page">
                                <span class="btn-text forg_page"> Forget-Password</span>
                            </a>
                            <a type="submit" href="/register" class="btn btn-sm" id="reg_page">
                                <span class="btn-text reg_page"> User-Register</span>
                            </a>
                            <a type="submit" href="/" class="btn btn-sm" id="logn_page">
                                <span class="btn-text logn_page"> User-Login</span>
                            </a>
                        </div>
                        <div class="side_canvas_animation" hidden>
                            <img src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                        </div>
                    </div>
                </div>
            </p> -->
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
            <div class="hero-text heading reg_hidden">
                <h1 class="company_heading" style="font-size:25px;color:darkblue;text-align:left">
                    <span class="skeleton">{{setting('register_page_sub_title')}}</span>
                </h1>
            </div>
        </div>

        <div class="container bg" style="margin-top: 65px;">
            <div class="row">
                <!-- <div class="col-md-12 mb-1" style="margin-top:-8px;">
                    <h4 class="heading_admin_login text-shadow  ps-5" style="text-align: center;">
                        <span class="skeleton">{{setting('register_page_title')}}</span>
                    </h4>
                    <div class="">
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
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
                                            <label class="lable_name skeleton" for="name">Name <span style="padding-right: 22px;"></span> :</label>
                                            <span class="input-skeleton"></span>
                                            <input class="mt-3 register filed_src" type="text" name="name" placeholder="Name" value="{{old('name')}}" autofocus>
                                            <span><i class="search-icon fa fa-spinner fa-spin search-hidden"></i></span>
                                            <span class="text-danger name_message">@error('name')
                                                <i class="fa-regular fa-hand-point-right fa-beat" style="color: #003ea8;"></i>
                                                {{$message}}@enderror
                                            </span><br>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group">
                                            <label class="lable_contract skeleton" for="contract_number">Contract-Number <span style="padding-right: 4px;"></span> :</label>
                                            <span class="input-skeleton"></span>
                                            <input class="mt-3 contract" type="text" name="contract_number" placeholder="Contract Number" value="{{old('contract_number')}}">
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
                                            <span class="input-email-skeleton"></span>
                                            <input class="mt-3 reg_email" type="text" name="email" placeholder="Email Address" value="{{old('email')}}">
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
                                            <span class="input-skeleton"></span>
                                            <input class="password" type="password" name="password" placeholder="Password" value="{{old('password')}}">
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
                                            <span class="input-skeleton"></span>
                                            <input class="confirm confrim-password" type="password" name="password_confirmation" placeholder="Password">
                                            <i class="confrim-password-icon fa fa-spinner fa-spin confrim-password-hidden"></i>
                                            <span class="text-danger contact_message">@error('password')
                                                <i class="fa-regular fa-hand-point-right fa-beat" style="color: #003ea8;"></i>
                                                {{$message}}@enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group pt-3">
                                            <span class="image_size cap-skeleton" style="text-transform: uppercase;">150 x 150 (px)</span>
                                            <div class="img-area" id="registerAnimation">
                                                <span class="skeleton"><img class="register_img" id="output" src="{{asset('backend_asset')}}/main_asset/img/undraw_profile.svg" alt="Image 500X500"></span>
                                            </div>
                                            <span class="file-skeleton"></span>
                                            <input accept="image/*" type='file' id="imgInput" class="image mt-2" name="image" onchange="loadFile(event)">
                                            <span class="text-danger photo_message">@error('image')
                                                <i class="fa-regular fa-hand-point-right fa-beat" style="color: #003ea8;"></i>
                                                {{$message}}@enderror
                                            </span><br>
                                        </div>
                                    </div>
                                    <div class="col-md-3 offset-md-9">
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
                </div> -->
                <div class="col-md-12 mb-4" style="margin-top:px">
                    <h4 class="heading_register text-shadow font_size  ps-2" style="text-align: center;">
                        <span class="form-head-skeleton">{{setting('register_page_title')}}</span>
                    </h4>
                    <div class="">
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="col-md-12">
                                @if(Session::get('fail'))
                                <div class="alert alert-danger error_message">
                                    {{Session::get('fail')}}
                                </div>
                                @endif
                                <div class="row">
                                    <div class="container d-flex flex-column">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-md-8 col-lg-4">
                                                <div class="card forget_card">
                                                    <div class="card-body">
                                                        <div class="mb-2">
                                                            <div class="row">
                                                                <div class="col-xl-10">
                                                                    <span class="input-skeleton"></span>
                                                                    <input class="register filed_src show-current-border" id="border_action" type="text" name="name" placeholder="User Name" value="{{old('name')}}" autofocus>
                                                                    <span class="text-danger name_message show-error">@error('name')
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-2">
                                                                    <span style="color:green;font-weight:800;font-size: 15px;"><i class="first-check fa fa-check check-hidden"></i></span>
                                                                    <span id="firstFillUp" class="fillup-block mini-capsule-skeleton" style="color:gray;font-weight:500;font-size: 10px;padding-top:5px;">Fill up</span> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="row">
                                                                <div class="col-xl-10">
                                                                    <span class="input-two-skeleton"></span>
                                                                    <input class="contract show-current-border" type="text" name="contract_number" id="border_action2" placeholder="Contract Number" value="{{old('contract_number')}}">
                                                                    <span class="text-danger contact_message show-error">@error('contract_number')
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-2">
                                                                    <span style="color:green;font-weight:800;font-size: 15px;"><i class="second-check fa fa-check check-hidden"></i></span>
                                                                    <span id="secondFillUp" class="fillup-block mini-capsule-skeleton" style="color:gray;font-weight:500;font-size: 10px;padding-top:5px;">Fill up</span> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="row">
                                                                <div class="col-xl-10">
                                                                    <span class="input-email-skeleton"></span>
                                                                    <input class="reg_email show-current-border" type="text" name="email" id="border_action3" placeholder="Email Address" value="{{old('email')}}">
                                                                    <span class="text-danger email_message show-error">@error('email')
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-2">
                                                                    <span style="color:green;font-weight:800;font-size: 15px;"><i class="third-check fa fa-check check-hidden"></i></span>
                                                                    <span id="thirdFillUp" class="fillup-block mini-capsule-skeleton" style="color:gray;font-weight:500;font-size: 10px;padding-top:5px;">Fill up</span> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="row">
                                                                <div class="col-xl-10">
                                                                    <span class="input-skeleton"></span>
                                                                    <input class="user_password show-current-border" type="password" name="password" id="border_action4" placeholder="Password" value="{{old('password')}}">
                                                                    <span class="text-danger input_message show-error">@error('password')
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-2">
                                                                    <span style="color:green;font-weight:800;font-size: 15px;"><i class="four-check fa fa-check check-hidden"></i></span>
                                                                    <span id="fourFillUp" class="fillup-block mini-capsule-skeleton" style="color:gray;font-weight:500;font-size: 10px;padding-top:5px;">Fill up</span> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="row">
                                                                <div class="col-xl-10">
                                                                    <span class="input-three-skeleton"></span>
                                                                    <input class="confirm confrim-password show-current-border" type="password" name="password_confirmation" id="border_action5" placeholder="Confirm Password">
                                                                    <span class="text-danger contact_message show-error">@error('password')
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </div>
                                                                <div class="col-xl-2">
                                                                    <span style="color:green;font-weight:800;font-size: 15px;"><i class="five-check fa fa-check check-hidden"></i></span>
                                                                    <span id="fiveFillUp" class="fillup-block mini-capsule-skeleton" style="color:gray;font-weight:500;font-size: 10px;padding-top:5px;">Fill up</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <span class="image_size cap-skeleton" style="text-transform: uppercase;">150 x 150 (px) 
                                                                <span style="color:green;font-weight:800;font-size: 15px;"><i class="six-check fa fa-check check-hidden"></i></span>
                                                            </span>
                                                            <div class="img-area" id="registerAnimation">
                                                                <span class="skeleton"><img class="register_img image-current-border imge-border" id="output" src="{{asset('backend_asset')}}/main_asset/img/undraw_profile.svg" alt="Image 500X500"></span>
                                                            </div>
                                                            <span class="file-skeleton"></span>
                                                            <input accept="image/*" type='file' id="imgInput" class="image mt-1" name="image" onchange="loadFile(event)">
                                                            <span class="text-danger photo_message show-error">@error('image')
                                                                {{$message}}@enderror
                                                            </span>
                                                        </div>
                                                        <div class="mb-1 d-grid">
                                                            <button type="submit" class="btn btn-sm btn-primary forget_button register_btn register_action" id="reg_submit">
                                                                <span class="btn-text">Register</span>
                                                                <i class="register-icon fa fa-spinner fa-spin register-hidden"></i>
                                                            </button>
                                                            <span class="button-skeleton"></span>
                                                            <!-- <button type="submit" class="btn btn-sm btn-primary login_button button_margin register_btn" id="reg_submit">
                                                                <i class="register-icon fa fa-spinner fa-spin register-hidden"></i>
                                                                <span class="btn-text">Register</span>
                                                            </button> -->
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
            function logo(){
                const  allSkeleton = document.querySelectorAll('.logo-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('logo-skeleton')
                });
            }
            function navHeadSkeleton(){
                const  allSkeleton = document.querySelectorAll('.nav-head-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('nav-head-skeleton')
                });
            }
            function formHeadSkeleton(){
                const  allSkeleton = document.querySelectorAll('.form-head-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('form-head-skeleton')
                });
            }
            function inputSkeleton(){
                const  allSkeleton = document.querySelectorAll('.input-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('input-skeleton')
                });
            }
            function inputThreeSkeleton(){
                const  allSkeleton = document.querySelectorAll('.input-three-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('input-three-skeleton')
                });
            }
            function inputTwoSkeleton(){
                const  allSkeleton = document.querySelectorAll('.input-two-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('input-two-skeleton')
                });
            }
            function inputEamilSkeleton(){
                const  allSkeleton = document.querySelectorAll('.input-email-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('input-email-skeleton')
                });
            }
            function miniCapSkeleton(){
                const  allSkeleton = document.querySelectorAll('.mini-capsule-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('mini-capsule-skeleton')
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
                const  allSkeleton = document.querySelectorAll('.menu-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('menu-skeleton')
                });
            }
            function buttonSkeleton(){
                const  allSkeleton = document.querySelectorAll('.button-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('button-skeleton')
                });
            }
            setTimeout(() => {
                logo();
                fetchData();
                navHeadSkeleton();
                formHeadSkeleton();
                inputSkeleton();
                inputTwoSkeleton();
                inputThreeSkeleton();
                inputEamilSkeleton();
                miniCapSkeleton();
                capSkeleton();
                fileSkeleton();
                imageSkeleton();
                buttonSkeleton();
            }, 2000);
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
                    $(".forg_page").addClass('auth-skeleton');
                    $(".reg_page").addClass('auth-skeleton');
                    $(".logn_page").addClass('auth-skeleton');

                    setTimeout(() => {
                        $("#loader_modal").modal('hide');
                        $(".side_canvas_animation").attr('hidden', true);
                        $(".head_auth").removeClass('auth-skeleton');
                        $(".btn-close").removeClass('auth-skeleton');
                        $(".forg_page").removeClass('auth-skeleton');
                        $(".reg_page").removeClass('auth-skeleton');
                        $(".logn_page").removeClass('auth-skeleton');
                    }, 2000);
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                // input name field border color changer when will show error
                $(document).on('keyup', '#border_action',function() {
                    var inputVal = $(this).val();
                    if(inputVal !== ''){
                        $(this).removeClass('show-current-border');
                        $(this).addClass('show-success-border');
                        $(".first-check").removeClass('check-hidden');
                        $("#firstFillUp").removeClass('fillup-block');
                        $("#firstFillUp").addClass('fillup-hidden');
                    }
                    else{
                        $(this).addClass('show-current-border');
                        $(this).removeClass('show-success-border');
                        $(".first-check").addClass('check-hidden');
                        $("#firstFillUp").addClass('fillup-block');
                        $("#firstFillUp").removeClass('fillup-hidden');
                    }
                });
                // input contract-number field border color changer when will show error
                $(document).on('keyup', '#border_action2',function() {
                    var inputVal = $(this).val();
                    if(inputVal !== ''){
                        $(this).removeClass('show-current-border');
                        $(this).addClass('show-success-border');
                        $(".second-check").removeClass('check-hidden');
                        $("#secondFillUp").removeClass('fillup-block');
                        $("#secondFillUp").addClass('fillup-hidden');
                    }
                    else{
                        $(this).addClass('show-current-border');
                        $(this).removeClass('show-success-border');
                        $(".second-check").addClass('check-hidden');
                        $("#secondFillUp").addClass('fillup-block');
                        $("#secondFillUp").removeClass('fillup-hidden');
                    }
                });
                // input email field border color changer when will show error
                $(document).on('keyup', '#border_action3',function() {
                    var inputVal = $(this).val();
                    if(inputVal !== ''){
                        $(this).removeClass('show-current-border');
                        $(this).addClass('show-success-border');
                        $(".third-check").removeClass('check-hidden');
                        $("#thirdFillUp").removeClass('fillup-block');
                        $("#thirdFillUp").addClass('fillup-hidden');
                    }
                    else{
                        $(this).addClass('show-current-border');
                        $(this).removeClass('show-success-border');
                        $(".third-check").addClass('check-hidden');
                        $("#thirdFillUp").addClass('fillup-block');
                        $("#thirdFillUp").removeClass('fillup-hidden');
                    }
                    
                });
                // input password field border color changer when will show error
                $(document).on('keyup', '#border_action4',function() {
                    var inputVal = $(this).val();
                    if(inputVal !== ''){
                        $(this).removeClass('show-current-border');
                        $(this).addClass('show-success-border');
                        $(".four-check").removeClass('check-hidden');
                        $("#fourFillUp").removeClass('fillup-block');
                        $("#fourFillUp").addClass('fillup-hidden');
                    }
                    else{
                        $(this).addClass('show-current-border');
                        $(this).removeClass('show-success-border');
                        $(".four-check").addClass('check-hidden');
                        $("#fourFillUp").addClass('fillup-block');
                        $("#fourFillUp").removeClass('fillup-hidden');
                    }
                });
                // input confirm-password field border color changer when will show error
                $(document).on('keyup', '#border_action5',function() {
                    var inputVal = $(this).val();
                    if(inputVal !== ''){
                        $(this).removeClass('show-current-border');
                        $(this).addClass('show-success-border');
                        $(".five-check").removeClass('check-hidden');
                        $("#fiveFillUp").removeClass('fillup-block');
                        $("#fiveFillUp").addClass('fillup-hidden');
                    }
                    else{
                        $(this).addClass('show-current-border');
                        $(this).removeClass('show-success-border');
                        $(".five-check").addClass('check-hidden');
                        $("#fiveFillUp").addClass('fillup-block');
                        $("#fiveFillUp").removeClass('fillup-hidden');
                    }
                });
                // input image field border color changer when will show error
                $(document).on('click', '.image',function() {
                    var inputVal = $(this).val();
                    if(inputVal !== ''){
                        $(".six-check").removeClass('check-hidden');
                        $(".imge-border").removeClass('image-current-border');
                        $(".imge-border").addClass('image-success-border');
                    }
                    else{
                        $(".six-check").addClass('check-hidden');
                        $(".imge-border").addClass('image-current-border');
                        $(".imge-border").removeClass('image-success-border');
                    }
                });

                // input field error show border
                $(document).ready(function() {
                    var errorMessage = $(".show-error").text().trim();
                    $(".show-error").attr("data-error", errorMessage);
                    
                    if(errorMessage !==''){
                        $("#border_action").removeClass('show-current-border');
                        $("#border_action").addClass('show-error-border');
                        $("#border_action2").removeClass('show-current-border');
                        $("#border_action2").addClass('show-error-border');
                        $("#border_action3").removeClass('show-current-border');
                        $("#border_action3").addClass('show-error-border');
                        $("#border_action4").removeClass('show-current-border');
                        $("#border_action4").addClass('show-error-border');
                        $("#border_action5").removeClass('show-current-border');
                        $("#border_action5").addClass('show-error-border');
                        $(".imge-border").removeClass('image-current-border');
                        $(".imge-border").addClass('image-error-border');
                    }
                    else{
                        $("#border_action").addClass('show-current-border');
                        $("#border_action").removeClass('show-error-border');
                        $("#border_action2").addClass('show-current-border');
                        $("#border_action2").removeClass('show-error-border');
                        $("#border_action3").addClass('show-current-border');
                        $("#border_action3").removeClass('show-error-border');
                        $("#border_action4").addClass('show-current-border');
                        $("#border_action4").removeClass('show-error-border');
                        $("#border_action5").addClass('show-current-border');
                        $("#border_action5").removeClass('show-error-border');
                        $(".imge-border").addClass('image-current-border');
                        $(".imge-border").removeClass('image-error-border');
                    }
                });
                
            });
        </script>
    </body>

</html>