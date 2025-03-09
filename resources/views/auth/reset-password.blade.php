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
    <title>{{setting('company_name')}}</title>

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            background-color:#e8edf13d;
        }
        nav#topBar_tigger {
            margin-top: -11px;
            justify-content: space-between;
        }
        button#change_Password{
            margin-left: 0px;
        }
        a#back{
            margin-left: 0px;
        }
        .first_block{
            justify-content: space-between !important;
            align-items: center;
            text-align: center;
            display: flex;
        }
        img.image_size{
            width: 50px;
            height: 50px;
            margin-bottom: 5px;
            border-radius: 6px;
            transition: transform .5s;
        }
        img.image_size:hover{
            transform: scale(1.5);
        }
        .email-input-two-skeleton{
            position: relative;
        }
        .email-input-two-skeleton::before {
            content: "";
            position: absolute;
            left: -313px;
            top: -7px;
            width: 315px;
            height: 30px;
            border-radius: 3px;
            z-index: 10;
            background: linear-gradient(90deg, #b3b3b3, #f9f9f9, #b3b3b3);
            background-size: 200%;
            animation: skeleton 1s infinite reverse;
        }
        @keyframes skeleton {
            0% {
                background-position: -100% 0;
            }
            100% {
                background-position: 100% 0;
            }
        }
        @media only screen and (max-width: 976px) {
            header.sticky-top {
                position: sticky;
                width: 100%;
                display: list-item;
            }
            .font_size {
                font-size: 30px;
            }
            .row {
                margin-right: 0px;
                margin-left: 0px;
            }
            .container {
                width: 100%;
                padding-right: 0px;
                padding-left: 0px;
                margin-right: auto;
                margin-left: auto;
            }
            .container.registation_container{
                padding-right: 14px;
                padding-left: 10px;
            }
            p.address {
                font-size: 16px;
                color: floralwhite;
                font-variant: none;
                font-weight: 100;
                margin-top: 0px;
            }
            .card.forget_card{
                padding: 10px 10px;
            }
            .form-carb-body{
                padding-left: 0px;
                padding-right: 0px;
            }
            span.form_lbl_padding {
                padding-left: 0px;
                font-size: 18px;
            }
            .lb_text{
                font-size:17px;
            }
            input#email{
                font-size:15px;
            }
            input.inpt_pass{
                font-size:15px;
            }
            .image_size {
                margin-left: initial;
                font-size: 12px;
            }
            button#reset_password {
                margin-left: 0px;
                font-size: 14px;
                line-height: 1;
            }
            a#back{
                margin-top: 10px;
                border: none;
                font-size: 14px;
                line-height: 1.2;
            }
            .file-skeleton::before {
                position: absolute;
                left: -2px;
                top: 2px;
                width: 90%;
                height: 30px;
            }
            .file-error-skeleton::before {
                position: absolute;
                top: 33px;
                left: -35px;
                width: 90%;
            }
            .button-skeleton::before {
                position: absolute;
                top: -4px;
                left: -3px;
                height: 30px;
                width: 103%;
            }
            .loader-login {
                left: -25px;
            }
            .reset-button-skeleton::before {
                left: -3px;
                top: -2px;
                width: 103%;
                height: 27px;
            }
            .back-button-skeleton::before{
                left: -3px;
                top: -1px;
                width: 103%;
                height: 27px;
                border-radius: 3px;
            }
            .logo-skeleton::before {
                position: absolute;
                left: -6px;
                top: 8px;
            }
            .email-input-two-skeleton{
                position: relative;
            }
            .email-input-two-skeleton::before{
                left: -364px;
                top: -7px;
                height: 30px;
                width: 371px;
            }
            
        }
        @media only screen and (max-width: 776px) {
            header.sticky-top {
                position: sticky;
                width: 100%;
                display: list-item;
            }
            .font_size {
                font-size: 30px;
            }
            .row {
                margin-right: 0px;
                margin-left: 0px;
            }
            .container {
                width: 100%;
                padding-right: 0px;
                padding-left: 0px;
                margin-right: auto;
                margin-left: auto;
            }
            .container.registation_container{
                padding-right: 14px;
                padding-left: 10px;
            }
            p.address {
                font-size: 13px !important;
                color: floralwhite;
                font-variant: none;
                font-weight: 100;
                margin-top: 0px !important;
            }
            .card.forget_card{
                padding: 10px 10px;
            }
            .form-carb-body{
                padding-left: 0px;
                padding-right: 0px;
            }
            span.form_lbl_padding {
                padding-left: 0px;
                font-size: 18px;
            }
            .lb_text{
                font-size:17px;
            }
            input#email{
                font-size:15px;
            }
            input.inpt_pass{
                font-size:15px;
            }
            .image_size {
                margin-left: initial;
                font-size: 12px;
            }
            button#reset_password {
                margin-left: 0px;
                font-size: 14px;
                line-height: 1;
            }
            a#back{
                margin-top: 10px;
                border: none;
                font-size: 14px;
                line-height: 1.2;
            }
            .file-skeleton::before {
                position: absolute;
                left: -2px;
                top: 2px;
                width: 90%;
                height: 30px;
            }
            .file-error-skeleton::before {
                position: absolute;
                top: 33px;
                left: -35px;
                width: 90%;
            }
            .button-skeleton::before {
                position: absolute;
                top: -4px;
                left: -3px;
                height: 30px;
                width: 103%;
            }
            .loader-login {
                left: -25px;
            }
            .reset-button-skeleton::before {
                left: -3px;
                top: -2px;
                width: 103%;
                height: 27px;
            }
            .back-button-skeleton::before{
                left: -3px;
                top: -1px;
                width: 103%;
                height: 27px;
                border-radius: 3px;
            }
            .logo-skeleton::before {
                position: absolute;
                left: -6px;
                top: 8px;
            }
            .email-input-two-skeleton{
                position: relative;
            }
            .email-input-two-skeleton::before{
                left: -364px;
                top: -10px;
                height: 33px;
                width: 372px;
            }
            
        }
        @media only screen and (max-width: 600px) {
            header.sticky-top {
                position: sticky;
                width: 100%;
                display: list-item;
            }
            img.company_logo{
                padding-top:5px;
                padding-right:5px;
            }
            .font_size {
                font-size: 25px;
            }
            .row {
                margin-right: 0px;
                margin-left: 0px;
            }
            .container {
                width: 100%;
                padding-right: 0px;
                padding-left: 0px;
                margin-right: auto;
                margin-left: auto;
            }
            .container.registation_container{
                padding-right: 14px;
                padding-left: 10px;
            }
            p.address {
                font-size: 12px !important;
                color: floralwhite;
                font-variant: none;
                font-weight: 100;
                margin-top: 8px !important;
            }
            .card.forget_card{
                padding: 10px 10px;
            }
            .form-carb-body{
                padding-left: 0px;
                padding-right: 0px;
            }
            span.form_lbl_padding {
                padding-left: 0px;
                font-size: 18px;
            }
            .lb_text{
                font-size:15px;
            }
            input#email{
                font-size:14px;
            }
            input.inpt_pass{
                font-size:14px;
            }
            .image_size {
                margin-left: initial;
                font-size: 12px;
            }
            button#reg_submit{
                margin-top: 11px;
                font-size: 10px;
                border: none;
            }
            a#back{
                margin-top: 10px;
                border: none;
                font-size: 15px;
                line-height: 1.2;
            }
            button.btn.btn-sm.btn.forget_button {
                font-size: 15px;
                margin-top: 9px;
                line-height: 1;
            }
            .file-skeleton::before {
                position: absolute;
                left: -2px;
                top: 2px;
                width: 90%;
                height: 30px;
            }
            .file-error-skeleton::before {
                position: absolute;
                top: 33px;
                left: -35px;
                width: 90%;
            }
            .button-skeleton::before {
                position: absolute;
                top: -4px;
                left: -3px;
                height: 30px;
                width: 103%;
            }
            .loader-login {
                left: -25px;
            }
            .reset-button-skeleton::before {
                left: -3px;
                top: -2px;
                width: 103%;
                height: 27px;
            }
            .back-button-skeleton::before{
                left: -3px;
                top: -1px;
                width: 103%;
                height: 27px;
                border-radius: 3px;
            }
            .logo-skeleton::before {
                position: absolute;
                left: -6px;
                top: 7px;
            }
            .email-input-two-skeleton{
                position: relative;
            }
            .email-input-two-skeleton::before{
                left: -404px;
                top: -8px;
                height: 30px;
                width: 411px;
            }
            
        }
        @media only screen and (max-width: 500px) {
            header.sticky-top {
                position: sticky;
                width: 100%;
                display: list-item;
            }
            .font_size {
                font-size: 22px;
            }
            .row {
                margin-right: 0px;
                margin-left: 0px;
            }
            .container {
                width: 100%;
                padding-right: 0px;
                padding-left: 0px;
                margin-right: auto;
                margin-left: auto;
            }
            .container.registation_container{
                padding-right: 14px;
                padding-left: 10px;
            }
            p.address {
                font-size: 11px !important;
                color: floralwhite;
                font-variant: none;
                font-weight: 100;
                margin-top: 8px !important;
            }
            .card.forget_card{
                padding: 10px 10px;
            }
            .form-carb-body{
                padding-left: 0px;
                padding-right: 0px;
            }
            span.form_lbl_padding {
                padding-left: 0px;
                font-size: 18px;
            }
            .lb_text{
                font-size:14px;
            }
            input#email{
                font-size:13px;
            }
            input.inpt_pass{
                font-size:13px;
            }
            .image_size {
                margin-left: initial;
                font-size: 12px;
            }
            button#reg_submit{
                margin-top: 11px;
                font-size: 10px;
                border: none;
            }
            a#back{
                margin-top: 10px;
                border: none;
                font-size: 15px;
                line-height: 1.2;
            }
            .file-skeleton::before {
                position: absolute;
                left: -2px;
                top: 2px;
                width: 90%;
                height: 30px;
            }
            .file-error-skeleton::before {
                position: absolute;
                top: 33px;
                left: -35px;
                width: 90%;
            }
            .button-skeleton::before {
                position: absolute;
                top: -4px;
                left: -3px;
                height: 30px;
                width: 103%;
            }
            .loader-login {
                left: 35px;
            }
            .reset-button-skeleton::before {
                left: -3px;
                top: -2px;
                width: 103%;
                height: 27px;
            }
            button.btn.btn-sm.btn.forget_button {
                font-size: 15px;
                margin-top: 9px;
                line-height: 1;
            }
            .back-button-skeleton::before{
                left: -3px;
                top: -1px;
                width: 103%;
                height: 27px;
                border-radius: 3px;
            }
            .logo-skeleton::before {
                position: absolute;
                left: -17px;
                top: -8px;
            }
            .email-input-two-skeleton{
                position: relative;
            }
            .email-input-two-skeleton::before{
                left: -365px;
                top: -7px;
                height: 30px;
                width: 371px;
            }
            
        }
        @media only screen and (max-width: 400px) {
            header.sticky-top {
                position: sticky;
                width: 100%;
                display: list-item;
            }
            .font_size {
                font-size: 15px;
            }
            .row {
                margin-right: 0px;
                margin-left: 0px;
            }
            .container {
                width: 100%;
                padding-right: 0px;
                padding-left: 0px;
                margin-right: auto;
                margin-left: auto;
            }
            .container.registation_container{
                padding-right: 14px;
                padding-left: 10px;
            }
            p.address {
                font-size: 8px !important;
                color: floralwhite;
                font-variant: none;
                font-weight: 100;
                margin-top: 8px !important;
            }
            .card.forget_card{
                padding: 10px 10px;
            }
            .form-carb-body{
                padding-left: 0px;
                padding-right: 0px;
            }
            span.form_lbl_padding {
                padding-left: 0px;
                font-size: 18px;
            }
            .lb_text{
                font-size:9px;
            }
            input#email{
                font-size:9px;
            }
            input.inpt_pass{
                font-size:9px;
            }
            .image_size {
                margin-left: initial;
                font-size: 12px;
            }
            button.btn.btn-sm.btn.forget_button {
                font-size: 12px;
                margin-top: 9px;
                line-height: 1;
            }
            a#back{
                margin-top: 10px;
                border: none;
                line-height: 1.2;
                font-size: 12px;
            }
            .file-skeleton::before {
                position: absolute;
                left: -2px;
                top: 2px;
                width: 90%;
                height: 30px;
            }
            .file-error-skeleton::before {
                position: absolute;
                top: 33px;
                left: -35px;
                width: 90%;
            }
            .button-skeleton::before {
                position: absolute;
                top: -4px;
                left: -3px;
                height: 30px;
                width: 103%;
            }
            .loader-login {
                left: -18px;
            }
            .reset-button-skeleton::before {
                left: -3px;
                top: -1px;
                width: 103%;
                height: 27px;
            }
            .back-button-skeleton::before{
                left: -3px;
                top: -2px;
                width: 103%;
                height: 27px;
                border-radius: 3px;
            }
            .logo-skeleton::before {
                position: absolute;
                left: -19px;
                top: -8px;
            }
            .email-input-two-skeleton{
                position: relative;
            }
            .email-input-two-skeleton::before{
                left: -276px;
                top: -7px;
                height: 30px;
                width: 280px;
            }
            
        }
        @media only screen and (max-width: 380px) {
            header.sticky-top {
                position: sticky;
                width: 100%;
                display: list-item;
            }
            .font_size {
                font-size: 15px;
            }
            .row {
                margin-right: 0px;
                margin-left: 0px;
            }
            .container {
                width: 100%;
                padding-right: 0px;
                padding-left: 0px;
                margin-right: auto;
                margin-left: auto;
            }
            .container.registation_container{
                padding-right: 14px;
                padding-left: 10px;
            }
            p.address {
                font-size: 8px !important;
                color: floralwhite;
                font-variant: none;
                font-weight: 100;
                margin-top: 8px !important;
            }
            .card.forget_card{
                padding: 10px 10px;
            }
            .form-carb-body{
                padding-left: 0px;
                padding-right: 0px;
            }
            span.form_lbl_padding {
                padding-left: 0px;
                font-size: 18px;
            }
            .lb_text{
                font-size:9px;
            }
            input#email{
                font-size:9px;
            }
            input.inpt_pass{
                font-size:9px;
            }
            .image_size {
                margin-left: initial;
                font-size: 12px;
            }
            button.btn.btn-sm.btn.forget_button {
                font-size: 12px;
                margin-top: 9px;
                line-height:1;
            }
            a#back{
                margin-top: 10px;
                border: none;
                line-height:1.2;
                font-size: 12px;
            }
            .file-skeleton::before {
                position: absolute;
                left: -2px;
                top: 2px;
                width: 90%;
                height: 30px;
            }
            .file-error-skeleton::before {
                position: absolute;
                top: 33px;
                left: -35px;
                width: 90%;
            }
            .button-skeleton::before {
                position: absolute;
                top: -4px;
                left: -3px;
                height: 30px;
                width: 103%;
            }
            .loader-login {
                left: -16px;
            }
            .reset-button-skeleton::before {
                left: -3px;
                top: -2px;
                width: 103%;
                height: 27px;
            }
            .back-button-skeleton::before{
                left: -3px;
                top: -2px;
                width: 103%;
                height: 28px;
                border-radius: 3px;
            }
            .logo-skeleton::before {
                position: absolute;
                left: -19px;
                top: -8px;
            }
            .email-input-two-skeleton{
                position: relative;
            }
            .email-input-two-skeleton::before{
                left: -256px;
                top: -7px;
                width: 258px;
                height: 30px;
            }
            
        }
        @media only screen and (max-width: 300px){
            .email-input-two-skeleton::before{
                left: -175px;
                top: -7px;
                width: 177px;
                height: 30px;
            }
        }
    </style>
