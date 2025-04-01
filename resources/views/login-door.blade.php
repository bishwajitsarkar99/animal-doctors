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
            *{
                margin:0;
                padding:0;
                box-sizing:border-box;
            }
            body {
                justify-content:center;
                align-items:center;
                flex-direction:column;
                font-family: "Poppins", Sans-serif;
                background-color:#d8edffd1;
            }
            .input-group {
                position: relative;
                width: 100%;
            }
            .input-group input.user_login_form {
                font-family: "Poppins", Sans-serif;
                outline: none;
                width: 100%;
                padding: 2px 8px;
                border: 1px solid #ccc;
                border-radius: 3px;
                font-size: 11px;
                font-weight: 700;
                color: #333;
                background: transparent;
                letter-spacing: 0.5px;
                word-spacing: 0.5px;
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
                font-family: "Poppins", Sans-serif;
            }
            .input-group input.user_login_form:focus ~ label,
            .input-group input.user_login_form:not(:placeholder-shown) ~ label {
                top: 0;
                left: 8px;
                font-size: 9px;
                font-weight:800;
                color: #333;
                background-color: rgb(255 255 255 / 55%);
                padding: 0 3px;
            }

            img.logo_size{
                height:50px;
                width: 50px;
            }
            .space{
                display:flex;
                justify-content: left;
                align-items: center;
            }
            span.text_size{
                font-size: 22px;
                text-transform: uppercase;
                animation: fadeInFromTop 5sease-out forwards, slideInRightToLeft 5sease-out forwards;
                font-family: "Poppins", Sans-serif;
                font-weight: 600;
                line-height: 2.5em;
            }
            @keyframes fadeInFromTop {
                0% {
                    opacity: 0;
                    transform: translateY(-20px);
                    filter: blur(10px);
                }
                100% {
                    opacity: 1;
                    transform: translateY(0);
                    filter: blur(0);
                }
            }
            @keyframes slideInLeftToRight {
                0% {
                    opacity: 0;
                    transform: translateX(-50px);
                    filter: blur(10px);
                }
                100% {
                    opacity: 1;
                    transform: translateX(0);
                    filter: blur(0);
                }
            }
            @keyframes slideInRightToLeft {
                0% {
                    opacity: 0;
                    transform: translateX(50px);
                    filter: blur(10px);
                }
                100% {
                    opacity: 1;
                    transform: translateX(0);
                    filter: blur(0);
                }
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
                font-family: "Poppins", Sans-serif;
                padding-left: 13px;
                margin-top:27px;
                background-color: #e7e7d763;
                padding-bottom:10px;
                padding-right:13px;
                animation: fadeInFromTop 3s ease-out forwards, slideInLeftToRight 3s ease-out forwards;
            }
            .form-bottom{
                animation: fadeInFromTop 5s ease-out forwards;
            }
            .media_text1{
                animation: fadeInFromTop 5s ease-out forwards, slideInLeftToRight 5s ease-out forwards;
            }
            .media_text2{
                animation: fadeInFromTop 5s ease-out forwards, slideInRightToLeft 5s ease-out forwards;  
            }
            .text-animation{
                animation: fadeInFromTop 5s ease-out forwards, slideInLeftToRight 5s ease-out forwards;
                font-size:13px;
                font-weight:600;
            }
            .animation-box-one{
                animation: fadeInFromTop 5s ease-out forwards, slideInLeftToRight 5s ease-out forwards; 
            }
            .animation-box-two{
                animation: fadeInFromTop 5s ease-out forwards, slideInRightToLeft 5s ease-out forwards;  
            }
            table{
                border-collapse: collapse;
                width: 100%;
            }
            tr.table_head_row {
                font-family: "Poppins", Sans-serif;
                color: #333;
                font-size: 15px;
            }
            td.user-login-td {
                font-family: "Poppins", Sans-serif;
                width: 100%;
                background-color: #dfdfde63;
            }
            td.user_login_form_label {
                font-family: "Poppins", Sans-serif;
                background-color: #dfdfde63;
                width: 14%;
                font-weight: 700;
                font-size: 12px;
                text-align: center;
                padding-top: 5px;
                color: #333;
            }
            .input-group input.user_login_form {
                border-top-right-radius: 3px !important;
                border-bottom-right-radius: 3px !important;
            }
            input.user_login_form:focus{
                border-color:#2f89fc;
            }
            .email-border{
                border: 1px solid #ddddddde;
            }
            .button_area {
                font-family: "Poppins", Sans-serif;
                justify-content: end;
                padding-right: 16px;
                padding-top: 10px;
            }
            #loading_content{
                width: 100%;
                margin-left: 0px;
                background: none;
                border: none;
            }
            .progress-bar{
                background-color: #ad7b00;
            }
            .progress-bar.animation_progress {
                font-size: 12px;
                font-weight: 700;
                padding-right: 10px;
                background-color: white;
                color: darkgoldenrod;
                padding-left: 5px;
                animation: focus_color 1s linear infinite;
            }
            @keyframes focus_color {
                0% {
                    background-color:#9f7b24;
                    color: white;
                }

                100% {
                    background-color:#9f7b24;
                    color: darkgoldenrod;
                }
            }
            .progress-bar-animated {
                -webkit-animation: progress-bar-stripes 1s linear infinite;
                animation: progress-bar-stripes 1s linear infinite;
            }
            @keyframes progress-bar-stripes {
                0% {
                    background-position: 1rem 0;
                }

                100% {
                    background-position: 0 0;
                }
            }
            .percent {
                font-size: 13px;
                font-weight: 700;
            }
            span#error_message {
                font-size: 12px;
                font-weight: 700;
                font-family: "Poppins", Sans-serif;
            }
            tr.error_mess_row {
                height: 28px;
            }
            td.group_action{
                justify-content: space-between !important;
                align-items: center;
                text-align: center;
                display: flex;
            }
            .valid-email-hidden{
                display:hidden;
            }
            .is-invalid {
                border: 1px solid #dc3545 !important;
                padding-right: calc(1.5em + 0.75rem) !important;
                background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e) !important;
                background-repeat: no-repeat !important;
                background-position: right calc(0.375em + 0.1875rem) center !important;
                background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem) !important;
                box-sizing: border-box !important;
            }
            .is-valid {
                border: 1px solid #159b15cf !important;
                padding-right: calc(1.5em + 0.75rem) !important;
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='none' stroke='darkgreen' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpath d='M2 8l4 4 8-8'/%3e%3c/svg%3e") !important;
                background-repeat: no-repeat !important;
                background-position: right calc(0.375em + 0.1875rem) center !important;
                background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem) !important;
                box-sizing: border-box !important;
            }

            .top-heading {
                background:transparent;
                box-shadow: 0px 20px 6px #0001, 0px 10px 6px #0001;
                opacity: 1;
            }
            .footer-box {
                animation: fadeInFromTop 5s ease-out forwards;
                background:transparent;
                box-shadow: 0px 20px 6px #0001, 0px 10px 6px #0001;
                border-radius:5px;
                color: #333;
                font-weight: 600;
                font-family: "Poppins", Sans-serif;
            }
            .footer-box:hover{
                color:black;
                box-shadow: 0px 0px 3px #0004, 1px 5px 5px #0001;
            }
            span.list-heading {
                font-weight: 700;
                font-size: 14px;
            }

            img.social_whatapp_icon {
                height: 43px;
                border-radius: 50px;
                margin-top: 0px;
            }
            img.social_messg_icon {
                height: 25px;
                border-radius: 50px;
                margin-top: 0px;
            }
            img.social_fab_icon {
                height: 20px;
                border-radius: 50px;
                margin-top: 0px;
            }

            @media only screen and (max-width: 976px) {
                span.media_text2 {
                    font-size: 25px;
                }
                img.logo_size {
                    height: 50px;
                    width: 50px;
                }
                input.user_login_form{
                    font-size:12px;
                }
                td.user_login_form_label{
                    font-size: 13px;
                }
                .form-box {
                    padding-left: 13px;
                    padding-right: 17px;
                }
                form#loginDoorForm {
                    padding-left: 13px;
                    padding-right: 19px;
                }
                .footer_row{
                    padding-left: 10px;
                    font-size: 14px;
                }
                .button_area {
                    padding-right: 17px;
                    padding-top: 10px;
                }
                button.btn.btn-sm.btn.login_button{
                    font-size:13px;
                }
            }

            @media only screen and (max-width: 776px) {
                span.media_text2 {
                    font-size: 25px;
                }
                img.logo_size {
                    height: 50px;
                    width: 50px;
                }
                .form-box {
                    padding-left: 13px;
                    padding-right: 17px;
                }
                form#loginDoorForm {
                    padding-left: 13px;
                    padding-right: 19px;
                }
                .footer_row{
                    padding-left: 10px;
                    font-size: 14px;
                }
                .button_area {
                    padding-right: 17px;
                    padding-top: 10px;
                }
                button.btn.btn-sm.btn.login_button{
                    font-size:13px;
                }
            }

            @media only screen and (max-width: 600px) {
                .row{
                    margin-left:0px;
                    margin-right:0px;
                }
                .form-bottom{
                animation: fadeInFromTop 5s ease-out forwards;
                }
                .media_text1{
                    animation: fadeInFromTop 5s ease-out forwards;
                }
                .media_text2{
                    animation: fadeInFromTop 5s ease-out forwards;  
                }
                .text-animation{
                    animation: fadeInFromTop 5s ease-out forwards;
                    font-size:13px;
                    font-weight:600;
                }
                .animation-box-one{
                    animation: fadeInFromTop 5s ease-out forwards; 
                }
                .animation-box-two{
                    animation: fadeInFromTop 5s ease-out forwards;  
                }
                form#loginDoorForm {
                    animation: fadeInFromTop 3s ease-out forwards;
                }
                span.text_size{
                    animation: fadeInFromTop 5sease-out forwards;
                }
                span.media_text2 {
                    font-size: 20px;
                }
                img.logo_size {
                    height: 40px;
                    width: 40px;
                }
                .form-box {
                    padding-left: 13px;
                    padding-right: 17px;
                }
                form#loginDoorForm {
                    padding-left: 13px;
                    padding-right: 19px;
                }
                .footer_row{
                    padding-left: 10px;
                }
                .button_area {
                    padding-right: 3px;
                    padding-top: 10px;
                }
            }

            @media only screen and (max-width: 500px) {
                .row{
                    margin-left:0px;
                    margin-right:0px;
                }
                .form-bottom{
                animation: fadeInFromTop 5s ease-out forwards;
                }
                .media_text1{
                    animation: fadeInFromTop 5s ease-out forwards;
                }
                .media_text2{
                    animation: fadeInFromTop 5s ease-out forwards;  
                }
                .text-animation{
                    animation: fadeInFromTop 5s ease-out forwards;
                    font-size:13px;
                    font-weight:600;
                }
                .animation-box-one{
                    animation: fadeInFromTop 5s ease-out forwards; 
                }
                .animation-box-two{
                    animation: fadeInFromTop 5s ease-out forwards;  
                }
                form#loginDoorForm {
                    animation: fadeInFromTop 3s ease-out forwards;
                }
                span.text_size{
                    animation: fadeInFromTop 5sease-out forwards;
                }
                span.media_text2 {
                    font-size: 20px;
                }
                img.logo_size {
                    height: 40px;
                    width: 40px;
                }
                .form-box {
                    padding-left: 13px;
                    padding-right: 17px;
                }
                form#loginDoorForm {
                    padding-left: 13px;
                    padding-right: 19px;
                }
                .footer_row{
                    padding-left: 10px;
                }
                .button_area {
                    padding-right: 3px;
                    padding-top: 10px;
                }
            }

            @media only screen and (max-width: 400px) {
                .row{
                    margin-left:0px;
                    margin-right:0px;
                }
                .form-bottom{
                animation: fadeInFromTop 5s ease-out forwards;
                }
                .media_text1{
                    animation: fadeInFromTop 5s ease-out forwards;
                }
                .media_text2{
                    animation: fadeInFromTop 5s ease-out forwards;  
                }
                .text-animation{
                    animation: fadeInFromTop 5s ease-out forwards;
                    font-size:13px;
                    font-weight:600;
                }
                .animation-box-one{
                    animation: fadeInFromTop 5s ease-out forwards; 
                }
                .animation-box-two{
                    animation: fadeInFromTop 5s ease-out forwards;  
                }
                form#loginDoorForm {
                    animation: fadeInFromTop 3s ease-out forwards;
                }
                span.text_size{
                    animation: fadeInFromTop 5sease-out forwards;
                }
                span.list-heading {
                    font-weight: 600;
                    font-size: 13px;
                }
                .text-animation{
                    font-size: 12px;
                    font-weight: 600;
                }
                .flex {
                    display: flex;
                }
                span.media_text2 {
                    font-size: 15px;
                }
                img.logo_size {
                    height: 30px;
                    width: 30px;
                }
                input.user_login_form{
                    font-size:11px;
                }
                td.user_login_form_label{
                    font-size: 12px;
                }
                .form-box {
                    padding-left: 13px;
                    padding-right: 17px;
                }
                form#loginDoorForm {
                    padding-left: 13px;
                    padding-right: 19px;
                }
                .footer_row{
                    padding-left: 10px;
                    font-size:8px;
                }
                .button_area {
                    padding-right: 9px;
                    padding-top: 10px;
                }
                tr.table-row{
                    display:flex;
                }
                td.user_login_form_label{
                    width: 22%;
                }
            }

            
        </style>
    </head>

    <body class="antialiased min-h-screen">
        <div class="relative flex items-top justify-center top-heading">
            <span class="media_text1">
                <img class="mt-1 mb-1 company_logo logo_size bg-light-blue" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt="">
            </span>
            <span class="media_text2 text_size text-light-black ms-3 mt-1">{{setting('company_name')}}</span>
        </div>
        <div class="relative flex items-top justify-center py-1 sm:pt-0 mt-5">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 bg-gray-100 dark:bg-gray-900 sm:items-center form-box animation-box-one">
                <form id="loginDoorForm" action="#" method="POST" autocomplete="off">
                    <table>
                        <thead>
                            <tr class="table_head_row form-bottom">
                                <th class="text-center py-1" colspan="2"><span>Open Door</span></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="table-row form-bottom">
                                <td class="user-login-td">
                                    <div class="input-group">
                                        <input class="user_login_form email-border" type="text" name="login_email" value="" placeholder="" autofocus id="user_login_form">
                                        <label for="user_login_form">User Email</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-row error_mess_row">
                                <td class="user-login-td" colspan="5"><span class="text-danger space" id="error_message"></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row button_area">
                        <button id="openSubmit" type="button" class="btn btn-sm btn-primary login_button open_submit form-bottom">
                            <span class="loading-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                            <span class="btn-text">Open</span>
                        </button>
                    </div>
                </form>
                <div class="flex justify-center mt-4 mb-3 sm:items-center sm:justify-between form-bottom">
                    <div class="text-center text-sm text-vaiolent sm:text-left footer_row">
                        <div class="flex items-center text-light-black">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400" style="color:#333;">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="#" class="ml-1 underline">
                                <span>Supplier Management System Software V-3.0.1</span>
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400" style="color:#333;">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0"></div>
                </div>
            </div>
        </div>
        <div class="footer-part relative flex items-top justify-center mt-5 animation-box-two">
            <div class="relative flex items-top justify-center py-1 px-1 sm:pt-0 pb-3">
                <div class="footer-box">
                    <div class="relative flex">
                        <div class="col-xl-6">
                            <span class="list-heading text-animation pt-2">Socal Media Info</span>
                            <address>
                                <span class="text-animation">
                                    <a class="" href="{{setting('update_social_media_facebook_link')}}">
                                        Facebook
                                        <span class="social_icon ms-2"><img class="social_fab_icon" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_social_media_facebook')}}" alt=""></span>
                                    </a>
                                </span><br>
                                <span class="text-animation">
                                    Messenger
                                    <a class="" href="{{setting('update_social_media_messanger_link')}}">
                                        <span class="social_icon_mess ms-2"><img class="social_messg_icon" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_social_media_messanger')}}" alt=""></span>
                                    </a>
                                </span><br>
                                <span class="text-animation">
                                    What's App
                                    <a class="" href="{{setting('update_social_media_whatsapp_link')}}">
                                        <span class="social_icon_whatsapp"><img class="social_whatapp_icon" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_social_media_whatsapp')}}" alt=""></span>
                                    </a>
                                </span>
                            </address>
                        </div>
                        <div class="col-xl-6">
                            <span class="list-heading text-animation pt-2">Company Info</span>
                            <address>
                                <span class="text-animation">Adrress : {{setting('company_address')}}</span><br>
                                <span class="text-animation">Contract - number : 01410-224512</span><br>
                                <span class="text-animation">Email : gstmedicine@gmail.com</span><br>
                                <span class="text-animation">Web : gstmedicine.com</span>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- start loader modal --}}
        <div class="modal fade" id="loadingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" id="loading_content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="progress_box">
                                    <div class="progress" id="openingProgress">
                                        <div class="progress-bar bar progress-bar-striped progress-bar-animated progress-bar-processing" style="width:0%;">
                                            <div class="percent">0%</div>
                                        </div>
                                        <div class="progress-bar animation_progress">Opening...</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        {{-- end loader modal --}}

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
                loadingProgressbar,
                //browserInpect, 
            } from "{{asset('backend_asset')}}/support_asset/auth/js/auth-helper-min.js";
            buttonLoader();
            //browserInpect();

            $(document).ready(function () {
                // Initialize the image upload with progress bar simulation
                loadingProgressbar("#openSubmit");
                // Initialize the button loader only when input is not empty
                buttonLoader('.login_button', '.loading-icon', '.btn-text', 'Open...', 'Open', 1000);
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
                // Open Login Page
                $(document).on('click', '#openSubmit', function (e) {
                    e.preventDefault();
                    $("#error_message").empty();
                    var user_email = $("#user_login_form").val();
                    if(user_email == ''){
                        $("#loadingModal").modal('hide');
                        $("#user_login_form").addClass('is-invalid');
                        $("#user_login_form").removeClass('email-border');
                        $("#error_message").append(`<span><svg width="25px" hieght="20px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg> </span> `);
                        $("#error_message").append(` Please enter a valid email.`);
                        setTimeout(() => {
                            $("#loadingModal").modal('hide');
                        }, 11000);
                    }else if(user_email !== ''){
                        $("#loadingModal").modal('show');
                        setTimeout(() => {
                            $("#loadingModal").modal('hide');
                        }, 11000);
                        currentURL = "{{ route('login_page.action') }}";
                    }
                    

                    // Make the AJAX request
                    $.ajax({
                        type: "GET",
                        url: currentURL,
                        data: { login_email: user_email},
                        dataType: "json",
                        success: function (response) {
                            setTimeout(() => {
                                $("#error_message").html("");
                                if (response.status === 200) {
                                    window.location.href = response.redirect;
                                } else {
                                    $("#error_message").html("");
                                    $("#user_login_form").addClass('is-invalid');
                                    $("#user_login_form").removeClass('email-border is-valid');
                                    $("#error_message").append(`<span><svg width="25px" hieght="20px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 489.435"><path fill="rgb(220, 53, 69)" fill-rule="nonzero" d="M109.524 317.184c6.788 0 12.29 5.502 12.29 12.29 0 6.788-5.502 12.291-12.29 12.291H71.37L33.265 464.853h444.623l-41.373-123.088H407.93c-6.788 0-12.291-5.503-12.291-12.291s5.503-12.29 12.291-12.29h46.171L512 489.435H0l53.325-172.251h56.199zM235.89 189.162c0-1.749-.019-3.502-.019-5.252a80.87 80.87 0 011.779-16.793A27.72 27.72 0 01242.941 156c4.888-5.793 10.569-8.671 16.306-13.285 7.492-5.755 11.679-17.97 1.311-23.267a13.563 13.563 0 00-6.006-1.263c-4.871 0-9.284 2.393-11.795 6.596a13.933 13.933 0 00-1.765 6.787c0 .75-31.634.397-34.966.397a43.395 43.395 0 016.823-25.164 38.973 38.973 0 0117.713-14.235c15.79-6.302 34.448-5.866 50.281.004a39.69 39.69 0 0118.072 13.236c7.342 10.397 8.674 25.281 3.75 37.048a35.112 35.112 0 01-7.814 11.159c-6.52 6.398-13.659 9.306-19.922 15.09a20.821 20.821 0 00-5.063 7.138 24.317 24.317 0 00-1.764 9.083l.003.314v3.345l-32.215.179zm16.626 47.349l-.382.001a18.084 18.084 0 01-13.169-5.696 19.012 19.012 0 01-5.568-13.44c0-.186.006-.38.01-.562v-.268a18.67 18.67 0 015.558-13.286 18.562 18.562 0 0126.743 0 18.92 18.92 0 015.876 13.554 19.45 19.45 0 01-2.801 9.984 21 21 0 01-6.958 7.09 17.546 17.546 0 01-9.221 2.623h-.133.045z"/><path fill="#EF4147" d="M266.131 425.009c-3.121 2.276-7.359 2.59-10.837.357-37.51-23.86-69.044-52.541-93.797-83.672-34.164-42.861-55.708-90.406-63.066-136.169-7.493-46.427-.492-91.073 22.612-127.381 9.098-14.36 20.739-27.428 34.923-38.714C188.57 13.428 225.81-.263 262.875.004c35.726.268 70.96 13.601 101.422 41.39 10.707 9.723 19.715 20.872 27.075 32.96 24.843 40.898 30.195 93.083 19.269 145.981-17.047 82.829-71.772 160.521-144.51 204.674zM255.789 37.251c69.041 0 125.006 55.965 125.006 125.005 0 69.041-55.965 125.006-125.006 125.006-69.04 0-125.005-55.965-125.005-125.006 0-69.04 55.965-125.005 125.005-125.005z"/></svg></span>`);
                                    $("#error_message").append(`<span>${response.error}</span>`);
                                    
                                }
                            }, 10800);
                        },
                        error: function () {
                            setTimeout(() => {
                                $("#error_message").html("");
                                $("#user_login_form").addClass('is-invalid');
                                $("#user_login_form").removeClass('email-border');
                                $("#error_message").append('Please enter a valid email.');
                            }, 11000);
                        },
                    });
                });

                // input keyup action
                $(document).on('keyup', '#user_login_form', function(){
                    $("#error_message").empty();
                    if($(this).hasClass('is-invalid')){
                        $(this).removeClass('is-invalid');
                        $(this).addClass('is-valid');
                    }else{
                        var value=$(this).val();
                        if (value =='') {
                            $(this).addClass('email-border');
                            $(this).removeClass('is-invalid');
                            $(this).removeClass('is-valid');
                        }
                    }
                });

            });
        </script>
    </body>

</html>