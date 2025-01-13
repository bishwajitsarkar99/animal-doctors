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
        <title>{{setting('company_name')}}</title>

        <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            background-color:#d8edffd1;
        }
        .registation_container {
            padding-left: 300px;
            padding-right: 150px;
        }
        .card.forget_card{
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            padding: 20px 20px;
        }
        .form-carb-body {
            background-color: beige;
            padding-left: 20px;
            border-radius: 5px;
        }
        .form_lbl_padding {
            padding-left: 50px;
        }
        button#email_submit{
            margin-left: 0px;
        }
        a#regist_back{
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
        .img-group-box {
            justify-content: center;
            display: flex;
        }
        button#reg_submit{
            background-image: linear-gradient(to top, #dbdb90, #dbdb90, #dbdb90);
            margin-left: 0px;
            border: 1px solid #dbdb90;
            color: #684a00 !important;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }
        button#reg_submit:hover{
            background-image: linear-gradient(to top,  #39a839c9,  #39a839c9,  #39a839c9);
            border: 1px solid #39a839c9;
            color: white !important;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }
        a#back{
            background-image: linear-gradient(to top, #dbdb90, #dbdb90, #dbdb90);
            margin-left: 0px;
            border: 1px solid #dbdb90;
            color: #684a00 !important;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }
        a#back:hover{
            background-image: linear-gradient(to top,  #39a839c9,  #39a839c9,  #39a839c9);
            border: 1px solid #39a839c9;
            color: white !important;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }
        .progress {
            background-color: #dddddd;
        }

        @media only screen and (max-width: 976px) {
            header.sticky-top {
                position: sticky;
                width: 100%;
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
            .row {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: 0px;
                margin-left: 0px;
            }
            .card.forget_card{
                padding: 10px 10px;
            }
            p.address {
                font-size: 13px;
                color: floralwhite;
                font-variant: none;
                font-weight: 100;
                margin-top: -8px;
            }
            .form_lbl_padding {
                padding-left: 0;
                font-size: 25px;
            }
            .form-carb-body{
                padding-left: 17px;
                padding-right: 17px;
            }
            input.register{
                font-size:13px;
                font-weight: 700;
            }
            input.contract{
                font-size:13px;
                font-weight: 700;
            }
            input.reg_email{
                font-size:13px;
                font-weight: 700; 
            }
            input.user_password{
                font-size:13px;
                font-weight: 700; 
            }
            input.confrim-password{
                font-size:13px;
                font-weight: 700; 
            }
            .image_size {
                margin-left: initial;
                font-size: 13px;
                font-weight: 700;
            }
            #imgInput{
                font-size: 10px;
                font-weight: 600;
                width: 99%;
                border: none;
            }
            input.image {
                margin-left: 4px;
            }
            .upload_btn{
                font-size: 12px;
                font-weight: 600;  
                border: none;
            }
            button#reg_submit{
                margin-top: 11px;
                font-size: 12px;
                border: none;
            }
            a#back{
                margin-top: 11px;
                border: none;
            }
            a.btn.btn-sm.btn.forget_button{
                margin-top: 12px;
            }
            .input-skeleton::before, .input-two-skeleton::before, .input-three-skeleton::before, .input-four-skeleton::before, .input-five-skeleton::before, .input-six-skeleton::before, .input-email-skeleton::before {
                width: 100%;
            }
            .file-skeleton::before {
                position: absolute;
                left: 0px;
                top: 2px;
                width: 102%;
                height: 30px;
            }
            .file-error-skeleton::before {
                position: absolute;
                top: 7px;
                left: 0;
                width: 100%;
            }
            .button-skeleton::before {
                position: absolute;
                top: -4px;
                left: -2px;
                height: 30px;
                width: 103%;
            }
            .upload-button-skeleton::before{
                position: absolute;
                left: -3px;
                top: -3px;
                width: 103%;
                height: 30px;
            }
            .loader-login {
                left: -38px;
            }
        }

        @media only screen and (max-width: 700px) {
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
            .card.forget_card{
                padding: 10px 10px;
            }
            p.address {
                font-size: 11px;
                color: floralwhite;
                font-variant: none;
                font-weight: 100;
                margin-top: -8px;
            }
            .form_lbl_padding {
                padding-left: 0;
                font-size: 25px;
            }
            .form-carb-body{
                padding-left: 0px;
                padding-right: 0px;
            }
            input.register{
                font-size:12px;
                font-weight: 700;
            }
            input.contract{
                font-size:12px;
                font-weight: 700;
            }
            input.reg_email{
                font-size:12px;
                font-weight: 700; 
            }
            input.user_password{
                font-size:12px;
                font-weight: 700; 
            }
            input.confrim-password{
                font-size:12px;
                font-weight: 700; 
            }
            .image_size {
                margin-left: initial;
                font-size: 12px;
                font-weight: 700;
            }
            #imgInput{
                font-size: 10px;
                font-weight: 600;
                width: 99%;
                border: none;
            }
            input.image {
                margin-left: 4px;
            }
            .upload_btn{
                font-size: 12px;
                font-weight: 600;  
                border: none;
            }
            button#reg_submit{
                margin-top: 11px;
                font-size: 12px;
                border: none;
            }
            a#back{
                margin-top: 11px;
                border: none;
            }
            .input-skeleton::before, .input-two-skeleton::before, .input-three-skeleton::before, .input-four-skeleton::before, .input-five-skeleton::before, .input-six-skeleton::before, .input-email-skeleton::before {
                width: 100%;
            }
            .file-skeleton::before {
                position: absolute;
                left: 0px;
                top: 2px;
                width: 102%;
                height: 30px;
            }
            .file-error-skeleton::before {
                position: absolute;
                top: 7px;
                left: 0;
                width: 100%;
            }
            .button-skeleton::before {
                position: absolute;
                top: -4px;
                left: -3px;
                height: 30px;
                width: 103%;
            }
            .upload-button-skeleton::before{
                position: absolute;
                left: -3px;
                top: -3px;
                width: 103%;
                height: 30px;
            }
            .loader-login {
                left: -38px;
            }
        }

        @media only screen and (max-width: 600px) {
            .container.registation_container{
                padding-right: 14px;
                padding-left: 10px;
            }
            .card.forget_card{
                padding: 10px 10px;
            }
            p.address {
                font-size: 11px;
                color: floralwhite;
                font-variant: none;
                font-weight: 100;
                margin-top: -8px;
            }
            .form_lbl_padding {
                padding-left: 0;
                font-size: 25px;
            }
            .form-carb-body{
                padding-left: 0px;
                padding-right: 0px;
            }
            input.register{
                font-size:12px;
                font-weight: 700;
            }
            input.contract{
                font-size:12px;
                font-weight: 700;
            }
            input.reg_email{
                font-size:12px;
                font-weight: 700; 
            }
            input.user_password{
                font-size:12px;
                font-weight: 700; 
            }
            input.confrim-password{
                font-size:12px;
                font-weight: 700; 
            }
            .image_size {
                margin-left: initial;
                font-size: 12px;
                font-weight: 700;
            }
            #imgInput{
                font-size: 10px;
                font-weight: 600;
                width: 99%;
                border: none;
            }
            input.image {
                margin-left: 4px;
            }
            .upload_btn{
                font-size: 12px;
                font-weight: 600;  
                border: none;
            }
            button#reg_submit{
                margin-top: 11px;
                font-size: 12px;
                border: none;
            }
            a#back{
                margin-top: 11px;
                border: none;
            }
            .input-skeleton::before, .input-two-skeleton::before, .input-three-skeleton::before, .input-four-skeleton::before, .input-five-skeleton::before, .input-six-skeleton::before, .input-email-skeleton::before {
                width: 100%;
            }
            .file-skeleton::before {
                position: absolute;
                left: 0px;
                top: 2px;
                width: 102%;
                height: 30px;
            }
            .file-error-skeleton::before {
                position: absolute;
                top: 7px;
                left: 0;
                width: 100%;
            }
            .button-skeleton::before {
                position: absolute;
                top: -4px;
                left: -3px;
                height: 30px;
                width: 103%;
            }
            .upload-button-skeleton::before{
                position: absolute;
                left: -3px;
                top: -3px;
                width: 103%;
                height: 30px;
            }
            .loader-login {
                left: -38px;
            }
        }

        @media only screen and (max-width: 500px) {
            .container.registation_container{
                padding-right: 14px;
                padding-left: 10px;
            }
            .card.forget_card{
                padding: 10px 10px;
            }
            .form-carb-body{
                padding-left: 0px;
                padding-right: 0px;
            }
            input.register{
                font-size:10px;
            }
            input.contract{
                font-size:10px;
            }
            input.reg_email{
                font-size:10px; 
            }
            input.user_password{
                font-size:10px; 
            }
            input.confrim-password{
                font-size:10px; 
            }
            .image_size {
                margin-left: initial;
                font-size: 12px;
            }
            #imgInput{
                font-size: 9px;
                font-weight: 600;
                border: none;
                
            }
            .upload_btn{
                font-weight: 600;  
                border: none;
            }
            button#reg_submit{
                margin-top: 11px;
                font-size: 10px;
            }
            a#back{
                margin-top: 11px;
                border: none;
            }
            .file-skeleton::before {
                position: absolute;
                left: 0px;
                top: 2px;
                width: 100%;
                height: 30px;
            }
            .file-error-skeleton::before {
                position: absolute;
                top: 7px;
                left: 0;
                width: 100%;
            }
            .button-skeleton::before {
                position: absolute;
                top: -4px;
                left: -3px;
                height: 30px;
                width: 103%;
            }
            .upload-button-skeleton::before{
                position: absolute;
                left: -3px;
                top: -3px;
                width: 103%;
                height: 30px;
            }
            .loader-login {
                left: 55px;
            }
        }

        @media only screen and (max-width: 400px) {
            .container.registation_container{
                padding-right: 14px;
                padding-left: 10px;
            }
            .card.forget_card{
                padding: 10px 10px;
            }
            .form-carb-body{
                padding-left: 0px;
                padding-right: 0px;
            }
            input.register{
                font-size:10px;
            }
            input.contract{
                font-size:10px;
            }
            input.reg_email{
                font-size:10px; 
            }
            input.user_password{
                font-size:10px; 
            }
            input.confrim-password{
                font-size:10px; 
            }
            .image_size {
                margin-left: initial;
                font-size: 12px;
            }
            #imgInput{
                font-size: 9px;
                font-weight: 600;
                border: none;
            }
            .upload_btn{
                font-weight: 600;  
                border: none;
            }
            button#reg_submit{
                margin-top: 11px;
                font-size: 10px;
                border: none;
            }
            a#back{
                margin-top: 11px;
                border: none;
            }
            .file-skeleton::before {
                position: absolute;
                left: -2px;
                top: 2px;
                width: 102%;
                height: 30px;
            }
            .file-error-skeleton::before {
                position: absolute;
                top: 7px;
                left: -2px;
                width: 102%;
            }
            .button-skeleton::before {
                position: absolute;
                top: -4px;
                left: -3px;
                height: 30px;
                width: 103%;
            }
            .upload-button-skeleton::before{
                position: absolute;
                left: -3px;
                top: -3px;
                width: 103%;
                height: 30px;
            }
            .loader-login {
                left: 6px;
            }
        }

        @media only screen and (max-width: 380px) {
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
                font-size: 8px;
                color: floralwhite;
                font-variant: none;
                font-weight: 100;
                margin-top: 8px;
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
            input.register{
                font-size:9px;
            }
            input.contract{
                font-size:9px;
            }
            input.reg_email{
                font-size:9px; 
            }
            input.user_password{
                font-size:9px; 
            }
            input.confrim-password{
                font-size:9px; 
            }
            .image_size {
                margin-left: initial;
                font-size: 12px;
            }
            #imgInput{
                font-size: 9px;
                font-weight: 600;
                border: none;
            }
            .upload_btn{
                font-weight: 600;  
                border: none;
            }
            button#reg_submit{
                margin-top: 11px;
                font-size: 10px;
                border: none;
            }
            a#back{
                margin-top: 10px;
                border: none;
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
            .upload-button-skeleton::before{
                position: absolute;
                left: -3px;
                top: -3px;
                width: 103%;
                height: 30px;
            }
            .loader-login {
                left: -18px;
            }
        }
                
    </style>
    </head>
    <header class="bg sticky-top">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" id="topBar_tigger">
            <p class="navbar-brand admin_panel text-shadow" style="float: right;">
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
                            <a type="submit" href="/email-verification" class="btn btn-sm" id="logn_page">
                                <span class="btn-text logn_page"> Email-Verification</span>
                            </a>
                        </div>
                        <div class="side_canvas_animation" hidden>
                            <img class="sidebar-animation-size" src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                        </div>
                    </div>
                </div>
            </p> -->
        </nav>
    </header>

    <body class="">
        <div class="modal fade" id="loaderModalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
                    <div class="modal-body" id="loaderRegisterModal_body">
                        <div class="loader-login">
                            <img src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-image">
            <div class="hero-text heading reg_hidden company-name-classic">
                <h1 class="company">
                    <!-- User Register-Page Title -->
                    <span class="sub-title-skeleton">Register</span>
                </h1>
            </div>
        </div>

        <div class="container" style="margin-top: 65px;">
            <div class="row">
                <div class="col-md-12 mb-4" style="margin-top:px">
                    <div class="row">
                        <div class="col-xl-8">
                            <h4 class="heading_register text-shadow font_size">
                                <span style="text-align: center;">
                                    <span class="head-animaion form-head-skeleton form_lbl_padding">{{setting('register_page_title')}}</span>
                                </span>
                            </h4>
                        </div>
                        <div class="col-xl-4"> </div>
                    </div>
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
                                    <div class="container d-flex flex-column py-3 registation_container">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="card forget_card">
                                                <div class="card-body form-carb-body">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                          <div class="row mt-2">
                                                            <div class="mb-4 d-grid">
                                                                <span class="input-skeleton"></span>
                                                                <input class="register filed_src show-current-border" id="border_action" type="text" name="name" placeholder="User Name" value="{{old('name')}}" autofocus>
                                                                <span class="input-error-skeleton text-danger name_message show-error remove-error-one">@error('name')
                                                                    {{$message}}@enderror
                                                                </span>
                                                            </div>
                                                            <div class="mb-4 d-grid">
                                                                <span class="input-two-skeleton"></span>
                                                                <input class="contract show-current-border" type="text" name="contract_number" id="border_action2" placeholder="Contract Number" value="{{old('contract_number')}}">
                                                                <span class="input-error-skeleton text-danger contact_message show-error-two remove-error-two">@error('contract_number')
                                                                    {{$message}}@enderror
                                                                </span>
                                                            </div>
                                                            <div class="mb-4 d-grid">
                                                                <span class="input-email-skeleton"></span>
                                                                <input class="reg_email show-current-border" type="text" name="email" id="border_action3" placeholder="Email Address" value="{{ $valid_email ?? ''}}" readonly ="" />
                                                                <span class="input-error-skeleton text-danger email_message show-error-three remove-error-three">@error('email')
                                                                    {{$message}}@enderror
                                                                </span>
                                                            </div>
                                                            <div class="mb-4 d-grid">
                                                                <span class="input-email-skeleton"></span>
                                                                <input class="reg_email show-current-border" type="text" name="reference_email" id="border_action6" placeholder="Reference Email Address" value="{{ old('reference_email') }}" />
                                                                <span class="input-error-skeleton text-danger email_message show-error-six remove-error-six">@error('reference_email')
                                                                    {{$message}}@enderror
                                                                </span>
                                                            </div>
                                                            <div class="mb-4 d-grid">
                                                                <span class="input-three-skeleton"></span>
                                                                <input class="user_password show-current-border" type="password" name="password" id="border_action4" placeholder="Password" value="{{old('password')}}">
                                                                <span class="input-error-skeleton text-danger input_message show-error-four remove-error-four">@error('password')
                                                                    {{$message}}@enderror
                                                                </span>
                                                            </div>
                                                            <div class="mb-4 d-grid">
                                                                <span class="input-four-skeleton"></span>
                                                                <input class="confirm confrim-password show-current-border" type="password" name="password_confirmation" id="border_action5" placeholder="Confirm Password" value="{{old('password')}}">
                                                                <span class="input-error-skeleton text-danger contact_message show-error-five remove-error-five">@error('password')
                                                                    {{$message}}@enderror
                                                                </span>
                                                            </div>
                                                          </div>  
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="d-grid">
                                                                <span class="image_size cap-skeleton" style="text-transform: uppercase;text-align: center;background-color:beige;">
                                                                   User-Image : 150 x 150 (px) 
                                                                </span>
                                                                <div class="img-group-box signal-img pb-1">
                                                                    <div class="img-area skeleton" id="registerAnimation">
                                                                        <span class="skeleton">
                                                                            <img class="register_img imge-border show-current-border img-hidden" id="output" src="{{asset('backend_asset')}}/main_asset/img/undraw_profile.svg" alt="Image 500X500">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-4 d-grid">
                                                                <span class="file-skeleton"></span>
                                                                <input accept="image/*" type='file' id="imgInput" class="image click-img image_inpt mt-1" name="image" onchange="loadFile(event)" required>
                                                                <span class="file-error-skeleton text-danger photo_message show-error remove-error-six">@error('image')
                                                                    {{$message}}@enderror
                                                                </span>
                                                            </div>
                                                            <div class="mb-2 d-grid">
                                                                <div class="align-items-center justify-content-center">
                                                                    <div class="progress skeleton">
                                                                        <div class="bar"></div>
                                                                        <div class="percent">0%</div>
                                                                    </div>
                                                                    <a class="btn btn-group-sm upload_btn upload-button-skeleton" id="uploadButton">
                                                                        <span class="img-upload-icon spinner-border spinner-border-sm text-white register-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                                                                        <span class="upload-btn-text">Upload</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 d-grid">
                                                                <button type="submit" class="btn btn-sm btn-primary forget_button register_btn register_action button-skeleton error_handle" id="reg_submit">
                                                                    <span class="register-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                                                    <span class="btn-text">Register</span>
                                                                </button>
                                                            </div>
                                                            <div class="mb-2 d-grid">
                                                                <a type="submit" href="{{$register_form_url}}" class="btn btn-sm btn-primary forget_button register_btn register_action button-skeleton" id="back">
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
                buttonLoader,
                imageUploadBtnLoader,
                pageLoader, 
                handleSuccessMessage,
                loadFile,
                handleImageUpload,
                toolTip,
                rightSideBar,
                removeSkeletonClass,
                browserInpect
            } from "{{asset('backend_asset')}}/support_asset/auth/js/auth-helper-min.js";
            buttonLoader();
            imageUploadBtnLoader();
            pageLoader();
            toolTip();
            //browserInpect();

            $(document).ready(function () {
                // image uplaod
                // Bind the image preview
                const imageInput = document.getElementById('imgInput');
                if (imageInput) {
                    imageInput.addEventListener('change', loadFile);
                }
                // Initialize the message
                handleSuccessMessage('#success_message');
                // Initialize the image upload with progress bar simulation
                handleImageUpload('#uploadButton');
                // Initialize the button loader for the login button
                buttonLoader('#reg_submit', '.register-icon', '.btn-text', 'Register...', 'Register', 3000);
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
                // Array of skeleton class names
                const skeletonClasses = [
                    'skeleton', // General skeleton
                    'logo-skeleton',
                    'nav-head-skeleton',
                    'sub-title-skeleton',
                    'form-head-skeleton',
                    'input-skeleton',
                    'input-three-skeleton',
                    'input-four-skeleton',
                    'input-two-skeleton',
                    'input-email-skeleton',
                    'mini-capsule-skeleton',
                    'cap-skeleton',
                    'file-skeleton',
                    'menu-skeleton',
                    'button-skeleton',
                    'upload-button-skeleton',
                    'input-error-skeleton',
                    'file-error-skeleton',
                ];
                // Remove skeleton
                setTimeout(() => {
                    removeSkeletonClass(skeletonClasses);
                }, 2000);
            });
        </script>
        <script>
            $(document).ready(function () {
                // Function to handle input validation on keyup
                function handleInputValidation(inputSelector, errorSelector) {
                    var inputVal = $(inputSelector).val().trim();
                    
                    // Display or hide error message and border styles
                    if (inputVal !== '') {
                        $(inputSelector).removeClass('show-current-border').removeClass('is-invalid').addClass('is-valid');
                    } else {
                        $(inputSelector).addClass('show-current-border').removeClass('is-valid').removeClass('is-invalid');
                    }
                }

                // Check input values and errors on page load
                function checkInitialInputStates() {
                    // Apply styles based on the existing input values
                    handleInputValidation('#border_action', '.remove-error-one');
                    handleInputValidation('#border_action2', '.remove-error-two');
                    handleInputValidation('#border_action3', '.remove-error-three');
                    handleInputValidation('#border_action4', '.remove-error-four');
                    handleInputValidation('#border_action5', '.remove-error-five');
                    handleInputValidation('#border_action6', '.remove-error-six');

                    // Image upload field validation
                    var inputVal = $(".image").val().trim();
                    if (inputVal !== '') {
                        $(".six-check").removeClass('check-hidden');
                        $(".imge-border").removeClass('show-current-border is-invalid').addClass('is-valid-img');
                        $(".signal-img").addClass('is-valid-image');
                    } else {
                        $(".six-check").addClass('check-hidden');
                        $(".imge-border").addClass('show-current-border is-valid-img').removeClass('is-invalid-img');
                    }
                }
                
                // Initial error handling
                function checkForErrors() {
                    // Error handling for input fields
                    var nameError = $(".show-error").text().trim();
                    var nameInputValue = $("#border_action").val();
                    var contractNumberError = $(".show-error-two").text().trim();
                    var contractNumberInputValue = $("#border_action2").val();
                    var emailError = $(".show-error-three").text().trim();
                    var emailInputValue = $("#border_action3").val();
                    var referenceEmailError = $(".show-error-four").text().trim();
                    var referenceEmailInputValue = $("#border_action4").val();
                    var passwordError = $(".show-error-five").text().trim();
                    var passwordInputValue = $("#border_action5").val();
                    var confirmPasswordError = $(".show-error-six").text().trim();
                    var confirmPasswordInputValue = $("#border_action6").val();
                    // name
                    if(nameError !== '' && nameInputValue == ''){
                        var errorName = $(".show-error").closest('.row').find('#border_action');  
                        errorName.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(nameError !== '' && nameInputValue !== ''){
                        var errorName = $(".show-error").closest('.row').find('#border_action');  
                        errorName.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(nameError == '' && nameInputValue == ''){
                        var errorName = $(".show-error").closest('.row').find('#border_action');  
                        errorName.addClass('show-current-border').removeClass('is-invalid is-valid');
                    }
                    // contract number
                    if(contractNumberError !== '' && contractNumberInputValue == ''){
                        var errorContract = $(".show-error").closest('.row').find('#border_action2');  
                        errorContract.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(contractNumberError !== '' && contractNumberInputValue !== ''){
                        var errorContract = $(".show-error").closest('.row').find('#border_action2');  
                        errorContract.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(contractNumberError == '' && contractNumberInputValue == ''){
                        var errorContract = $(".show-error").closest('.row').find('#border_action2');  
                        errorContract.addClass('show-current-border').removeClass('is-invalid is-valid');
                    }
                    // email
                    if(emailError !== '' && emailInputValue == ''){
                        var errorEmail = $(".show-error").closest('.row').find('#border_action3');  
                        errorEmail.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(emailError !== '' && emailInputValue !== ''){
                        var errorEmail = $(".show-error").closest('.row').find('#border_action3');  
                        errorEmail.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(emailError == '' && emailInputValue == ''){
                        var errorEmail = $(".show-error").closest('.row').find('#border_action3');  
                        errorEmail.addClass('show-current-border').removeClass('is-invalid is-valid');
                    }
                    // reference email
                    if(referenceEmailError !== '' && referenceEmailInputValue == ''){
                        var errorReferenceEmail = $(".show-error").closest('.row').find('#border_action4');  
                        errorReferenceEmail.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(referenceEmailError !== '' && referenceEmailInputValue !== ''){
                        var errorReferenceEmail = $(".show-error").closest('.row').find('#border_action4');  
                        errorReferenceEmail.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(referenceEmailError == '' && referenceEmailInputValue == ''){
                        var errorReferenceEmail = $(".show-error").closest('.row').find('#border_action4');  
                        errorReferenceEmail.addClass('show-current-border').removeClass('is-invalid is-valid');
                    }
                    // password
                    if(passwordError !== '' && passwordInputValue == ''){
                        var errorPassword = $(".show-error").closest('.row').find('#border_action5');  
                        errorPassword.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(passwordError !== '' && passwordInputValue !== ''){
                        var errorPassword = $(".show-error").closest('.row').find('#border_action5');  
                        errorPassword.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(passwordError == '' && passwordInputValue == ''){
                        var errorPassword = $(".show-error").closest('.row').find('#border_action5');  
                        errorPassword.addClass('show-current-border').removeClass('is-invalid is-valid');
                    }
                    // confirm password
                    if(confirmPasswordError !== '' && confirmPasswordInputValue == ''){
                        var errorConfirmPassword = $(".show-error").closest('.row').find('#border_action6');  
                        errorConfirmPassword.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(confirmPasswordError !== '' && confirmPasswordInputValue !== ''){
                        var errorConfirmPassword = $(".show-error").closest('.row').find('#border_action6');  
                        errorConfirmPassword.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(confirmPasswordError == '' && confirmPasswordInputValue == ''){
                        var errorConfirmPassword = $(".show-error").closest('.row').find('#border_action6');  
                        errorConfirmPassword.addClass('show-current-border').removeClass('is-invalid is-valid');
                    }

                    // Error handling for image input
                    var imageErrorMessage = $(".photo_message").text().trim();
                    if (imageErrorMessage !== '') {
                        $(".imge-border").removeClass('show-current-border is-valid').addClass('is-invalid');
                        $(".imge-border").removeClass('show-current-border is-valid-img').addClass('is-invalid-img');
                        $(".signal-img").addClass('is-invalid-image');
                        $(".image_inpt").addClass('is-invalid-image');
                    }
                }

                // Run initial checks
                checkInitialInputStates();
                checkForErrors();

                // Add event listeners for input changes
                $('#border_action').on('keyup', function () {
                    $(".remove-error-one").text('');
                    handleInputValidation('#border_action', '.remove-error-one');
                });
                $('#border_action2').on('keyup', function () {
                    $(".remove-error-two").text('');
                    handleInputValidation('#border_action2', '.remove-error-two');
                });
                $('#border_action3').on('keyup', function () {
                    $(".remove-error-three").text('');
                    handleInputValidation('#border_action3', '.remove-error-three');
                });
                $('#border_action4').on('keyup', function () {
                    $(".remove-error-four").text('');
                    handleInputValidation('#border_action4', '.remove-error-four');
                });
                $('#border_action5').on('keyup', function () {
                    $(".remove-error-five").text('');
                    handleInputValidation('#border_action5', '.remove-error-five');
                });
                $('#border_action6').on('keyup', function () {
                    $(".remove-error-six").text('');
                    handleInputValidation('#border_action6', '.remove-error-six');
                });
                // Image upload field validation
                $(".image").on('change', function () {
                    var inputVal = $(this).val().trim();
                    $(".photo_message").text('');  // Remove error message
                    $(".image").removeClass('is-invalid-img');

                    // Reset progress bar
                    $('.bar').css('width', '0%');
                    $('.percent').text('0%');
                    $(".register_img").addClass('img-hidden');

                    if (inputVal !== '') {
                        $(".imge-border").removeClass('show-current-border').addClass('is-valid-img');
                        $(".signal-img").addClass('is-valid-image');
                        $(".image_inpt").addClass('is-valid');
                    } else {
                        $(".imge-border").addClass('show-current-border').removeClass('is-valid-img');
                        $(".signal-img").removeClass('is-valid-image');
                    }
                });
            });
        </script>
    </body>

</html>