</head>
<header class="bg sticky-top">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" id="topBar_tigger">
        <p class="navbar-brand ps-2 admin_panel text-shadow" style="float: right;">
            <span class="logo-skeleton me-1"><img class="mt-1 company_logo" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt=""></span>
            <span class="heading-rest-skeleton">{{setting('company_name')}}</span>
        </p>
        <section class="justify-content-between">
            <p class="address skeleton media-address mt-1 me-2">{{setting('company_address')}}</p>            
        </section>
    </nav>
</header>

<body class="">
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
        <div class="hero-text heading reg_hidden company-name-classic">
            <h1 class="company" style="font-size:25px;text-align:left">
                <!-- Reset-Password-Page Title -->
                <span class="skeleton">Password</span>
            </h1>
        </div>
    </div>

    <div class="container" style="margin-top: 62px;">
        <div class="row">
            <div class="col-md-12 mb-5">
                <h4 class="heading_register text-shadow font_size" style="text-align: center;">
                    <span class="skeleton head-animaion">{{setting('reset_page_title')}}</span>
                </h4>
                <div class="">
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
                                                        <p class="panel-skeleton lb_text panel mb-1">Enter your registered email ID to reset the password
                                                        </p>
                                                    </div>
                                                    <input type="hidden" name="token" value="{{request()->input('token')}}" />
                                                    <div class="">
                                                        <span class="first_block">
                                                            <span class="skeleton lb_text">User : {{$user_image->name}}</span>
                                                            <span class="image_skeletone">
                                                                <img class="image_size" src="{{ asset('/storage/image/user-image/' . $user_image->image) }}" alt="user" />
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="email" class="form-label skeleton lb_text">Email</label>
                                                        <input type="email" id="email" class="current_border" name="email" placeholder="Enter Your Email" required="" value="{{request()->input('email')}}" readonly="" />
                                                        <span class="email-input-two-skeleton"></span>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="email" class="form-label skeleton lb_text">Password</label>
                                                        <input type="password" id="passwrd" class="inpt_pass current_border" name="password" placeholder="Enter Password" required="">
                                                        <span class="email-input-two-skeleton"></span>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="email" class="form-label skeleton lb_text">Conform Password</label>
                                                        <input type="password" id="confrm_passwrd" class="inpt_pass current_border" name="password_confirmation" placeholder="Enter Confirm Password" required="">
                                                        <span class="email-input-two-skeleton"></span>
                                                    </div>
                                                    <div class="mb-2 d-grid">
                                                        <button type="submit" class="btn btn-sm btn-primary forget_button register_btn reset-button-skeleton" id="change_Password">
                                                            <span class="btn-change-text">Change Password</span>
                                                            <span class="change-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                                        </button>
                                                    </div>
                                                    <div class="mb-3 d-grid">
                                                        <a id="back" type="submit" href="{{$home_url}}" class="btn btn-sm btn-primary forget_button back-button-skeleton">
                                                            <span class="back-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                                            <span class="back-btn-text">Back</span>
                                                        </a>
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
            <div class="row d-flex flex-column align-items-center justify-content-center">
                <div class="col-12">
                    @if(Session::has('success'))
                    <p id="success_message" class="background_success" style="color:green;">{{ Session::get('success') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('auth-js.register-ajax')
    <!-- Boostrap5 JS Table Filter -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JQUERY CDN LINK -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Sweet Alert CDN LINK -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script type="module" src="{{asset('backend_asset')}}/support_asset/auth/js/auth-helper-min.js"></script>
    <script type="module">
        import { 
            pageLoader, 
            toolTip, 
            browserInpect, 
            removeSkeletonClass, 
            handleSuccessMessage, 
            buttonLoader,
            rightSideBar
        } from "{{asset('backend_asset')}}/support_asset/auth/js/auth-helper-min.js";

        buttonLoader();
        pageLoader();
        toolTip();
        //browserInpect();

        $(document).ready(function(){
            // Initialize the message
            handleSuccessMessage('#success_message');
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
            // Initialize the button loader for the login button
            buttonLoader('#change_Password', '.change-icon', '.btn-change-text', 'Change Password...', 'Change Password', 3000);
            // Array of skeleton class names
            const skeletonClasses = [
                'skeleton', // General skeleton
                'heading-rest-skeleton',
                'email-label-skeleton',
                'logo-skeleton',
                'menu-rest-skeleton',
                'panel-skeleton',
                'back-button-skeleton',
                'reset-button-skeleton',
                'image_skeletone',
                'email-input-two-skeleton',
            ];
            // Remove skeleton
            setTimeout(() => {
                removeSkeletonClass(skeletonClasses);
            }, 2000);
        });
    </script>
    <script>
        // handel validation 
        $(document).ready(function(){
            
            const email_input = $("#email").val();
            if(email_input !== '' ){
                $("#email").addClass('is-valid');
                $("#email").removeClass('current_border');
            }
            else{
                $("#email").removeClass('is-valid');
                $("#email").addClass('current_border');
            }

            $(document).on('keyup', '#email, #passwrd, #confrm_passwrd', function(){
                
                const password_input = $("#passwrd").val();
                const confirm_password_input = $("#confrm_passwrd").val();
    
                if(password_input !== ''){
                    $("#passwrd").addClass('is-valid');
                    $("#passwrd").removeClass('current_border');
                }else {
                    $("#passwrd").removeClass('is-valid');
                    $("#passwrd").addClass('current_border');
                }
                if(confirm_password_input !== ''){
                    $("#confrm_passwrd").addClass('is-valid');
                    $("#confrm_passwrd").removeClass('current_border');
                }else{
                    $("#confrm_passwrd").removeClass('is-valid');
                    $("#confrm_passwrd").addClass('current_border');
                }
            });
        });
    </script>
</body>

</html>