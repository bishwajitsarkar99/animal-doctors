<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Log Session Print - 
        <?php
            $timezone = date_default_timezone_get();
            ?>
            <?php
            date_default_timezone_set('Asia/Dhaka');
            echo date('d l M Y') . " || ";
            echo date("h:i:sA");
        ?>
    </title>
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
            width: 100%;
        }
        table,tr,th,td {
            width: 100%;
            border-collapse: collapse;
            border: 1px ridge rgba(0,123,255,0.3);
        }
        th{
            background-color: rgb(239, 255, 255) !important;
            padding: 2px;
            font-size:12px;
            color:black;
            width: 100%;
            text-align:center;
        }
        tr{
            /* optional-border */
            border: 1px ridge rgba(0,123,255,0.3);
            padding: 1px;
            font-size:12px;
            color:black;
            width: 100%;
            text-align:center;
        }
        td{
            padding: 2px;
            font-size:12px;
            color:black;
            width: 100%; 
        }
    </style>
</head>
<body>
    <div id="session-modal-content">
        <div class="header">
            <div class="row" style="background-color:white;border-bottom: 1px double rgb(33 197 197);padding-bottom:20px;">
                <div class="col-12">
                    @foreach($companyinformations as $infos)
                        <p style="color:black; font-size:12px; text-align:left;margin-left:80px;margin-bottom: 0px;margin-top:0px;padding-top:12px;">
                            <span style="color:black; font-size:17px; font-wight:600;">{{$infos->company_name}}</span><br>
                            <span style="color:black; font-size:12px;">Address :{{$infos->company_address}}</span><br>
                        </p>
                    @endforeach
                    <span style="color:black; font-size:11px; padding-right:5px;float:right;margin-top:-30px;">
                        Download :<?php
                        $timezone = date_default_timezone_get();
                        ?>
                        <?php
                        date_default_timezone_set('Asia/Dhaka');
                        echo date('d l M Y') . " || ";
                        echo date("h:i:sA");
                        ?><br>
                        <label for="prepared">
                            [ User : {{Auth::User()->login_email}} ]
                        </label>
                    </span>
                </div>
            </div>
        </div>
    
        <div class="content">
            <div class="row">
                <div class="col-xl-6" style="float:left;">
                    <p style="font-weight:700; font-size:11px; color:black; text-align:left;margin-bottom: 5px;padding-top: 5px;">
                        From : {{ $start_date->format('d M Y') }}<br>
                        To : {{ $end_date->format('d M Y') }}<br>
                    </p>
                </div>
                <div class="col-xl-6">
                    <p style="float:right;font-weight:700; font-size:11px; color:black; text-align:left;margin-bottom: 5px;padding-top: 5px;">
                        
                    </p>
                </div>
            </div>
            <div class="row mt-1">
                <table style="margin-top:5px;">
                    <tr>
                        <th>
                            Note :  @if(!empty($emails))
                                    {{ implode(', ', $emails) }}, 
                                @endif
                                {{ $message }}
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" style="display: flex;justify-content: space-between;color:black; text-align:left; font-size:12px;font-weight:700;">
            <div class="col-4" style="margin-top:50px;text-align: center;">
                <span>
                    <label for="prepared">
                        Prepared by ({{Auth::User()->name}})
                    </label>
                </span>
            </div>
            <div class="col-4" style="margin-top:50px;text-align: center;">
                <span>
                    <label for="reference">
                        Reference by
                    </label>
                </span>
            </div>
            <div class="col-4" style="margin-top:50px;text-align: center;">
                <span>
                    <label for="prepared">
                        Authorized by
                    </label>
                </span>
            </div>
        </div>                    
        <div class="footer" style="border-top: 1px double rgb(33 197 197);">
            @if(count($companyinformations) > 0)
                @foreach($companyinformations as $infos)
                    <p style="color:black; font-size:12px; text-align:center;">
                        <span style="color:black; font-size:12px;">Email :{{$infos->email}}</span> ;
                        <span style="color:black; font-size:12px;">Facebook :{{$infos->facebook_address}}</span> ;
                        <span style="color:black; font-size:12px;">Linkedin :{{$infos->linkedin}}</span><br>
                        <span style="color:black; font-size:12px;">Contract-Number :{{$infos->contract_number_one}}, {{$infos->contract_number_two}}</span> ;
                        <span style="color:black; font-size:12px;">Hot-Number :{{$infos->hot_number}}</span>
                    </p>
                @endforeach
            @else
            <span>Now, there no data filtering !</span>
            @endif
        </div>
    </div>
</body>
</html>