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
    <link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
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
        .space{
            display:flex;
            justify-content: left;
            align-items: center;
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
        <p class="navbar-brand admin_panel text-shadow" style="float: right;">
            <span class="logo-skeleton"><img class="mt-1 company_logo" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt=""></span>
            <span class="heading-skeleton">{{setting('company_name')}}</span>
        </p>
        <p class="address media-address skeleton">{{setting('company_address')}}</p>
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
            <h1 class="company" style="font-size:25px;text-align:left">
                <!-- Email verification Page Title -->
                <span class="sub-title-skeleton">Verification</span>
            </h1>
        </div>
    </div>

    <div class="container" style="margin-top: 62px;">
        <div class="row">
            <div class="col-md-12 mb-5" style="margin-top:px">
                <h4 class="heading_register text-shadow font_size" style="text-align: center;">
                    <!-- Email verification Form Title -->
                    <span class="skeleton head-animaion">Email-Verification</span>
                </h4>
                <div class="">
                    <form action="{{ route('send.link') }}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <div class="row">
                                <div class="container d-flex flex-column">
                                    <div class="row align-items-center justify-content-center mb-3 mt-3">
                                        <div class="col-12 col-md-8 col-lg-4">
                                            <div class="card forget_card">
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <h5 class="skeleton lb_text">Verification</h5>
                                                        <p class="panel-skeleton lb_text panel mb-2">Your registered email to verify for your account verification.</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <form class="col-md-4">
                                                            <div class="">
                                                                <span class="first_block">
                                                                    <span class="skeleton lb_text">User : {{$users->name}}</span>
                                                                    <span class="image_skeletone">
                                                                        <img class="image_size" src="{{ asset('/storage/image/user-image/' . $users->image) }}" alt="user" />
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <span class="form-label select-skeleton lb_text">Email
                                                                <span class="text-danger verify_email_message">@error('email')
                                                                    <span class="space">
                                                                        <span class="pt-1"><svg width="20px" hieght="15px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> </span>
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </span>
                                                            </span>
                                                            <select type="email" class="form-control select2" name="email" id="email">
                                                                    <option value="">Select Email</option>
                                                                @foreach($email_verifications as $item)
                                                                    <option value="{{ $item->email }}">{{ $item->email }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="email-input-skeleton"></span>
                                                        </form>
                                                    </div>
                                                    <div class="mb-3 d-grid">
                                                        <button type="submit" class="email_submit btn btn-sm btn-primary forget_button register_btn email_submit" id="email_submit">
                                                            <span class="verification-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                                            <span class="btn-email-text">Email Verification</span>
                                                        </button>
                                                        <span class="email_verification_skeletone"></span>
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
    <!-- Boostrap5 JS Table Filter -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- JQUERY CDN LINK -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        //$('.select2').select2();
        $('.select2').select2({
            placeholder: 'Select Email',
            allowClear: true
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#email').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search emails...');
        });
    </script>
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
            buttonLoader 
        } from "{{asset('backend_asset')}}/support_asset/auth/js/auth-helper-min.js";
        buttonLoader();
        pageLoader();
        toolTip();
        //browserInpect();

        $(document).ready(function(){
            // Initialize the message
            handleSuccessMessage('#success_message');
            // Initialize the button loader for the login button
            buttonLoader('#email_submit', '.verification-icon', '.btn-email-text', 'Email Verification...', 'Email Verification', 3000);
            buttonLoader('#regist_back', '.regst-icon', '.btn-regst-text', 'Back...', 'Back', 3000);
            // Array of skeleton class names
            const skeletonClasses = [
                'skeleton', // General skeleton
                'heading-skeleton',
                'panel-skeleton',
                'select-skeleton',
                'logo-skeleton',
                'input-skeleton',
                'input-email-skeleton',
                'cap-skeleton',
                'file-skeleton',
                'menus-skeleton',
                'mini-skeleton',
                'email-input-skeleton',
                'image_skeletone',
                'email_verification_skeletone',
                'email_verification_back_skeletone',
                'sub-title-skeleton',
            ];
            // Remove skeleton
            setTimeout(() => {
                removeSkeletonClass(skeletonClasses);
            }, 2000);
        });
    </script>
</body>

</html>