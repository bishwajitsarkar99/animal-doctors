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
            <div class="hero-text heading reg_hidden company-name-classic">
                <h1 class="company">
                    <span class="sub-title-skeleton">{{setting('register_page_sub_title')}}</span>
                </h1>
            </div>
        </div>

        <div class="container bg" style="margin-top: 65px;">
            <div class="row">
                <div class="col-md-12 mb-4" style="margin-top:px">
                    <h4 class="heading_register text-shadow font_size  ps-2" style="text-align: center;">
                        <span class="head-animaion form-head-skeleton">{{setting('register_page_title')}}</span>
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
                                                                    <input class="register filed_src show-current-border input_hidden" id="border_action" type="text" name="name" placeholder="User Name" value="{{old('name')}}" autofocus>
                                                                    <span class="input-error-skeleton text-danger name_message show-error remove-error-one">@error('name')
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
                                                                    <input class="contract show-current-border input_hidden" type="text" name="contract_number" id="border_action2" placeholder="Contract Number" value="{{old('contract_number')}}">
                                                                    <span class="input-error-skeleton text-danger contact_message show-error remove-error-two">@error('contract_number')
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
                                                                    <input class="reg_email show-current-border input_hidden" type="text" name="email" id="border_action3" placeholder="Email Address" value="{{old('email')}}">
                                                                    <span class="input-error-skeleton text-danger email_message show-error remove-error-three">@error('email')
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
                                                                    <span class="input-three-skeleton"></span>
                                                                    <input class="user_password show-current-border input_hidden" type="password" name="password" id="border_action4" placeholder="Password" value="{{old('password')}}">
                                                                    <span class="input-error-skeleton text-danger input_message show-error remove-error-four">@error('password')
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
                                                                    <span class="input-four-skeleton"></span>
                                                                    <input class="confirm confrim-password show-current-border input_hidden" type="password" name="password_confirmation" id="border_action5" placeholder="Confirm Password">
                                                                    <span class="input-error-skeleton text-danger contact_message show-error remove-error-five">@error('password')
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
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <span class="image_size cap-skeleton" style="text-transform: uppercase;">150 x 150 (px) 
                                                                        <span style="color:green;font-weight:800;font-size: 15px;"><i class="six-check fa fa-check check-hidden"></i></span>
                                                                    </span>
                                                                    <div class="img-area" id="registerAnimation">
                                                                        <span class="skeleton"><img class="register_img image-current-border imge-border img-hidden" id="output" src="{{asset('backend_asset')}}/main_asset/img/undraw_profile.svg" alt="Image 500X500"></span>
                                                                    </div>
                                                                    <span class="file-skeleton"></span>
                                                                    <input accept="image/*" type='file' id="imgInput" class="image click-img mt-1" name="image" onchange="loadFile(event)" required>
                                                                    <span class="file-error-skeleton text-danger photo_message show-error remove-error-six">@error('image')
                                                                        {{$message}}@enderror
                                                                    </span>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="upload-group align-items-center justify-content-center">
                                                                        <div class="progress">
                                                                            <div class="bar"></div>
                                                                            <div class="percent">0%</div>
                                                                        </div>
                                                                        <a class="btn btn-group-sm upload_btn" id="uploadButton">Upload</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-1 d-grid">
                                                            <button type="submit" class="btn btn-sm btn-primary forget_button register_btn register_action" id="reg_submit">
                                                                <span class="btn-text">Register</span>
                                                                <i class="register-icon fa fa-spinner fa-spin register-hidden"></i>
                                                            </button>
                                                            <span class="button-skeleton"></span>
                                                        </div>
                                                        <a type="button" class="btn_back skeleton ps-2 pe-2 pb-1" href="/" id="back_login">
                                                            <span class="btn-back-text">Back</span>
                                                            <i class="back-icon fa fa-spinner fa-spin register-hidden"></i>
                                                        </a>
                                                        <span class="button-skeleton"></span>
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
            function subTitleSkeleton(){
                const  allSkeleton = document.querySelectorAll('.sub-title-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('sub-title-skeleton')
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
            function inputFourSkeleton(){
                const  allSkeleton = document.querySelectorAll('.input-four-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('input-four-skeleton')
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
            function inputErrorSkeleton(){
                const  allSkeleton = document.querySelectorAll('.input-error-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('input-error-skeleton')
                });
            }
            function fileErrorSkeleton(){
                const  allSkeleton = document.querySelectorAll('.file-error-skeleton')
            
                allSkeleton.forEach(item=>{
                    item.classList.remove('file-error-skeleton')
                });
            }
            setTimeout(() => {
                logo();
                fetchData();
                navHeadSkeleton();
                subTitleSkeleton();
                formHeadSkeleton();
                inputSkeleton();
                inputTwoSkeleton();
                inputThreeSkeleton();
                inputFourSkeleton();
                inputEamilSkeleton();
                miniCapSkeleton();
                capSkeleton();
                fileSkeleton();
                imageSkeleton();
                buttonSkeleton();
                inputErrorSkeleton();
                fileErrorSkeleton();
                $('input').removeClass('input_hidden');
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
            $(document).ready(function () {
                // Function to handle input validation on keyup
                function handleInputValidation(inputSelector, errorSelector, checkSelector, fillupSelector) {
                    var inputVal = $(inputSelector).val().trim();
                    
                    // Display or hide error message and border styles
                    if (inputVal !== '') {
                        $(inputSelector).removeClass('show-error-border show-current-border').addClass('show-success-border');
                        $(checkSelector).removeClass('check-hidden');
                        $(fillupSelector).removeClass('fillup-block').addClass('fillup-hidden');
                    } else {
                        $(inputSelector).addClass('show-current-border').removeClass('show-success-border show-error-border');
                        $(checkSelector).addClass('check-hidden');
                        $(fillupSelector).addClass('fillup-block').removeClass('fillup-hidden');
                    }
                }

                // Check input values and errors on page load
                function checkInitialInputStates() {
                    // Apply styles based on the existing input values
                    handleInputValidation('#border_action', '.remove-error-one', '.first-check', '#firstFillUp');
                    handleInputValidation('#border_action2', '.remove-error-two', '.second-check', '#secondFillUp');
                    handleInputValidation('#border_action3', '.remove-error-three', '.third-check', '#thirdFillUp');
                    handleInputValidation('#border_action4', '.remove-error-four', '.four-check', '#fourFillUp');
                    handleInputValidation('#border_action5', '.remove-error-five', '.five-check', '#fiveFillUp');

                    // Image upload field validation
                    var inputVal = $(".image").val().trim();
                    if (inputVal !== '') {
                        $(".six-check").removeClass('check-hidden');
                        $(".imge-border").removeClass('image-current-border image-error-border').addClass('image-success-border');
                    } else {
                        $(".six-check").addClass('check-hidden');
                        $(".imge-border").addClass('image-current-border').removeClass('image-success-border image-error-border');
                    }
                }

                // Initial error handling
                function checkForErrors() {
                    // Error handling for input fields
                    $(".show-error").each(function () {
                        var errorMessage = $(this).text().trim();
                        if (errorMessage !== '') {
                            var errorInput = $(this).closest('.row').find('input');
                            errorInput.addClass('show-error-border').removeClass('show-current-border show-success-border');
                        }
                    });

                    // Error handling for image input
                    var imageErrorMessage = $(".photo_message").text().trim();
                    if (imageErrorMessage !== '') {
                        $(".imge-border").removeClass('image-current-border image-success-border').addClass('image-error-border');
                    }
                }

                // Run initial checks
                checkInitialInputStates();
                checkForErrors();

                // Add event listeners for input changes
                $('#border_action').on('keyup', function () {
                    $(".remove-error-one").text('');
                    handleInputValidation('#border_action', '.remove-error-one', '.first-check', '#firstFillUp');
                });
                $('#border_action2').on('keyup', function () {
                    $(".remove-error-two").text('');
                    handleInputValidation('#border_action2', '.remove-error-two', '.second-check', '#secondFillUp');
                });
                $('#border_action3').on('keyup', function () {
                    $(".remove-error-three").text('');
                    handleInputValidation('#border_action3', '.remove-error-three', '.third-check', '#thirdFillUp');
                });
                $('#border_action4').on('keyup', function () {
                    $(".remove-error-four").text('');
                    handleInputValidation('#border_action4', '.remove-error-four', '.four-check', '#fourFillUp');
                });
                $('#border_action5').on('keyup', function () {
                    $(".remove-error-five").text('');
                    handleInputValidation('#border_action5', '.remove-error-five', '.five-check', '#fiveFillUp');
                });
                // Image upload field validation
                $(".image").on('change', function () {
                    var inputVal = $(this).val().trim();
                    $(".photo_message").text('');  // Remove error message
                    $(".image").removeClass('image-error-border');

                    if (inputVal !== '') {
                        $(".six-check").removeClass('check-hidden');
                        $(".imge-border").removeClass('image-current-border').addClass('image-success-border');
                    } else {
                        $(".six-check").addClass('check-hidden');
                        $(".imge-border").addClass('image-current-border').removeClass('image-success-border');
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                // Handle file upload click and progress bar display
                $(document).on('click', '#uploadButton', function () {
                    var bar = document.querySelector('.bar');
                    var percent = document.querySelector('.percent');
                    var simulatedProgress = 0;

                    var uploadInterval = setInterval(function () {
                        simulatedProgress += 10;

                        if (simulatedProgress <= 100) {
                            bar.style.width = simulatedProgress + '%';
                            percent.innerHTML = simulatedProgress + '%';
                        } else {
                            clearInterval(uploadInterval);
                            $(".register_img").removeClass('img-hidden');
                        }
                    }, 200);
                });
            });
        </script>
    </body>

</html>