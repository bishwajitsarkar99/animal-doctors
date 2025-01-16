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
    <link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
    <link rel="icon" type="shortcut icon" href="{{asset('backend_asset')}}/main_asset/img/com-black-favicon.png">
    <title>{{setting('company_name')}}</title>

    <style>
        .group_action {
            justify-content: space-between !important;
            align-items: center;
            text-align: center;
            display: flex;
            padding-left: 8px;
            padding-right: 8px;
        }
    </style>
</head>
<header class="bg sticky-top">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" id="topBar_tigger">
        <p class="navbar-brand admin_panel text-shadow" style="float: right;">
            <span class="logo-skeleton media_text1"><img class="mt-1 company_logo" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt=""></span>
            <span class="headings-skeleton media_text2">{{setting('company_name')}}</span>
        </p>
        <p class="navbar-brand admin_panel text-shadow d-none d-md-inline-block form-inline ms-auto me-3 me-md-0 my-0 my-md-0">
            <a class="" href="{{setting('update_social_media_facebook_link')}}">
                <span class="social_icon facebook-skeleton"><img class="social_icon" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_social_media_facebook')}}" alt=""></span>
            </a>
            <a class="" href="{{setting('update_social_media_messanger_link')}}">
                <span class="social_icon_mess messenger-skeleton ms-2"><img class="social_icon_mess" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_social_media_messanger')}}" alt=""></span>
            </a>
            <a class="" href="{{setting('update_social_media_whatsapp_link')}}">
                <span class="social_icon_whatsapp whatsapp-skeleton"><img class="social_icon_whatsapp" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_social_media_whatsapp')}}" alt=""></span>
            </a>
            <a class="menu_btn" href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" data-bs-toggle="tooltip"  data-bs-placement="left" title="Menu" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                <span class="menu_icon menu-skeleton"><img class="menu_icon" src="{{asset('backend_asset/main_asset/img/menu.png')}}" alt=""></span>
            </a>
            <div class="offcanvas offcanvas-end" data-bs-backdrop="true" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h6 class="head_auth" id="offcanvasRightLabel">Auth-Menu</h6>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-toggle="tooltip"  data-bs-placement="left" title="Close" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'></button>
                </div>
                <div class="offcanvas-body">
                    <div class="modal fade" id="loader_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
                                <div class="modal-body" id="loader_modalBody"></div>
                            </div>
                        </div>
                    </div>
                    <div class="group__button">
                        <a type="submit" href="{{$forget_password_url}}" class="btn btn-sm" id="forg_page">
                            <span class="btn-text forg_page"> Forget-Password</span>
                        </a>
                        <a type="submit" href="{{$register_form_url}}" class="btn btn-sm" id="reg_page">
                            <span class="btn-text reg_page"> User-Register</span>
                        </a>
                    </div>
                    <div class="side_canvas_animation" hidden>
                        <img class="sidebar-animation-size" src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                    </div>
                </div>
            </div>
        </p>
    </nav>
</header>

