<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Log Session PDF - 
        <?php
            $timezone = date_default_timezone_get();
            ?>
            <?php
            date_default_timezone_set('Asia/Dhaka');
            echo date('d l M Y') . " || ";
            echo date("h:i:sA");
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font-Awesome min.css CDN link -->
    <link rel="stylesheet" href="{{ asset('backend_asset/main_asset/fontawesome-6.4.2-web/css/all.min.css') }}">
    <!--============== Google Fonts Link ==================-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: Roboto,Noto Sans,Noto Sans JP,Noto Sans KR,Noto Naskh Arabic,Noto Sans Thai,Noto Sans Hebrew,Noto Sans Bengali,sans-serif;
        }
        p,span{
          font-family: Roboto,Noto Sans,Noto Sans JP,Noto Sans KR,Noto Naskh Arabic,Noto Sans Thai,Noto Sans Hebrew,Noto Sans Bengali,sans-serif;  
        }
        .header {
            text-align: center;
            margin-bottom: 0px;
        }
        .content {
            margin: 0px;
        }
        .footer {
            text-align: center;
            /* position: fixed;
            bottom: 0; */
            width: 100%;
        }
        table,tr,th,td {
            width: 100%;
            border-collapse: collapse;
        }
        th{
            background-color: whitesmoke;
            border-top: 1px solid lightgray;
            border-bottom: 1px solid lightgray;
            padding: 2px;
            font-size:12px;
            color:black;
            width: 100%;
        }
        th #theadLeftBorder{
            border-left: 1px solid lightgray;
        }
        th #theadRightBorder{
            border-right:1px solid lightgray;
        }
        tr{
            border: 1px solid lightgray;
            padding: 2px;
            font-size:12px;
            color:black;
            width: 100%;
        }
        td{
            padding: 2px;
            font-size:12px;
            color:black;
            width: 100%; 
        }
        .print-watermark-text {
            display:block;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 100px;
            color: rgba(0, 0, 0, 0.08); /* very light gray */
            font-weight: bold;
            z-index: 0;
            white-space: nowrap;
            pointer-events: none;
            width: 100%;
            text-align: center;
            /* 3D shadow effect */
            text-shadow:
                2px 2px 0 rgba(0, 0, 0, 0.04),
                4px 4px 0 rgba(0, 0, 0, 0.03),
                6px 6px 0 rgba(0, 0, 0, 0.02);

            /* Optional: give a soft blur for realism */
            filter: blur(0.2px);
        }
    </style>
</head>
<body>
    <div class="print-watermark-text">
        @foreach($companyinformations as $infos)
            <span>
                {{$infos->company_name}}
            </span>
        @endforeach
    </div>
    <div class="header">
        <div class="row">
            <div style="background-color:white;margin-top:1px;border-bottom: 2px double rgb(209, 230, 230);padding-bottom:0px;">
                <div class="col-6">
                    <span style="float:inline-start;">
                        <img style="width:70px;height:55px;padding:0px;" src="data:image/log/png;base64,{{ $imageData }}" alt="company-logo" width="100">
                    </span>
                    <span style="color:black; font-size:11px; font-wight:700px; float:right; margin-top:-20px; padding-right:5px">
                        [ Download :<?php
                        $timezone = date_default_timezone_get();
                        ?>
                        <?php
                        date_default_timezone_set('Asia/Dhaka');
                        echo date('d l M Y') . " || ";
                        echo date("h:i:sA");
                        ?> ] ,<br>
                        <label for="prepared">
                            [ Data-Exporter : {{Auth::User()->login_email}} ]
                        </label><br>
                    </span>
                </div>
                <div class="col-6">
                    @foreach($companyinformations as $infos)
                        <p style="color:black; font-size:12px; text-align:left;margin-left:100px;margin-top:10px;">
                            <span style="color:black; font-size:17px; font-wight:600px;">{{$infos->company_name}}</span><br>
                            <span style="color:black; font-size:12px;">Address :{{$infos->company_address}}</span><br>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <p style="font-size:13px;font-weight:700;">From : {{ $start_date->format('d M Y') }} <br> To : {{ $end_date->format('d M Y') }}</p>
        <p style="font-size:13px;font-weight:700;background-color:rgb(239, 255, 255);">
            
            Note :  @if(!empty($emails))
                        {{ implode(', ', $emails) }}, 
                    @endif
                    {{ $message }}
        </p>
    </div>
    <div class="row">
        <div class="col-12">
            <div style="background-color: white; color:black; text-align:left; font-size:12px;font-weight:700;">
                <p style="display: inline-block; margin-top:50px;margin-bottom:2px;">
                    <span style="text-align: center;">
                        <label for="prepared">
                            Prepared by ({{Auth::User()->name}})
                        </label>
                    </span>
                    <span style="text-align: center; margin-left:150px;">
                        <label for="reference">
                            Reference by
                        </label>
                    </span>
                    <span style="text-align: center; margin-left:205px;">
                        <label for="prepared">
                            Authorized by
                        </label>
                    </span>
                </p>
            </div>
        </div>
    </div>                    
    <div class="footer" style="border-top: 2px double rgb(209, 230, 230);">
        @if(count($companyinformations) > 0)
            @foreach($companyinformations as $infos)
                <p style="color:black; font-size:12px; text-align:center;">
                    <span style="color:black; font-size:12px;">Email : {{$infos->email}}</span> ,
                    <span style="color:black; font-size:12px;">Facebook : {{$infos->facebook_address}}</span> ,
                    <span style="color:black; font-size:12px;">Linkedin : {{$infos->linkedin}}</span> ,<br>
                    <span style="color:black; font-size:12px;">Contract-Number : [ {{$infos->contract_number_one}}, {{$infos->contract_number_two}} ]</span> ,
                    <span style="color:black; font-size:12px;">Hot-Number : {{$infos->hot_number}}</span>.
                </p>
            @endforeach
        @else
        <span>Now, there no data filtering !</span>
        @endif
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>