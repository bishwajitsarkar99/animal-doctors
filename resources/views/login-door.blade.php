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

        <!-- Styles headings-skeleton logo-skeleton -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                background-color:#d8edffd1;
            }
            img.logo_size{
                height:50px;
                width: 50px;
            }
            span.text_size{
                font-size:25px;
                font-weight:800;
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                text-transform: uppercase;

            }
            a.reistration_text{
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-size:12px;
                font-weight:700;
                color:green;
                text-decoration:underline;
                text-decoration-color:darkcyan;
            }
            form#loginDoorForm {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                padding-left: 13px;
                margin-top:27px;
                background-color: beige;
                padding-bottom:10px;
                padding-right:19px;
            }
            table{
                border-collapse: collapse;
                width: 100%;
            }
            tr.table_head_row {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                color: black;
                font-size: 15px;
            }
            td.user-login-td {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                width: 100%;
                background-color: beige;
            }
            td.user_login_form_label {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                background-color: beige;
                width: 14%;
                font-weight: 700;
                font-size: 12px;
                text-align: center;
                padding-top: 5px;
                color: black;
            }
            input.user_login_form {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                outline: none;
                box-shadow: none;
                width: 100%;
                border: 1px solid goldenrod;
                padding-left: 5px;
                border-radius: 3px;
                padding-bottom: 0px;
                font-size: 11px;
                font-weight: 700;
                color: black;
                letter-spacing: 0.5px;
                word-spacing: 0.5px;
            }
            .button_area {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                justify-content: end;
                padding-right: 16px;
                padding-top: 10px;
            }
        </style>
    </head>

    <body class="antialiased min-h-screen">
        <div class="relative flex items-top justify-center pt-5">
            <span class="media_text1">
                <img class="mt-1 company_logo logo_size bg-primary" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt="">
            </span>
            <span class="media_text2 text_size text-primary ms-3 mt-1">{{setting('company_name')}}</span>
        </div>
        <div class="relative flex items-top justify-center py-1 sm:pt-0 pt-5">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 bg-gray-100 dark:bg-gray-900 sm:items-center">
                <form id="loginDoorForm" action="#" method="POST" autocomplete="off">
                    <table>
                        <thead>
                            <tr class="table_head_row">
                                <th class="text-center py-1" colspan="2"><span>Open Door</span></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="table-row">
                                <td class="user_login_form_label"> Email : </td>
                                <td class="user-login-td"><input class="user_login_form" type="text" name="email" value="" placeholder="User Email" id="user_login_form"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row button_area">
                        <button id="openSubmit" type="button" class="btn btn-sm btn-primary login_button">
                            <span class="loading-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                            <span class="btn-text">Open</span>
                        </button>
                    </div>
                </form>
                <div class="flex justify-center mt-4 mb-3 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400" style="color:burlywood;">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="#" class="ml-1 underline">
                                <span>Supplier Management System Software V-3.0.1</span>
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400" style="color:burlywood;">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0"></div>
                </div>
            </div>
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
                //pageLoader, 
                //handleSuccessMessage, 
                //toolTip, 
                //browserInpect, 
                //rightSideBar, 
                //handleInputValidation, 
                //removeSkeletonClass 
            } from "{{asset('backend_asset')}}/support_asset/auth/js/auth-helper-min.js";
            buttonLoader();
            //pageLoader();
            //toolTip();
            //browserInpect();

            $(document).ready(function () {
                // Initialize the message
                //handleSuccessMessage('#success_message');
                // Initialize the button loader for the login button
                buttonLoader('.login_button', '.loading-icon', '.btn-text', 'Open...', 'Open', 2000);
                // Initialize right sidebar canvas the loader modal with skeleton loading effect
                // rightSideBar(
                //     '.menu_btn',                   // Button selector to attach the click event
                //     '#loader_modal',               // Modal selector
                //     '.side_canvas_animation',       // Loader selector
                //     [                               // Array of elements to apply skeleton effect
                //         '.head_auth', 
                //         '.btn-close', 
                //         '.forg_page', 
                //         '.reg_page', 
                //         '.logn_page'
                //     ],
                //     2000
                // );
                // // Handle email validation
                // handleInputValidation(
                //     '.email_src',              // Input selector
                //     '.show-error',             // Error message selector
                //     'show-success-border',     // Success class
                //     'is-invalid',              // Error class
                //     'show-current-border',     // Default border class
                //     '.src_email'               // Success message selector
                // );
                // // Handle password validation
                // handleInputValidation(
                //     '.password_src',           // Input selector
                //     '.show-error2',            // Error message selector
                //     'show-success-border',     // Success class
                //     'is-invalid',              // Error class
                //     'show-current-border',     // Default border class
                //     '.src_password'            // Success message selector
                // );
                // // Array of skeleton class names
                // const skeletonClasses = [
                //     'headings-skeleton',
                //     'input-user-skeleton',
                //     'input-email-skeleton',
                //     'input-password-skeleton',
                //     'button-skeleton',
                //     'skeleton', // General skeleton
                //     'email-label-skeleton',
                //     'logo-skeleton',
                //     'menu-skeleton',
                //     'whatsapp-skeleton',
                //     'messenger-skeleton',
                //     'facebook-skeleton'
                // ];
                // Remove skeleton
                // setTimeout(() => {
                //     removeSkeletonClass(skeletonClasses);
                // }, 2000);
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
                // $(document).on('click', '#submit', function() {
                //     var errorMessage = $(this).text().trim();
                //     $(this).attr("data-error", errorMessage);
                //     if (errorMessage !== '') {
                //         $('.remove-error').addClass('error-skeleton');
                //         $('.remove-error2').addClass('error-skeleton');
                //         $('.remove-user-error').addClass('user-error-skeleton');
                //         setTimeout(function() {
                //             $('.remove-error').removeClass('error-skeleton');
                //             $('.remove-error2').removeClass('error-skeleton');
                //             $('.remove-user-error').removeClass('user-error-skeleton');
                //         }, 2000);
                //     }
                // });

                // Open Login Page
                $(document).on('click', '#openSubmit', function (e) {
                    e.preventDefault();

                    var user_email = $("#user_login_form").val();
                    if (!user_email) {
                        alert("Please enter a valid email.");
                        return;
                    }

                    currentURL = "{{ route('login_page.action') }}";

                    // Make the AJAX request
                    $.ajax({
                        type: "GET",
                        url: currentURL,
                        data: { email: user_email},
                        dataType: "json",
                        success: function (response) {
                            if (response.status === 200) {
                                window.location.href = response.redirect;
                            } else {
                                alert(response.error || "An unexpected error occurred.");
                            }
                        },
                        error: function () {
                            alert("An unexpected error occurred. Please try again.");
                        },
                    });
                });

                window.addEventListener('popstate', function () {
                    $.ajax({
                        url: "{{ route('clear.session') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            console.log(response.message);
                        },
                        error: function () {
                            console.error("Failed to clear session.");
                        }
                    });
                });
            });
        </script>
    </body>

</html>