<body class="admin-background-color">
    <div class="modal fade" id="loaderModalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
                <div class="modal-body" id="loaderModal_body">
                    <div class="loader-login">
                        <img src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="hero-image">
        <div class="hero-text heading reg_hidden company-name-classic" id="page_head">
            <h1 class="body_heading" style="font-size:25px;color:darkblue;">
                <!-- Admin-Page Title -->
                <span class="skeleton">{{setting('register_page_sub_title')}}</span>
            </h1>
        </div>
    </div>

    <h2 class="para">
        <span class="nav_head">
            <p class="login-address skeleton login-head-address-animation ms-5">{{setting('company_address')}}</p>
        </span>
    </h2>
    <div class="container bg" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
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
            <div class="col-md-4 mb-5 mt-3" style="margin-top:px">
                <h4 class="heading_admin text-shadow" style="text-align: center;"><span class="skeleton head-animation">{{ setting('login_page_title')}}</span></h4>
                <div class="card card-form-control login_card">
                    <form id="loginForm" action="{{ route('login') }}" method="POST" autocomplete="off">
                        <div class="col-md-12">
                            @if(Session::get('fail'))
                            <div class="alert alert-danger error_message">
                                {{Session::get('fail')}}
                            </div>
                            @endif

                            @csrf
                            <div class="row">
                                <div class="form-group mt-3">
                                    <span class="input-user-skeleton" style="text-align:center;">
                                        <select type="text" class="form-control form-control-sm select2" name="role" value="{{old('role')}}" id="select_user">
                                            <option value="" style="text-align:center;">Select Email</option>
                                            @foreach($roles as $item)
                                            <option value="{{$item->id}}" style="text-align:center;">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="email email-label-skeleton" for="branch">Branch :</label>
                                    <span class="input-email-skeleton">
                                        <input id="inputBranch" class="branch-name branch show-current-border ps-1" type="text" name="branch_name" placeholder="Branch Name" value="" readonly="" />
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="email email-label-skeleton" for="email">Email :</label>
                                    <span class="input-email-skeleton">
                                        <!-- value="{{old('email')}}" -->
                                        <input class="email_src email show-current-border ps-1" type="text" name="login_email" placeholder="Enter Email Address" value="{{ $login_email ?? ''}}" autofocus readonly="" />
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label class="password email-label-skeleton" for="password">Password :</label>
                                    <span class="input-password-skeleton"><input class="password_src password show-current-border ps-1" type="password" name="password" placeholder="Enter Password" value="{{old('password')}}"></span>
                                </div>
                                <div class="form-group">
                                    <span class="text-danger input_message show-error3 remove-user-error">@error('role')
                                        Error Messages : (1).{{$message}}@enderror
                                    </span>
                                    <span class="text-danger input_message show-error remove-error skeleton">@error('login_email')
                                        (3).{{$message}}@enderror
                                    </span>
                                    <span class="text-danger input_message show-error2 remove-error2 skeleton">@error('password')
                                        (2).{{$message}}@enderror
                                    </span>
                                </div>
                                <div class="col-md-12 group_action">
                                    <div class="form-group ms-2">
                                        <a id="back" type="submit" href="{{$home_url}}" class="btn btn-sm btn-primary back_button button-skeleton">
                                            <span class="back-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                            <span class="back-btn-text">Back</span>
                                        </a>
                                    </div>
                                    <div class="form-group me-1">
                                        <button id="submit" type="submit" class="btn btn-sm btn-primary login_button button-skeleton">
                                            <span class="loading-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                            <span class="btn-text">Login</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if(session('error'))
            <p id="success_message" class="background_error mb-4" style="text-align: center;color:white;">{{session('error')}}</p>
        @endif
    </div>

    <!-- Boostrap5 JS Table Filter -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JQUERY CDN LINK -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="module" src="{{asset('backend_asset')}}/support_asset/auth/js/auth-helper-min.js"></script>
    <script type="module">
        import { 
            buttonLoader, 
            pageLoader, 
            handleSuccessMessage, 
            toolTip, 
            browserInpect, 
            rightSideBar, 
            handleInputValidation, 
            removeSkeletonClass 
        } from "{{asset('backend_asset')}}/support_asset/auth/js/auth-helper-min.js";
        buttonLoader();
        pageLoader();
        toolTip();
        //browserInpect();

        $(document).ready(function () {
            // Initialize the message
            handleSuccessMessage('#success_message');
            // Initialize the button loader for the login button
            buttonLoader('.login_button', '.loading-icon', '.btn-text', 'Login...', 'Login', 6000);
            buttonLoader('#back', '.back-icon', '.back-btn-text', 'Back...', 'Back', 1000);
            // Initialize right sidebar canvas the loader modal with skeleton loading effect
            rightSideBar(
                '.menu_btn',                   // Button selector to attach the click event
                '#loader_modal',               // Modal selector
                '.side_canvas_animation',       // Loader selector
                [                               // Array of elements to apply skeleton effect
                    '.head_auth', 
                    '.btn-close', 
                    '.forg_page', 
                    '.reg_page', 
                    '.logn_page'
                ],
                2000
            );
            // Handle email validation
            handleInputValidation(
                '.email_src',              // Input selector
                '.show-error',             // Error message selector
                'is-valid',                // Success class
                'is-invalid',              // Error class
                'show-current-border',     // Default border class
                '.src_email'               // Success message selector
            );
            // Handle password validation
            handleInputValidation(
                '.password_src',           // Input selector
                '.show-error2',            // Error message selector
                'is-valid',                // Success class
                'is-invalid',              // Error class
                'show-current-border',     // Default border class
                '.src_password'            // Success message selector
            );
            // Array of skeleton class names
            const skeletonClasses = [
                'headings-skeleton',
                'input-user-skeleton',
                'input-email-skeleton',
                'input-password-skeleton',
                'button-skeleton',
                'skeleton', // General skeleton
                'email-label-skeleton',
                'logo-skeleton',
                'menu-skeleton',
                'whatsapp-skeleton',
                'messenger-skeleton',
                'facebook-skeleton'
            ];
            // Remove skeleton
            setTimeout(() => {
                removeSkeletonClass(skeletonClasses);
            }, 2000);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script>
        gsap.from("#page_head h1",{
            y:100,
            opacity:0,
            delay:0.5,
            duration:0.9,
            stagger:0.2
        })
    </script>
    <script>
        $(document).ready(function(){
            // error skeleton
            $(document).on('click', '#submit', function() {
                var errorMessage = $(this).text().trim();
                $(this).attr("data-error", errorMessage);
                if (errorMessage !== '') {
                    $('.remove-error').addClass('error-skeleton');
                    $('.remove-error2').addClass('error-skeleton');
                    $('.remove-user-error').addClass('user-error-skeleton');
                    setTimeout(function() {
                        $('.remove-error').removeClass('error-skeleton');
                        $('.remove-error2').removeClass('error-skeleton');
                        $('.remove-user-error').removeClass('user-error-skeleton');
                    }, 2000);
                }
            });
        });
    </script>
    <script>
        //$('.select2').select2();
        $('.select2').select2({
            placeholder: 'Select User',
            allowClear: true
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#select_user').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search user...');
        });
    </script>
</body>

</html>