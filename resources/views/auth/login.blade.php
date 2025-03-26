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
        :root{
            --font-register:"Poppins", Sans-serif;
            --nav-button-background:linear-gradient(to top, #3b71ca, #3b71ca, #3b71ca);
        }
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            justify-content:center;
            align-items:center;
            flex-direction:column;
            font-family: var(--font-register);
            background-color:#000 !important;
        }
        .input-group {
            position: relative;
            width: 100%;
        }
        .input-group input.email, input.password {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            outline: none;
            width: 100%;
            padding: 2px 8px !important;
            border-radius: 3px;
            font-size: 11px;
            font-weight: 700;
            color: #333;
            background: white;
            letter-spacing: 0.5px;
            word-spacing: 0.5px;
            animation: inputColor 2s infinite;
            margin-left:0;
        }
        @keyframes inputColor {
            0% {
                color: gray;
            }

            100% {
                color: #333;
            }
        }
        .input-group label {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            padding: 0;
            pointer-events: none;
            transition: 0.3s ease-out;
            color: rgb(131 131 131);
            background-color: transparent;
            font-size: 12px;
            font-weight: 700;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
        }
        .input-group input.email:focus ~ label, input.password:focus ~ label,
        .input-group input.email:not(:placeholder-shown) ~ label, 
        input.password:not(:placeholder-shown) ~ label{
            top: 0;
            left: 8px;
            font-size: 9px;
            font-weight:800;
            color: #333;
            background-color: rgb(228 243 255 / 67%);
            padding: 0 3px;
            word-spacing: 2px;
        }
        .input-group input.email, input.password {
            border-top-right-radius: 3px !important;
            border-bottom-right-radius: 3px !important;
        }
        .edit_select_user_id_error{
            font-size:10px;
            font-weight:700;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            color: #333;
        }
        .edit_input_user_id_error{
            font-size:10px;
            font-weight:700;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            color: #333;
        }
        .space{
            display:flex;
            justify-content: left;
            align-items: center;
        }
        .group_action {
            justify-content: space-between !important;
            align-items: center;
            text-align: center;
            display: flex;
            padding-left: 15px;
            padding-right: 12px;
        }
        .first_block{
            justify-content: space-between !important;
            align-items: center;
            text-align: center;
            display: flex;
        }
    </style>
</head>
<body class="background-color">
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
                            <a type="submit" href="{{ route('password.forget') }}" class="btn btn-sm" id="forg_page">
                                <span class="btn-text forg_page"> Forget-Password</span>
                            </a>
                            <input type="text" name="email" value="{{ $email ?? ''}}" id="emal_input" hidden>
                            <a type="submit" href="{{ $register_form_url }}" class="btn btn-sm" id="reg_page">
                                <span class="btn-text reg_page"> User-Register</span>
                            </a>
                            <a type="submit" href="{{ route('email.verification') }}" class="btn btn-sm" id="logn_page">
                                <span class="btn-text logn_page"> Email-Verification</span>
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
    <div class="hero-image">
        <div class="hero-text heading reg_hidden company-name-classic" id="page_head">
            <h1 class="body_heading" style="font-size:20px;color:white;font-weight: 700;">
                <span class="skeleton">{{setting('page_sub_title')}}</span>
            </h1>
        </div>
    </div>
    <div class="hero-address">
        <h2 class="para">
            <span class="nav_head">
                <p class="login-address skeleton login-head-address-animation ms-4">{{setting('company_address')}}</p>
            </span>
        </h2>
    </div>
    <div class="container bg" style="margin-top: 0px;">
        <div class="row">
            <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators top__skeleton">
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
            <div class="col-md-4" style="margin-top:px">
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
                                    <div class="combo_box">
                                        <span class="input-user-skeleton" style="text-align:center;">
                                            <select type="text" class="form-control form-control-sm user-select select2" name="role" value="{{old('role')}}" id="select_user">
                                                <option value="" style="text-align:center;">Select Email</option>
                                                @foreach($roles as $item)
                                                <option value="{{$item->id}}" style="text-align:center;">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </span>
                                        <div class="form-group space skeleton">
                                            <span class="edit_select_user_id_error input_message show-error3 remove-user-error">@error('role')
                                                <span><svg width="20px" hieght="15px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> </span>
                                                {{$message}}@enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <span class="input-email-skeleton">
                                        <!-- value="{{old('email')}}" -->
                                        <div class="input-group">
                                            <input id="inputEmail" class="email_src email show-current-border ps-1" type="text" name="login_email" placeholder="" value="{{ $login_email ?? ''}}" readonly="" />
                                            <label for="email_src">Enter Email Address</label>
                                        </div>
                                    </span>
                                    <div class="form-group space skeleton">
                                        <span class="edit_input_user_id_error input_message show-error">@error('login_email')
                                            <span><svg width="20px" hieght="15px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> </span>
                                            {{$message}}@enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="input-password-skeleton">
                                        <div class="input-group">
                                            <input class="password_src password show-current-border ps-1" type="password" name="password" placeholder="" value="{{old('password')}}">
                                            <label for="password">Enter Password</label>
                                        </div>
                                    </span>
                                    <div class="form-group space skeleton">
                                        <span class="edit_input_user_id_error input_message show-error2">@error('password')
                                            <span><svg width="20px" hieght="15px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> </span>
                                            {{$message}}@enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 group_action">
                                    <div class="form-group">
                                        <a id="back" type="submit" href="{{$home_url}}" class="btn btn-sm btn-primary back_button button-skeleton">
                                            <span class="back-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                            <span class="back-btn-text">Back</span>
                                        </a>
                                    </div>
                                    <div class="form-group">
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
                'facebook-skeleton',
                'top__skeleton',
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
        $('.select2').select2({
            placeholder: 'Select User',
            allowClear: true
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#select_user').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search user...');
        });

        $(document).ready(function(){
            // submit button
            // $(document).on('click', '.login_button', function(e){
            //     e.preventDefault();

            //     $('.edit_select_user_id_error').empty();
            //     var selectRole = $("#select_user").val();

            //     if(selectRole.trim() == ''){
            //         $("#select_user").next('.select2-container').addClass('is-select-invalid');
            //         $("#select_user").closest('.combo_box').append(`<span class="edit_select_user_id_error error_val ps-1"> 
            //         <span class="ps-2"><svg width="20px" hieght="20px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg></span>
            //         User role is required.
            //         </span>`);
            //     }

            // });
            // Select Category Id Field
            $(document).on('change', '#select_user', function(){
                var $selectContainer = $(this).closest('.combo_box').find('.select2-container');
                var $errorElement = $('.edit_select_user_id_error');
                
                if ($selectContainer.hasClass('is-select-invalid')) {
                    $selectContainer.removeClass('is-select-invalid').addClass('is-select-valid');
                    $errorElement.empty().addClass('display-none');
                } else {
                    $selectContainer.removeClass('is-select-valid is-select-invalid');
                }
            });
        });

    </script>
</body>

</html>