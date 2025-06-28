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
</head>
<body>
    <div id="session-modal-content">
        <div class="header">
            <div class="row" style="background-color:white;border-bottom: 2px double rgb(209, 230, 230);padding-bottom:20px;">
                <div class="col-12">
                    @foreach($companyinformations as $infos)
                        <p style="color:black; font-size:12px; text-align:left;margin-left:80px;margin-bottom: 0px;margin-top:0px;padding-top:12px;">
                            <span style="color:black; font-size:17px; font-wight:600;">{{$infos->company_name}}</span><br>
                            <span style="color:black; font-size:12px;">Address :{{$infos->company_address}}</span><br>
                        </p>
                    @endforeach
                    <span style="color:black; font-size:11px; padding-right:5px;float:right;margin-top:-60px;">
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
                        </label>
                    </span>
                </div>
            </div>
        </div>
        <div class="content">
            <!-- User Information -->
            <div class="row" style="margin-top:20px;">
                <div class="col-xl-12" style="font-size:13px;background-color:rgba(0, 0, 0, 0.05);margin-top:10px;">
                    <span><strong>User Information</strong></span>
                </div>
                <div class="col-xl-6" style="float:right;">
                    <?php 
                        $firstSession = $userLoggedData->first();
                    ?>
                    <p style="font-size:13px; color:black; text-align:left;">
                        Name : {{ optional($firstSession->users)->name ?? 'N/A' }}<br>
                        Login-Email : {{ $firstSession->email ?? 'N/A' }}<br>
                        Reference-Email : {{ optional($firstSession->users)->reference_email ?? 'N/A' }}<br>
                        Mailing-Email : {{ optional($firstSession->users)->mailing_email ?? 'N/A' }}<br>
                        Credential-Email : {{ optional($firstSession->users)->email ?? 'N/A' }}<br>
                        Contranct-Number : {{ optional($firstSession->users)->contract_number ?? 'N/A' }}<br>
                        Account-Created : {{ optional($firstSession->users)->created_at ? optional($firstSession->users)->created_at->format('d-M-Y, h:i:s A') : 'N/A'  }}<br>
                        Account Last Updated : {{ optional($firstSession->users)->updated_at ? optional($firstSession->users)->updated_at->format('d-M-Y, h:i:s A') : 'N/A' }}<br>
                        Email-Verified : {{ optional($firstSession->users)->email_verified_at ? optional($firstSession->users)->email_verified_at->format('d-M-Y, h:i:s A') : 'N/A' }}
                    </p><br>
                </div>
                <div class="col-xl-6">
                    <p style="font-size:13px; color:black; text-align:left;">
                        <span style="float:inline-start;">
                            <img style="width:120px;height:120px;padding:0px;" src="data:image/png;base64,{{ $userImage }}" alt="user-image">
                        </span><br><br><br><br><br><br><br><br><br>
                        <span>User-ID : {{ $firstSession->user_id}}</span><br>
                        <span>Role : {{ optional($firstSession->roles)->name}}</span><br>
                    </p>
                </div>
            </div>
            <!-- Branch Information -->
            <div class="row" style="margin-top:20px;">
                <div class="col-xl-12" style="font-size:13px;background-color:rgba(0, 0, 0, 0.05);">
                    <span><strong>Branch Information</strong></span>
                </div>
                <div class="col-xl-12">
                    <p style="font-size:13px; color:black; text-align:left;">
                        Branch-Type : {{ optional($firstSession->users)->branch_type ?? 'N/A' }}<br>
                        Branch-ID : {{ $firstSession->branch_id ?? 'N/A' }}<br>
                        Branch-Name : {{ optional($firstSession->users)->branch_name ?? 'N/A' }}<br>
                        Division-Name : {{ optional($firstSession->users)->division_name ?? 'N/A' }}<br>
                        District-Name : {{ optional($firstSession->users)->district_name ?? 'N/A' }}<br>
                        Upazila-Name : {{ optional($firstSession->users)->upazila_name ?? 'N/A' }}<br>
                        Town-Name : {{ optional($firstSession->users)->town_name ?? 'N/A' }}<br>
                        Location : {{ optional($firstSession->users)->location ?? 'N/A' }}
                    </p>
                </div>
            </div>
            <!-- User Logged Information -->
            <div class="row" style="margin-top:20px;">
                <div class="col-xl-12" style="font-size:13px;background-color:rgba(0, 0, 0, 0.05);">
                    <span><strong>Logged Information</strong></span>
                </div>
                <div class="col-xl-12" style="padding-top:10px;">
                    <span class="user_agent_label">Session-ID : {{$firstSession->id}}</span><br>
                    <span class="user_agent_label">
                        <div style="font-size:13px;">
                            <ul style="list-style: none; margin: 0; padding-left: 20px; position: relative;">
                                <li style="position: relative; padding-left: 20px;">
                                    <span style="font-weight: bold;">User-Agent :</span>
                                    <ul style="list-style: none; margin-top: 5px; padding-left: 20px; position: relative;">
                                        <li style="position: relative; padding-left: 20px;">
                                            <span style="font-weight: bold;">Browser Name:</span> {{ $firstSession->user_agent['browser'] ?? 'N/A' }}
                                            <ul style="list-style: none; margin-top: 5px; padding-left: 20px; position: relative;">
                                                <li style="position: relative; padding-left: 20px;">
                                                    <span style="font-weight: bold;">Browser Engine:</span> {{ $firstSession->user_agent['layout'] ?? 'N/A' }}
                                                </li>
                                                <li style="position: relative; padding-left: 20px;">
                                                    <span style="font-weight: bold;">Operating System:</span> {{ $firstSession->user_agent['os'] ?? 'N/A' }}
                                                </li>
                                                <li style="position: relative; padding-left: 20px;">
                                                    <span style="font-weight: bold;">Device:</span> {{ $firstSession->user_agent['device'] ?? 'N/A' }}
                                                </li>
                                                <li style="position: relative; padding-left: 20px;">
                                                    <span style="font-weight: bold;">Device Brand:</span> {{ $firstSession->user_agent['brand'] ?? 'Unknown (shown only on mobile or tablet)' }}
                                                </li>
                                                <li style="position: relative; padding-left: 20px;">
                                                    <span style="font-weight: bold;">Device Model:</span> {{ $firstSession->user_agent['model'] ?? 'Unknown (shown only on mobile or tablet)' }}
                                                </li>
                                                <li style="position: relative; padding-left: 20px;">
                                                    <span style="font-weight: bold;">Device Manufacturer:</span> {{ $firstSession->user_agent['manufacturer'] ?? 'Unknown (shown only on mobile or tablet)' }}
                                                </li>
                                                <li style="position: relative; padding-left: 20px;">
                                                    <span style="font-weight: bold;">Public IP:</span> {{ $firstSession->user_agent['network_ip'] ?? 'N/A' }}
                                                </li>
                                                <li style="position: relative; padding-left: 20px;">
                                                    <span style="font-weight: bold;">IP Address:</span> {{ $firstSession->ip_address ?? 'N/A' }}
                                                </li>
                                            </ul>
                                        </li>
                                        <li style="margin-top: 8px;">
                                            <span style="font-weight: bold;">Description:</span> {{ $firstSession->user_agent['description'] ?? 'N/A' }}
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </span>
                    <span class="user_agent_label">Login-Date : {{ $firstSession->created_at->format('d-M-Y, h:i:s A') }}</span><br>
                    <span class="user_agent_label">Logout-Date : {{ $firstSession->updated_at->format('d-M-Y, h:i:s A') }}</span><br>
                    <span class="user_agent_label">
                        <?php
                            use App\Helpers\Helper; 
                        ?>
                        Last Logged Duration : {{ Helper::getTimeDifferenceCurrent($firstSession->created_at) }}
                    </span><br>
                    <span class="user_agent_label">Last-Activity : 
                        @if($firstSession->payload == 'logout')
                            {{ $firstSession->last_activity }}
                        @elseif($firstSession->payload == 'login')
                            <span>Runing</span>
                        @else
                            <span>N/A</span>
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex;justify-content: space-between;color:black; text-align:left; font-size:12px;font-weight:700;">
            <div class="col-4" style="margin-top:160px;margin-bottom:30px;text-align: center;">
                <span>
                    <label for="prepared">
                        Prepared by ({{Auth::User()->name}})
                    </label>
                </span>
            </div>
            <div class="col-4" style="margin-top:160px;margin-bottom:30px;text-align: center;">
                <span>
                    <label for="reference">
                        Reference by
                    </label>
                </span>
            </div>
            <div class="col-4" style="margin-top:160px;margin-bottom:30px;text-align: center;">
                <span>
                    <label for="prepared">
                        Authorized by
                    </label>
                </span>
            </div>
        </div>                    
        <div class="footer" style="border-top: 2px double rgb(209, 230, 230);">
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