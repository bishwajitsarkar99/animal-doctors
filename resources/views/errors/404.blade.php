<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .card{
            box-shadow:0px 2px 20px #0001, 0px 1px 6px #0001;
            border:none;
        }
        h4.text-bold {
            font-size: 2vw;
            color: black;
            font-family: futura;
            text-transform: uppercase;
            text-shadow: 2px 2px 4px rgb(0 0 0 / 18%);
        }
        .tracking-wider {
            letter-spacing: .05em;
        }
        .tracking-wider.error-message {
            font-family: futura;
            font-size: 3vw;
            color: black;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgb(0 0 0 / 18%);
        }
        .tracking-wider.error-code {
            background-image: linear-gradient(120deg,white,orange 100%);
            background-size: 200% 100%;
            background-position: 100% 0;
            font-family: futura;
            font-size: 6vw;
            color: red;
            border-radius: 50%;
            background-color: white;
            border-color: white;
            box-shadow: 0px 2px 20px #0001, 0px 1px 6px #0001;
            animation: focus 3s linear infinite;
            text-shadow: 2px 2px 4px rgb(0 0 0 / 18%);
        }
        @keyframes focus {
            100% {
                background-position: -100% 0;
            }
        }
        #output{
            width: 150px;
            height: 150px;
            margin-top: 3px;
        }
        img.img-profile{
            width: 300px;
            height: 300px;
        }
        span.user{
            font-family: futura;
            color:black;
            font-size: 2vw;
            text-shadow: 0px 1px 1px #fff, 0px 0px 0px #000;
        }
        span.auth_user{
            font-family: futura;
            color:black;
            font-size: 1vw; 
            text-align:left;
            text-shadow: 0px 1px 1px #fff, 0px 0px 0px #000;
        }
        .top-skeleton,.image-skeletone,.code-skeletone,.text-capsule,.btn-capsule,.small-capsule, .bg_skeletone, .forbiden_skeletone{
            position: relative;
        }
        .bg_skeletone::before{
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
            opacity: 1;
            /* background: linear-gradient(90deg, #eee, #f9f9f9, rgba(36, 40, 43, 0)); */
            background: linear-gradient(90deg, #eee, #f9f9f9, rgb(11, 11, 11));
            background-size: 200%;
            animation: skeleton 1s infinite reverse;
            border-radius: 14px;
        }
        .forbiden_skeletone::before{
            content: "";
            position: absolute;
            left: 0;
            top: -88px;
            width: 100%;
            height: 200px;
            z-index: 10;
            background: linear-gradient(90deg, #eee, #f9f9f9, #eee);
            background-size: 200%;
            animation: skeleton 1s infinite reverse;
            border-radius: 10px;
        }
        .top-skeleton::before{
            content: "";
            position: absolute;
            left: 268px;
            top: 0;
            width: 50%;
            height: 100%;
            z-index: 10;
            background: linear-gradient(90deg, #eee, #f9f9f9, #eee);
            background-size: 200%;
            animation: skeleton 1s infinite reverse;
            border-radius: 20px;
        }
        @keyframes skeleton {
            100% {
                background-position: -100% 0;
            }
        }
        .image-skeletone::before{
            content: "";
            position: absolute;
            left: -1px;
            top: -61px;
            width: 101%;
            height: 152px;
            z-index: 10;
            background: linear-gradient(90deg, #eee, #f9f9f9, #eee);
            background-size: 200%;
            animation: skeleton 1s infinite reverse;
            border-radius: 50%;
        }
        .code-skeletone::before{
            content: "";
            position: absolute;
            left: -6px;
            top: -10px;
            width: 107%;
            height: 114px;
            z-index: 10;
            background: linear-gradient(90deg, #eee, #f9f9f9, #eee);
            background-size: 200%;
            animation: skeleton 1s infinite reverse;
            border-radius: 50%;
        }
        .text-capsule::before{
            content: "";
            position: absolute;
            left: -3px;
            top: 1px;
            width: 107%;
            height: 100%;
            z-index: 10;
            background: linear-gradient(90deg, #eee, #f9f9f9, #eee);
            background-size: 200%;
            animation: skeleton 1s infinite reverse;
            border-radius: 20px;
        }
        .btn-capsule::before{
            content: "";
            position: absolute;
            left: -3px;
            top: -2px;
            width: 105%;
            height: 110%;
            z-index: 10;
            background: linear-gradient(90deg, #eee, #f9f9f9, #eee);
            background-size: 200%;
            animation: skeleton 1s infinite reverse;
            border-radius: 20px;
        }
        .small-capsule::before{
            content: "";
            position: absolute;
            left: -4px;
            top: 2px;
            width: 115%;
            height: 100%;
            z-index: 10;
            background: linear-gradient(90deg, #eee, #f9f9f9, #eee);
            background-size: 200%;
            animation: skeleton 1s infinite reverse;
            border-radius: 20px;
        }
        
    </style>
  </head>
    <body class="bg-dark d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="p-3 m-3 text-center">
                <div class="card p-4 rounded-4 bg_skeletone">
                    <div class="row">
                        @auth
                            <h4 class="display-6 text-bold top-skeleton" style="font-size: 1.5vw;font-weight: 700;">You are not able to access the page !</h4>
                        @else
                            <h4 class="display-6 text-bold top-skeleton" style="font-size: 1.5vw;font-weight: 700;">User access permission abort(403) is !</h4>
                        @endauth
                        <div class="col-xl-3">
                            @auth
                                <span class="image-skeletone">
                                    <img class="img-profile rounded-circle" id="output" src="/storage/image/user-image/{{auth()->user()->image}}" alt="error-image"><br>
                                </span>
                                <span class="display-6 text-bold fw-6 text-lg text-gray-500 user text-capsule" style="font-weight: 700;">User</span><br>
                                <span class="display-6 text-bold fw-6 text-lg text-gray-500 auth_user text-capsule" style="font-weight: 700;">Name : {{ auth()->user()->name}}</span><br>
                                <span class="display-6 text-bold fw-6 text-lg text-gray-500 auth_user text-capsule" style="font-weight: 700;">Email : {{ auth()->user()->login_email}}</span>
                            @else
                                <span class="image-skeletone">
                                    <img class="img-profile rounded-circle" id="output" src="/image/828.jpg" alt="user-image"><br>
                                </span>
                                <span class="display-6 text-bold fw-6 text-lg text-gray-500 user text-capsule">Guest User</span>
                            @endauth
                        </div>
                        <div class="col-xl-6">
                            @auth
                                <span class="image-skeletone">
                                    <img class="img-profile" style="width:200px;height:200px;" src="/image/setting-two.png" alt="error-image">
                                </span>
                            @else
                                <span class="forbiden_skeletone">
                                    <img class="img-profile" style="width:200px;height:200px;" src="/image/403 Error Forbidden.gif" alt="error-image">
                                </span>
                            @endauth
                        </div>
                        <div class="col-xl-3">
                            @auth
                                <h1 class="mt-2  display-1 fw-6 px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider error-code code-skeletone">409</h1>
                            @else
                                <h1 class="mt-2  display-1 fw-6 px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider error-code code-skeletone">403</h1>
                            @endauth
                        </div>
                        <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider error-message" style="color:orangered;">
                            @auth
                                <span>
                                    <span class="text-capsule" style="color:orange;font-size: 3vw;"><strong>Setting</strong></span>
                                    <span class="small-capsule" style="font-size: 1.5vw;"> permission is blocked.</span>   
                                </span>
                            @else
                                <span class="small-capsule" style="font-size: 3vw;"><strong> Unauthorized</strong></span>                  
                            @endauth   
                        </div>
                    </div>
                    <hr>
                    <div>
                        <a class="btn btn-success rounded-5 btn-capsule px-5" type="button" href="{{ url('/accounts-logout') }}"> Go Back</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // skeleton
            function cardSkeletone() {
                const allSkeleton = document.querySelectorAll('.bg_skeletone')

                allSkeleton.forEach(item => {
                    item.classList.remove('bg_skeletone')
                });
            }
            function pageTopBar() {
                const allSkeleton = document.querySelectorAll('.top-skeleton')

                allSkeleton.forEach(item => {
                    item.classList.remove('top-skeleton')
                });
            }
            function imageSkeletone() {
                const allSkeleton = document.querySelectorAll('.image-skeletone')

                allSkeleton.forEach(item => {
                    item.classList.remove('image-skeletone')
                });
            }
            function forbidenSkeletone() {
                const allSkeleton = document.querySelectorAll('.forbiden_skeletone')

                allSkeleton.forEach(item => {
                    item.classList.remove('forbiden_skeletone')
                });
            }
            function codeSkeletone() {
                const allSkeleton = document.querySelectorAll('.code-skeletone')

                allSkeleton.forEach(item => {
                    item.classList.remove('code-skeletone')
                });
            }
            function leftCapsule() {
                const allSkeleton = document.querySelectorAll('.text-capsule')

                allSkeleton.forEach(item => {
                    item.classList.remove('text-capsule')
                });
            }
            function smallCapsule() {
                const allSkeleton = document.querySelectorAll('.small-capsule')

                allSkeleton.forEach(item => {
                    item.classList.remove('small-capsule')
                });
            }
            function btnCapsule() {
                const allSkeleton = document.querySelectorAll('.btn-capsule')

                allSkeleton.forEach(item => {
                    item.classList.remove('btn-capsule')
                });
            }

            setTimeout(() => {
                pageTopBar();
                imageSkeletone();
                forbidenSkeletone();
                codeSkeletone();
                leftCapsule();
                smallCapsule();
                btnCapsule();
            }, 4000);
            setTimeout(() => {
                cardSkeletone();
            }, 2000);
        </script>
    </body>
</html>
