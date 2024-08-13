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
            color: purple;
            font-family: futura;
            text-transform: uppercase;
            text-shadow: 2px 2px 4px rgb(0 0 0 / 18%);
        }
        .tracking-wider {
            letter-spacing: .05em;
        }
        .tracking-wider.error-message {
            font-family: futura;
            font-size: 2vw;
            color: purple;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgb(0 0 0 / 18%);
        }
        .tracking-wider.error-code-darkgreen{
            background-image: linear-gradient(90deg,white,#eecd18 100%);
            background-size: 200% 100%;
            background-position: 100% 0;
            font-family: futura;
            font-size: 6vw;
            color: orangered;
            border-radius: 50%;
            background-color: white;
            border-color: white;
            box-shadow: 0px 2px 20px #0001, 0px 1px 6px #0001;
            animation: focus 3s linear infinite;
            text-shadow: 2px 2px 4px rgb(0 0 0 / 18%);
        }
        .tracking-wider.error-code {
            background-image: linear-gradient(120deg,purple,gray 100%);
            background-size: 200% 100%;
            background-position: 100% 0;
            font-family: futura;
            font-size: 6vw;
            color: lightgray;
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
            color:purple;
            font-size: 2vw;
        }
        span.auth_user{
            font-family: futura;
            color:purple;
            font-size: 1vw; 
            text-align:left;
        }
    </style>
  </head>
    <body class="bg-dark d-flex align-items-center justify-content-center min-vh-100">
        <div class="container">
            <div class="p-3 m-3 text-center">
                <div class="card p-4 rounded-4">
                    <div class="row">
                            <h4 class="display-6 text-bold" style="color:black;font-size: 1.5vw;font-weight: 700;">You are not able to access the action !</h4>
                        <div class="col-xl-3">
                            @auth
                                <img class="img-profile rounded-circle" id="output" src="/image/{{auth()->user()->image}}" alt="error-image"><br>
                                <span class="display-6 text-bold fw-6 text-lg text-gray-500 user" style="color:black;font-weight: 700;">User</span><br>
                                <span class="display-6 text-bold fw-6 text-lg text-gray-500 auth_user" style="color:black;font-weight: 700;">Name : {{ auth()->user()->name}}</span><br>
                                <span class="display-6 text-bold fw-6 text-lg text-gray-500 auth_user" style="color:black;font-weight: 700;">Email : {{ auth()->user()->email}}</span>
                            @else
                                <img class="img-profile rounded-circle" id="output" src="/image/828.jpg" alt="user-image"><br>
                                <span class="display-6 text-bold fw-6 text-lg text-gray-500 user" style="color:black;">Guest User</span>
                            @endauth
                        </div>
                        <div class="col-xl-6">
                            <img class="img-profile" style="width:200px;height:200px;" src="/image/416.png" alt="error-image">
                        </div>
                        <div class="col-xl-3">
                            <h1 class="mt-2  display-1 fw-6 px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider error-code-darkgreen">416</h1>
                        </div>
                        <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider error-message" style="color:orangered;">
                            <span style="color:orange;font-size: 3vw;"><strong>Access</strong></span> permission is denied.</span>                  
                        </div>
                    </div>
                    <hr>
                    <div>
                        <a class="btn btn-success rounded-5 px-5" type="button" href="{{ url('/supplier') }}"> Go Back</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
