<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            /* common-border : if the common border is stop then will start optional border 
                other wise will be continue common border. 
            */
            border: 1px solid lightgray;
        }
        th{
            background-color: rgb(239, 255, 255);
            /* optional-border */
            border-top: 1px solid lightgray;
            border-bottom: 1px solid lightgray;
            padding: 2px;
            font-size:12px;
            color:black;
            width: 100%;
        }
        th #theadLeftBorder{
            /* optional-border */
            border-left: 1px solid lightgray;
        }
        th #theadRightBorder{
            /* optional-border */
            border-right:1px solid lightgray;
        }
        tr{
            /* optional-border */
            border: 1px solid lightgray;
            padding: 1px;
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
    </style>
</head>
<body>
    <div id="session-modal-content">
        <div class="header">
            <div class="row" style="background-color:white;border-bottom: 1px double lightgray;padding-bottom:20px;">
                <div class="col-12">
                    <span style="float:inline-start;">
                        <img style="width:70px;height:55px;padding:0px;border:1px solid lightgray;" src="data:image/log/png;base64,{{ $imageData }}" alt="company-logo" width="100">
                    </span>
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
                    @php
                        $firstSession = $logSessionData->first();
                    @endphp
                    <p style="float:right;font-weight:700; font-size:11px; color:black; text-align:left;margin-bottom: 5px;padding-top: 5px;">
                        Branch-Type : {{ optional($firstSession->users)->branch_type ?? 'N/A' }}<br>
                        Branch-ID : {{ $firstSession->branch_id ?? 'N/A' }}<br>
                        Branch-Name : {{ optional($firstSession->users)->branch_name ?? 'N/A' }}<br>
                        Branch-Location : {{ optional($firstSession->users)->location ?? 'N/A' }}
                    </p>
                </div>
            </div>
            <div class="row mt-1">
                <table style="margin-top:5px;">
                    <thead>
                        <tr>
                            <th id="theadLeftBorder" style="text-align:center;width:5%;">SN.</th>
                            <th style="text-align:center;width:5%;">ID</th>
                            <th style="text-align:left;width:30%;">Email</th>
                            <th style="text-align:left;width:10%;">Role</th>
                            <th style="text-align:left;width:10%;">IP</th>
                            <th style="text-align:left;width:15%;">Login Time</th>
                            <th style="text-align:left;width:15%;">Logout Time</th>
                            <th style="text-align:left;width:10%;">Last Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Initialize serial number
                            $serialNumber = 1;
                        @endphp
                        @if( count($logSessionData) >0 )
                            @foreach($logSessionData as $item)
                                <tr>
                                    <td style="text-align: center;width:5%;">{{ $serialNumber++ }}</td>
                                    <td style="text-align: center;width:5%;">{{ $item->user_id }}</td>
                                    <td style="text-align: left;width:30%;">{{ $item->email }}</td>
                                    <td style="text-align: left;width:10%;">{{ $item->roles->name }}</td>
                                    <td style="text-align: left;width:10%;">{{ $item->ip_address }}</td>
                                    <td style="text-align: left;width:15%;">{{ $item->created_at->format('d M Y h:i:s A') }}</td>
                                    <td style="text-align: left;width:15%;">{{ $item->updated_at->format('d M Y h:i:s A') }}</td>
                                    <td style="text-align: left;width:10%;">{{ $item->last_activity }}</td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="error_data" align="center" text-danger colspan="3">
                                    Session Data Not Exists On Server !
                                </td>
                            </tr> 
                        @endif
                    </tbody>
                </table>
            </div>
            <div style="display: flex;justify-content: space-between;width: 100%; overflow: hidden;margin-top:10px;">
                <div style="display: inline-block; width: 40%; vertical-align: top;">
                    <table style="width: 100%; border: 1px solid lightgray;">
                        <thead>
                            <tr style="font-weight: 700;font-size:12px;">
                                <th colspan="5" style="text-align:center;background-color:rgb(239, 255, 255);">User Summary</th>
                            </tr>
                            <tr>
                                <th style="width: 10%;text-align:center;">SN.</th>
                                <th style="width: 60%;text-align:left;">Email</th>
                                <th style="width: 10%;">Login</th>
                                <th style="width: 10%;">Logout</th>
                                <th style="width: 10%;">Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userSummaryData as $index => $user)
                            <tr>
                                <td style="width: 10%;text-align:center;">{{ $index + 1 }}</td>
                                <td style="width: 60%;text-align:left;">{{ $user->email }}</td>
                                <td style="width: 10%;text-align:center;">{{ number_format($user->total_login, 2) }}</td>
                                <td style="width: 10%;text-align:center;">{{ number_format($user->total_logout, 2) }}</td>
                                <td style="width: 10%;text-align:center;">{{ number_format($user->total_activity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr style="background-color:rgb(239, 255, 255);font-weight:700;">
                                <td colspan="2" style="text-align:center;">Total</td>
                                <td style="width: 10%;text-align:center;">{{ number_format($userTotalLogin, 2) }}</td>
                                <td style="width: 10%;text-align:center;">{{ number_format($userTotalLogout, 2) }}</td>
                                <td style="width: 10%;text-align:center;">{{ number_format($userSubTotalActivity, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
    
                <div style="display: inline-block; width: 40%; vertical-align: top;">
                    <table style="width: 100%; border: 1px solid lightgray;">
                        <thead>
                            <tr style="font-weight: 700;font-size:12px;">
                                <th colspan="5" style="text-align:center;background-color:rgb(239, 255, 255);">Branch Summary</th>
                            </tr>
                            <tr style="font-weight: 700;">
                                <th style="width: 10%;text-align:center;">SN.</th>
                                <th style="width: 30%;text-align:left;">Branch-ID</th>
                                <th style="width: 20%;">Login</th>
                                <th style="width: 20%;">Logout</th>
                                <th style="width: 20%;">Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $firstSession = $logSessionData->first();
                            @endphp
                            <tr style="font-weight: 600;">
                                <td style="width: 10%;text-align:center;">1</td>
                                <td style="width: 30%;text-align:left;">{{ $firstSession->branch_id ?? 'N/A' }}</td>
                                <td style="width: 20%;text-align:center;">{{ number_format($totalLogin, 2) }}</td>
                                <td style="width: 20%;text-align:center;">{{ number_format($totalLogout, 2) }}</td>
                                <td style="width: 20%;text-align:center;">{{ number_format($totalActivity, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
        <div class="footer" style="border-top: 1px double lightgray;">
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