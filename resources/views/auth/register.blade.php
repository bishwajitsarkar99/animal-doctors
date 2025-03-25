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

            :root{
                --font-register:"Poppins", Sans-serif;
            }

            *{
                margin:0;
                padding:0;
                box-sizing:border-box;
            }
            body {
                justify-content:center;
                align-items:center;
                flex-direction:column;
                font-family: var(--font-register);
                background-color:#e8edf13d;
            }

            .input-group {
                position: relative;
                width: 100%;
            }
            .input-group input.register, input.contract, input.reg_email, input.user_password {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
                outline: none;
                width: 100%;
                padding: 2px 8px;
                border-radius: 3px;
                font-size: 11px;
                font-weight: 700;
                color: #333;
                background: white;
                letter-spacing: 0.5px;
                word-spacing: 0.5px;
                animation: inputColor 2s infinite;
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
                transition: 0.2s ease-out;
                color: rgb(131 131 131);
                background-color: transparent;
                font-size: 12px;
                font-weight: 700;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            }
            .input-group input.register:focus ~ label, input.contract:focus ~ label, input.reg_email:focus ~ label, 
            input.user_password:focus ~ label,
            .input-group input.register:not(:placeholder-shown) ~ label, 
            input.contract:not(:placeholder-shown) ~ label, input.reg_email:not(:placeholder-shown) ~ label, 
            input.user_password:not(:placeholder-shown) ~ label {
                top: 0;
                left: 8px;
                font-size: 9px;
                font-weight:800;
                color: #333;
                background-color: rgb(228 243 255 / 67%);
                padding: 0 3px;
                word-spacing: 2px;
            }
            .input-group input.register, input.contract, input.reg_email, input.user_password {
                border-top-right-radius: 3px !important;
                border-bottom-right-radius: 3px !important;
            }

            .space{
                display:flex;
                justify-content: left;
                align-items: center;
            }
            p.address {
                text-align: justify;
                color: #fff;
                text-align: left;
                font-weight: 900;
                font-size: 14px;
                letter-spacing: 1px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
                font-family: var(--font-register);
            }
            .registation_container {
                padding-left: 300px;
                padding-right: 150px;
            }
            .card.forget_card{
                font-family: var(--font-register);
                padding: 20px 20px;
                border-radius: 5px !important;
            }
            .form-carb-body {
                background-color: #f7f7e3;
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
                border: 1px solid #dbdb90;
                color: #333 !important;
                background-color: #c3c3747d;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
                outline: none;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                transition: border-color 0.3s ease, background-color 0.3s ease;
                font-size: 11px;
                font-weight: 700;
                letter-spacing: 1px;
                font-family: var(--font-register);
            }
            button#reg_submit:hover{
                border-color: #b6b6786b;
                background-color: #dbdb906b;
                color: forestgreen !important;
                transition: border-color 0.3s ease, background-color 0.3s ease;
                --mdb-box-shadow-color-rgb: 0, 0, 0;
                box-shadow: 0 4px 9px -4px rgba(var(--mdb-box-shadow-color-rgb), 0.35) !important;
            }
            a#back{
                background-color: #c3c3747d;
                margin-left: 0px;
                border: 1px solid #dbdb90;
                margin-left: 0px;
                color: #333 !important;
                padding: 3px 5px;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
                outline: none;
                text-align:center;
                transition: border-color 0.3s ease, background-color 0.3s ease;
                box-shadow: none;
                font-family: var(--font-register);
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 1px;
                text-decoration: none;
            }
            a#back:hover{
                background-color: #c9c9836b;
                border: 1px solid #dbdb906b;
                color: forestgreen !important;
                transition: border-color 0.3s ease, background-color 0.3s ease;
                --mdb-box-shadow-color-rgb: 0, 0, 0;
                box-shadow: 0 4px 9px -4px rgba(var(--mdb-box-shadow-color-rgb), 0.35);
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
                    <span class="sub-title-skeleton">Registration</span>
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
                                                                <div class="input-group">
                                                                    <input class="register filed_src show-current-border" id="border_action" type="text" name="first_name" placeholder="" value="{{old('name')}}" autofocus>
                                                                    <label for="register">First Name</label>
                                                                </div>
                                                                <span class="input-error-skeleton text-danger name_message show-error remove-error-one">@error('first_name')
                                                                    <span class="space">
                                                                        <span class="pt-1"><svg width="20px" hieght="15px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> </span>
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="mb-4 d-grid">
                                                                <span class="input-skeleton"></span>
                                                                <div class="input-group">
                                                                    <input class="register filed_src show-current-border" id="border_action7" type="text" name="last_name" placeholder="" value="{{old('name')}}" autofocus>
                                                                    <label for="register">Last Name</label>
                                                                </div>
                                                                <span class="input-error-skeleton text-danger name_message show-error-seven remove-error-seven">@error('last_name')
                                                                    <span class="space">
                                                                        <span class="pt-1"><svg width="20px" hieght="15px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> </span>
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="mb-4 d-grid">
                                                                <span class="input-two-skeleton"></span>
                                                                <div class="input-group">
                                                                    <input class="contract show-current-border" type="text" name="contract_number" id="border_action2" placeholder="" value="{{old('contract_number')}}">
                                                                    <label for="contract">Contract Number</label>
                                                                </div>
                                                                <span class="input-error-skeleton text-danger contact_message show-error-two remove-error-two">@error('contract_number')
                                                                    <span class="space">
                                                                        <span class="pt-1"><svg width="20px" hieght="15px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> </span>
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="mb-4 d-grid">
                                                                <span class="input-email-skeleton"></span>
                                                                <div class="input-group">
                                                                    <input class="reg_email show-current-border" type="text" name="email" id="border_action3" placeholder="" value="{{ $valid_email ?? ''}}" readonly ="" />
                                                                    <label for="reg_email">Email Address</label>
                                                                </div>
                                                                <span class="input-error-skeleton text-danger email_message show-error-three remove-error-three">@error('email')
                                                                    <span class="space">
                                                                        <span class="pt-1"><svg width="20px" hieght="15px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> </span>
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="mb-4 d-grid">
                                                                <span class="input-email-skeleton"></span>
                                                                <div class="input-group">
                                                                    <input class="reg_email show-current-border" type="text" name="reference_email" id="border_action6" placeholder="" value="{{ old('reference_email') }}" />
                                                                    <label for="reference_email">Reference Email Address</label>
                                                                </div>
                                                                <span class="input-error-skeleton text-danger email_message show-error-six remove-error-six">@error('reference_email')
                                                                    <span class="space">
                                                                        <span class="pt-1"><svg width="20px" hieght="15px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> </span>
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="mb-4 d-grid">
                                                                <span class="input-three-skeleton"></span>
                                                                <div class="input-group">
                                                                    <input class="user_password show-current-border" type="password" name="password" id="border_action4" placeholder="" value="{{old('password')}}">
                                                                    <label for="user_password">Password</label>
                                                                </div>
                                                                <span class="input-error-skeleton text-danger input_message show-error-four remove-error-four">@error('password')
                                                                    <span class="space">
                                                                        <span class="pt-1"><svg width="25px" hieght="20px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> </span>
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="mb-4 d-grid">
                                                                <span class="input-four-skeleton"></span>
                                                                <input class="confirm confrim-password show-current-border" type="password" name="password_confirmation" id="border_action5" placeholder="Confirm Password" value="{{old('password')}}">
                                                                <span class="input-error-skeleton text-danger contact_message show-error-five remove-error-five">@error('password')
                                                                    <span class="space">
                                                                        <span class="pt-1"><svg width="20px" hieght="15px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> </span>
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </span>
                                                            </div>
                                                          </div>  
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="d-grid">
                                                                <span class="image_size cap-skeleton" style="text-align: center;background-color:beige;">
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
                                                                    <span class="space">
                                                                        <span class="pt-1"><svg width="20px" hieght="15px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> </span>
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div class="mb-2 d-grid">
                                                                <div class="align-items-center justify-content-center">
                                                                    <div class="progress skeleton">
                                                                        <div class="bar"></div>
                                                                        <div class="percent">0%</div>
                                                                    </div>
                                                                    <a class="btn btn-group-sm upload_btn upload-button-skeleton" id="uploadButton">
                                                                        <span class="img-upload-icon spinner-border spinner-border-sm register-hidden" style="color:forestgreen;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                                                                        <span class="upload-btn-text">Upload</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="mb-2 d-grid">
                                                                <button type="submit" class="btn btn-group-sm register_btn register_action button-skeleton error_handle" id="reg_submit">
                                                                    <span class="register-icon spinner-border spinner-border-sm" style="color:forestgreen;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                                                    <span class="btn-text">Register</span>
                                                                </button>
                                                            </div>
                                                            <div class="mb-2 d-grid">
                                                                <a type="submit" href="{{$register_form_url}}" class="btn btn-group-sm register_btn register_action button-skeleton" id="back">
                                                                    <span class="back-icon spinner-border spinner-border-sm" style="color:forestgreen;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
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
                    handleInputValidation('#border_action7', '.remove-error-seven');

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
                    var firstNameError = $(".show-error").text().trim();
                    var firstNameInputValue = $("#border_action").val();
                    var lastNameError = $(".show-error-seven").text().trim();
                    var lastNameInputValue = $("#border_action7").val();
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
                    // first name
                    if(firstNameError !== '' && firstNameInputValue == ''){
                        var errorFirstName = $(".show-error").closest('.row').find('#border_action');  
                        errorFirstName.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(firstNameError !== '' && firstNameInputValue !== ''){
                        var errorFirstName = $(".show-error").closest('.row').find('#border_action');  
                        errorFirstName.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(firstNameError == '' && firstNameInputValue == ''){
                        var errorFirstName = $(".show-error").closest('.row').find('#border_action');  
                        errorFirstName.addClass('show-current-border').removeClass('is-invalid is-valid');
                    }
                    // last name
                    if(lastNameError !== '' && lastNameInputValue == ''){
                        var errorLastName = $(".show-error-seven").closest('.row').find('#border_action');  
                        errorLastName.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(lastNameError !== '' && lastNameInputValue !== ''){
                        var errorLastName = $(".show-error-seven").closest('.row').find('#border_action');  
                        errorLastName.addClass('is-invalid').removeClass('show-current-border is-valid');
                    }else if(lastNameError == '' && lastNameInputValue == ''){
                        var errorLastName = $(".show-error-seven").closest('.row').find('#border_action');  
                        errorLastName.addClass('show-current-border').removeClass('is-invalid is-valid');
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
                $('#border_action7').on('keyup', function () {
                    $(".remove-error-seven").text('');
                    handleInputValidation('#border_action7', '.remove-error-seven');
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