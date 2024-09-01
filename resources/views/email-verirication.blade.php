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
    <title>Email Verification</title>
</head>
<header class="bg sticky-top">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" id="topBar_tigger">
        <p class="navbar-brand ps-3 admin_panel text-shadow" style="float: right;">
            <span class="logo-skeleton"><img class="mt-1 company_logo" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt=""></span>
            <span class="heading-skeleton">{{setting('company_name')}}</span>
        </p>
        <p class="address skeleton">{{setting('company_address')}}</p>
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
                <span class="skeleton">{{setting('forgot_page_sub_title')}}</span>
            </h1>
        </div>
    </div>

    <div class="container bg" style="margin-top: 62px;">
        <div class="row">
            <div class="col-md-12 mb-5" style="margin-top:px">
                <h4 class="heading_admin_login text-shadow" style="text-align: center;">
                    <span class="skeleton forget_text">Email-Verification</span>
                </h4>
                <div class="">
                    <form action="{{ route('send.link') }}" method="POST">
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
                                                    <div class="mb-4">
                                                        <h5 class="skeleton lb_text">Verification</h5>
                                                        <p class="skeleton lb_text mb-2">Your registered email to verify for your account verification.
                                                        </p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <form class="col-md-4">
                                                            <label for="email" class="form-label skeleton lb_text">Email :</label>
                                                            <select type="email" class="form-control select2" name="email" id="email">
                                                                <option>Car</option>
                                                                <option>Bike</option>
                                                                <option>Scooter</option>
                                                                <option>Cycle</option>
                                                            </select>
                                                        </form>
                                                        <span class="email-input-skeleton"></span>
                                                    </div>
                                                    <div class="container">
                                                        <div class="row">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 d-grid">
                                                        <button type="submit" class="btn btn-sm btn-primary forget_button register_btn">
                                                            Send Email
                                                        </button>
                                                    </div>
                                                    <div class="mb-3 d-grid">
                                                        <a type="button" class="btn_back ps-2 pe-2 pb-1" href="/register">Back</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('.select2').select2();
    </script>
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
            const  allSkeleton = document.querySelectorAll('.email-input-skeleton')
        
            allSkeleton.forEach(item=>{
                item.classList.remove('email-input-skeleton')
            });
        }
        setTimeout(() => {
            headingSkeleton();
            logo();
            fetchData();
            inputSkeleton();
            inputEamilSkeleton();
            capSkeleton();
            fileSkeleton();
            imageSkeleton();
            miniSkeleton();
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
</body>

</html>